<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller{
    public function index(){
        //只有登录的用户才能下单
        if(!$_SESSION['home']['homeuser']['id']) {
            //没有登录
            $this->redirect('home/login/login');
        }

        //查询登录者所有下单地址
        $add = new AddressController();
        $address_list = $add->getAddressByUserId($_SESSION['home']['homeuser']['id']); //从session中获取登录者id
        $this->assign('address_list',$address_list);
        $this->assign('list',$this->data());
        $this->display();
    }

    //执行下单
    public function order(){
        //判断购物车中是否有商品
        if (!$_SESSION['cart']) {
            $this->redirect('/home/order/index');
        }
        $mod = M('Order');
        // dump($_POST);
        $data['address_id']=I('post.address_id');
        $data['user_id']=$_SESSION['home']['homeuser']['id']; //session
        $data['order_num']=$this->dingdan();
        $data['status']=0; //0新订单   1已发货   2已收货
        $data['total']=$this->count();
        $data['time']=time();
        $this->assign('dd',$data['order_num']);
        $order_id = $mod->add($data);

        // $order_id = 1;
        //插入订单详情表
        $mod1 = M('Order_detail');
        $cart = $_SESSION['cart'];
        $data1 = [];
        
        foreach ($cart as $v) {
            $temp['order_id']=$order_id;
            $temp['good_id']=$v['id'];
            $temp['num']=$v['num'];
            $data1[] = $temp;
        }
        if($mod1->addAll($data1)){
            //清空购物车
            unset($_SESSION['cart']);
            //告诉用户订单编号
            $this->redirect('/home/user/index');
            $this->display();
        }
        
    }

    public function count(){
        //查询购物车将总价计算返回
        $cart = $_SESSION['cart'];
        $mod = M('Sku');
        foreach ($cart as $v) {
            $price = $mod->find($v['id'])['price'];
            $count += $price*$v['num'];
        }
        return $count;
    }

    public function getRandABC($length=3){
      $str = null;
      $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
      $max = strlen($strPol)-1;

      for($i=0;$i<$length;$i++){
        $str .= $strPol[rand(0,$max)];
      }
      return $str;
    }

    public function getRand123($length=6){
      $str = null;
      $strPol = "0123456789";
      $max = strlen($strPol)-1;

      for($i=0;$i<$length;$i++){
        $str .= $strPol[rand(0,$max)];
      }
      return $str;
    }

    public function dingdan(){
        return $this->getRandABC().$this->getRand123();
    }

    public function data(){
        $cart = $_SESSION['cart'];
        $data = [];
        $mod = M('Sku');
        foreach($cart as $v){
            // dump($v);exit;
            
            $temp = $mod->field('good.name,sku.price,pic.path')->join('pic on pic.sku_id=sku.id')->group('pic.sku_id')->join('good on good.id=sku.good_id')->where('sku.id='.$v['id'])->find();
            $temp['num']=$v['num'];
            $temp['id']=$v['id'];
            $data[] = $temp;
        }
        return $data;
    }
}
?>