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

				
	<div class="container">

		<hr class="tall">

		<div class="row">

			<div class="row featured-boxes">
				<div class="col-md-12">
					<div class="featured-box featured-box-secundary featured-box-cart">
						<div class="box-content">
							<form method="post" action="/index.php/Home/order/index">
								<table cellspacing="0" class="shop_table cart">
									<thead>
										<tr>
											<th class="product-remove">
												&nbsp;
											</th>
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
												Quantity
											</th>
											<th class="product-subtotal">
												Total
											</th>
										</tr>
									</thead>
									<tbody>
										<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr class="cart_table_item a" info='<?php echo ($vo['id']); ?>'>
												<td class="product-remove">
													<a title="Remove this item" class="remove" href="#" onclick='remove(this)'>
														<i class="fa fa-times"></i>
													</a>
												</td>
												<td class="product-thumbnail">
													<a href="shop-product-sidebar.html">
														<img width="100" height="100" alt="" class="img-responsive" src="<?php echo ($vo['path']); ?>">
													</a>
												</td>
												<td class="product-name">
													<a href="shop-product-sidebar.html"><?php echo ($vo['name']); ?></a>
												</td>
												<td class="product-price">
													$<span class="amount"><?php echo ($vo['price']); ?></span>
												</td>
												<td class="product-quantity">
													
														<div class="quantity">
															<input type="button" class="minus" value="-">
															<input type="text" class="input-text qty text" title="Qty" value="<?php echo ($vo['num']); ?>" name="quantity" min="1" step="1">
															<input type="button" class="plus" value="+">
														</div>
													
												</td>
												<td class="product-subtotal">
													<span class="amount">$299</span>
												</td>
											</tr><?php endforeach; endif; ?>
										<tr class='c'>
											<td class="actions" colspan="3">
												总计：1999
											</td>

											<td class="actions" colspan="3">
												<div class="actions-continue">
													<input type="submit" value="Update Cart" name="update_cart" class="btn btn-default">
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>


				<div class="row featured-boxes">
					<div class="col-md-12">
						<div class="actions-continue">
							<input type="submit" value="Proceed to Checkout →" name="proceed" class="btn btn-lg btn-primary">
						</div>
					</div>
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
		//小计和总计的计算
		function count(){
			var count = 0;
			$('.a').each(function(){
				var price = parseFloat($(this).find('td:eq(3)').find('span').html());
				var num = parseInt($(this).find('td:eq(4)').find('input[type="text"]').val());
				
				var xj = (price*num).toFixed(2);
				//写入小计
				$(this).find('td:eq(5)').html('$'+xj);

				count+=price*num;
			});

			$('.c').find('td:eq(0)').html('总计: '+count.toFixed(2));
		}

		count();

		//点击+-实现更改数量
		$('.minus,.plus').click(function(){
			var id =$(this).parents('tr').attr('info');

			if($(this).val()=='-'){
				var num = $(this).next().val();
				num--;
				if(num==0) return;

				$(this).next().val(num);
				updateCart(id,'-');

			}else{
				var num = $(this).prev().val();
				num++;
				$(this).prev().val(num);
				updateCart(id,'+');
			}
			count();
			window.location.reload();

		});

		function updateCart(id,flag){
			$.ajax({
				url:'/index.php/Home/Cart/updateCart',
				data:{id:id,flag:flag},
				type:'post',
				success:function(){

				}
			});
		}

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