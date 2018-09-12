<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
use Think\Upload;
class GoodController extends CommonController {

	//显示
	public function index(){
		$mod  = M('Good');
		  //封装所搜条件
      if(isset($_GET['name'])){

        $where ='name like "%'.I('get.name').'%"';

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

		$data = $mod->where($where)->limit($page->firstRow.','.$page->listRows)->field('good.*,pic.path,cate.cate')->join('cate on good.cate_id=cate.id')->join('pic on good.id=pic.good_id')->group('pic.good_id')->select();
		foreach($data as &$good){
			$mod1 =M('sku');
			$temp =$mod1->field('sku.*,pic.path')->join('pic on sku.id=pic.sku_id')->where('sku.good_id='.$good['id'])->select();
			$good['sku']=$temp;
		}
		 //输出分页
	    $p =isset($_GET['p'])? I('get.p'):1;
	    $this->assign('p',$p);
	    $this->assign('url',$page->show());
		$this->assign('list',$data);
		$this->display();

	}

	/*
		商品上架 下架处理
	*/
	public function action($id){
		$mod = M('Good');
		$status = $mod->find($id)['status'];
		if($status==0){
			//新上架 销售
			$mod->save(['id'=>$id,'status'=>1]);
			$info = '上架成功';
		}

		if($status==1){
			//上架-》下架
			$mod->save(['id'=>$id,'status'=>2]);
			$info = '下架成功';
		}

		if($status==2){
			// 下架-》上架
			$mod->save(['id'=>$id,'status'=>1]);
			$info = '重新上架成功';
		}

		$this->_suc($info,'/admin/good/index');

	}

	public function add(){
		//获取分类数据
		$this->assign('list',CateController::cate());

		$this->display();
	}

	public function insert(){
		//1.开启事物
		M()->startTrans();

		$mod = M('good');
		//查询该商品是新添加还是添加sku
		if(!$good_id = $mod->where('name="'.I('post.name').'"')->select()[0]['id']){

			$good_id = $this->add_good();
		}

		//插入suk
		$sku_id = $this->add_sku($good_id);

		//插入picy
		$res_pic = $this->add_pic($good_id,$sku_id);

		//2.判断关联语句执行的情况
		if($good_id && $res_pic && $sku_id){
			//提交
			M()->commit();
			$this->_suc('添加商品成功','/admin/good/index');
		}else{
			//回滚
			M()->rollback();
			$_SESSION['cate_id']=I('post.cate_id');
			$this->_err('添加商品失败','/admin/good/add');
		}
	}

	public function add_good(){
		//先插入good表  获取到自增id
		$mod = M('good');
		$data['cate_id'] = I('post.cate_id');
		$data['name'] = I('post.name');
		$data['company'] = I('post.company');
		$data['desc'] = I('post.desc');
		$data['status'] = 0;  //0 新上架  1 在售 2 下架
		$data['clicknum'] = 0;
		$data['sale'] = 0;

		$good_id = $mod->add($data);

		return $good_id;
	}

	public function add_pic($good_id,$sku_id){

		//上传pic  插入pic表
		//文件上传
    	 $upload = new Upload();// 实例化上传类
    	 $upload->maxSize   =     3145728 ;// 设置附件上传大小
    	 $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    	 $upload->rootPath  =      './Public/Uploads/'; // 设置附件上传目录
    	 $upload->autoSub   =      false;//拒绝创建子目录

    	 // 执行上传
    	 $info   =   $upload->upload();

    	if($info) { //上传成功

    	 	$pics = [];

    	 	foreach($info as $file){
    	 		$temp['sku_id'] = $sku_id;
    	 		$temp['good_id'] = $good_id;

    	 		//获取上传图片名称
	    	 	$temp['path']=__ROOT__.'/Public/Uploads/'.$file['savename'];
	    	 	$pics[] = $temp;

	    	 }

			//插入pic
			$mod = M('pic');
			if($mod->addAll($pics)){
				return true;
			}else{
				return false;
			}
		}
	}

	public function add_sku($good_id){
		//插入sku表
		$data['good_id'] = $good_id;
		$data['price'] = I('post.price');
		$data['num'] = I('post.num');
		$data['skuid'] = $this->getsku();

		$mod = M('Sku');
		if($sku_id = $mod->add($data)){
			return $sku_id;
		}
	}

	//根据post封装Suk
	public function getsku(){
		$str = '';
		foreach($_POST as $key=>$val){
			if($key!='cate_id' && $key!='name' && $key!='company' && $key!='price' && $key!='num' && $key!='desc') {
				$str.='\\'.$val;
			}
		}

		return $str;
	}

	public function getTagByCateId($cate_id){
		//根据分类id获取标签和标签值
		$mod = M('cate_tag as ct');
		$data = $mod->field('t.tag_name,v.val')->join('tag as t on ct.tag_id=t.id')->join('tag_val as tv on ct.tag_id=tv.tag_id')->join('val as v on tv.val_id=v.id')->where('ct.cate_id='.$cate_id)->select();

		//重组数组格式  属性划分
		$data1 = [];
		foreach($data as $v){
			$data1[$v['tag_name']][]=$v['val'];
		}

		echo json_encode($data1);
		// $this->assign('list',$data1);
		// $this->display('add');
	}

	public function editDetail($id){
		$mod = M('Good');
		$detail = $mod->find($id)['detail'];
		$this->assign('detail',$detail);
		$this->assign('id',$id);
		$this->display();
	}

	public function detail(){
		$mod = M('Good');
		$res = $mod->save([
			'id'=>I('post.id'),
			'detail'=>$_POST['editorValue']
		]);
		if($res){
			$this->_suc('编辑商品详情成功','/admin/good/index');
		}else{
			//删除已经上传到项目中的图片
			preg_match_All('/title="(.*?)"/',$_POST['editorValue'],$data);
			foreach($data[1] as $name_pic){
				if(file_exists('./public/ad/ueditor/uploads/'.$name_pic)){
					unlink('./public/ad/ueditor/uploads'.$name_pic);
				}
			}
			$this->_err('编辑商品详情失败','/admin/good/index');
		}
	}

}
?>