<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
class PiccController extends CommonController {
    public function index(){
        $mod = M('Picc');
        $data = $mod->select();

    	$this->assign('list',$data);
        $this->display();
    }

    public function add(){

        $this->display();
    }

    public function insert(){
        $mod = M('Picc');

        // 上传图片
        // 上传pic  插入pic标
        // 文件上传
         $upload = new Upload();// 实例化上传类
         $upload->maxSize   =     3145728 ;// 设置附件上传大小
         $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
         $upload->rootPath  =      './Public/Lunbotu/'; // 设置附件上传目录
         $upload->autoSub   =      false;//拒绝创建子目录
        //插入评论表数据
         // 执行上传
        $info = $upload->upload();

        $data  = [];

        $data['name'] = $_POST['name'];

        foreach($info as $key => $val){
            $data[$key] = $val['savename'];
        }
    

        if($mod->add($data)){

            $_SESSION['jump']['success'][]='上传成功';
            $this->redirect('admin/picc/index');
        }

       
        $this->display();

    }

    /*执行跳转到删除*/
    public function del($id){
        $mod = M('Picc');

        $res = $mod->delete($id);

        if($res){
            $this->_suc('删除图片成功','admin/picc/index',array());
        }else{
            $this->_err('删除图片失败','admin/picc/index',array());
        }
    }
  
}