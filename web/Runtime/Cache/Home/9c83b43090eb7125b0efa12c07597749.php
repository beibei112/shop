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
			<div class="col-md-6" id='pic'>

				<div class="owl-carousel" data-plugin-options='{"items": 1, "autoHeight": true}'>
					<?php if(is_array($good["pic"])): foreach($good["pic"] as $key=>$vo): ?><div>
							<div class="thumbnail">
								<img alt="" class="img-responsive img-rounded" src="<?php echo ($vo); ?>">
							</div>
						</div><?php endforeach; endif; ?>
				</div>
			</div>

			<div class="col-md-6">

					<div class="summary entry-summary">

						<h2 class="shorter"><strong><?php echo ($good['name']); ?></strong></h2>

						<div class="review_num">
							<span class="count" itemprop="ratingCount"><?php echo count($pinglun_list);?></span> reviews
						</div>

						<div title="Rated 5.00 out of 5" class="star-rating">
							<span style="width:100%"><strong class="rating">5.00</strong> out of 5</span>
						</div>

						<p class="price">
							<span class="amount">

								<font id='price' style="vertical-align: inherit;">
								$ <?php echo ($good['price']); ?>
								</font>

							</span>
						</p>

						<p>
							<?php if(is_array($tags)): foreach($tags as $key=>$tag): ?><span class="amount">
								 <font style="vertical-align:inherit;font-size:20px;">
									<button class='btn'><?php echo ($key); ?></button>
								</font>&nbsp;&nbsp;:&nbsp;&nbsp;
							<?php if(is_array($tag)): foreach($tag as $key=>$val): ?><font style="vertical-align: inherit;">
										<button class='btn val' style='display:none;width:25%;'><?php echo ($val); ?></button>
									</font><?php endforeach; endif; ?>
								</span>
								<hr><?php endforeach; endif; ?>

						</p>

						<p class="taller"><font style="vertical-align: inherit;"><?php echo ($good['desc']); ?></font></p>

						<form action='/index.php/Home/cart/add' enctype="multipart/form-data" method="post" class="cart">
								<input type="hidden" name="id" value='<?php echo ($good['skuid']); ?>'>
							<div class="quantity">
								<input type="button" class="minus" value="-">
								<input type="text" class="input-text qty text" title="Qty" value="1" name="num" min="1" step="1">
								<input type="button" class="plus" value="+">
							</div>
							<font id='num' style='vertical-align: inherit;'><?php echo ($good['num']); ?> 件</font>
							<button href="#" class="btn btn-primary btn-icon">Add to cart</button>
						</form>

						<div class="product_meta">
							<span class="posted_in">Categories: <a rel="tag" href="#">Accessories</a>, <a rel="tag" href="#">Bags</a>.</span>
						</div>

					</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="tabs tabs-product">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#productDescription" data-toggle="tab">描述</a></li>
						
						<li><a href="#productReviews" data-toggle="tab">评论(<?php echo count($pinglun_list);?>)</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="productDescription">
							<p><?php echo ($good['desc']); ?></p>
							<p><?php echo ($good['detail']); ?></p>
						</div>
						<div class="tab-pane" id="productInfo">
							<table class="table table-striped push-top">
								<tbody>
									<tr>
										<th>
											Size:
										</th>
										<td>
											Unique
										</td>
									</tr>
									<tr>
										<th>
											Colors
										</th>
										<td>
											Red, Blue
										</td>
									</tr>
									<tr>
										<th>
											Material
										</th>
										<td>
											100% Leather
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="tab-pane" id="productReviews">
							<ul class="comments">
								<?php if(is_array($pinglun_list)): foreach($pinglun_list as $key=>$voo): ?><li>
										<div class="comment">
											<div class="img-thumbnail">
												<img class="avatar" alt="" src="<?php echo ($voo['touxiang']); ?>">
											</div>
											<div class="comment-block">
												<div class="comment-arrow"></div>
												<span class="comment-by">
													<strong><?php echo ($voo['username']); ?> <?php echo date('Y-m-d H:i:s',$voo['time']);?></strong>
													<span class="pull-right">
														<div title="Rated 5.00 out of 5" class="star-rating">
															<span style="width:<?php echo ($voo['leval']); ?>"><strong class="rating">5.00</strong> out of 5</span>
														</div>
													</span>
												</span>
												<p><?php echo ($voo['con']); ?></p>
												<p>	
													<?php if(is_array($voo["salepic"])): foreach($voo["salepic"] as $key=>$vooo): ?><img width='100px;' src="<?php echo ($vooo); ?>" ><?php endforeach; endif; ?>
												</p>
											</div>
										</div>
									</li><?php endforeach; endif; ?>
							</ul>
							<hr class="tall">

							<h4 class='pinglun' style='display:none;'>Add a review</h4>
							<div class="row pinglun" style='display:none'>
								<div class="col-md-12">

									<form action="/index.php/Home/Pinglun/add" id="submitReview" method="post" enctype='multipart/form-data'>
									<input type="hidden" name="sku_id" value='<?php echo ($good['skuid']); ?>' />
									<input type="hidden" name="g_id" value="<?php echo ($good['id']); ?>">
										<div class="row">
											<div class="form-group">
												<div class="col-md-6">
													<label>Select Star</label>
													<span class="comment-by form-control">
														<input type="hidden" name='leval' value=''>
														<span class="pull-left">
															<div title="Rated 5.00 out of 5" id='start'  class="star-rating">
																<span style="width:100%"></span>
															</div>
														</span>
													</span>
												</div>
												<div class="col-md-6">
													<label>Select Pic</label>

													<div class="input-append" >
														
														<span class="btn btn-default btn-file">
															
															<input type="file" name='path[]' multiple>
														</span>
														
													</div>

												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-md-12">
													<label>Context</label>
													<textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="con" id="message"></textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<input type="submit" value="Submit Review" class="btn btn-primary" data-loading-text="Loading...">
											</div>
										</div>
									</form>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<hr class="tall">

		<div class="row">

			<div class="col-md-12">
				<h2>Related <strong>Products</strong></h2>
			</div>

			<ul class="products product-thumb-info-list">
				
			<?php if(is_array($xg)): foreach($xg as $key=>$xo): ?><!-- <?php echo dump($xg);?> -->
				<!-- <?php echo dump($xg);?> -->
				<li class="col-sm-3 col-xs-12 product">
						<!-- <?php echo dump($xg);?> -->
					<span class="product-thumb-info">
						<a href="shop-cart.html" class="add-to-cart-product">
							<span><i class="fa fa-shopping-cart"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">添加到购物车</font></font></span>
						</a>
						<font style="vertical-align: inherit;"><a href="shop-product-sidebar.html"><span class="product-thumb-info-image"><span class="product-thumb-info-act"><span class="product-thumb-info-act-left"><em><font style="vertical-align: inherit;">查看</font></em></span></span></span></a></font><a href="/index.php/Home/Detail/show/id/<?php echo ($xo['good_id']); ?>">
							<span class="product-thumb-info-image">
								<span class="product-thumb-info-act">
									<span class="product-thumb-info-act-left"><em><font style="vertical-align: inherit;"></font></em></span>
									<span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 查看详情</font></font></em></span>
								</span>
								<img alt="" class="img-responsive" src="<?php echo ($xo['path']); ?>">
							</span>
						</a>
						<span class="product-thumb-info-content">
							<a href="shop-product-sidebar.html">
								<h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo ($xo['name']); ?></font></font></h4>
								<span class="price">
									<span class="amount">$<?php echo ($xo['price']); ?></span>
								</span>
							</a>
						</span>
					</span>
				</li><?php endforeach; endif; ?>

			</ul>
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
		
	<script type='text/javascript'>
		var val_lists = <?php echo ($val_lists); ?>;
		var sku_lists = <?php echo ($sku_lists); ?>;
		var good_id = <?php echo ($good['id']); ?>;

		$('.val').each(function(){
			for(var o = null in val_lists){
				
				if($(this).html()==val_lists[o]){
					$(this).addClass('test');
				}
			}
		})

		//给每一个属性值绑定点击事件
		$('.test').show().click(function(){
			$(this).parent('font').siblings().each(function(){
				$(this).find('button:eq(0)').removeClass('btn-info');
			});
			//当前按钮选中
			$(this).addClass('btn-info');

			//发送ajax去查询sku信息
			var str = '';

			$('.btn-info').each(function(){
				str += '\\'+$(this).html();
			});
			$.ajax({
				url:'/index.php/Home/Detail/getsku',
				type:'post',
				data:{skuid:str,good_id:good_id},
				success:function(mes){
					if(mes=='no'){
						alert('暂无数据');
					}else{
						$('#pic').empty();

						eval('obj = '+mes+';');
						var price = $(obj).attr('price');
						var num = $(obj).attr('num');
						var pic_arr = $(obj).attr('pic');
						var skuid = $(obj).attr('id');
						$('#price').html('$ '+price);
						$('#num').html(num+' 件');

						var pic_str = '';
						$(pic_arr).each(function(){
							// console.log(this);
							pic_str += `<div>
								<div class="thumbnail">
									<img alt="" class="img-responsive img-rounded" src="${this}">
								</div>
							</div>`;
						});

						$(`<div class="owl-carousel" data-plugin-options='{"items": 1, "autoHeight": true}'>
							${pic_str}
						</div>
						`).appendTo($('#pic'));

						//重新加载js文件
						$.getScript('/Public/ho/js/theme.init.js');

						//更新表单(购物车中的)skuid
						$('input[name="id"]').val(skuid);
						//更新评论的skuid
						$('input[name="sku_id"]').val(skuid);
						check(skuid);
					}
				}
			});
		});


		//初始化的选中按钮属性
		function init(){
			var vals = sku_lists[0].split('\\');
			vals.shift();

			$(vals).each(function(){
				var str = this;
				$('.test').each(function(){
					if($(this).html()==str){
						$(this).addClass('btn-info');
					}
				});
			})
		}

		init();

		function check(id){
			$.ajax({
				url:'/index.php/Home/Detail/check',
				data:{id:id},
				success:function(mes){
					if(mes=='yes'){
						$('.pinglun').show();
					}
				}
			});
		}
			check(<?php echo ($good['skuid']); ?>);


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
		});
	</script>

	<script type="text/javascript">
	$('#start').click(function(ent){
		//获取鼠标点击相对于整个body的位置
		var mx = ent.clientX;

		//获取div相对于body的位置
		var dx = $(this).offset().left;

		//获取鼠标相对div的位置
		var x= mx-dx;

		var w = $(this).width();
		
		var ww = parseInt(parseInt((x/w)*100)/20+1)*20;

		//设置宽度
		$(this).find('span').css('width',ww+'%');


		//更改表单中的input
		$('input[name="leval"]').val(ww);
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