<?php
namespace Home\Controller;
use Think\Controller;
class AddressController extends Controller {
	public function getAddressByUserId(){
		$mod = M('Address');
		$user_id = $_SESSION['home']['homeuser']['id'];
		return $mod->where('user_id='.$user_id)->select();

	}

	//购物车添加地址
	public function insert(){
		$mod = M('Address');
		$data = $_POST;
		$data['user_id']=$_SESSION['home']['homeuser']['id'];
		if($mod->add($data)){

			$this->redirect('home/order/index');
		}

	}

	//个人信息添加地址
	public function insertt(){
		$mod = M('Address');
		$data = $_POST;
		$data['user_id']=$_SESSION['home']['homeuser']['id'];
		if($mod->add($data)){

			$this->redirect('home/user/index');
		}

	}


	// //删除
	// public function del($id){
	// 	$mod = M('Address');


	// }
}