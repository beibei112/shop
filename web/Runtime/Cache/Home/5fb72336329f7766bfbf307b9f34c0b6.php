<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录界面</title>
<link rel="stylesheet" type="text/css" href="/ThinkPhp/Public/ho/login/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/ThinkPhp/Public/ho/login/css/style.css" />
<script src="/ThinkPhp/Public/ho/login/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript">

$(function() {

	$('#name_r').blur(function(){
		var name_r_state = $('#name_r');
		var name_r = $('#name_r').val();
		var password = <?php echo ($_SESSION['home']['homeuser']['password']); ?>;
		if(name_r != password){
			name_r_state.parent().next().css("display", "none");
			name_r_state.parent().next().next().css("display", "block");
		}else{
			name_r_state.parent().next().next().css("display", "none");
			name_r_state.parent().next().css("display", "block");
		}
	});

	$('#psd_r').blur(function(){
		var psd_r_state = $('#psd_r');
		var psd_r = $('#psd_r').val();


		if(psd_r == ''){
			psd_r_state.parent().next().next().css("display", "block");
			psd_r_state.parent().next().css("display", "none");
		}else{
			psd_r_state.parent().next().css("display", "block");
			psd_r_state.parent().next().next().css("display", "none");
		}

	});



	$('#affirm_psd').blur(function(){
		var affirm_psd_r_state = $('#affirm_psd');
		var psd_r = $('#psd_r').val();
		var affirm_psd_r = $('#affirm_psd').val();
		// console.log(affirm_psd_r);

		if(affirm_psd_r != psd_r){
			affirm_psd_r_state.parent().next().next().css("display", "block");
			affirm_psd_r_state.parent().next().css("display", "none");
		}else{
			affirm_psd_r_state.parent().next().css("display", "block");
			affirm_psd_r_state.parent().next().next().css("display", "none");
		}

	});


	$('#login').click(function() {
		var password = <?php echo ($_SESSION['home']['homeuser']['password']); ?>;
		var name_state = $('#name');
		var psd_state = $('#psd');
		var name = $('#name').val();
		var psd = $('#psd').val();
		var psd_r_state = $('#psd_r');
		var affirm_psd_state = $('#affirm_psd');
		var psd_r = $('#psd_r').val();
		var affirm_psd = $('#affirm_psd').val();

		var name_r_state = $('#name_r');
		var psd_r_state = $('#psd_r');
		var affirm_psd_state = $('#affirm_psd');
		var name_r = $('#name_r').val();
		var psd_r = $('#psd_r').val();
		var affirm_psd = $('#affirm_psd').val();

		if(name_r != password){
			name_r_state.parent().next().next().css("display", "block");
			return false;
		}

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
			$('.login').submit();
		}


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
		var phone_r = $('.phone').val();
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
		} else if(phone_r == ''){
			return false;
		} else{
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
	<div class="col-xs-12 login_title">修改密码</div>
	<form action="/ThinkPhp/index.php/Home/User/mima" class="login" method="post">
		<input type="hidden" name="id" value="<?php echo ($_SESSION['home']['homeuser']['id']); ?>" />
		<div class="nav">
			<div class="nav login_nav">
				<div class="col-xs-4 login_username">
					原密码:
				</div>
				<div class="col-xs-6 login_usernameInput">

					<input type="password" name="password" id="name_r" value="" placeholder="&nbsp;&nbsp;请输入原密码"  onblur="javascript:ok_or_errorBylogin(this)" />

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
					新密码:
				</div>
				<div class="col-xs-6">
					<input type="password" name="newpass" id="psd_r" value="" placeholder="&nbsp;&nbsp;请输入新密码" onBlur="javascript:ok_or_errorBylogin(this)" />
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
					确认新密码:
				</div>
				<div class="col-xs-6">
					<input type="password" name="repass" id="affirm_psd" value="" placeholder="&nbsp;&nbsp;请确认新密码" onBlur="javascript:ok_or_errorBylogin(this)" />
				</div>
				<div class="col-xs-1 ok_gou">
					√
				</div>
				<div class="col-xs-1 error_cuo">
					×
				</div>
			</div>
			<div class="col-xs-12 login_btn_div">
				<input type="submit" class="sub_btn" value="确定修改" id="login" />
			</div>
		</div>
	</form>

</div>
</body>
</html>