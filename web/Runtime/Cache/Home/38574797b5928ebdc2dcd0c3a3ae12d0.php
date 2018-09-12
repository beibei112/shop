<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Home</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">


<!-- Place favicon.ico in the root directory -->
<!-- all css here -->
<!-- bootstrap.min.css -->
<link rel="stylesheet" href="/Public/ho/user/css/bootstrap.min.css">
<!-- font-awesome.min.css -->
<link rel="stylesheet" href="/Public/ho/user/css/font-awesome.min.css">
<!-- owl.carousel.css -->
<link rel="stylesheet" href="/Public/ho/user/css/owl.carousel.css">
<!-- owl.carousel.css -->
<link rel="stylesheet" href="/Public/ho/user/css/meanmenu.min.css">
<!-- shortcode/shortcodes.css -->
<link rel="stylesheet" href="/Public/ho/user/css/shortcode/shortcodes.css">
<!-- nivo-slider.css -->
<link rel="stylesheet" href="/Public/ho/user/css/nivo-slider.css">
<!-- style.css -->
<link rel="stylesheet" href="/Public/ho/user/style.css">
<!-- responsive.css -->
<link rel="stylesheet" href="/Public/ho/user/css/responsive.css">
<script src="/Public/ho/user/js/vendor/modernizr-2.8.3.min.js"></script>
<script src="/Public/ho/user/js/vendor/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="/Public/sel/area.js"></script>
<script type="text/javascript" src="/Public/sel/location.js"></script>

<style type="text/css">
	th,td{
		text-align:center;
	}
	label{
		text-align:center !important;
	}
	h3{
		margin:0px;
	}
	.selectInput{
		padding-right:0px;
		padding-left:15px;
		margin-top:3px;
	}

	.shop{
		background-color:#E6E6FA !important;
		margin-top:2px !important;
	}
</style>
		
