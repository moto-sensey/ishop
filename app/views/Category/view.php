<?php $curr = \ishop\App::$app->getProperty('currency');
	$round = $curr['code'] == 'UAH' ? 0 : 2;
?>
<!--start-breadcrumbs-->
<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<?=$breadcrumbs;?>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--prdt-starts-->
	<div class="prdt"> 
		<div class="container">
			<div class="prdt-top">
				<div class="col-md-9 prdt-left">
                <?php if(!empty($products)): $i = 0;?>
					  <?php foreach($products as $product):?>
						<?php
							$delPrice = ($product['old_price'] && $product['old_price'] > $product['price'])?'<small style="margin-left:10px;"><del>'.$curr['symbol_left'].bcmul ($product['old_price'], $curr['value'], $round).$curr['symbol_right'].'</del></small>':'';
						?>
						<?php if($i == 0 || $i % 3 == 0) : ?>
							<div class="product-one">
						<?php endif; ?>
						<div class="col-md-4 product-left p-left">
						<div class="product-main simpleCart_shelfItem">
							<a href="product/<?=$product['alias'];?>" class="mask"><img class="img-responsive zoom-img" src="images/<?=$product['img'];?>" alt="" /></a>
							<div class="product-bottom">
								<h3><a href="product/<?=$product['alias'];?>"><?=$product['title'];?></a></h3>
								<p>Explore Now</p>
								 <h4><a class="item_add add-to-cart-link" data-id="<?=$product['id']?>" href="cart/add?id=<?=$product['id'];?>"><i></i></a> <span class="item_price"><?=$curr['symbol_left'].bcmul ($product['price'], $curr['value'], $round).$curr['symbol_right']?></span><?= $delPrice; ?></h4>
							</div>
							<?php if($product['old_price'] && $product['old_price'] > $product['price']):?>						
							<div class="srch srch1">
							  <?php
							  $srch = 100-($product['price']/$product['old_price'] * 100);
							  ?>
							  <span>-<?=(int)$srch;?>%</span>
							</div>
							<?php endif;?>
						</div>
						</div>
						<?php if(($i + 1) % 3 == 0) : ?>
						    <div class="clearfix"> </div>
						    </div>
						<?php endif; ?>
						<?php $i++; endforeach;?>
                        <?php if(($i + 1) % 3 == 0 || ($i + 2) % 3 == 0):?>
                            <div class="clearfix"> </div>
						    </div>
                        <?php endif;?>
						<div class="text-center">
                            <p><?= count($products);?> products as <?= $total;?></p>
                            <?php if($pagination->countPages > 1): ?>
                                <?= $pagination; ?>
                            <?php endif; ?>
                        </div>
                        <?php else:?>
                            <h3>У цій категорії товарів поки що немає...</h3>
                        <?php endif; ?>	
				</div>	
				<div class="col-md-3 prdt-right">
					<div class="w_sidebar">
						<section  class="sky-form">
							<h4>Brand</h4>
							<div class="row1 row2 scroll-pane">
								<div class="col col-4">
								<?php foreach($brands as $item):?>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i><?=$item['title'];?></label>
									<?php endforeach;?>
								</div>
							</div>
						</section>
						<?php new \app\widgets\filter\Filter(); ?>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--product-end-->