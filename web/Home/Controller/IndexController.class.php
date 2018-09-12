<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $mod = M('Cate');
        $mod1 = M('Picc');

        $cate_dingji = $mod->where('pid=0')->select();
        foreach($cate_dingji as $v){
            //给一个顶级分类 然后查询这个分类下的4个商品
            $data[$v['id']] = $this->getGoodsByCateId($v['id']);;
        }

        $data1 = $mod1->select();

        $this->assign('list',$data);
        $this->assign('list1',$data1);
		$this->display();
    }

    public function getGoodsByCateId($cate_id){
    	$mod = M('Good');
        $mod1 = M('Cate');

        $data1 = $mod1->where('path like "%,'.$cate_id.',%"')->select();
        $arr_cate=[];
        foreach($data1 as $v){
            $arr_cate[]=$v['id'];
        }
        $where['cate_id'] = array(
            'in',$arr_cate
        );
        $data = $mod->field('good.*,pic.path')->join('pic on pic.good_id=good.id')->where($where)->group('pic.good_id')->order('clicknum desc')->select();
        return $data;
     //    //每一个分类按照点击量大小随机获取四哥商品
    	// $data = $mod->field('good.*,pic.path')->join('pic on pic.good_id=good.id')->where($where)->group('pic.good')->order()->limit('0,4')->select();
     //    echo $mod->getLastSql();
     //    return $data;
    }
}