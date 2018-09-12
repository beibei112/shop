<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title>Porto - Responsive HTML5 Template 3.4.1</title>
		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Porto - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Web Fonts  -->

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="/Public/ho/vendor/bootstrap/bootstrap.css">
		<link rel="stylesheet" href="/Public/ho/vendor/fontawesome/css/font-awesome.css">
		<link rel="stylesheet" href="/Public/ho/vendor/owlcarousel/owl.carousel.css" media="screen">
		<link rel="stylesheet" href="/Public/ho/vendor/owlcarousel/owl.theme.css" media="screen">
		<link rel="stylesheet" href="/Public/ho/vendor/magnific-popup/magnific-popup.css" media="screen">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="/Public/ho/css/theme.css">
		<link rel="stylesheet" href="/Public/ho/css/theme-elements.css">
		<link rel="stylesheet" href="/Public/ho/css/theme-blog.css">
		<link rel="stylesheet" href="/Public/ho/css/theme-shop.css">
		<link rel="stylesheet" href="/Public/ho/css/theme-animate.css">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="/Public/ho/vendor/rs-plugin/css/settings.css" media="screen">
		<link rel="stylesheet" href="/Public/ho/vendor/circle-flip-slideshow/css/component.css" media="screen">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="/Public/ho/css/skins/default.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/Public/ho/css/custom.css">

		<!-- Head Libs -->
		<script src="/Public/ho/vendor/modernizr/modernizr.js"></script>

		<!--[if IE]>
			<link rel="stylesheet" href="css/ie.css">
		<![endif]-->

		<!--[if lte IE 8]>
			<script src="vendor/respond/respond.js"></script>
			<script src="vendor/excanvas/excanvas.js"></script>
		<![endif]-->

	</head>
	<body>
		<div class="body">
			<header id="header">
				<div class="container">
					<h1 class="logo">
						<a href="/index.php/Home/index.html">
							<img alt="Porto" width="111" height="54" data-sticky-width="82" data-sticky-height="40" src="/Public/ho/img/logo.png">
						</a>
					</h1>
					<div class="search">
						<form id="searchForm" action="#" method="get">
							<div class="input-group">
								<input type="text" class="form-control search" name='name' id="q" placeholder="Search..." required>
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</form>
					</div>
					<nav>
						<ul class="nav nav-pills nav-top">
						<?php  $mod = M('User'); $data = $mod->find($_SESSION['home']['homeuser']['id']); ?>
							<li>
								<?php if($_SESSION['home']['homeuser'] > 0): ?><a href="/index.php/Home/user/index"><i class="fa fa-angle-right"></i>尊敬的：<?php echo ($_SESSION['home']['homeuser']['username']); ?>
									<img src='<?php echo ((isset($data['touxiang']) && ($data['touxiang'] !== ""))?($data['touxiang']):"/Public/Upload/aaa.jpg"); ?>' style="width:31px;height:31px;border-radius:50%;" >
									</a>
								<?php else: ?>
									<a href="/index.php/Home/login/login"><i class="fa fa-angle-right"></i> 登录 / 注册</a><?php endif; ?>
							</li>

							<li>
								<?php if($_SESSION['home']['homeuser'] > 0): ?><a href="/index.php/Home/login/zhuxiao"><i class="fa fa-angle-right"></i>退出登录</a><?php endif; ?>
							</li>

							<li>
								<a href=""><i class="fa fa-angle-right"></i>联系我们</a>
							</li>


							<li class="phone">
								<span><i class="fa fa-phone"></i>(123) 456-7890</span>
							</li>

						</ul>
					</nav>
					<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
						<i class="fa fa-bars"></i>
					</button>
				</div>
				<div class="navbar-collapse nav-main-collapse collapse">
					<div class="container">
						<ul class="social-icons">
							<li class="facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook">Facebook</a></li>
							<!-- <li class="twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter">Twitter</a></li> -->
							<li class="linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin">Linkedin</a></li>
						</ul>

						<?php echo W('Cate/menu');?>
					</div>
				</div>
			</header>

			<div role="main" class="main shop">

				
