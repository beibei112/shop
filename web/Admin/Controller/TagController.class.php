<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class TagController extends CommonController {
    public function index(){
        $mod = M('Tag');
        $data = $mod->select();

        //把每一个的标签对应的值
        $mod1 = M('Tag_val as tv');
        foreach($data as $v){
            $data1 = $mod1->field('v.val')->join('val as v on tv.val_id=v.id')->where('tv.tag_id='.$v['id'])->select();
            $temp=[];
            foreach($data1 as $val){
                $temp[]=$val['val'];
            }
            $temp1[$v['tag_name']]=$temp;            
        }

        //封装所搜条件
        if(isset($_GET['tag_name'])){

            $where ='tag_name like "%'.I('get.tag_name').'%"';

        }else{
            $where ='';
        }

        $count =$mod->where($where)->count();

        //获取分页大小
        $size =isset($_GET['size'])?I('get.size'):2;
        $page =new Page($count,$size);

        //修改page的配置
        $page->setConfig('prev','Prev');
        $page->setConfig('next','Next');
        $data =$mod->where($where)->limit($page->firstRow.','.$page->listRows)->select();
        $p =isset($_GET['p'])? I('get.p'):1;
        $this->assign('p',$p);
        $this->assign('url',$page->show());

        $this->assign('list1',json_encode($temp1));
        $this->assign('list',$data);
        $this->display();
    }

    //添加标签
    public function insert(){
        dump($_POST);
        $mod = M('Tag');

        $data['tag_name']=I('post.tag_name');
        $data['status']=1;//默认0关闭 1开启

        // //插入标签表
        $tag_id = $mod->add($data);

        //插入标签值表

        $mod1 = M('Val');
        $data1 = [];
        foreach(I('post.val') as $val){
            $temp['val_id']=$mod1->add(['val'=>$val,'status'=>1]);
            $temp['tag_id']=$tag_id;
            $data1[] = $temp;
        }

        //插入关联表
        $mod2 = M('Tag_val');
        if($mod2->addAll($data1)){
            $this->_suc('添加标签成功','/admin/tag/index');
        }else{
            $this->_err('添加标签失败','/admin/tag/index');
        }
    }

    //更改状态
    public function changestatus($id){
        $mod = M('Tag');
        $status = $mod->find($id)['status']==1?0:1;
        $mod->save(['id'=>$id,'status'=>$status]);
    }

    public function del($id){
        //删除属性 删除tag_val关联表中的数据 删除val中的值
        $mod = M('Tag_val');
        $mod1 = M('Val');

        //删除val中的值
        $data = $mod->where('tag_id='.$id)->select();

        foreach($data as $v){
            $mod1->delete($v['val_id']);
        }

        //2、删除tag_Val管理表中的数据
        $mod->where('tag_id='.$id)->delete();

        //3、删除属性
        $mod = M('Tag');
        if($mod->delete($id)){
            $this->_suc('删除标签成功','/admin/tag/index');
        }else{
            $this->_err('删除标签失败','/admin/tag/index'); 
        }
    }
}