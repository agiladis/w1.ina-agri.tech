<?php
	include('koneksi.php');


	if (isset($_GET['edit']) && isset($_GET['table'])) {
		$id = $_GET['edit'];
		$table = $_GET['table'];
		$query = "SELECT * FROM kategori_produk WHERE id = $id";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
	}
	
	if (isset($_POST['submit'])) {
		//ambil nilai dari form
		$kode_produk = $_POST['kode_produk'];
		$detail_produk = $_POST['detail_produk'];

		//memasukkan data ke dalam tabel
		$sql = "UPDATE kategori_produk SET kode='$kode_produk', detail='$detail_produk' WHERE id=$id ";
		$result = mysql_query($sql);
		//redirect ke halaman list-kategori-produk.php jika data berhasil disimpan
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
</head>
<body>
	<?php include('include/header.php'); ?>
	<?php 
		if (isset($_POST['submit'])) {
			$usernow = $_SESSION['nama'];
			$datee = date("d-m-Y H:i:s");

			$infoo =$usernow." mengganti detail kategori ".$kode_produk ;
			mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");
			header("Location: list-kategori-produk.php");
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
                                    <li class="breadcrumb-item"><a href="list-kategori-produk.php">List Kategori Produk</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<form method="POST">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">No. Produk</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="<?= $table;?>" name="no_produk" type="number" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Kode</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="kode_produk" type="text" value="<?= $row['kode'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Detail</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="detail_produk" type="text" value="<?= $row['detail'];?>">
							</div>
						</div>
	
						<div class="clearfix">
							<div class="pull-right">
							<button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
								<!-- <a href="javascript:void(0);" type="submit" name="submit" class="btn btn-primary btn-sm" role="button">Create</a> -->
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