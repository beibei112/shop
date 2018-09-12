<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class OrderController extends Controller {
	public function index(){
		$mod = M('Order');
		$data = $mod->select();
		$this->assign('list',$data);

		$mod1 = M('Order_detail');
		$mod2 = M('Sku');
		$mod3 = M('Pic');
		foreach($data as $key=>$v){
			$data1 = $mod1->where('order_id='.$v['id'])->select();
			foreach($data1 as $val){
				//插入每个商品的单价和图片
				$price = $mod2->find($val['good_id'])['price'];

				$path = $mod3->where('sku_id='.$val['good_id'])->find()['path'];
				$temp=[
					'num'=>$val['num'],
					'price'=>$price,
					'path'=>$path
				];

				$data[$key]['good'][]=$temp;


			}
		}

		$this->assign('list',$data);
		$this->display();
	}

	public function changeStatus($id){
		$mod = M('Order');
		$res = $mod->save([
			'id'=>$id,
			'status'=>1
		]);

		if($res){
			echo 'ok';
		}else{
			echo 'no';
		}
	}
}