</head>
<body>
	<header>
		
		<!-- 页面头部 开始-->
		<div class="header-bottom-area bg-color-1 ptb-25">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="logo">
							<a href="/index.php/Home/index.html"><img src="/Public/ho/user/img/login-default.png" alt=""></a>
						</div>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
						<div class="header-bottom-middle">
							<div class="top-search">
								<span class="tex_top_skype"><i class="fa fa-skype"></i>欢迎: <span class=""><?php echo ($user['username']); ?></span></span>
								<span class="tex_top_email"><i class="fa fa-envelope"></i>邮箱:<?php echo ($user['email']); ?><span class=""></span></span>

								<a href='/index.php/Home/user/xiugai'><span class="tex_top_email"><i class="fa fa-envelope"></i>修改密码<span class=""></span></span></a>
							</div>				
						</div>
						<div class="header-bottom-right">
							
							<div class="shop-cart-area">
								<div class="top-cart-wrapper">
									<div class="block-cart">
										<div class="top-cart-title" id='cart' >
											<a href="#">
												<span class="title-cart">我的购物车</span>
												<span class="count-item">共：1个</span>
												<br>
												<span class="price">总价：8399$</span>
											</a>
										</div>
										<div class="top-cart-content">
											<ol class="mini-products-list" id='everyCart' >
												<!-- single item -->
												<!-- single item -->
												<!-- single item -->
												<!-- single item -->

											</ol>
											<div class="top-subtotal">
												总价钱: <span class="sig-price" id='priceTotal' ></span>
											</div>
											<div class="cart-actions">
												<button><span>结算</span></button>
											</div>
										</div>											
									</div>
								</div>
							</div>
						</div>							
					</div>
				</div>
			</div>
		</div>	
		<!-- 页面头部 结束-->
	</header>

	<br>
	<div class="container" >
		<div class="row">
			<!--头像显示 开始-->
			<div class="col-md-4">
			<form action="">
				<input type="file" style='display:none;' name="userPic" id='file'>
				<img id='userPic' alt="" id='userPic' style='height:360px !important;' class="img-responsive" src="<?php echo ((isset($user['touxiang']) && ($user['touxiang'] !== ""))?($user['touxiang']):'/ThinkPhp/Public/Upload/aaa.jpg'); ?>">
			</form>

			<!--ajax上传头像 开始-->
			<script type="text/javascript">
				$('#userPic').click(function(){
					//让文件上传的input触发点击
					$('#file').trigger('click');
				});

				$('#file').change(function(){
					
					//获取传输文件元素选中的图片
					// var file = ducument.querySelect('#file');
					var file = document.getElementById('file');

					//创建一个formdata对象，用来存储表单数据，表单数据是以键值对儿的形式存储的 
					var formdata =  new FormData();
					formdata.append('pic',file.files[0]);
					formdata.append('userid',<?php echo ($_SESSION['home']['homeuser']['id']); ?>);

					$.ajax({
						url:'/index.php/Home/User/changePic',
						data:formdata,//图片资源
						type:'post',

						//设置请求头格式为null
						contentType:false,	
						//设置数据格式为null
						processData:false,

						success:function(mes){
							//替换头像
							$('#userPic').attr('src',mes);
							// $('#aaa').html(mes);
						}
					});

				});
			</script>
			<!--ajax上传头像 结束-->

			</div>
			<!--头像显示 结束-->
			<div id='aaa'></div>
			<div class="col-md-8">

				<h2 class="shorter">Hello ! <strong><?php echo ($user['username']); ?></strong></h2>

				<p>上次登录时间：2017年12月4日</p>

				<p>
					一个真正强大的人，不会把太多心思花在取悦和亲附别人上面。所谓圈子、资源，都只是衍生品。最重要的是提高自己的内功。只有自己修炼好了，才会有别人来亲附。自己是梧桐，凤凰才会来栖；自己是大海，百川才来汇聚，花香自有蝶飞来。你只有到了那个层次，才会有相应的圈子，而不是倒过来。
				</p>
				<p>
					没有人陪你走一辈子，所以你要乐在其中；没有人会帮你一辈子，所以你要建立强大的自我
				</p>
				<p>
					一个人总在仰望和羡慕着别人的幸福，一回头，却发现自己正被别人仰望和羡慕着。其实，每个人都是幸福的。只是，你的幸福，常常在别人眼里。幸福这座山，原本就没有顶、没有头。你要学会走走停停，看看山岚、赏赏虹霓、吹吹清风，心灵在放松中得到生活的满足。 1.微笑和赞赏有移山的力量。
				</p>
				
				<ul class="list icons list-unstyled">
					<li>狗蛋币：100000$</li>
					<li>积分点：100分 (1分/100$)</li>
					
				</ul>

			</div>
		</div>

		<br>
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>个人信息</h3>
				</div>
				<div class="panel-body">
					<form  action='' class="row form-horizontal"  style='padding-left:0px;padding-right:0px;' >
						<div class='col-md-5' >
							<div class='form-group' >
								<label class='control-label col-md-2' for="nickname">姓名：</label>
								<div class="col-md-10">

									<input class='form-control userinfo'  value='<?php echo ($user['username']); ?>' name='username' type="text">
								</div>
							</div>
							<div class='form-group' >
								<label class='control-label col-md-2' for="nickname">邮箱：</label>
								<div class="col-md-10">
									<input class='form-control userinfo'  value='<?php echo ($user['email']); ?>' name='email' type="text">
								</div>
							</div>
							
						</div>
						<div class='col-md-5' >
							<div class='form-group' >
								<label class='control-label col-md-2' for="nickname">电话：</label>
								<div class="col-md-10">
									<input class='form-control userinfo'  value='<?php echo ($user['phone']); ?>' name='phone' type="text">
								</div>
							</div>
							<div class='form-group' >
								<label class='control-label col-md-2' for="nickname">生日:</label>
								<div class="col-md-10">
									<input class='form-control userinfo' value='<?php echo ($user['day']); ?>'  name='day' type="text" >
								</div>
							</div>
							
						</div>
						<div class='col-md-12' >
							<!-- pull-right 浮动类 -->
							<button  type='submit' class='btn btn-primary btn-sm pull-right' >修改信息</button>
						</div>

					</form>
				</div>

			<!--修改个人信息 开始-->
				<script type="text/javascript">
					$('.userinfo').blur(function(){
						//获取修改以后的值
						var value = $(this).val();
						//获取修改的name
						var name = $(this).attr('name');	

						$.ajax({
							url:'/index.php/Home/User/update',
							data:{name:name,value:value},
							type:'post',
							success:function(mes){
								
							}
						})	
					});	

				</script>
			<!--修改个人信息 结束-->	
			
			</div>
			<div class="panel panel-default" >
				<div class="panel-heading">
					<h3>订单管理</h3>
				</div>

				<div class="panel-body">
					<div class="table-responsive">
					
					  <table class="table table-hover table-striped">
					  	<thead>
					  		<tr>
								<th>订单</th>
								<th>订单日期</th>
								<th>订单地址</th>
								<th>订单状态</th>
								<th>订单编号</th>
								<th>操作</th>
							</tr>
					  	</thead>
					  	<tbody>
					  	<?php echo dump($order_num);?>
					  	<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr class='g<?php echo ($vo['id']); ?>'>
								<td><?php echo ($vo['id']); ?></td>
								<td>2017/11/27</td>
								<td class='sx'><?php echo ($vo['address']); ?></td>
								<td><?php echo orderStatus($vo['status']);?></td>
								<td><?php echo ($vo['order_num']); ?></td>
								<td>
									<button class="btn btn-danger queren"  <?php if($vo["status"] != 1): ?>disabled<?php endif; ?>>确认收货</button>
									
								</td>
							</tr>
							<?php if(is_array($vo["goods"])): foreach($vo["goods"] as $key=>$voo): ?><tr class='shop good<?php echo ($vo['id']); ?>' >	
								<td><?php echo ($voo['cate']); ?></td>
								<td><a href='/index.php/Home/detail/show/id/<?php echo ($vo['id']); ?>'><img src="<?php echo ($voo['path']); ?>" width='40px' alt=""></a></td>
								<td><?php echo ($voo['name']); ?></td>
								<td><?php echo ($voo['skuid']); ?></td>
								<td></td>
								<td><?php echo ($voo['price']); ?>$ <span>
									<?php if($vo["status"] == 1): ?>待收货
									<?php elseif($vo["status"] == 2): ?>
										已收货
									<?php else: ?>
										未发货<?php endif; ?>	
								</span></td>
								
							</tr><?php endforeach; endif; endforeach; endif; ?>
					  	</tbody>
					  </table>
					</div>
					
				</div>		
			</div>

			<!--确认收货ajax 开始-->
			<script type="text/javascript">
			$('.queren').click(function(){
				var bt = $(this); 
				var id =$(this).parents('tr').find('td:eq(0)').html();
				$.ajax({
					url:'/index.php/Home/User/changeStatus',
					data:{id:id},
					type:'post',
					success:function(mes){
						//禁用当前的按钮
						bt.attr('disabled',true);
						//将待收货改为已收货
						$('.good'+id).each(function(){
							bt.parent('td').prev('td').html('已收货');		

							$(this).find('td:eq(4)').find('span').html('已收货');
							
						});	
					}
				});
			})
			</script>	
			<!--确认收货ajax 结束-->
			<div class="panel panel-default" >
				<div class="panel-heading">
					<h3>收货地址</h3>
				</div>

				<div class="panel-body">
					<div class="table-responsive">
					  <table class="table table-hover table-striped">
					  	<thead>
					  		<tr>
								<th>收货人姓名</th>
								<th>所在地区</th>
								<th>详细地址</th>
								<th>手机号</th>
								<th>操作</th>
							</tr>
					  	</thead>
					  	<tbody>
					  		<?php if(is_array($list_address)): foreach($list_address as $key=>$vo): ?><tr>
								<td><?php echo ($vo['to_name']); ?></td>
								<td class='s'><?php echo ($vo['sheng']); ?></td>
								<td class='sx'><?php echo ($vo['sheng']); ?>,<?php echo ($vo['shi']); ?>,<?php echo ($vo['xian']); ?>,<?php echo ($vo['jiedao']); ?></td>
								<td><?php echo ($vo['to_phone']); ?></td>
								<td>
									<a href="/index.php/Home/user/del/id/<?php echo ($vo['id']); ?>">
										<button class="btn btn-danger">删除</button>
									</a>
								</td>
							</tr><?php endforeach; endif; ?>
					  	</tbody>
					  </table>
					</div>

