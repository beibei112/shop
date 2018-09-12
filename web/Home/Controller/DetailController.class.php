<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends Controller {

    public function show($id){
        $mod = M('Good');
        $mod1 = M('Pic');
        $mod2 = M('Sku');
        $mod3 = M('Cate');
        $data = $mod->find($id);
        $type = $mod3->field('cate.*,good.cate_id')->join('good on good.cate_id=cate.id')->where('good.id='.$id)->select()[0];
        $type1 = $mod3->where('id='.$type['pid'])->select();
        $type2 = $mod3->where('id='.$type['pid'])->select()[0];
        $type3 = $mod3->where('id='.$type2['pid'])->select();

        //查询这个商品第一个sku的信息
        $res = $mod2->where('good_id='.$data['id'])->find();
        $data['price'] = $res['price'];
        $data['num'] = $res['num'];
        $data['skuid'] = $res['id'];
        //根据第一个sku查询这个sku的所有图片
        $pic_data = $mod1->field('path')->where('sku_id='.$res['id'])->select();
        $good_detail = $mod->where('id='.$id)->select();
        $res1 = [];
        foreach($pic_data as $pic){
            $res1[] = $pic['path'];
        }
        $data['pic'] = $res1;

        //查询商品的标签和属性
        $con = new CateController();
        $data1 = $con->getTags($data['cate_id']);
        //查询该商品的所有tag的val
        $data2 = $mod2->where('good_id='.$data['id'])->select();
        $tags = [];
        $vals = [];
        foreach($data2 as $val){
            foreach(explode('\\',$val['skuid']) as $val1){
                if(!in_array($val1,$tags)){
                    $tags[]= $val1;
                }
            };
            $vals[] = $val['skuid'];
        }
        unset($tags[0]);
        $this->assign('sku_lists',json_encode($vals));
        $this->assign('val_lists',json_encode($tags));
        $this->assign('detail',$good_detail);
        $this->assign('good',$data);
        $this->assign('tags',$data1);
        $this->assign('type',$type1);
        $this->assign('types',$type3);

        /*
        * 根据good表的id 查询这类商品不同sku的评论
        */
        $good_sku = $mod2->where('good_id='.$id)->select();

        $skuid_arr = [];
        foreach($good_sku as $v){
            $skuid_arr[] = $v['id'];
        }

        $m1 = M('Pinglun');
        $m2 = M('Salepic');
        $where['sku_id'] = array(
            'in',
            $skuid_arr

        );

        $data6 = $m1->field('pinglun.*,user.username,user.touxiang')->join('user on user.id=pinglun.user_id')->where($where)->select();
        foreach($data6 as $key=>$v){
            $d2 = $m2->where('pinglun_id='.$v['id'])->select();
            $temp = [];
            foreach($d2 as $val){
                $temp[] = $val['path'];
            }
            $data6[$key]['salepic'] = $temp;
        }
        $this->assign('pinglun_list',$data6);
        $xg = $mod->field('good.id,good.name,pic.path,sku.*')->join('sku on sku.good_id!='.$id)->join('pic on pic.sku_id = sku.id')->where('good.id = sku.good_id')->group('sku.good_id')->select();
        // echo $mod->getLastSql();exit;
        $this->assign('xg',$xg);
        $this->display();
    }

    /*
    * 根据ajax请求不同的sku响应数据
    */
    public function getSku(){

        $mod1 = M('Pic');
        $mod = M('Sku');
        $data = $mod->where('good_id='.I('post.good_id'))->select();

        foreach($data as $sku){
            $res = $this->test(explode('\\',I('post.skuid')),explode('\\',$sku['skuid']));
            if($res){
                $pic = $mod1->where('pic.sku_id='.$sku['id'])->select();
                foreach($pic as $v){
                    $sku['pic'][] = $v['path'];

                }
                echo json_encode($sku);
                exit;
            }
        }
        echo 'no';
    }

    public function test($arr1,$arr2){
        if(count($arr1)==count($arr2)){
            foreach($arr1 as $v){
                if(!in_array($v,$arr2)){
                    return false;
                }
            }

            return true;
        }else{

            return false;
        }

    }

    /*
    * 判断是否登录 评论
    */
    public function check($id){

        $userid = $_SESSION['home']['homeuser']['id'];
        $mod4 = M('Order');
        $mod5 = M('Order_detail');
        $data4 = $mod4->where('user_id='.$userid)->select();
        foreach($data4 as $v){
            $data5 = $mod5->where('order_id='.$v['id'])->select();
            foreach($data5 as $val){
                if($val['good_id'] ==$id){
                    echo 'yes';exit;
                }

            }

        }

        echo 'no';

    }

}

?>