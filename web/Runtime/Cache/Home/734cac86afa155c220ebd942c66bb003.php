<?php if (!defined('THINK_PATH')) exit();?>

	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录界面</title>
<link rel="stylesheet" type="text/css" href="/Public/ho/login/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/ho/login/css/style.css" />
<script src="/Public/ho/login/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('#login').click(function() {
		var name_state = $('#name');
		var psd_state = $('#psd');
		var name = $('#name').val();
		var psd = $('#psd').val();
		if (name == '') {
			name_state.parent().next().next().css("display", "block");
			return false;
		} else if (psd == '') {
			name_state.parent().next().next().css("display", "none");
			psd_state.parent().next().next().css("display", "block");
			return false;
		} else {
			name_state.parent().next().next().css("display", "none");
			psd_state.parent().next().next().css("display", "none");
			$('.login').submit();
		}
	});
	$('#register').click(function() {
		var name_r_state = $('#name_r');
		var psd_r_state = $('#psd_r');
		var affirm_psd_state = $('#affirm_psd');
		var name_r = $('#name_r').val();
		var psd_r = $('#psd_r').val();
		var affirm_psd = $('#affirm_psd').val();
		if (name_r == '') {
			name_r_state.parent().next().next().css("display", "block");
			return false;
		} else if (psd_r == '') {
			psd_r_state.parent().next().next().css("display", "block");
			return false;
		} else if (affirm_psd == '') {
			affirm_psd_state.parent().next().next().css("display", "block");
			return false;
		} else if (psd_r != affirm_psd) {
			return false;
		} else {
			$('.register').submit();
		}
	})
})
function ok_or_errorBylogin(l) {
	var content = $(l).val();
	if (content != "") {
		$(l).parent().next().next().css("display", "none");
	}
}
function ok_or_errorByRegister(r) {
	var affirm_psd = $("#affirm_psd");
	var psd_r = $("#psd_r");
	var affirm_psd_v = $("#affirm_psd").val();
	var psd_r_v = $("#psd_r").val();
	var content = $(r).val();
	if (content == "") {
		$(r).parent().next().next().css("display", "block");
		return false;
	} else {
		$(r).parent().next().css("display", "block");
		$(r).parent().next().next().css("display", "none");
		if (psd_r_v == "") {
			$(psd_r).parent().next().css("display", "none");
			$(psd_r).parent().next().next().css("display", "none");
			$(psd_r).parent().next().next().css("display", "block");
			return false;
		}
		if (affirm_psd_v == "") {
			$(affirm_psd_v).parent().next().css("display", "none");
			$(affirm_psd_v).parent().next().next().css("display", "none");
			$(affirm_psd_v).parent().next().next().css("display", "block");
			return false;
		}
		if (psd_r_v == affirm_psd_v) {
			$(affirm_psd).parent().next().css("display", "none");
			$(affirm_psd).parent().next().next().css("display", "none");
			$(psd_r).parent().next().css("display", "none");
			$(psd_r).parent().next().next().css("display", "none");
			$(affirm_psd).parent().next().css("display", "block");
			$(psd_r).parent().next().css("display", "block");
		} else {
			$(affirm_psd).parent().next().css("display", "none");
			$(affirm_psd).parent().next().next().css("display", "none");
			$(psd_r).parent().next().css("display", "none");
			$(psd_r).parent().next().next().css("display", "none");
			$(psd_r).parent().next().css("display", "block");
			$(affirm_psd).parent().next().next().css("display", "block");
			return false;
		}
	}
}
function barter_btn(bb) {
	$(bb).parent().parent().fadeOut(1000);
	$(bb).parent().parent().siblings().fadeIn(2000);
}
</script>
</head>
<body class="login_body">
<div class="login_div">
	<div class="col-xs-12 login_title">登录</div>
	<form action="/index.php/Home/Login/up" class="login" method="post">
		<div class="nav">
			<div class="nav login_nav">
				<div class="col-xs-4 login_username">
					用户名:
				</div>
				<div class="col-xs-6 login_usernameInput">
					<input type="text" name="username" id="name" value="" placeholder="&nbsp;&nbsp;用户名/手机号"  onblur="javascript:ok_or_errorBylogin(this)" />
				</div>
				<div class="col-xs-1 ok_gou">
					√
				</div>
				<div class="col-xs-1 error_cuo">
					×
				</div>
			</div>
			<div class="nav login_psdNav">
				<div class="col-xs-4">
					密&nbsp;&nbsp;&nbsp;码:
				</div>
				<div class="col-xs-6">
					<input type="password" name="password" id="psd" value="" placeholder="&nbsp;&nbsp;密码" onBlur="javascript:ok_or_errorBylogin(this)" />
				</div>
				<div class="col-xs-1 ok_gou">
					√
				</div>
				<div class="col-xs-1 error_cuo">
					×
				</div>
			</div>
			<div class="col-xs-12 login_btn_div">
				<input type="submit" class="sub_btn" value="登录" id="login" />
			</div>
		</div>
	</form>
	<div class="col-xs-12 barter_btnDiv">
		<button class="barter_btn" onClick="javascript:barter_btn(this)">没有账号?前往注册</button>
	</div>
