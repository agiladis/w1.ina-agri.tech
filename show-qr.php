<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
	<?php include('koneksi.php'); ?>
</head>
<body>
	<?php include('include/header.php'); ?>
	<?php
	
	$usernow = $_SESSION['nama'];
		// GENERATE SERIAL NUMBER

		$id_batch_produksi = $_POST['batch_produksi'];
		$id_kategori_produk = $_POST['kategori_produk'];
		// query join produksi
		$query_produksi = mysql_query("SELECT * FROM batch_produksi LEFT JOIN pemesan ON batch_produksi.id_pemesan = pemesan.id WHERE batch_produksi.id = $id_batch_produksi ");
		$row_produksi = mysql_fetch_assoc($query_produksi);
		// query kategori
		$query_kategori = mysql_query("SELECT * FROM kategori_produk WHERE id = $id_kategori_produk ");
		$row_kategori = mysql_fetch_assoc($query_kategori);


		// INSERT INTO TABLE serial_number FIELD serial_number, LCD, PCB, LOADCELL
		$kode_pemesan = $row_produksi['kode'];
		$kode_kategori = $row_kategori['kode'];
		$kode_batch = $row_produksi['kode_batch'];
		$kode_nomor = $_POST['kode_nomor'];
		$LCD = $_POST['LCD'];
		$PCB = $_POST['PCB'];
		$LOADCELL = $_POST['LOADCELL'];
		$datee = date("d-m-Y H:i:s");

		$serial_number = $kode_pemesan . "-" . $kode_kategori . "-" . $kode_batch . "-" . $kode_nomor;

		$query_insert = mysql_query("INSERT INTO serial_number (id_batch, id_kategori, serial_number, LCD, PCB, LOADCELL) VALUES ('$id_batch_produksi', '$id_kategori_produk', '$serial_number', '$LCD', '$PCB', '$LOADCELL')");
		$infoo =$usernow." menambahkan serial number baru ".$serial_number ;
		mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");

		if(!$query_insert) {
			header("Location: create-serial-number.php?generate=failed");
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
								<h4>Serial Number</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Production</li>
									<li class="breadcrumb-item"><a href="create-serial-number.php">Create Serial Number</a></li>
									<li class="breadcrumb-item active" aria-current="page">Serial Number</li>
								</ol>
							</nav>
						</div>
		
					</div>
				</div>
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 id="serial_number" ><?= $serial_number ?></h4>
						</div>
					</div>
                    <div id="qrcode" class="width-50-p container text-center">
                    </div>
					<div class="footer-wrap pd-20 mb-20">
						<h4>Serial Number: <?= $serial_number ?> </h4>
					</div>
					<a href="serial-number.php" class="btn btn-success btn-lg" role="button">Back</a>
				</div>
			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<script src="vendors\scripts\jquery.min.js"></script>
	<?php include('include/script.php'); ?>
    <script src="vendors\scripts\jquery-qrcode-0.18.0.js"></script>
	<script>
		let text = document.getElementById('serial_number').innerText;
		$(document).ready(function() {
			$('#qrcode').qrcode({
                render: 'image',
                text: text,
				quiet: 4,
                mSize: 0.07,
                mPosX: 0.5,
                mPosY: 0.95,
                mode: 2,
                label: text,
                fontname: 'sans',
                fontcolor: '#000',
            });
		});

		window.open('print-qr.php?sn='+text,'_blank');
	</script>
</body>
</html>