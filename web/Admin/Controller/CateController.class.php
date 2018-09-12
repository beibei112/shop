<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class CateController extends CommonController {
    // 添加分类
    public function add(){
        $this->assign('list',self::cate());
        $this->display();
    }
    
    public static function cate(){

        //查询所有分类信息
    	$mod = M('Cate');

        $data = $mod->field('*,concat(path,id) as p')->order('p')->select();//二维数组

        foreach($data as $k=>$v){
        	$data[$k]['cate'] = str_repeat('|---',count(explode(',',$v['path']))-2).$v['cate'];
        }
        return $data;
    }

    //添加分类
    public function insert(){
    	$mod = M('Cate');
    	//判断添加的是顶级类还是子类
    	if(I('post.pid')==0){
    		//代表插入的是顶级类
    		$data['cate']=I('post.cate');
    		$data['pid']=0;
    		$data['path']='0,';
    	}else{
    		//代表插入子分类
    		$data['cate']=I('post.cate');
    		$data['pid']=I('post.pid');
    		$data['path']=$mod->find(I('post.pid'))['path'].I('post.pid').',';//父类的path.pid.,
    	}
    	
    	//判断是否添加成功
    	if($mod->add($data)){
    		$this->_suc('添加分类成功','/admin/cate/index');
    	}else{
    		$this->_err('添加分类失败','/admin/cate/add');
    	}
    }

    //搜索与分页
    public function index(){
    	$mod = M('Cate as c1');

		//封装搜索条件
		$where = '';

		$count = $mod->where($where)->count();

		//定义查询语句
		$data = $mod->where($where)->limit($page->firstRow.','.$page->listRows)->field('c1.id,c1.cate,c1.path,c1.pid as aa,c2.cate as pid')->join('left join cate as c2 on c1.pid=c2.id')->select();


    	$this->assign('list',$data);
    	$this->display();
    }

    //删除
    public function del($id){
    	//有子类的分类不能直接删除 只有把子类删除完 才能删除这个分类
    	$mod = M('Cate');
    	if(count($mod->where('path like "%,'.$id.',%"')->select())){
    		$this->_err('该分类存在在子类不能直接删除','/admin/cate/index');
    	}else{
    		if($mod->delete($id)){
    			$this->_suc('删除成功','/admin/cate/index');

    		}else{
    			$this->_err('删除失败','/admin/cate/index');
    		}
    	}
    }

    //更改页面的数据
    public function edit($id){
    	//把所有的分类信息存在session
    	$this->assign('list',self::cate());

    	$mod = M('Cate');

    	$this->assign('v',$mod->find($id));//编辑的分类数据
    	$this->display();
    }

    //更改数据
    public function update(){
    	$mod = M('Cate');
    	if($mod->save($_POST)){
    		$this->_suc('更改分类名成功','/admin/cate/index');
    	}else{
    		$this->_err('更改分类名失败','/admin/cate/index',array('id'=>I('post.id')));

    	}
    }

    //添加分类的子分类
    public function smalladd($id){
	    $this->assign('list',$this->cate());
		$mod = M('Cate');
		$this->assign('v',$mod->find($id));//编辑的分类数据

		$this->display();
    }

    //当前分类选择标签
    public function edittag($id){
        $mod = M('Cate');
        $cate_name = $mod->find($id);

        $mod1 = M('Tag');

        //查询status是1的用户显示
        $tags = $mod1->where('status=1')->select();

        //把当前这个分类已经拥有的标签显示在模板中
        $mod2 = M('cate_tag');
        $data = $mod2->where('cate_id='.$id)->select();

        //获取选中的tag_id
        foreach($data as $v){
            $sel_tag[] = $v['tag_id'];
        }
        // dump($sel_tag);


        $this->assign('sel_tag',$sel_tag);

        $this->assign('v',$cate_name);
        $this->assign('list',$tags);

        $this->display();
    }

    //更改分类的标签
    public function updatetag(){
        $mod = M('cate_tag');

        //先清空这个分类的所有标签，然后在插入已现在标签为准
        $mod->where('cate_id='.I('post.cate_id'))->delete();

        $data = [];
        foreach(I('post.tag') as $tag_id){
            $temp['cate_id']=I('post.cate_id');
            $temp['tag_id']=$tag_id;
            $data[]=$temp;
        }

        //判断添加是否成功
        if($mod->addAll($data)){
            $this->_suc('关联标签成功','/admin/cate/index');
        }else{
             $this->_err('关联标签失败','/admin/cate/edittag',array('id'=>I('post.cate_id')));
        }
    }

   public function getCateByPid($allcates,$pid=0){
        $data = [];
        foreach($allcates as $k=>&$v){
            if($v['pid']==$pid){
                $v['sub'] = $this->getCateByPid($allcates,$v['id']);//根据自己的id查询该类的子类
                $data[]=$v;
            }
        }
        return $data;
    }
    public function setCates(){
        $mod = M('Cate');
        $res  = $mod->select();
        $data = $this->getCateByPid($res,0);
        S('cates',$data,'30');
    }
    public function getCates(){
        $data = S('cates');
        if(!$data){
            $this->setCates();
            $data = S('cates');
        }
        return $data;
        // $this->assign('list',$data);
        //     $this->display();
    }

}
