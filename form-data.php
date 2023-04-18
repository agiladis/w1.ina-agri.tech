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
									<li class="breadcrumb-item active" aria-current="page">Form Database</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									January 2018
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Form Pendaftaran</h4>
							<p class="mb-30 font-14">...</p>
						</div>
					</div>
					<form>
					<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Divisi</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12">
									<option selected="">Choose...</option>
                                    <option value="0">Admin Root</option>
									<option value="1">Engineer</option>
									<option value="2">PPIC</option>
									<option value="3">QC</option>
                                    <option value="3">Warehouse</option>
								</select>
							</div>
					</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Nama</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="Aushaf F.">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Username</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="aushafganteng1">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Password</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="password" type="password">
							</div>
						</div>
					</form>
					<div class="clearfix">
						<div class="pull-right">
							<a href="#" class="btn btn-primary btn-sm scroll-click"  data-toggle="collapse" role="button">Submit</a>
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