</div>
<div class="register_body">
	<div class="col-xs-12 register_title">注册</div>
	<form action="/index.php/Home/Login/insert" class="register" method="post">
		<div class="nav">
			<div class="nav register_nav" style="position:relative;bottom:45px">
				<div class="col-xs-4">
					用户名:
				</div>
				<div class="col-xs-6">
					<input type="text" name="username" id="name_r" value="" placeholder="&nbsp;&nbsp;用户名 " onBlur="javascript:ok_or_errorByRegister(this)" />
				</div>
				<div class="col-xs-1 ok_gou">
					√
				</div>
				<div class="col-xs-1 error_cuo">
					×
				</div>
			</div>
			<div class="nav register_psdnav" style="position:relative;bottom:65px">
				<div class="col-xs-4">
					密&nbsp;&nbsp;&nbsp;码:
				</div>
				<div class="col-xs-6">
					<input type="password" name="password" id="psd_r" value="" placeholder="&nbsp;&nbsp;密码" onBlur="javascript:ok_or_errorByRegister(this)" />
				</div>
				<div class="col-xs-1 ok_gou">
					√
				</div>
				<div class="col-xs-1 error_cuo">
					×
				</div>
			</div>
			<div class="nav register_affirm" style="position:relative;bottom:85px">
				<div class="col-xs-4">
					确认密码:
				</div>
				<div class="col-xs-6">
					<input type="password" name="" id="affirm_psd" value="" placeholder="&nbsp;&nbsp;确认密码" onBlur="javascript:ok_or_errorByRegister(this)" />
				</div>
				<div class="col-xs-1 ok_gou">
					√
				</div>
				<div class="col-xs-1 error_cuo">
					×
				</div>
			</div>
			<div class="nav register_affirm" style="position:relative;bottom:105px">
				<div class="col-xs-4">
					电&nbsp;&nbsp;&nbsp;话:
				</div>
				<div class="col-xs-6">
						<input type="text" name="phone" id="name_r" value="" placeholder="&nbsp;&nbsp;请输入有效的11位手机号码" onBlur="javascript:ok_or_errorByRegister(this)" />
						<input type="button" id="code" class="btn btn-info" style="margin-top:5px" value="获取验证码" />
				</div>
				<div class="col-xs-1 ok_gou">
					√
				</div>
				<div class="col-xs-1 error_cuo">
					×
				</div>
			</div>
			<div class="nav register_affirm" style="position:relative;bottom:90px">
				<div class="col-xs-4">
					验证码:
				</div>
				<div class="col-xs-6">
					<input type="text" name="param" id="name_r" value="" placeholder="&nbsp;&nbsp;请输入有效的验证码" onBlur="javascript:ok_or_errorByRegister(this)" />
				</div>
				<div class="col-xs-1 ok_gou">
					√
				</div>
				<div class="col-xs-1 error_cuo">
					×
				</div>
			</div>
			<div class="register_affirm" style="position:relative;bottom:123px">
				<div class="col-xs-4" style="margin-top:15px">
					邮&nbsp;&nbsp;&nbsp;箱:
				</div>
				<div class="col-xs-6" style="margin-top:15px;">
					<input type="email" name="email" id="name_r" value="" placeholder="&nbsp;&nbsp;请输入正确的邮箱格式" onBlur="javascript:ok_or_errorByRegister(this)" />
				</div>
				<div class="col-xs-1 ok_gou">
					√
				</div>
				<div class="col-xs-1 error_cuo">
					×
				</div>
			</div>
			<div class="col-xs-12 register_btn_div">
				<input type="submit" class="sub_btn" value="注册" id="register" style="position:absolute;right:120px;bottom:109px;"/>
			</div>
		</div>
	</form>
	<div class="col-xs-12 barter_register">
		<button class="barter_registerBtn" onClick="javascript:barter_btn(this)" style="">已有秘籍?返回登录</button>
	</div>
</div>
</body>
</html>




	<script type="text/javascript">
		$('#code').click(function(){
			var phone = $(this).siblings().val();
			$.ajax({

				url:'/index.php/Home/Login/send',

				type:'post',

				data:{phone:phone},

				success:function(mes){

					// console.log(mes);

					if(mes!='短信发送失败'){
						// console.log(mes);
						$('#code').val('短信发送成功');

						$('.code').blur(function(){

							if(mes==$('.code').val()){

							}else{
								alert('验证码不正确');
							}

						});
					}
				}
			});
		});


	</script>