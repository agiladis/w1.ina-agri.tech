<!DOCTYPE html>
<html>

<head>
	<?php include('include/head.php'); ?>
	<?php include('koneksi.php'); ?>
	<?php
	// GET LAST BATCH NUMBER
	$query_batch = mysql_query("SELECT * FROM batch_produksi ORDER BY id DESC LIMIT 1");
	$row_batch = mysql_fetch_assoc($query_batch);

	if (mysql_num_rows($query_batch)) {
		$batch_number = $row_batch['kode_batch'] + 1;
	} else {
		$batch_number = 1;
	}
	?>
</head>

<body>
	<?php include('include/header.php'); ?>
	<?php
	if (isset($_POST['create'])) {
		$usernow = $_SESSION['nama'];
		$datee = date("d-m-Y H:i:s");

		$infoo = $usernow . " menambahkan batch baru dengan code " . $kode_batch;
		mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");
	}
	?>

	<?php include('include/sidebar.php'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Create New</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Production</li>
									<li class="breadcrumb-item"><a href="batch-production-table.php">Batch Production</a></li>
									<li class="breadcrumb-item active" aria-current="page">Create New</li>
								</ol>
							</nav>
						</div>

					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<form method="POST" action="create-batch.php" autocomplete="off" name="myForm" onsubmit="return validateForm()">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Pemesan Produk</label>
							<div class="col-sm-12 col-md-10">
								<select id="id_pemesan" name="id_pemesan" class="custom-select col-12" onchange="selectPemesan()">
									<option selected="">Choose...</option>
									<?php
									// GET ID PEMESAN FROM TBL PEMESAN
									$query_pemesan = mysql_query("SELECT * FROM pemesan");
									$data_pemesan = mysql_fetch_assoc($query_pemesan);
									do {
									?>
										<option value="<?= $data_pemesan['id']; ?>"><?= $data_pemesan['kode'] . "-" . $data_pemesan['ket']; ?></option>
									<?php } while ($data_pemesan = mysql_fetch_assoc($query_pemesan)); ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Product Category</label>
							<div class="col-sm-12 col-md-10">
								<select id="kategori-produk" name="kategori_produk" class="custom-select col-12" onchange="selectCategory()">
									<!-- <select id="kategori_produk" name="kategori_produk" class="custom-select col-12" onchange="changeData(this.value);"> -->
									<option selected="" value="0">Choose...</option>
									<?php
									// GET kode kategori FROM TBL kategori_produk
									$query_category = mysql_query("SELECT * FROM kategori_produk");
									$data_category = mysql_fetch_assoc($query_category);
									do {
									?>
										<option value="<?= $data_category['id']; ?>"><?= $data_category['kode'] . " - " . $data_category['detail']; ?></option>
									<?php } while ($data_category = mysql_fetch_assoc($query_category)); ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Tanggal Mulai Produksi</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control date-picker" name="tgl_mulai" placeholder="Select Date" type="text">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Batch Code</label>

							<div id="nomor_batch" class="col-sm-12 col-md-10">
								<input class="form-control" name="kode_batch" type="text" readonly>

							</div>
						</div>
						<div id="conditional-form">
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Jumlah</label>
								<div id="jumlah-container" class="col-sm-12 col-md-10">
									<input name="jumlah" class="form-control" type="text" value="100" readonly>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">LCD</label>
								<div class="col-sm-12 col-md-10">
									<select name="LCD" class="custom-select col-12">
										<option selected value="0">Select product category first</option>

									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">PCB</label>
								<div class="col-sm-12 col-md-10">
									<select name="PCB" class="custom-select col-12">
										<option selected>Select product category first</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Load Cell</label>
								<div class="col-sm-12 col-md-10">
									<select name="LOADCELL" class="custom-select col-12">
										<option selected>Select product category first</option>
									</select>
								</div>
							</div>
						</div>
						<div class="clearfix">
							<div class="pull-right">
								<input type="submit" name="submit" class="btn btn-primary btn-sm" value="Create">
							</div>
						</div>
					</form>
				</div>
				<!-- Default Basic Forms End -->
			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="./vendors/scripts/request-by-category.js"></script>
	<?php include('include/script.php'); ?>
</body>

</html>