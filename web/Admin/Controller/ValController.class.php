<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class ValController extends CommonController {
	public function index(){
		$mod = M('Val');
		$data = $mod->select();


        //封装所搜条件
        if(isset($_GET['val'])){

            $where ='val like "%'.I('get.val').'%"';

        }else{
            $where ='';
        }

        $count =$mod->where($where)->count();

        //获取分页大小
        $size =isset($_GET['size'])?I('get.size'):4;
        $page =new Page($count,$size);

        //修改page的配置
        $page->setConfig('prev','Prev');
        $page->setConfig('next','Next');
        $data =$mod->where($where)->limit($page->firstRow.','.$page->listRows)->select();
        $p =isset($_GET['p'])? I('get.p'):1;
        $this->assign('p',$p);
        $this->assign('url',$page->show());


		$this->assign('list',$data);
		$this->display();
	}

	 //更改状态
    public function changestatus($id){
        $mod = M('Val');
        $status = $mod->find($id)['status']==1?0:1;
        $mod->save(['id'=>$id,'status'=>$status]);
    }

    public function del($id){
        $mod = M('Val');
        if($mod->delete($id)){
            $this->_suc('删除属性值成功','/admin/val/index');
        }else{
            $this->_err('删除属性值失败','/admin/val/index'); 
        }
    }
}