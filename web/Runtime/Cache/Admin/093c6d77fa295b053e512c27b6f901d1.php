<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="/Public/ad/login/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="/Public/ad/login/css/demo.css" />
	<!--必要样式-->
	<link rel="stylesheet" type="text/css" href="/Public/ad/login/css/component.css" />
	<!--[if IE]>
	<script src="js/html5.js"></script>
	<![endif]-->
	</head>
	<body>
		<div class="container demo-1">
			<div class="content">
				<div id="large-header" class="large-header">
					<canvas id="demo-canvas"></canvas>
					<div class="logo_box">
						<h3>Wel come to Manhua Web</h3>
						<form action="/index.php/Admin/Login/checklogin" name="f" method="post">
							<div class="input_outer">
								<span class="u_user"></span>
								<input name="email" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入邮箱">
							</div>
							<div class="input_outer">
								<span class="us_uer"></span>
								<input name="pass" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
							</div>
							<div class="mb2"><input type='submit' value='Login' class="act-but submit" style="color: #FFFFFF;border:0px;width:330px" ></div>
						</form>

						<div id='err' class="input_outer" style="display:none;" />
							<div id='info' class="text" style="color: red !important; position:absolute; z-index:100;">test</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /container -->
	</body>
</html>
<script src="/Public/ad/login/js/TweenLite.min.js"></script>
<script src="/Public/ad/login/js/EasePack.min.js"></script>
<script src="/Public/ad/login/js/rAF.js"></script>
<script src="/Public/ad/login/js/demo-1.js"></script>

<script type="text/javascript">
	var div = document.getElementById('err');
	var div1 = document.getElementById('info');
	var flag = '<?php echo ($flag); ?>';
	if(flag!=''){
		div.style.display='block';
		info.innerHTML = 'error:'+flag;
	}

	div.onclick=function(){
		this.style.display='none';
	}
	//如果有错误就显示

</script>