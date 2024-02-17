<?php $curr = \ishop\App::$app->getProperty('currency');
	$around = $curr['code'] == 'UAH' ? 0 : 2;
?>
<!--start-breadcrumbs-->
<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
				<li class="active">Checkout</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
    <!--start-ckeckout-->
	<div class="prdt">
		<div class="container">
            <div class="prdt-top">
                <div class="col-md-12">
                     <div class="product-one cart">
                        <div class="register-top heading">
                            <h2>CHECKOUT</h2>
                        </div>
                        <br><br>
                        <?php if(!empty($_SESSION['cart'])): ?>
                        <div class="table-responsive">
                            <h3>My Shopping Bag</h3>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Product name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $around = $_SESSION['cart.currency']['code'] == 'UAH' ? 0 : 2; ?>
                                    <?php foreach($_SESSION['cart'] as $id => $item): ?>
                                    <tr>
                                        <td><a href="product/<?=$item['alias'];?>"><img id="cart-img" src="images/<?=$item['img'];?>" alt=""></a></td>
                                        <td><a href="product/<?=$item['alias'];?>"><?=$item['title'];?></a></td>
                                        <td><?=$item['qty'];?></td>
                                        <td><?=$_SESSION['cart.currency']['symbol_left'].bcmul($item['price'] * $_SESSION['cart.currency']['value'],$item['qty'],$around).$_SESSION['cart.currency']['symbol_right'];?></td>
                                        <td><a href="/cart/delete/?id=<?=$id;?>"><span data-id="<?=$id;?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td>Quantity:</td>
                                        <td colspan="4" class="text-right cart-qty"><?=$_SESSION['cart.qty'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Sum:</td>
                                        <td colspan="4" class="text-right cart-sum"><?=$_SESSION['cart.currency']['symbol_left'].bcmul($_SESSION['cart.sum'], $_SESSION['cart.currency']['value'], $around).$_SESSION['cart.currency']['symbol_right'];?></td>
                                    </tr>
                                </tbody>
                            </table>	
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-6 account-left">
                            <form method="post" action="cart/checkout" id="" role="form" data-toggle="validator">
                            <div class="form-group has-feedback">
                                <label for="name">First Name:</label>
                                <input id="name" class="form-control" type="text" name="name" pattern="^[_A-zА-я-]{1,}$" maxlength="15" value="<?= isset($_SESSION['user']['name'])?h($_SESSION['user']['name']):''; ?>" placeholder="First name" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="last_name">Last Name:</label>
                                <input id="last_name" class="form-control" type="text" name="last_name" pattern="^[A-zА-я-]{1,}$" maxlength="30" value="<?= isset($_SESSION['user']['last_name'])?h($_SESSION['user']['last_name']):''; ?>" placeholder="Last name" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="email">Email:</label>
                                <input id="email" class="form-control" type="email" name="email" maxlength="50" value="<?= isset($_SESSION['user']['email'])?h($_SESSION['user']['email']):''; ?>" data-error="Bruh, that email address is invalid" placeholder="Email" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="mobile">Phone:</label>
                                <input id="mobile" class="form-control" type="tel" name="phone" pattern="^\+?[0-9]{1,3}?[-\s]{1}?\(?[0-9]{1,3}?\)?[-\s]{1}?[0-9]{1,4}[-\s]{1}?[0-9]{1,4}[-\s]{1}?[0-9]{1,9}$" maxlength="15" value="<?= isset($_SESSION['user']['phone'])?h($_SESSION['user']['phone']):''; ?>" placeholder="Phone" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="address">Address:</label>
                                <input id="address" class="form-control" type="text" name="address" pattern="^[A-zА-я0-9-]{1,}$" maxlength="100" value="<?= isset($_SESSION['user']['address'])?h($_SESSION['user']['address']):''; ?>" placeholder="Address" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="note">Ваші побажання:</label><br>
                                <textarea name="note" id="note" cols="60" rows="5"></textarea>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="address form-group has-feedback submit">
                                <input type="submit" class="btn btn-primary" value="Checkout">
                            </div>
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="clearfix"></div>
                        <p class="text-danger"><b>**Увага!!! Будьласка вказуйте дійсний номер телефону та Email. Якщо наші менеджери не зможуть з Вами зв'язатися для підтвердження замовлення, товари відправлені не будуть!</b></p>
                        <?php else: ?>
                        <h3>Shopping cart is empty!</h3>
                        <?php endif; ?>
                     </div>
                </div>
            </div>
		</div>
	</div>
	<!--end-ckeckout-->