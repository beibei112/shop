<?php 
namespace Home\widget;
use Think\Controller;
class NavWidget extends Controller{
	public function menu(){
		//分配分类数据
		$data = R('Admin/Cate/getCates');
		// $cate = new CateController();
		// $data = $cate->getCates();
		dump($data);

		$this->display('Nav:menu');
	}
}
?>