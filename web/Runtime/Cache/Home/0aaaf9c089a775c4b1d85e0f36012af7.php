<?php if (!defined('THINK_PATH')) exit();?><nav class="nav-main mega-menu">
	<ul class="nav nav-pills nav-main" id="mainMenu">
		<?php if(is_array($list)): foreach($list as $key=>$vo): ?><li class="dropdown mega-menu-item mega-menu-fullwidth">
			<a class="dropdown-toggle" href="/index.php/Home/cate/index/id/<?php echo ($vo['id']); ?>">
				<?php echo ($vo['cate']); ?>
				<i class="fa fa-angle-down"></i>
			</a>
			<ul class="dropdown-menu">
				<li>
					<div class="mega-menu-content">
						<div class="row">
						<?php if(is_array($vo["sub"])): foreach($vo["sub"] as $key=>$voo): ?><div class="col-md-3">
								<ul class="sub-menu">
									<li>
										<a href="/index.php/Home/cate/index/id/<?php echo ($voo['id']); ?>"><span class="mega-menu-sub-title"><?php echo ($voo['cate']); ?></span></a>
										<ul class="sub-menu">
										<?php if(is_array($voo["sub"])): foreach($voo["sub"] as $key=>$vooo): ?><li><a href="/index.php/Home/cate/index/id/<?php echo ($vooo['id']); ?>"><?php echo ($vooo['cate']); ?></a></li><?php endforeach; endif; ?>
										</ul>
									</li>
								</ul>
							</div><?php endforeach; endif; ?>
						</div>
					</div>
				</li>
			</ul>
		</li><?php endforeach; endif; ?>



		<li class="dropdown mega-menu-item mega-menu-shop">
			<a class="dropdown-toggle extra" href="#"><i class="fa fa-angle-down"></i></a>
			<a class="dropdown-toggle mobile-redirect disabled" href="/index.php/Home/cart/index">
				<i class="fa fa-shopping-cart"></i> <span id='cart'>Cart (<?php echo ($cart_num); ?>) - $<?php echo ($count); ?></span>
				<i class="fa fa-angle-down"></i>
			</a>
			<ul class="dropdown-menu">
				<li>
					<div class="mega-menu-content">
						<div class="row">
							<div class="col-md-12">

								<table cellspacing="0" class="cart">
									<tbody>
										<?php if(is_array($list1)): foreach($list1 as $key=>$vo1): ?><tr class='cc ' info=<?php echo ($vo1['id']); ?>>
												<td class="product-thumbnail">
													<a href="/index.php/Home/cart/index">
														<img width="100" height="100" alt="" class="img-responsive" src="<?php echo ($vo1['path']); ?>">
													</a>
												</td>
												<td class="product-name">
													<a href="/index.php/Home/cart/index"><?php echo ($vo1['name']); ?><br><span class="amount"><strong>$<?php echo ($vo1['price']); ?></strong></span></a>
												</td>
												<td class="product-actions">
													<a title="Remove this item" onclick='remove(this)' class="remove" href="#">
														<i class="fa fa-times"></i>
													</a>
												</td>
											</tr><?php endforeach; endif; ?>
										<tr>
											<td class="actions" colspan="6">
												<div class="actions-continue">
													<input type="submit" value="View All" class="btn btn-default">
													<input type="submit" value="Proceed to Checkout →" name="proceed" class="btn pull-right btn-primary">
												</div>
											</td>
										</tr>
									</tbody>
								</table>

							</div>
						</div>
					</div>
				</li>
			</ul>
		</li>
	</ul>
</nav>
<!-- 
<script type="text/javascript">
	var num=0;
	$('.cc').each(function(){
		num++;
	});

	$('#cart').html('Cart ('+num+') - $299');

</script>
 -->