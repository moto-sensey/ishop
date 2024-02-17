
<!--start-breadcrumbs-->
<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<?= $breadcrumbs;?>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-single-->
	<div class="single contact">
		<div class="container">
			<div class="single-main">
				<div class="col-md-9 single-main-left">
				<div class="sngl-top">
					<div class="col-md-5 single-top-left">	
						<div class="flexslider">
							<ul class="slides">
								<?php foreach($gallery as $item):?>
								<li data-thumb="images/<?=$item['img']?>">
									<div class="thumb-image"> <img src="images/<?=$item['img']?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>
						
						<!-- FlexSlider -->
						<script src="js/imagezoom.js"></script>
						<script defer src="js/jquery.flexslider.js"></script>
						<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

						<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
						</script>
					</div>	
					<div class="col-md-7 single-top-right">
						<div class="single-para simpleCart_shelfItem">
						<h2><?= $product->title; ?></h2>
							<div class="star-on">
								<ul class="star-footer">
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
									</ul>
								<div class="review">
									<a href="#"> 1 customer review </a>
									
								</div>
							<div class="clearfix"> </div>
							</div>
							<?php $curr = \ishop\App::$app->getProperty('currency');
								  $cats = \ishop\App::$app->getProperty('cats');
						  		  $around = $curr['code'] == 'UAH' ? 0 : 2;
								  $delPrice = ($product->old_price && $product->old_price > $product->price)?'<small style="margin-left:10px;"><del>'.$curr['symbol_left'].bcmul ($product->old_price, $curr['value'], $around).$curr['symbol_right'].'</del></small>':'';
							?>
							<h5> <span id="base-price" class="item_price" data-base="<?= bcmul ($product->price, $curr['value'], $around);?>"><?=$curr['symbol_left'].bcmul ($product->price, $curr['value'], $around).$curr['symbol_right']?></span><?= $delPrice; ?></h5>
							<p><?= $product->content; ?></p>
							<div class="available">
								<ul>
								<?php if($mods): ?>
									<li>Color
										<select  data-id="<?=$product->id;?>">
										<option value="">Select color</option>
										<?php foreach($mods as $mod): ?>
										<option data-title="<?=$mod->title;?>" data-price="<?=bcmul ($mod->price, $curr['value'], $around)?>" value="<?=$mod->id;?>"><?=$mod->title;?></option>
										<?php endforeach; ?>
										</select>
									</li>
								<?php endif; ?>
									<li class="size-in">Size
										<select>
										<option>Large</option>
										<option>Medium</option>
										<option>small</option>
										<option>Large</option>
										<option>small</option>
										</select>
									</li>
									<div class="clearfix"> </div>
								</ul>
							</div>
							<ul class="tag-men">
								<li><span class="single-tags-li-span">Category :</span>
								<span class="women1"><a href="category/<?= $cats[$product->category_id]['alias']; ?>"><?= $cats[$product->category_id]['title']; ?></a></span></li>
								<li><span class="single-tags-li-span">Brand  . . . :</span>
								<span class="women1"><a href="brand/<?= $brand->alias; ?>"><?= $brand->title; ?></a></span></li>
							</ul>
							<div class="quantity">
								<input type="number" data-id="<?= $product->id; ?>" size="4" value="1" name="quantity" min="1" max="100" step="1">
							
							<a id="productAdd" data-id="<?= $product->id; ?>" href="cart/add?id=<?= $product->id; ?>" class="add-cart item_add add-to-cart-link">ADD TO CART</a>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<script type="text/javascript">
				$(function() {
	    			var menu_ul = $('.menu_drop > li > ul'),
	           		menu_a  = $('.menu_drop > li > a');
	   				menu_ul.hide();
	   				menu_a.click(function(e) {
	        			e.preventDefault();
	        			if(!$(this).hasClass('active')) {
	            		menu_a.removeClass('active');
	            		menu_ul.filter(':visible').slideUp('normal');
	            		$(this).addClass('active').next().stop(true,true).slideDown('normal');
	        			} else {
	            			$(this).removeClass('active');
	            			$(this).next().stop(true,true).slideUp('normal');
	        			}
	    			});
				});
				</script>		
				<div class="tabs">
				<ul class="menu_drop">
					<li class="item1"><a href="#"><img src="images/arrow.png" alt="">Description</a>
						<ul>
							<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
							<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
							<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
						</ul>
					</li>
					<li class="item2"><a href="#"><img src="images/arrow.png" alt="">Additional information</a>
						<ul>
							<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
							<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
						</ul>
					</li>
					<li class="item3"><a href="#"><img src="images/arrow.png" alt="">Reviews (10)</a>
						<ul>
							<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
							<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
							<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
						</ul>
					</li>
					<li class="item4"><a href="#"><img src="images/arrow.png" alt="">Helpful Links</a>
						<ul>
							<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
							<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
						</ul>
					</li>
					<li class="item5"><a href="#"><img src="images/arrow.png" alt="">Make A Gift</a>
						<ul>
							<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
							<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
							<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
						</ul>
					</li>
	 			</ul>
				</div>
				<?php if($related):?>
				<div class="latestproducts">
					<div class="product-one">
						<h3>З цим товаром теж купують:</h3>
						<?php foreach($related as $prod):
						$delPriceRelated = ($prod['old_price'] && $prod['old_price'] > $prod['price'])?'<small style="margin-left:10px;"><del>'.$curr['symbol_left'].bcmul ($prod['old_price'], $curr['value'], $around).$curr['symbol_right'].'</del></small>':'';	
						?>
						<div class="col-md-4 product-left p-left"> 
							<div class="product-main simpleCart_shelfItem">
								<a href="product/<?=$prod['alias']?>" class="mask"><img class="img-responsive zoom-img" src="images/<?=$prod['img']?>" alt="" /></a>
								<div class="product-bottom">
									<h3><a href="product/<?=$prod['alias']?>"><?=$prod['title']?></a></h3>
									<p>Explore Now</p>
									<h4><a class="item_add add-to-cart-link" href="cart/add?id=<?=$prod['id']?>" data-id="<?=$prod['id']?>"><i></i></a>
										<span class="item_price"><?=$curr['symbol_left'].bcmul ($prod['price'], $curr['value'], $around).$curr['symbol_right']?></span><?= $delPriceRelated; ?>
									</h4>
								</div>
							<?php if($prod['old_price'] && $prod['old_price'] > $prod['price']):?>						
							<div class="srch">
							  <?php
							  $srch = 100-($prod['price']/$prod['old_price']*100);
							  ?>
							  <span>-<?=(int)$srch;?>%</span>
							</div>
							<?php endif;?>
							</div>
						</div>
						<?php endforeach;?>
						<div class="clearfix"></div>
					</div>
				</div>
				<?php endif;?>
				<?php if($recentlyViewed): ?>
					<div class="latestproducts">
					<div class="product-one">
						<h3>Товари, які Ви дивились:</h3>
						<?php foreach($recentlyViewed as $prod):
						$delPriceViewed = ($prod['old_price'] && $prod['old_price'] > $prod['price'])?'<small style="margin-left:10px;"><del>'.$curr['symbol_left'].bcmul ($prod['old_price'], $curr['value'], $around).$curr['symbol_right'].'</del></small>':'';	
						?>
						<div class="col-md-4 product-left p-left"> 
							<div class="product-main simpleCart_shelfItem">
								<a href="product/<?=$prod['alias']?>" class="mask"><img class="img-responsive zoom-img" src="images/<?=$prod['img']?>" alt="" /></a>
								<div class="product-bottom">
									<h3><a href="product/<?=$prod['alias']?>"><?=$prod['title']?></a></h3>
									<p>Explore Now</p>
									<h4><a class="item_add add-to-cart-link" href="cart/add?id=<?=$prod['id']?>" data-id="<?=$prod['id']?>"><i></i></a>
										<span class="item_price"><?=$curr['symbol_left'].bcmul ($prod['price'], $curr['value'], $around).$curr['symbol_right']?></span><?= $delPriceViewed; ?>
									</h4>
								</div>
							<?php if($prod['old_price'] && $prod['old_price'] > $prod['price']):?>						
							<div class="srch">
							  <?php
							  $srch = 100-($prod['price']/$prod['old_price']*100);
							  ?>
							  <span>-<?=(int)$srch;?>%</span>
							</div>
							<?php endif;?>
							</div>
						</div>
						<?php endforeach;?>
						<div class="clearfix"></div>
					</div>
				</div>	
				<?php endif;?>
			</div>
				<div class="col-md-3 single-right">
					<div class="w_sidebar">
						<!--<section  class="sky-form">
							<h4>Brand</h4>
							<div class="row1 row2 scroll-pane">
								<div class="col col-4">
									<?php foreach($brands as $item):?>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i><?=$item['title'];?></label>
									<?php endforeach;?>
								</div>
							</div>
						</section>-->
						<?php new \app\widgets\filter\Filter(); ?>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--end-single-->