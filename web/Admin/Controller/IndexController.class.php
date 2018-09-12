<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
    	//查询登陆者的信息
    	$mod = M('Adminuser');
    	$vo = $mod->field('adminuser.*,grouplist.group_name')->join('grouplist on adminuser.groupid = grouplist.id')->where('adminuser.id='.$_SESSION['adminuser']['id'])->find();
    	$this->assign('vo',$vo);
        $this->display();
    }

    //编辑个人信息 name pic
    public function update(){
    	$upload = new \Think\Upload();//实例化上传类
    	$upload->maxSize   =   3145728;//设置附件上传大小
    	$upload->exts      =   array('jpg','gif','png','jpeg');//设置附件上传类型
    	$upload->rootPath  =   './Public/Uploads/';//设置附件上传目录
    	$upload->autoSub   =   false;//拒绝创建子目录
    	//上传文件
    	$info = $upload->upload();

    	//获取文件上传
    	$path = './Public/Uploads/'.$info['pic']['savename'];

    	$data['id']=$_SESSION['adminuser']['id'];
    	$data['pic'] = $path;
    	$data['name']=I('post.name');
    	// dump($data);

    	$mod = M('Adminuser');
    	if($mod->save($data)){
    		//更新session个人信息
    		dump($_SESSION['adminuser']);
    		$_SESSION['adminuser']['name']=I('post.name');
    		$_SESSION['adminuser']['pic']=$path;
    		$this->_suc('编辑成功','/admin/index/index');
    	}else{
    		$this->_err('编辑失败','/admin/index/index');
    	}

    	// if(!$info){
    	// 	$this->error($upload->getError());
    	// }else{
    	// 	$this->success('上传成功');
    	// }
    }

    //修改个人密码页面
    public function changepass(){
    	$this->display();
    }

    //执行修改密码
    public function dochange(){
    	$id = $_SESSION['adminuser']['id'];

    	if(I('post.oldpass') == $_SESSION['adminuser']['pass']){
    		if(I('post.pass') == I('post.conpass')){
    			$mod = M('Adminuser');
    			if($mod->where('id='.$id)->save(['pass'=>I('post.pass')])){
    				$this->redirect('/admin/login/login');
    			}else{
    				$this->_err('密码格式不正确','/admin/index/changepass');
    			}
    		}else{
				$this->_err('两次密码不一致','/admin/index/changepass');
    		}
    	}else{
			$this->_err('原始密码不正确','/admin/index/changepass');
    	}
    }
}