<?php
namespace Home\Controller;
use Think\Controller;
class CateController extends Controller {

    public function getTags($id){
        // 分类获取属性 和属性值
        $mod = M('Cate');
        //分类名称分类
        $cate = $mod->find($id);
        $this->assign('cate',$cate);

        $mod = M('Cate_tag');

        $data = $mod->field('cate_tag.*,tag.tag_name')->join('tag on tag.id = cate_tag.tag_id')->where('cate_tag.cate_id='.$id)->select();

        $res = [];
        foreach($data as $tag){
            //根据tag_id去查询属性的值
            $mod = M('Tag_val');
            
            $data1 = $mod->field('val.val')->join('val on val.id = tag_val.val_id')->where('tag_val.tag_id='.$tag['tag_id'])->select();

            foreach($data1 as $v){

                $res[$tag['tag_name']][] = $v['val'];

            }
        }
        return $res;
    }
    /*
    * 展示所有商品
    */
    public function index($id){

        //获取分类的所有商品
        $data = $this->getAllGoodByCate($id);
        $this->assign('tag_list',$this->getTags($id));
        $this->assign('list',$data);
        $this->display();
    }
    public function getAllGoodByCate($id){
        $mod = M('Cate');
        $data = $mod->where('path like "%,'.$id.',%"')->select();

        $cates = [];
        foreach($data as $v){

            $cates[] = $v['id'];
        }


        if($cates){

            //查询的是一级二级分类
            $where['cate_id'] = array(
                'in',$cates
            );
        }else{
            $where = 'cate_id='.$id;

        }

        //查询分类商品
        $mod1 = M('Good');

        $data = $mod1 -> field('good.*,pic.path')->join('pic on pic.good_id=good.id') ->where($where)->group('pic.good_id') -> select();

        $mod2 = M('Sku');

        foreach($data as &$good){

            $data1 = $mod2->where('good_id='.$good['id'])->select();

            $temp = [];
            foreach($data1 as $sku){

                $temp[] = $sku['skuid'];
            }

            $good['sku'] = $temp;

        }
        return $data;
    }

    public function getGoodsByTag(){
        $tag_val=I('post.tag_val');
        $cate_id=I('post.cate_id');

        //获取该分类的所有商品属性
        $goods = $this->getAllGoodByCate($cate_id);

        foreach($goods as $key => $good){

            $flag = $this->check($good['sku'],$tag_val);
            $mod = M('Sku');

            if(count($flag)>0){

                unset($goods[$key]['sku']);

                foreach($flag as $skuid){

                    $res = $mod->field('sku.*,pic.path')->group('pic.sku_id')->join('pic on pic.sku_id=sku.id')->where('sku.good_id='.$good['id'].' and skuid="'.addslashes($skuid).'"')->find();
                    $goods[$key]['sku'][]=$res;

                }
            }else{
                //没有合格条件的sku从数组中删除整个商品数据。
                unset($goods[$key]);
            }
        }

        //返回ajax数据
        echo json_encode($goods);

    }
    public function check($sku,$str){
        foreach($sku as $key => $sku_str){

            $sku_arr = explode('\\',$sku_str);
            $sku_arr1 = explode('\\',$str);

            foreach($sku_arr1 as $tag){
                if(!in_array($tag,$sku_arr)){
                    //只要有一个属性不在数组里面就返回false
                    unset($sku[$key]);
                }
            }
        }
        //说明每个属性都在数组里面
        return $sku;
    }
}
?>
