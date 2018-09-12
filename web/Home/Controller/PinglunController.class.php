<?php
namespace Home\Controller;
use Think\Controller;
use Think\Upload;
class PinglunController extends Controller{
	public function add(){

		//插入评论表数据
		$mod = M('Pinglun');
		$goodid = $_POST['g_id'];
		unset($_POST['g_id']);
		$data = $_POST;
		$data['user_id']=$_SESSION['home']['homeuser']['id'];//SESSION
		$data['time'] = time();
		$data['leval'] = $data['leval'].'%';
		$pinglun_id = $mod->add($data);
		// 上传图片
		// 上传pic  插入pic标
		// 文件上传
    	 $upload = new Upload();// 实例化上传类
    	 $upload->maxSize   =     3145728 ;// 设置附件上传大小
    	 $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    	 $upload->rootPath  =      './Public/Uploads/'; // 设置附件上传目录
    	 $upload->autoSub   =      false;//拒绝创建子目录
		//插入评论表数据
		 // 执行上传
    	$info = $upload->upload();

    	if($info) { //上传成功

    	 	$pics = [];

    	 	foreach($info as $file){
    	 		$temp['pinglun_id'] = $pinglun_id;

    	 		//获取上传图片名称
	    	 	$temp['path']=__ROOT__.'/Public/Uploads/'.$file['savename'];
	    	 	$pics[] = $temp;

	    	 }

			//插入pic
			$mod = M('Salepic');
			if($mod->addAll($pics)){
				$this->redirect('/home/detail/show/id/'.$goodid);
			}else{
				return false;
			}
		}
	}
}
