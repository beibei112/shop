<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
class TestController extends CommonController {
    public function index(){
        //事务提交和回滚机制
        //1.开启事务
        M()->startTrans();

        //2.发送关联sql
        $mod = M('Test');
        $res = $mod->add(['name'=>'zhangsan']);
        //3.根据sql执行判断commit or roleball

        if($res){
            M()->commit();
        }else{
            M()->rollback();
        }

    }

}