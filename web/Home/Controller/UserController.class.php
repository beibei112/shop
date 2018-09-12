<?php
namespace Home\Controller;
use Think\Controller;
use Think\Upload;
class UserController extends Controller {
	public function index(){
		//查询登陆者的个人信息
		$mod = M('User');
		$data = $mod->find($_SESSION['home']['homeuser']['id']);//获取session 谁登陆获取谁的用户id	
		//查询登陆者的订单和订单详情
		$mod1 = M('Order');
		$mod2 = M('Order_detail');
		$mod3 = M('sku');
		$mod4 = M('Address');

		//查询登陆者的下单地址
		$mod5 = M('Address');
		$data5 = $mod5->where('user_id='.$_SESSION['home']['homeuser']['id'])->select();

		//查询这个用户的所有订单记录
		$AllOrder = $mod1->where('user_id='.$_SESSION['home']['homeuser']['id'])->select(); //获取session 谁登陆获取谁的用户id
		foreach($AllOrder as $key1=>$v){
			
			//根据$v['address_id'] 查询订单的地址
			$data_1 = $mod4->field('sheng,shi,xian,jiedao')->find($v['address_id']);
			$AllOrder[$key1]['address']=implode(',',$data_1);

			// $v['id'];//订单id
			//根据订单id查询每一个订单的商品
				$goodsByOrderId = $mod2->where('order_id='.$v['id'])->select();
				foreach($goodsByOrderId as $key=>$val){
					// $val['good_id'];//sku的id
					//属性和单价 -->sku
					$sku = $mod3->join('pic on pic.sku_id=sku.id')->join('good on good.id=sku.good_id')->join('cate on cate.id=good.cate_id')->field('price,skuid,pic.path,good.name,cate.cate')->where('sku.id='.$val['good_id'])->group('pic.sku_id')->select();
			

					foreach($sku[0] as $a=>$b){
						/*
							图片
							属性
							单价
							商品的分类名称
							商品名称
						*/	
						$goodsByOrderId[$key][$a]=$b;
					}
				}

			$AllOrder[$key1]['goods'] = $goodsByOrderId;	
		}


		$this->assign('user',$data);

		$this->assign('list',$AllOrder);

		$this->assign('list_address',$data5);


		

		$this->display();
	}

	public function changePic(){
	
		//服务器端执行上传
		$upload = new Upload();// 实例化上传类    
		$upload->maxSize   =     3145728 ;// 设置附件上传大小    
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
		$upload->rootPath  =      './Public/ho/user/pics/'; // 设置附件上传目录  
		$upload->autoSub   =      false;//拒绝创建子目录  

    	// 执行上传     
    	$info   =  $upload->upload();
	
		if($info){//上传成功	
			$touxiang = __ROOT__.'/Public/ho/user/pics/'.$info['pic']['savename'];	
			//更新数据库
			$mod = M('User');

			$mod->save(['id'=>$_POST['userid'],'touxiang'=>$touxiang]);				
			//获取上传图片名称
			echo $touxiang;
		
		}
	}

	public function update(){
		$mod = M('User');
		$data['id']=$_SESSION['home']['homeuser']['id'];//session 
		$data[$_POST['name']]=$_POST['value'];
		$mod->save($data);

	}

	public function changeStatus(){
		$mod = M('Order');
		$mod->save([
			'id'=>$_POST['id'],
			'status'=>2
		]);
	}

	//删除一个收货地址并把关于这个id的订单删除
	public function del($id){
		$mod = M('Address');

		$mod1 = M('Order');

		//删除Address的id
		$res = $mod->delete($id);
		//关联address.id = order.address_id 然后删除
		$res1 = $mod1 -> where('address_id='.$id)->delete();
		
		//判断是否删除成功
		if($res){
			$this->redirect('home/user/index');
		}
		
	}

	//修改密码
	public function xiugai(){
		$this->display();
	}

	//执行修改
	public function mima(){
		$mod = M('User');
		$oldpass = $mod->field('password')->where('id='.I('post.id'))->select();
		foreach($oldpass as $v){
			$data['id'] = $_POST['id'];
			$data['password'] = $_POST['newpass'];
			if($v['password']==I('post.password')){
				$mod->save($data);
				$this->redirect('/home/login/login');
			}

		}
	}

}
?>