<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
use ishop\base\View;
/** @var $this View */
?>

<!DOCTYPE html>
<html>
<head>
<?=$this->getMeta(); ?>
<base href="/">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--Megamenu-->
<link href="megamenu/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="megamenu/css/ionicons.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?=PATH?>/images/favicon.png" rel="icon" type="image/png" sizes="32x32" />
<!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
<script src="js/jquery-1.11.0.min.js"></script>
<!--Custom-Theme-files-->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<!--<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>-->			
</head>
<body> 
	<!--top-header-->
	<div class="top-header">
		<div class="container">
			<div class="top-header-main">
				<div class="col-md-6 top-header-left">
					<div class="drop">
						<div class="box">	
							<?php new \app\widgets\currency\Currency(); ?>
						</div>
						<div class="box1">
							<?php new \app\widgets\language\Language() ?>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-6 top-header-left">
					<div class="cart box_1">
					<div class="btn-group">
						<?php $userText = !empty($_SESSION['user']) ?  'Wellcom, '.$_SESSION['user']['name'].' ' : 'Зареєструйся або увійди, КОЗЕЛ!!! ';?>
						<?php $userIcon = !empty($_SESSION['user']) ?  ' &#128521; ' : ' &#128520; ';?>
						<a class="dropdown-toggle" data-toggle="dropdown"><?=$userText;?><span class="caret"></span><span class="user-icon"><?=$userIcon;?></span></a>
						<ul class="dropdown-menu">
							<?php if(!empty($_SESSION['user'])): ?>
								<li><a href="#">My account</a></li>
								<li><a href="user/logout">Logout</a></li>
							<?php else: ?>
								<li><a href="user/login">Login</a></li>
								<li><a href="user/signup">Signup</a></li>
							<?php endif; ?>
						</ul>
					</div>
						<a href="cart/show" onclick="getCart(); return false;">
							<div class="total">
								<img src="images/cart-1.png" alt="" />
								<?php if(!empty($_SESSION['cart'])):?>
									<p><span class="simpleCart_total"><?= $_SESSION['cart.currency']['symbol_left'].bcmul($_SESSION['cart.sum'], $_SESSION['cart.currency']['value'],$round).$_SESSION['cart.currency']['symbol_right'] ?></span></p>
								<?php else: ?>
									<p><span class="simpleCart_total">Empty Cart</span></p>
								<?php endif; ?>
							</div>
						</a>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--top-header-->
	<!--start-logo-->
	<div class="logo">
		<a href="<?= base_url(); ?>"><h1>Luxury Watches</h1></a>
	</div>
	<!--start-logo-->
	<!--bottom-header-->
	<div class="header-bottom">
		<div class="container">
			<div class="header">
				<div class="col-sm-12 col-md-9 header-left">
					<div class="top-nav">
					<div class="menu-container">
						<div class="menu">
							<?php new app\widgets\menu\Menu([
								'tpl' => WWW . '/menu/menu.php'
							]); ?>
						</div>
					</div>
					</div>
				<div class="clearfix"> </div>
				</div>
				<div class="col-sm-6 col-md-3 header-right"> 
					<div class="search-bar">
						<form action="search" method="get" autocomplete="off">
							<input type="text" class="typeahead" id="typeahead" name="s">
							<input type="submit" value="">
						</form>
						<!--<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
						<input type="submit" value="">-->
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--bottom-header-->
	<?php
		//session_destroy();
	 	//debug($_SESSION);
		//debug($curr);
	?>
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php if(isset($_SESSION['error'])): ?>
						<div class="alert alert-danger">
							<?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
						</div>
					<?php endif; ?>
					<?php if(isset($_SESSION['success'])): ?>
						<div class="alert alert-success">
							<?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?= $this->content; ?>
	<!--information-starts-->
	<div class="information">
		<div class="container">
			<div class="infor-top">
				<div class="col-md-3 infor-left">
					<h3>Follow Us</h3>
					<ul>
						<li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
						<li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
						<li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Information</h3>
					<ul>
						<li><a href="#"><p>Specials</p></a></li>
						<li><a href="#"><p>New Products</p></a></li>
						<li><a href="#"><p>Our Stores</p></a></li>
						<li><a href="contact.html"><p>Contact Us</p></a></li>
						<li><a href="#"><p>Top Sellers</p></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>My Account</h3>
					<ul>
						<li><a href="account.html"><p>My Account</p></a></li>
						<li><a href="#"><p>My Credit slips</p></a></li>
						<li><a href="#"><p>My Merchandise returns</p></a></li>
						<li><a href="#"><p>My Personal info</p></a></li>
						<li><a href="#"><p>My Addresses</p></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Store Information</h3>
					<h4>The company name,
						<span>Lorem ipsum dolor,</span>
						Glasglow Dr 40 Fe 72.</h4>
					<h5>+955 123 4567</h5>	
					<p><a href="mailto:example@email.com">contact@example.com</a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--information-end-->
	<!--footer-starts-->
	<div class="footer">
		<div class="container">
			<div class="footer-top">
				<div class="col-md-6 footer-left">
					<form>
						<input type="text" value="Enter Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email';}">
						<input type="submit" value="Subscribe">
					</form>
				</div>
				<div class="col-md-6 footer-right">					
					<p>© 2015 Luxury Watches. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--footer-end-->
	<!--POPUP-->
	<div id="cart" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog modal-lg" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
					<h5 class="modal-title" id="myModalLabel">My Shopping Cart</h5>
      			</div>
      			<div class="modal-body">
					<!------ Shopping cart table ------>
      			</div>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
					<a href="cart/view" type="button" class="btn btn-primary">Оформить заказ</a>
        			<button type="button" class="btn btn-danger" onclick="clearCart()">Clear Cart</button>
      			</div>
    		</div>
  		</div>
	</div>
	<!--POPUP-END-->

	<div class="preloader">
		<img src="public/images/preloader.svg" alt="preload...">
	</div>

	<?php $curr = \ishop\App::$app->getProperty('currency'); ?>
	<script>
		let path = '<?=PATH;?>',
			course = <?=$curr['value'];?>,
			symbolLeft = '<?=$curr['symbol_left'];?>',
			symbolRight = '<?=$curr['symbol_right'];?>';
	</script>
	<script type="text/javascript" src="<?=PATH.'/public/megamenu/js/megamenu.js'?>"></script>
	
	<script src="js/jquery.easydropdown.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/validator.js"></script>
	<script src="js/typeahead.bundle.js"></script>
	<script src="js/main.js"></script>	

	<?php $this->getDbLogs(); ?>

</body>
</html>