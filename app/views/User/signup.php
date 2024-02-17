<?php $curr = \ishop\App::$app->getProperty('currency');
	$around = $curr['code'] == 'UAH' ? 0 : 2;
?>
<!--start-breadcrumbs-->
<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="<?= PATH; ?>">Home</a></li>
					<li class="active">Register</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--register-starts-->
	<div class="register">
		<div class="container">
			<div class="register-top heading">
				<h2>REGISTER</h2>
			</div>
			<div class="register-main">
                <div class="col-md-3"></div>
				<div class="col-md-6 account-left">
                    <form method="post" action="user/signup" id="signup" role="form" data-toggle="validator">
                    <div class="form-group has-feedback">
                        <label for="name">First Name:</label>
                        <input id="name" class="form-control" type="text" name="name" pattern="^[_A-zА-я-]{1,}$" maxlength="15" value="<?= isset($_SESSION['form_data']['name'])?h($_SESSION['form_data']['name']):''; ?>" placeholder="First name" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="last_name">Last Name:</label>
                        <input id="last_name" class="form-control" type="text" name="last_name" pattern="^[A-zА-я-]{1,}$" maxlength="30" value="<?= isset($_SESSION['form_data']['last_name'])?h($_SESSION['form_data']['last_name']):''; ?>" placeholder="Last name" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="email">Email:</label>
                        <input id="email" class="form-control" type="email" name="email" maxlength="50" value="<?= isset($_SESSION['form_data']['email'])?h($_SESSION['form_data']['email']):''; ?>" data-error="Bruh, that email address is invalid" placeholder="Email" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="mobile">Phone:</label>
                        <input id="mobile" class="form-control" type="tel" name="phone" pattern="^\+?[0-9]{1,3}?[-\s]{1}?\(?[0-9]{1,3}?\)?[-\s]{1}?[0-9]{1,4}[-\s]{1}?[0-9]{1,4}[-\s]{1}?[0-9]{1,9}$" maxlength="15" value="<?= isset($_SESSION['form_data']['phone'])?h($_SESSION['form_data']['phone']):''; ?>" placeholder="Phone" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="address">Address:</label>
                        <input id="address" class="form-control" type="text" name="address" pattern="^[A-zА-я0-9-]{1,}$" maxlength="100" value="<?= isset($_SESSION['form_data']['address'])?h($_SESSION['form_data']['address']):''; ?>" placeholder="Address" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
					<div class="form-group has-feedback">
                        <label for="login">Login:</label>
                        <input id="login" class="form-control" type="text" name="login" pattern="^[A-zА-я0-9-]{1,}$" maxlength="30" value="<?= isset($_SESSION['form_data']['login'])?h($_SESSION['form_data']['login']):''; ?>" placeholder="Login" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="password">Password:</label>
                        <input id="password" class="form-control" type="password" name="password" maxlength="30" data-error="Minimum of 6 characters" data-minlength="6" placeholder="Password" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="retype_pass">Retype password:</label>
                        <input id="retype_pass" class="form-control" type="password" data-match="#password" name="password" maxlength="30" data-match-error="Whoops, these don't match" placeholder="Retype password" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="address form-group has-feedback submit">
				        <input type="submit" class="btn btn-primary" value="Submit">
			        </div>
                    </form>
                    <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
				</div>
                <div class="col-md-3"></div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--register-end-->