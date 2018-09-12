<?php 
namespace Home\widget;
use Think\Controller;
class CateWidget extends Controller{
	public function menu(){
		//分配分类数据
		$data = R('Admin/Cate/getCates');

		// $cate = new CateController();
		// $data = $cate->getCates();

		$data1 = R('Home/Cart/data');

		$count=0;
		foreach($data1 as $v){
			$count+=$v['price']*$v['num'];
		}
		$this->assign('list',$data);
		$this->assign('list1',$data1);
		$this->assign('cart_num',count($data1));
		$this->assign('count',$count);

		$this->display('cate:cate');
	}
}
?>