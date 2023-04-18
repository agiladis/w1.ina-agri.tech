<?php
session_start();
if(isset($_POST['register'])){
	require_once("koneksi.php");
	$nama = $_POST['nama'];
	$level = $_POST['level'];
	$username = $_POST['username'];
	$pass = $_POST['password'];
	$pass2 = $_POST['password2'];
	$ugroup = $_POST['ugroup'];
	$datee = date("d-m-Y H:i:s");
	$usernow = $_SESSION['nama'];

	$cekuser = mysql_query("SELECT * FROM userlist WHERE user = '$username'");
	if($pass==$pass2){
		if(mysql_num_rows($cekuser) > 0) {
		$message="Username Sudah Terdaftar!";
		} else {
		if(!$username || !$pass || !$level || !$nama) {
			$message="Masih ada data yang kosong!";
		} else {
		$simpan = mysql_query("INSERT INTO userlist(user, nama, password, level,ugroup) VALUES('$username','$nama','".sha1($pass)."','$level','$ugroup')");
		if($simpan) {
			$message="Pendaftaran Sukses!";
			$infoo ="Pendaftaran user baru (".$nama.") oleh ".$usernow ;
			mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");

		} else {
			$message="Proses Gagal!";
		}
		}
		}
	} else{
		$message=" Retype-Password tidak sama! ";
		}
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
								<h4>Create New User</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Account</li>
									<li class="breadcrumb-item active" aria-current="page">Create New User</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Create New User</h4>
							<p></p>
						</div>
					</div>
					<form method="POST">
					<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">User Group</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="ugroup">
									<option selected="">Pilih...</option>
									<option value="Engineer">Engineer</option>
									<option value="PPIC">PPIC</option>
									<option value="QC">QC</option>
                                    <option value="Warehouse">Warehouse</option>
								</select>
							</div>
					</div>
					<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Previlege</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="level">
									<option selected="">Pilih...</option>
                                    <option value="root">Root</option>
									<option value="admin">Admin</option>
								</select>
							</div>
					</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Nama Lengkap</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="John Brown" name="nama">
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Username (for login)</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="johnbrown_" name="username">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Password (for login)</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="" type="password" name="password">
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Retype Password (for login)</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="" type="password" name="password2">
							</div>
						</div>
					<div class="clearfix">
						<div class="pull-right">
							<button name="register" type="submit" class="btn btn-primary btn-sm scroll-click"  data-toggle="collapse" role="button"> Register </button>
						</div>
					</div>
				</div>	
				<!-- Default Basic Forms End -->
			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
</body>
</html>