<script type="text/javascript" src="/Public/sel/jquery.js"></script>
<script type="text/javascript" src="/Public/sel/area.js"></script>
<script type="text/javascript" src="/Public/sel/location.js"></script>
<script type="text/javascript" src="/Public/sel/jquery.min.js"></script>

	<style type="text/css">
		.sel{
			background-color: #eee;
		}
	</style>
	<div class="container">
		
		<hr class="tail">

		<div class="row">
			<div class="col-md-12">
				<h2 class="shorter"><strong>Checkout</strong></h2>
				<p>Returning customer? <a href="shop-login.html">Click here to login.</a></p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-9">
				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
									Select Address
								</a>
							</h4>
						</div>
						<div id="collapseOne" class="accordion-body collapse in" aria-expanded="true" style="">
							<div class="panel-body">
							<div class='row'>
							<?php if(is_array($address_list)): foreach($address_list as $key=>$vo): ?><div class="col-xs-6 col-md-3 add" address='<?php echo ($vo['id']); ?>' >
										<address>
											<strong>地址:</strong><br />
											<span info='<?php echo ($vo['sheng']); ?>,<?php echo ($vo['shi']); ?>,<?php echo ($vo['xian']); ?>'></span><br>
											<?php echo ($vo['jiedao']); ?><br>
											<strong title="">电话:<?php echo ($vo['to_phone']); ?></strong>
										</address>

										<address>
											<strong>To Name</strong><br />
											<a href="mailto:#"><?php echo ($vo['to_name']); ?></a>
										</address>
								</div><?php endforeach; endif; ?>
								
							</div>

						</div>
					</div>
				</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false">
									New Address
								</a>
							</h4>
						</div>
						<div id="collapseTwo" class="accordion-body collapse" aria-expanded="false">
							<div class="panel-body">
								<form action="/index.php/Home/address/insert" id="" method="post">
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>To_Name:</label>
												<input type="text" name="to_name" value="" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>To_Phone:</label>
												<input type="text" name="to_phone" value="" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>Select City:</label><br>
												<select id="loc_province" class="form-control" name="sheng"></select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>Select Shi:</label><br>
												<select id="loc_city" class="form-control" name="shi" ></select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>Select Xian:</label><br>
												<select id="loc_town" class="form-control" name="xian" ></select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>Jie Dao</label>
												<textarea class='form-control' name="jiedao"></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<input type="submit" value="Continue" class="btn btn-primary pull-right push-bottom" data-loading-text="Loading...">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false">
									Review &amp; Payment
								</a>
							</h4>
						</div>
						<div id="collapseThree" class="accordion-body collapse" aria-expanded="false">
							<div class="panel-body">
								<table cellspacing="0" class="shop_table cart">
									<thead>
										<tr>
											<th class="product-thumbnail">
												&nbsp;
											</th>
											<th class="product-name">
												Product
											</th>
											<th class="product-price">
												Price
											</th>
											<th class="product-quantity">
												Num
											</th>
											<th class="product-subtotal">
												Total
											</th>
										</tr>
									</thead>
									<tbody>
										<?php if(is_array($list)): foreach($list as $key=>$vv): ?><tr class="cart_table_item a">
											<td class="product-thumbnail">
												<a href="">
													<img width="100" height="100" alt="" class="img-responsive" src="<?php echo ($vv['path']); ?>">
												</a>
											</td>
											<td class="product-name">
												<a href=""><?php echo ($vv['name']); ?></a>
											</td>
											<td class="product-price">
												$<span class="amount d"><?php echo ($vv['price']); ?></span>
											</td>
											<td class="product-quantity">
												<span class="j"><?php echo ($vv['num']); ?></span>件
											</td>
											<td class="product-subtotal">
												<span class="amount z">$299</span>
											</td>
										</tr><?php endforeach; endif; ?>
									</tbody>
								</table>

								<hr class="tall">

								<h4>Cart Totals</h4>
								<table cellspacing="0" class="cart-totals">
									<tbody>
										<tr class="total b">
											<th>
												<strong>Order Total</strong>
											</th>
											<td>
												<strong><span class="amount">$431</span></strong>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="actions-continue">
					<form action="/index.php/Home/Order/order" method="post">
						<input type="hidden" name="address_id" value="">
						<input type="submit" value="Place Order" class="btn btn-lg btn-primary push-top">
					</form>
				</div>
			</div>
			<div class="col-md-3">
				<h4>Cart Totals</h4>
				<table cellspacing="0" class="cart-totals">
					<tbody>
						<tr class="total b">
							<th>
								<strong>Order Total</strong>
							</th>
							<td>
								<strong><span class="amount">$431</span></strong>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

			</div>

			</div>

			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="footer-ribbon">
							<span>Get in Touch</span>
						</div>
						<div class="col-md-3">
							<div class="newsletter">
								<h4>Newsletter</h4>
								<p>Keep up on our always evolving product features and technology. Enter your e-mail and subscribe to our newsletter.</p>

								<div class="alert alert-success hidden" id="newsletterSuccess">
									<strong>Success!</strong> You've been added to our email list.
								</div>

								<div class="alert alert-danger hidden" id="newsletterError"></div>

								<form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
									<div class="input-group">
										<input class="form-control" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit">Go!</button>
										</span>
									</div>
								</form>
							</div>
						</div>
						<div class="col-md-3">
							<h4>Latest Tweets</h4>
							<div id="tweet" class="twitter" data-plugin-tweets data-plugin-options='{"username": "", "count": 2}'>
								<p>Please wait...</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="contact-details">
								<h4>Contact Us</h4>
								<ul class="contact">
									<li><p><i class="fa fa-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</p></li>
									<li><p><i class="fa fa-phone"></i> <strong>Phone:</strong> (123) 456-7890</p></li>
									<li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<h4>Follow Us</h4>
							<div class="social-icons">
								<ul class="social-icons">
									<li class="facebook"><a href="http://www.facebook.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Facebook">Facebook</a></li>
									<!-- <li class="twitter"><a href="http://www.twitter.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Twitter">Twitter</a></li> -->
									<li class="linkedin"><a href="http://www.linkedin.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Linkedin">Linkedin</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
							<div class="col-md-1">
								<a href="index.html" class="logo">
									<img alt="Porto Website Template" class="img-responsive" src="/Public/ho/img/logo-footer.png">
								</a>
							</div>
							<div class="col-md-7">
								<p>© Copyright 2014. All Rights Reserved.</p>
							</div>
							<div class="col-md-4">
								<nav id="sub-menu">
									<ul>
										<li><a href="page-faq.html">FAQ's</a></li>
										<li><a href="sitemap.html">Sitemap</a></li>
										<li><a href="contact-us.html">Contact</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Vendor -->
		<script src="/Public/ho/vendor/jquery/jquery.js"></script>
		<script src="/Public/ho/vendor/jquery.appear/jquery.appear.js"></script>
		<script src="/Public/ho/vendor/jquery.easing/jquery.easing.js"></script>
		<script src="/Public/ho/vendor/jquery-cookie/jquery-cookie.js"></script>
		<script src="/Public/ho/vendor/bootstrap/bootstrap.js"></script>
		<script src="/Public/ho/vendor/common/common.js"></script>
		<script src="/Public/ho/vendor/jquery.validation/jquery.validation.js"></script>
		<script src="/Public/ho/vendor/jquery.stellar/jquery.stellar.js"></script>
		<script src="/Public/ho/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
		<script src="/Public/ho/vendor/jquery.gmap/jquery.gmap.js"></script>
		<!-- // <script src="/Public/ho/vendor/twitterjs/twitter.js"></script> -->
		<script src="/Public/ho/vendor/isotope/jquery.isotope.js"></script>
		<script src="/Public/ho/vendor/owlcarousel/owl.carousel.js"></script>
		<script src="/Public/ho/vendor/jflickrfeed/jflickrfeed.js"></script>
		<script src="/Public/ho/vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="/Public/ho/vendor/vide/vide.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="/Public/ho/js/theme.js"></script>

		<!-- Specific Page Vendor and Views -->
		<script src="/Public/ho/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="/Public/ho/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<!-- // <script src="/Public/ho/vendor/circle-flip-slideshow/js/jquery.flipshow.js"></script> -->
		<script src="/Public/ho/js/views/view.home.js"></script>

		<!-- Theme Custom -->
		<script src="/Public/ho/js/custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="/Public/ho/js/theme.init.js"></script>
		<script src="/Public/ho/js/remove.js"></script>
		
	<script type="text/javascript">

		$(document).ready(function(){
			showLocation();

			//将对应的地址id转换为地址
			//1.获取json数据
			var data = new Location();
			var data1 = data.items;

			//2.获取对应的地址中的数字
			$('.add').each(function(){
				var str = $(this).find('span').attr('info');
				var arr = str.split(',');
				//省
				var sheng = data1[0][arr[0]];
				//市
				var shi = data1['0,'+arr[0]][arr[1]];
				//县
				var xian = data1['0,'+arr[0]+','+arr[1]][arr[2]];

				var str1 = sheng+' '+shi+' '+xian;

				//3.将处理好的字符串写入到标签中
				$(this).find('span').html(str1);
			});

			//3.给地址div添加选中事件
			$('.add').click(function(){
				$(this).siblings().removeClass('sel');
				$(this).addClass('sel');
				
				//修改form中的address_id的值
				$("input[name='address_id']").val($(this).attr('address'));

			});
		});

		function count(){
			var count = 0;
			$('.a').each(function(){
				var price = $(this).find('td:eq(2)').find('span').html();
				var num = parseInt($(this).find('td:eq(3)').find('span').html());

				// 写入小计
				$(this).find('td:eq(4)').find('span').html('$'+price*num);

				count+=price*num;
			});
			$('.b').find('td:eq(0)').find('strong').find('span').html('$'+count);
		}
		count();
	</script>	


		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script type="text/javascript">

			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-12345678-1']);
			_gaq.push(['_trackPageview']);

			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();

		</script>
		 -->

	</body>
</html>