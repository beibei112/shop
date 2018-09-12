<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
    	$this->display();
    }

    public function insert(){
        // dump($_POST['param']);dump($this->code());exit;
    	// dump($_POST);dump($this->code());exit;
    	$mod = M('User');

        if($_POST==0){
            
            $this->redirect('home/login/login');

        }else{

            $mod1 = M('User');

            // $data1 = $mod1->where('username='.I('post.username'))->select();

            // dump($data1);exit;


            $data = [];

            $data['username'] = I('post.username');

            $data['password'] = I('post.password');

            $data['email'] = I('post.email');

            $data['phone'] = I('post.phone');

            $data['token'] = 0;

            $data['status'] = 1;

            $user_id = $mod->add($data);

            $this->redirect('/home/index/index');

        }

    }

    public function up(){

    	$mod = M('User');

    	$data = $mod->where('username = "'.I('post.username').'" ')->find();

    	if($data){
    		if($data['status']==1){
    			if($data['password']==I('post.password')){

    				$_SESSION['home']['homeuser'] = $data;

    			}else{
    				$this->redirect('/home/login/login');
    			}
    		}else{
    			$this->redirect('/home/login/login');
    		}
    	}else{
    		$this->redirect('/home/login/login');
    	}

    	$this->redirect('/home/index/index');
    }

    public function zhuxiao(){
        unset($_SESSION['home']);

        $this->redirect('/home/index/index');
    }

    public function send($phone){
        // dump($phone);
        //载入ucpass类
        // require_once('lib/Ucpaas.class.php');
        import('Vendor.PhpDemo.lib.Ucpaas'); 

        //初始化必填
        $options['accountsid']='bc9892e8be9c12fd5d0e5f6b87df2f6b';
        $options['token']='a2ba713386139ea99a77ed93733f8590';


        //初始化 $options必填
        $ucpass = new \Ucpaas($options);

        //开发者账号信息查询默认为json或xml
        header("Content-Type:text/html;charset=utf-8");

        //短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
        $appId = "93d6445c718243eebbee2e60eb7ee43f";
        $to = $phone;
        $templateId = "239046";
        $param=$this->code();

        if($ucpass->templateSMS($appId,$to,$templateId,$param)){
            echo '短信发送成功';
        }else{
            echo '短信发送失败';
        }

    }

  /*
        随机4位验证码
    */
    function code( $length = 3 ) 
    { 
        // 密码字符集，可任意添加你需要的字符 
        $chars = array(22,95,36,84,46,58,69,70); 
          
        // 在 $chars 中随机取 $length 个数组元素键名 
        $keys = array_rand($chars,$length); 

        $param = ''; 

        for($i = 0; $i < $length; $i++){ 
            // 将 $length 个数组元素连接成字符串 
            $param .= $chars[$keys[$i]]; 
        } 

        return $param; 
    }

}
?>