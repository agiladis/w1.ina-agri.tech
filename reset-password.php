<?php

session_start();
require_once("koneksi.php");

if (isset($_GET['userId'])) {
	$idid = $_GET['userId'];
}

if (isset($_POST['update'])) {
	// $user = $_SESSION['user'];
	// $passold = $_POST['passold'];
	$passnew = $_POST['passnew'];
	$passnew2 = $_POST['passnew2'];

	$cekuser = mysql_query("SELECT * FROM userlist WHERE idid = '$idid' ");
	if (mysql_num_rows($cekuser) > 0) {
		//$message="cocok";
		if ($passnew == $passnew2) {
			//$message="cocok kuadrat";
			$simpan = mysql_query("UPDATE userlist SET password='" . sha1($passnew2) . "' WHERE idid='$idid' ");
			if ($simpan) {
				$message = "Update Password Sukses!";
			} else {
				$message = "Terjadi Galat!";
			}
		} else {
			$message = "Ketik ulang password baru Anda salah!";
		}
	} // else {
	// 	$message = "Password lama Anda Salah!";
	// }

	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
	<?php include('include/head.php'); ?>
</head>

<body>
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Akun</li>
									<li class="breadcrumb-item active" aria-current="page">Reset Password</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-3">
						<div class="pull-left">
							<h4 class="text-blue">Reset Password</h4>
						</div>
					</div>
					<form method="POST">
						<!-- <div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Current Password</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" value="" type="password" name="passold">
								</div>
							</div> -->
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">New Password</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="" type="password" name="passnew">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Retype New Password</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="" type="password" name="passnew2">
							</div>
						</div>
						<div class="clearfix">
							<div class="pull-right">
								<button name="update" type="submit" class="btn btn-primary btn-sm scroll-click" data-toggle="collapse" role="button"> Change Password </button>
							</div>
						</div>
					</form>
				</div>
				<!-- Default Basic Forms End -->
			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
</body>

</html>