<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
</head>
<body>
	<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
			<img src="images/logo-inastek-removebg.png" alt="login" class="login-img">
			<h2 class="text-center mb-30">Login</h2>
			<form action="login.php?op=in" method="POST" >
				<div class="input-group custom input-group-lg">
					<input name="user" type="text" class="form-control" placeholder="Username">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="input-group custom input-group-lg">
					<input name="password" type="password" class="form-control" placeholder="**********">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group">
							<!--
								use code for form submit
								<input class="btn btn-outline-primary btn-lg btn-block" type="submit" value="Sign In">
							-->
							<button class="btn btn-outline-primary btn-lg btn-block">
								Sign In
							</button>
						</div>
					</div>
					<div class="col-sm-6">
					<!--	
						<div class="forgot-password padding-top-10"><a href="forgot-password.php">Forgot Password</a></div>
					-->
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php include('include/script.php'); ?>
</body>
</html>