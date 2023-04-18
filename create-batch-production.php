<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
	<?php include('koneksi.php'); ?>
	<?php 
		if (isset($_POST['create'])) {
			$id_pemesan = $_POST['id_pemesan'];
			$kode_batch = $_POST['kode_batch'];
			$tgl_mulai = $_POST['tgl_mulai'];
			$tgl_akhir = $_POST['tgl_akhir'];

			$query_create = mysql_query("INSERT INTO batch_produksi (id_pemesan, kode_batch, tgl_mulai, tgl_akhir) VALUES ('$id_pemesan', '$kode_batch', '$tgl_mulai', '$tgl_akhir')");
			
			if ($query_create) {
				header("Location: batch-production-table.php?create=success");
			} else {
				header("Location: create-batch-production.php?create=failed");
			}
		}

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

			$infoo =$usernow." menambahkan batch baru dengan code ".$kode_batch ;
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
					<form action="" method="POST" autocomplete="off">
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
										<option value="<?= $data_pemesan['id']; ?>"><?=$data_pemesan['kode'] . "-" . $data_pemesan['ket']; ?></option>
									<?php } while($data_pemesan = mysql_fetch_assoc($query_pemesan)); ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Batch Code</label>
              
							<div id="nomor_batch" class="col-sm-12 col-md-10">
								<input class="form-control" name="kode_batch" type="text" readonly>

							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Tanggal Mulai Produksi</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control date-picker" name="tgl_mulai" placeholder="Select Date" type="text">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Tanggal Akhir Produksi</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control date-picker" name="tgl_akhir" placeholder="Select Date" type="text">
							</div>
						</div>
						<div class="clearfix">
							<div class="pull-right">
								<button type="submit" name="create" class="btn btn-primary btn-sm" role="button">Create</button>
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