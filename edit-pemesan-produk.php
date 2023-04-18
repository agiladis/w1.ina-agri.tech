<?php
	include('koneksi.php');

	if (isset($_GET['edit']) && isset($_GET['table'])) {
		$id = $_GET['edit'];
		$table = $_GET['table'];
		$query = "SELECT * FROM pemesan WHERE id = $id";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
	}
	
	if (isset($_POST['submit'])) {
		//ambil nilai dari form
		$kode = $_POST['kode'];
		$keterangan = $_POST['keterangan'];

		//memasukkan data ke dalam tabel
		$sql = "UPDATE pemesan SET kode='$kode', ket='$keterangan' WHERE id=$id ";
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

			$infoo =$usernow." mengganti detail kategori ".$kode ;
			mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");
			header("Location: list-pemesan-produk.php");
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
                                    <li class="breadcrumb-item"><a href="list-pemesan-produk.php">List Pemesan Produk</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<form method ="POST">
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">No. Produk</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" value="<?= $table;?>" type="number" readonly>
                        </div>
					</div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Kode</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="kode" value="<?= $row['kode'];?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Keterangan</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name ="keterangan" value="<?= $row['ket'];?>">
                        </div>
                    </div>
					<div class="clearfix">
						<div class="pull-right">
						<button	type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
						<!-- <a href="list-pemesan-produk.php" class="btn btn-primary btn-sm" role="button">Create</a> -->
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