<!-- 地址替换开始 -->
<script>

	$(document).ready(function(){
	showLocation();

	//将对应的地址id转化为地址

	//1.获取json数据
	var data = new Location();

	var data1 = data.items;

	//2.获取对应的地址中的数字
	$('.s').each(function(){
		var str =$(this).html();
		var arr = str.split(',');

		//省：
		var sheng = data1[0][arr[0]];

		//3.将处理好的字符串写入到标签中
		$(this).html(sheng);
	});


	//省：
				




	$('.sx').each(function(){

		var str =$(this).html();

		var arr = str.split(',');

		// //省：
		var sheng = data1[0][arr[0]];

		//市：
		var shi = data1['0,'+arr[0]][arr[1]];

		//县：
		var xian = data1['0,'+arr[0]+','+arr[1]][arr[2]];

		var str1 = shi+xian+arr[3];

		//3.将处理好的字符串写入到标签中
		$(this).html(str1);
	});

});
</script>
<!-- 地址替换End -->
					<form action='/index.php/Home/address/insertt' class="row form-horizontal" method='post' >
						<div class='col-md-12'  >
							<div class='form-group' >
								<label class='control-label col-md-2 col-sm-2'  for="nickname">收货人：</label>
								<div class="col-md-8 col-xs-10">
									<input class='form-control' name='to_name' value='' type="text">
								</div>
							</div>
							<div class='form-group' >
								<label class='control-label col-md-2 col-sm-2' for="nickname">手机号码：</label>
								<div class="col-md-8 col-xs-10">
									<input class='form-control' name='to_phone' value='' type="text">
								</div>
							</div>
							<div class='form-group' >
								<label class='control-label col-md-2 col-xs-3 col-sm-2' for="nickname">所在地区：</label>
								<div class="col-md-8 col-xs-12 col-sm-10" style='padding:0px;'>
									<div class="col-md-2 col-xs-3 selectInput" >
										<select class="form-control" name='sheng' id="loc_province" ></select>
									</div>
									<div class="col-md-2 col-xs-3 selectInput" >
										<select class="form-control" name='shi' id="loc_city"  ></select>
									</div>
									<div class="col-md-2 col-xs-3 selectInput" >
										<select class="form-control" name='xian' id="loc_town" ></select>
									</div>
								</div>
								
							</div>
							<div class='form-group' >
								<label class='control-label col-md-2 col-sm-2' for="nickname">详细地址：</label>
								<div class="col-md-8 col-xs-10">
									<input class='form-control' name='jiedao' value='' type="text">
								</div>
							</div>
						</div>
						<!-- 另起一行 -->
						<div class='col-md-12' >
							<button type='submit' class='btn btn-primary btn-sm pull-right' >添加地址</button>
						</div>
					</form>	
				</div>		
			</div>
			<!-- <form id ='addFrom' action="addFrom">
				<div>
					<label style='float:left;height:35px;line-height:35px;width:120px'>收货人姓名：</label>
					<input style='float:left;height:35px;line-height:35px;' id='addressName' class='col-md-6' type="text">
				</div>
				<div>
					<label style='float:left;height:35px;line-height:35px;width:120px'>所在地区：</label>
					<select name="province" class='cj' style='width:100px;height:35px;line-height:35px;' id="province"></select>
				</div>
				<div>
					<label style='float:left;height:35px;line-height:35px;width:120px'>详细地址：</label>
					<input style='float:left;height:35px;line-height:35px;' id='addressDetails' class='col-md-6' type="text">
				</div>
				<div>
					<label style='float:left;height:35px;line-height:35px;width:120px'>手机号：</label>
					<input style='float:left;height:35px;line-height:35px;' id='addressPhone'  class='col-md-6' type="text">
				</div>
				<br>
				<a id='addAddressBtn' href="javascript:void(0)">提交</a>
			</form>
			<br> -->
			<br>
		</div>
	</div>
	<div class="newletter-area ptb-30">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="newletter-logo">
						<a href="#"><img src="/Public/ho/user/img/login-default.png" alt="" /></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="subscribe-form">
						<form action="#">
							<input placeholder="Email address..." type="text">
							<button class="subscribe">Subscribe</button>							
						</form>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="subscribe-social text-right">
						<a href="#"><i class="fa fa-youtube"></i></a>
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-google-plus"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<footer>
		<!-- footer-top-area -->
		<div class="footer-top-area border-1 ptb-30 bg-color-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="footer-title">
							<h4>商店信息</h4>
						</div>
						<div class="footer-widget">
							<div class="contact-info">
								<ul>
									<li>
										<div class="contact-icon">
											<i class="fa fa-home"></i>
										</div>
										<div class="contact-text">
											<span></span>
										</div>
									</li>
									<li>
										<div class="contact-icon">
											<i class="fa fa-envelope-o"></i>
										</div>
										<div class="contact-text">
											<a href="#"><span></span></a>
										</div>
									</li>
									<li>
										<div class="contact-icon">
											<i class="fa fa-phone"></i>
										</div>
										<div class="contact-text">
											<span>(+1)</span>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="footer-title">
							<h4>信息</h4>
						</div>
						<div class="footer-widget">
							<div class="list-unstyled">
								<ul>
									<li><a href="#">关于我们</a></li>
									<li><a href="#">支付相关</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Terms &amp; Conditions</a></li>
									<li><a href="#">联系我们</a></li>
									<li><a href="#">地图位置</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="footer-title">
							<h4>个人中心</h4>
						</div>
						<div class="footer-widget">
							<div class="list-unstyled">
								<ul>
									<li><a href="#">个人账户</a></li>
									<li><a href="#">历史排序</a></li>
									<li><a href="#">希望清单</a></li>
									<li><a href="#">新闻消息</a></li>
									<li><a href="#">降价</a></li>
									<li><a href="#">品牌</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="footer-title">
							<h4>Instagram</h4>
						</div>
						<div class="footer-widget">	
							<div class="footer-widget-img">
								<div class="single-img">
									<a href="#"><img src="/Public/ho/user/img/footer/1.jpg" alt=""></a>
								</div>
								<div class="single-img">
									<a href="#"><img src="/Public/ho/user/img/footer/2.jpg" alt=""></a>
								</div>
								<div class="single-img">
									<a href="#"><img src="/Public/ho/user/img/footer/3.jpg" alt=""></a>
								</div>
								<div class="single-img">
									<a href="#"><img src="/Public/ho/user/img/footer/4.jpg" alt=""></a>
								</div>
								<div class="single-img">
									<a href="#"><img src="/Public/ho/user/img/footer/5.jpg" alt=""></a>
								</div>
								<div class="single-img">
									<a href="#"><img src="/Public/ho/user/img/footer/6.jpg" alt=""></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>


	<!-- all js here -->
	<!-- jquery-1.12.0 -->

	<!-- bootstrap.min.js -->
	<script src="/Public/ho/user/js/bootstrap.min.js"></script>
	<!-- nivo.slider.js -->
	<script src="/Public/ho/user/js/jquery.nivo.slider.pack.js"></script>
	<!-- jquery-ui.min.js -->
	<script src="/Public/ho/user/js/jquery-ui.min.js"></script>
	<!-- jquery.magnific-popup.min.js -->
	<script src="/Public/ho/user/js/jquery.magnific-popup.min.js"></script>
	<!-- jquery.meanmenu.min.js -->
	<script src="/Public/ho/user/js/jquery.meanmenu.js"></script>
	<!-- jquery.scrollup.min.js-->
	<script src="/Public/ho/user/js/jquery.scrollup.min.js"></script>
	<!-- owl.carousel.min.js -->
	<script src="/Public/ho/user/js/owl.carousel.min.js"></script>		
	<!-- plugins.js -->
	<script src="/Public/ho/user/js/plugins.js"></script>
	<!-- main.js -->
	<script src="/Public/ho/user/js/main.js"></script>
	<script src="/Public/ho/user/js/jquery-1.8.3.min.js" type="text/javascript"></script>
	


</body>