<?php
namespace Home\Controller;
use Think\Controller;
class CartController extends Controller {
    public function add(){
         //只有登录用户才能下单
        if(!$_SESSION['home']['homeuser']){
            //没有登录
            $this->redirect('home/login/login');
        }

    	if(IS_POST){

	    	//判断该商品是否已经存在购物车中
	    	if(!$this->checkCart(I('post.id'),I('post.num'))){

		    	//该商品不在购物车中
		    	$_SESSION['cart'][] = array(
		    		'id'=>I('post.id'),
		    		'num'=>I('post.num')
		    	);
	    	}
    	}

    	//加载购物车列表
    	$this->index();
    }

    //检测一个商品是否在购物车中
    public function checkCart($id,$num){

    	$cart = $_SESSION['cart'];

    	foreach($cart as $key=>$v){
    		if($v['id']==$id){

    			//该商品已经在购物车里
    			$cart[$key]['num']+=$num;
    			//清空session
    			unset($_SESSION['cart']);
    			//更新session
    			$_SESSION['cart']=$cart;

    			return true;
    		}
    	}

    	return false;

    }

    public function data(){
    	$cart = $_SESSION['cart'];
    	$data = [];
    	$mod = M('Sku');
    	foreach($cart as $v){
    		$temp = $mod->field('good.name,sku.price,pic.path')->join('pic on pic.sku_id=sku.id')->group('pic.sku_id')->join('good on good.id=sku.good_id')->where('sku.id='.$v['id'])->find();
    		$temp['num']=$v['num'];
    		$temp['id']=$v['id'];
    		$data[] = $temp;
    	}

    	return $data;
    }

    //查看session购物车
    public function index(){
    	
    	$this->assign('list',$this->data());
    	$this->display('cart:index');
    }

    //清空session购物车
    public function clear(){
    	unset($_SESSION['cart']);
    }

    //更新购物车单个商品的数量
    public function updateCart(){
    	$cart = $_SESSION['cart'];
    	foreach($cart as $key=>$v){
    		if($v['id']==I('post.id')){
    			if(I('post.flag')=="+"){
    				$cart[$key]['num']+=1;
    			}else{
    				$cart[$key]['num']-=1;
    			}

    			//清空session
    			unset($_SESSION['cart']);
    			//更新session
    			$_SESSION['cart']=$cart;
    		}
    	}
    }

    //删除购物车中单个商品
    public function del(){
    	
    	$cart = $_SESSION['cart'];
    	foreach($cart as $key=>$v){
    		if($v['id']==I('post.id')){
    			unset($cart[$key]);

    			//更新session购物车
    			unset($_SESSION['cart']);

    			$_SESSION['cart']=$cart;
    			// dump($_SESSION['cart']);

    		}
    	}
    }
}