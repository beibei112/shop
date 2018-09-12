<?php
namespace Admin\Controller;
use Think\Controller;
class EmailController extends Controller {
    public static function send($to,$title = '激活邮件',$id,$token,$content){


        if(sendMail($to,$title,$content)){
        	return true;
        }else{
        	return false;
        }
    }
    public function jihuo($id,$token){
    	$mod = M('Adminuser');

    	$_id = $mod->where('token="'.$token.'"')->find()['id'];
    	if($_id==$id){
    		if($mod->where('id='.$id)->save(['status'=>1])){
                $this->display();
            }
    	}else{
    		// echo '非法操作，不能完成激活';
            echo '激活失败';
    	}
    }

    public function node(){

    }
}
?>