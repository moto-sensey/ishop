<!--banner-starts-->
<div class="bnr" id="home">
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider4">
			    <li>
					<img src="images/bnr-1.jpg" alt=""/>
				</li>
				<li>
					<img src="images/bnr-2.jpg" alt=""/>
				</li>
				<li>
					<img src="images/bnr-3.jpg" alt=""/>
				</li>
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!--banner-ends--> 
	<!--Slider-Starts-Here-->
	<script src="js/responsiveslides.min.js"></script>
		<script>
		// You can also use "$(window).load(function() {"
		 $(function () {
			// Slideshow 4
			 $("#slider4").responsiveSlides({
			auto: true,
			pager: true,
			nav: true,
		    speed: 500,
		    namespace: "callbacks",
		    before: function () {
		      $('.events').append("<li>before event fired.</li>");
		    },
		    after: function () {
			     $('.events').append("<li>after event fired.</li>");
		    }
		  });
	    });
	</script>
	<!--End-slider-script-->
	<!--about-starts-->
	<?php if($brands): ?>
	<div class="about"> 
		<div class="container">
			<div class="about-top grid-1">
				<?php foreach($brands as $brand): ?>
				<div class="col-md-4 about-left">
					<figure class="effect-bubba">
						<img class="img-responsive" src="images/<?=$brand->img; ?>" alt=""/>
						<figcaption>
							<h2><?=$brand->title; ?></h2>
							<p><?=$brand->description; ?></p>	
						</figcaption>			
					</figure>
				</div>
				<?php endforeach; ?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<!--about-end-->
	<!--product-starts-->
	<div class="product"> 
		<div class="container">
			<div class="product-top">
					<?php if($hits): $i = 0;?>
					<?php $curr = \ishop\App::$app->getProperty('currency');
						  $around = $curr['code'] == 'UAH' ? 0 : 2;
					?>
					  <?php foreach($hits as $hit):?>
						<?php
							$delPrice = ($hit->old_price && $hit->old_price > $hit->price)?'<small style="margin-left:10px;"><del>'.$curr['symbol_left'].bcmul ($hit->old_price, $curr['value'], $around).$curr['symbol_right'].'</del></small>':'';
						?>
						<?php if($i == 0 || $i % 4 == 0) : ?>
							<div class="product-one">
						<?php endif; ?>
						<div class="col-md-3 product-left">
						<div class="product-main simpleCart_shelfItem">
							<a href="product/<?=$hit->alias;?>" class="mask"><img class="img-responsive zoom-img" src="images/<?=$hit->img;?>" alt="" /></a>
							<div class="product-bottom">
								<h3><a href="product/<?=$hit->alias;?>"><?=$hit->title;?></a></h3>
								<p>Explore Now</p>
								 <h4><a class="item_add add-to-cart-link" data-id="<?=$hit->id?>" href="cart/add?id=<?=$hit->id;?>"><i></i></a> <span class=" item_price"><?=$curr['symbol_left'].bcmul ($hit->price, $curr['value'], $around).$curr['symbol_right']?></span><?= $delPrice; ?></h4>
							</div>
							<?php if($hit->old_price && $hit->old_price > $hit->price):?>						
							<div class="srch">
							  <?php
							  $srch = 100-($hit->price/$hit->old_price*100);
							  ?>
							  <span>-<?=(int)$srch;?>%</span>
							</div>
							<?php endif;?>
						</div>
						</div>
						<?php if(($i + 1) % 4 == 0) : ?>
						<div class="clearfix"> </div>
						</div>
						<?php endif; ?>
						<?php $i++; endforeach;?>
						<?php if(($i + 1) % 4 == 0 || ($i + 2) % 4 == 0 || ($i + 3) % 4 == 0) : ?>
						<div class="clearfix"> </div>
						</div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
				</div>					
			</div>
		</div>
	</div>
	<!--product-end-->