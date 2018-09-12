<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class AdminuserController extends CommonController {
    	
	/*
		管理员浏览
	*/
	public function index(){

		//查询数据库
		$mod = D('Adminuser');

		//封装搜索条件
		if(isset($_GET['email'])){
			$where = 'email like "%'.I('get.email').'%"';
		}else{
			$where = '';
		}

		$count = $mod->where($where)->count();

		//获取分页大小
		$size = isset($_GET['size'])? I('get.size'):2;

		$page = new Page($count,$size);

		//修改page的配置
		$page->setConfig('prev','Prev');
		$page->setConfig('next','Next');

		//定义查询语句
		$data = $mod->where($where)->limit($page->firstRow.','.$page->listRows)->field('adminuser.*,grouplist.group_name')->join('grouplist on adminuser.groupid=grouplist.id')->select();

		//输出分页
		$p = isset($_GET['p'])? I('get.p'): 1;
		$this->assign('p',$p);
		$this->assign('url',$page->show());

		$this->assign('list',$data);
	    $this->display();
	}

    /*
		管理员添加表单
    */

    public function add(){
    	$this->display();
    }

    /*结束*/

    /*
		执行添加
    */
    public function insert(){
    	$mod = D('Adminuser');
    	
    	if($mod->create()){
	    	//插入操作
	    	$id = $mod->add();

	    	if($id){
	    		//发送邮件 激活操作
	    		if($this->sendEmail($id)){
	    			$_SESSION['jump']['success'][]='邮件发送成功';
				
	    			$this->redirect('admin/adminuser/index');
	    		}else{

					$_SESSION['jump']['error'][]='邮件发送失败';

		    		$this->redirect('admin/adminuser/add');
	    		}

	    		$_SESSION['jump']['success'][]='添加管理员成功';
				
	    		$this->redirect('admin/adminuser/index');
	    	}else{
	    		$_SESSION['jump']['error'][]='添加管理员失败';

	    		$this->redirect('admin/adminuser/add');
    		}
    	}else{
    		$_SESSION['jump']['error'][]=$mod->getError();
	    	$this->redirect('admin/adminuser/add');    	
	    }
    }

    /*结束*/

    /*删除操作*/

    public function del($id){
    	$mod = D('Adminuser');

    	$res = $mod->delete($id);

    	if($res){
    		$this->_suc('删除管理员成功','admin/adminuser/index',array());
    	}else{
    		$this->_err('删除管理员失败','admin/adminuser/index',array());
    	}
    }

    /*结束*/

    /*执行跳转到修改*/
    public function edit($id){
    	$mod = M('Adminuser');
    	$mod1 = M('Grouplist');
    	$grouplist = $mod1->select();
    	$vo = $mod->find($id);
    	$this->assign('grouplist',$grouplist);
    	$this->assign('vo',$vo);
    	$this->display();
    }

    /*执行修改(开始)*/

    public function update(){

    	$mod = D('Adminuser');

    	if($mod->create()){
	    	$res = $mod->save();
	    	if($res){
	    		$_SESSION['jump']['success'][]='修改管理员成功';
	    		$this->redirect('admin/adminuser/index');
	    	}else{
	    		$_SESSION['jump']['error'][]='修改管理员失败';
	    		$this->redirect('admin/adminuser/edit',array('id'=>I('post.id')));
	    	}
    	}else{
    		$_SESSION['jump']['error'][]=$mod->getError();
	    	$this->redirect('admin/adminuser/edit',array('id'=>I('post.id')));
    	}
    }

    /*结束(end)*/

    //发送邮件
    public function sendEmail($id){

    	$to =I('post.email');

       	$token = M('Adminuser')->find($id)['token'];

        $content = '恭喜您成功注册漫画网点击链接完成激活操作<a href="http://localhost/ThinkPhp/index.php/Admin/email/jihuo?id='.$id.'&token='.$token.'">点击激活</a>';
	   
    	$res = EmailController::send($to,'激活邮件',$id,$token,$content);
    	return $res;
    }
}