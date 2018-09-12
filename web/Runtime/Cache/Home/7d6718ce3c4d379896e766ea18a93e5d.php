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

				
	<section class="page-top">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">Pages</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h2><?php echo ($cate['cate']); ?></h2>
				</div>
			</div>
		</div>
	</section>

	<div class="container">

	<?php if(is_array($tag_list)): foreach($tag_list as $key=>$vo): ?><ul class="nav nav-pills sort-source" data-option-key="filter">
			<li d class="" style='font-size:25px;width:150px;height:40px;'><a href="#"><?php echo ($key); ?></a></li>
			<?php if(is_array($vo)): foreach($vo as $key=>$voo): ?><li class="tag"><a href="#" style='color:#ccc'><?php echo ($voo); ?></a></li><?php endforeach; endif; ?>
		</ul>
	<hr><?php endforeach; endif; ?>

	<div class="row">
		
		<ul class="team-list sort-destination" id='goods' data-sort-id="team" style="position: relative; height: 903.468px;">
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><li class="col-md-3 col-sm-6 col-xs-12" style="position: relative;">
				<div class="team-item thumbnail" style='width:262px;height:393px;'>
				<a href="/index.php/Home/Detail/show/id/<?php echo ($vo['id']); ?>" class="thumb-info team">
					<img class="img-responsive" src="<?php echo ($vo['path']); ?>">
					<span class="thumb-info-title">
						<span class="thumb-info-inner"><?php echo ($vo['name']); ?></span>
						<span class="thumb-info-type"><?php echo getPrice($vo['id']);?></span>
					</span>
				</a>
				<span class="thumb-info-caption">
				<a href="/index.php/Home/Detail/show/id/<?php echo ($vo['id']); ?>" style='text-decoration:none;' class="thumb-info team">
					<p style="height: 90px;"><?php echo ucwords($vo['desc']);?></p>
						<button class='btn '>Detail</button>
					</a>
					<a style='position:absolute;left:150px;top:355px;' href="/index.php/Home/cart/add">
						<button class='btn '>Add Cart</button>
					</a>
				</span>
			</div>
			</li><?php endforeach; endif; ?>

			

			
				<!-- <li class="col-md-3 col-sm-6 col-xs-12 " style="position: absolute; left: 292px; top: 0px; display:none;">
				<div class="team-item thumbnail">
					<a href="about-me.html" class="thumb-info team">
						<img class="img-responsive" alt="" src="/Public/ho/img/team/team-2.jpg">
						<span class="thumb-info-title">
							<span class="thumb-info-inner">Jessica Doe</span>
							<span class="thumb-info-type">Marketing</span>
						</span>
					</a>
					<span class="thumb-info-caption" >
						<p style="height: 90px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						<span class="thumb-info-social-icons">
							<a rel="tooltip" data-placement="bottom" target="_blank" href="http://www.facebook.com" data-original-title="Facebook"><i class="fa fa-facebook"></i><span>Facebook</span></a>
							<a rel="tooltip" data-placement="bottom" href="http://www.twitter.com" data-original-title="Twitter"><i class="fa fa-twitter"></i><span>Twitter</span></a>
							<a rel="tooltip" data-placement="bottom" href="http://www.linkedin.com" data-original-title="Linkedin"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
						</span>
					</span>
				</div>
				</li> -->
		</ul>
	</div>

</div>


	<li class="col-md-3 col-sm-6 col-xs-12" id='clone' style="position: relative; display:none">
		<div class="team-item thumbnail" style='width:262px;height:393px;'>
		<a href="/index.php/Home/Detail/show/id/<?php echo ($vo['id']); ?>" class="thumb-info team">
			<img class="img-responsive" alt="" src="<?php echo ($vo['path']); ?>">
			<span class="thumb-info-title">
				<span class="thumb-info-inner"><?php echo ($vo['name']); ?></span>
				<span class="thumb-info-type"><?php echo getPrice($vo['id']);?></span>
			</span>
		</a>
		<span class="thumb-info-caption">
			
				<p style="height: 90px;"><?php echo ucwords($vo['desc']);?></p>
					<span class='btn '>Detail</span>
			
				<button class='btn '>Add Cart</button>
		</span>
	</div>
	</li>


	<li class="col-md-3 col-sm-6 col-xs-12" id='clone' style="position: relative; display:none">
		<div class="team-item thumbnail" style='width:262px;height:393px;'>
		<a href="" class="thumb-info team">
			<img class="img-responsive" alt="" src="<?php echo ($vo['path']); ?>">
			<span class="thumb-info-title">
				<span class="thumb-info-inner"><?php echo ($vo['name']); ?></span>
				<span class="thumb-info-type"><?php echo getPrice($vo['id']);?></span>
			</span>
		</a>
		<span class="thumb-info-caption">
			<p style="height: 90px;"><?php echo ucwords($vo['desc']);?></p>
			<!-- <button class='btn '>Detail</button> -->
			<button class='btn '>Add Cart</button>
		</span>
	</div>
	</li>

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
		
	<script type='text/javascript'>
	$('.tag').click(function(){
		$(this).siblings().removeClass('active');

		if($(this).hasClass('active')){
			$(this).removeClass('active');
		}else{
			$(this).addClass('active');
		}

		var tag_val = '';
		$('.tag[class="tag active"]').each(function(){
			tag_val+= '\\'+$(this).find('a').html();
		});

		var cate_id = <?php echo ($cate['id']); ?>;

		//发送ajax
		$.ajax({
			url:'/index.php/Home/Cate/getGoodsByTag',
			data:{'cate_id':cate_id,'tag_val':tag_val},
			type:'post',
			dataType:'json',
			success:function(mes){
				//清空ul中的默认商品
				$('#goods').empty();
				// console.log(mes);
				for(var o = null in mes){

					var name = $(mes[o]).attr('name');
					var desc = $(mes[o]).attr('desc');
					var sku = $(mes[o]).attr('sku');
					var id = $(mes[o]).attr('id');

					$(sku).each(function(){
						var skuid = $(this).attr('skuid');
						//克隆一个新的Li
						var newli = $('#clone').clone().show().removeAttr('id');
						newli.find('img').attr('src',$(this).attr('path'));
						newli.find('.thumb-info-inner').html(name);
						newli.find('.thumb-info-type').html($(this).attr('price'));
						newli.find('p').html(desc);

						//修改 a的跳转地址
						newli.find('a').attr('href','/index.php/Home/Detail/show/id/'+id);

						//li插入到文档中
						$('#goods').append(newli);
					})
				}
			}
		});
	});
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