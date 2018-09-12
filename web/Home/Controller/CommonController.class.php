<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {

	public function _initialize(){

		if(!$_SESSION['home']['adminuser']){
			// echo '已经登录';
			//重定向
			$this->redirect('Home/login/login');
		}
	}

	//成功跳转方法
	public function _suc($info,$url,$arr=array()){
		$_SESSION['jump']['success'][]=$info;
    	$this->redirect($url,$arr);
	}

	//失败跳转方法
	public function _err($info,$url,$arr=array()){
		$_SESSION['jump']['error'][]=$info;
    	$this->redirect($url,$arr);
	}
    
}