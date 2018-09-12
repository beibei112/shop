<?php 
namespace Admin\Model;
use Think\Model;

class AdminuserModel extends Model{

	/*
		执行表结构
	*/
	protected $fields=array(
		'id',
		'name',
		'email',
		'pass',
		'pic',
		'token',
		'last_login',
		'ip',
		'status',
		'groupid',
		'_pk'=>'id'
	);

	//自动验证 email 满足格式
	protected $_validate = array(

		//array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),	
		array('email','require','账号必须填写'),
		array('email','email','邮箱格式不正确',1,'',3),
	);

	/*
		结束(End)
	*/

		//自动填充 token 随机 status自动激活
		protected $_auto = array ( 

			//array(完成字段1,完成规则,[完成条件,附加规则]),
			array('token','getRandChar',1,'callback'),
			array('status','status',1,'callback'),
			array('groupid','group',1,'callback'),
		);

	/*
		结束(End)
	*/

	/*
		状态
	*/
		public function status(){
			return 0;//未激活
		}

	/*
		结束(End)
	*/

	/*
		默认状态是超级管理员还是别的
	*/
		public function group(){
			return 4;
		}

	/*
		结束(End)
	*/

	/*
		随机字符
	*/
	public function getRandChar($length=32){
        $str = null;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol)-1;

        for($i=0;$i<$length;$i++){
            $str .= $strPol[rand(0,$max)];
        }

        return $str;
    }

    /*
    	结束(End)
    */
}
