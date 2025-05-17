<?php $curr = \ishop\App::$app->getProperty('currency');
	$round = $curr['code'] == 'UAH' ? 0 : 2;
?>
<!--start-breadcrumbs-->
<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li class="active">Login</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--register-starts-->
	<div class="register">
		<div class="container">
			<div class="register-top heading">
				<h2>Log In</h2>
			</div>
			<div class="register-main">
			<div class="col-md-4"></div>
			<div class="col-md-4 account-left">
				<form method="post" action="user/login" id="login" role="form" data-toggle="validator">
					<div class="form-group has-feedback">
						<label for="login">Login:</label>
						<input id="login" name="login" placeholder="Login" type="text" class="form-control" maxlength="30" pattern="^[A-zА-я0-9-]{1,}$" required>
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label for="password">Password:</label>
						<input id="password" name="password" placeholder="Password" type="password" class="form-control" maxlength="30" data-error="Minimum of 6 characters" data-minlength="6"  required>
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<input type="checkbox" name="remember"><span> Remember me</span>
					</div>
					<div class="alert alert-danger">
						<a class="text-danger" href="<?php PATH?>/user/signup"><b>Зареєструватися!</b></a>
					</div>
					<div class="address submit form-group has-feedback">
						<input type="submit" class="btn btn-primary" value="Login">
					</div>
				</form>
				
			</div>
			<div class="col-md-4"></div>
			<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--register-end-->