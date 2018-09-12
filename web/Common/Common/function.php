<?php 
/*
    邮件发送函数
*/
    function sendMail($to, $title, $content) {

        Vendor('PHPMailer.PHPMailerAutoload');     
        $mail = new PHPMailer(); //实例化
        $mail->IsSMTP(); // 启用SMTP
        $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
        $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
        $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
        $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
        $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
        $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
        $mail->AddAddress($to,"尊敬的客户");
        $mail->WordWrap = 50; //设置每行字符长度
        $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
        $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
        $mail->Subject =$title; //邮件主题
        $mail->Body = $content; //邮件内容
        $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
        return($mail->Send());
    }

/*
    判断管理员状态
*/
    function status($status){
        switch($status){
            case '0':
                return '未激活';
            break;
            case '1':
                return '激活';
            break;
        }
    }

/*
    判断商品状态
*/
    function goodStatus($status){
        switch($status){
            case '0':
                return '新上架';
            break;
            case '1':
                return '上架';
            break;
            case '2':
                return '下架';
            break;
        }
    }

/*
    生成随机字符串函数
*/
    function getRandChar($length=32){
        $str = null;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol)-1;

        for($i=0;$i<$length;$i++){
            $str .= $strPol[rand(0,$max)];
        }

        return $str;
    }

/*
    输出跳转提示信息
*/
    function success(){

        $ol = '';
        foreach($_SESSION['jump']['success'] as $v){

            $ol.="<ol>{$v}</ol>";

        }
        
        //清空session 中的提示
        unset($_SESSION['jump']['success']);
        return $ol;
    }

     function error(){
        $li = '';
        foreach($_SESSION['jump']['error'] as $v){

            $li .= "<li>{$v}</li>";

        }

        //清空session 中的提示
        unset($_SESSION['jump']['error']);
        return $li;
    }

/*
    角色判断
*/
    function group($groupid){
        $mod = M('Grouplist');
        // $mod->find($groupid)['group_name'];
        return $mod->find($groupid)['group_name'];
    }

/*
     根据分类的id查询费很累的标签
*/

    function taglist($cate_id){
        $mod = M('Cate_tag as ct');
        $data = $mod->join('tag as t on ct.tag_id=t.id')->where('ct.cate_id='.$cate_id)->select();
        if($data){
            $tag_str = '';

            foreach($data as $v){
                $tag_str.='/'.$v['tag_name'];
            }

            return $tag_str;
        }else{
            return '<span style="color:red">暂无属性</span>';

        }
    }

    function getCate_id(){
        $cate_id = $_SESSION['cate_id'];
        unset( $_SESSION['cate_id']);
        return $cate_id;
    }

/*
    前台根据cate_id获取分类名
*/
    function getCateNameById($cate_id){
    	return M('Cate')->find($cate_id)['cate'];
    }

    /*前台计算某一个商品的价格区间*/
    function getPrice($good_id){

    $mod = M('Sku');
    $data = $mod->field('price')->where('good_id='.$good_id)->order('price desc')->select();

    foreach($data as $v){
        $arr[]=$v['price'];
    }

    if(count($arr)==1){
        //只有一个sku
        return $arr[0];
    }

    return $arr[0].'~'.$arr[count($arr)-1];
    }

    function getCart(){
        echo '###########';
    }

    function getAddress($address_id){
        $mod = M('Address');
        $data = $mod->find($address_id);
        return '<span class="add">'.$data['sheng'].','.$data['shi'].','.$data['xian'].'</span> '.$data['jiedao'];
    }

    function getUser($user_id){
        $mod = M('User');
        return $mod->find($user_id)['username'];
    }

    function orderStatus($status){
    switch($status){
            case '0':
                return '新订单';
            break;
            case '1':
                return '已发货';
            break;
            case '2':
                return '已收货';
            break;
        }
    }
?>