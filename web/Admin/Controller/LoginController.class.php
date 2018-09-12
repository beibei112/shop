<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
        $this->display();
    }

    public function checklogin(){
    	$email = I('post.email');

    	$mod = M('Adminuser');
    	$data = $mod->where('email = "'. I('post.email').'"')->find();
    	if($data){
    		//账号存在
    		if($data['status']==1){
    			//激活 可以登录
    			if($data['pass'] == I('post.pass')){
    				//将用户信息存入到session
    				$_SESSION['adminuser']=$data;

    				//更新上次登录时间和登录的ip
    				$data1['last_login']=time();
    				$data1['ip'] = $_SERVER['REMOTE_ADDR'];
    				$data1['id']=$data['id'];
    				$mod->save($data1);

    				//登录成功
    				$this->redirect('admin/index/index');
    			}else{
    				$this->assign('flag','密码错误');
    				//密码错误
    				$this->display('login/login');
    			}
    	}else{
    		//未激活
    		$this->assign('flag','账号未激活不能登录');
    		}
    	}else{
			//不存在
			$this->assign('flag','账号不存在');
    	}

    	$this->display('login/login');
    }

    public function outlogin(){
    	//清空session
    	unset($_SESSION['adminuser']);

    	$this->redirect('admin/index/index');
    }
}