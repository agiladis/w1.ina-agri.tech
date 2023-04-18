<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
	<?php include('koneksi.php'); ?>
	<?php 
        // GET OLD DATA
        if (isset($_GET['edit'])) {
            $id = $_GET['edit'];

            $query_get = mysql_query("SELECT * FROM batch_produksi WHERE id = $id ");
            $row_edit = mysql_fetch_assoc($query_get);
        }
        
        // UPDATE TABLE
		if (isset($_POST['update'])) {
			$id_pemesan = $_POST['id_pemesan'];
			$kode_batch = $_POST['kode_batch'];
			$tgl_mulai = $_POST['tgl_mulai'];
			$tgl_akhir = $_POST['tgl_akhir'];

			$query_update = mysql_query("UPDATE batch_produksi SET id_pemesan = '$id_pemesan', kode_batch = '$kode_batch', tgl_mulai = '$tgl_mulai', tgl_akhir = '$tgl_akhir' WHERE id = '$id' ");

			if ($query_update) {
				header("Location: batch-production-table.php?update=successed");
			} else {
				header("Location: edit-batch-production.php?id=$id&update=failed");
			}
		}
	?>
</head>
<body>
	<?php include('include/header.php'); ?>
	<?php 
		if (isset($_POST['update'])) {
			$usernow = $_SESSION['nama'];
			$datee = date("d-m-Y H:i:s");

			$infoo =$usernow." mengganti detail pada batch code ".$kode_batch ;
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
								<h4>Edit Data</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Production</li>
                                    <li class="breadcrumb-item"><a href="batch-production-table.php">Batch Production</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Data</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<form action="" method="POST">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Pemesan Produk</label>
							<div class="col-sm-12 col-md-10">
								<select name="id_pemesan" class="custom-select col-12">
									<option disabled selected>Choose...</option>
									<?php 
										// GET ID PEMESAN FROM TBL PEMESAN
										$query_pemesan = mysql_query("SELECT * FROM pemesan");
										$data_pemesan = mysql_fetch_assoc($query_pemesan);
										do {										
									?>
										<option value="<?= $data_pemesan['id']; ?>" <?php if ($row_edit['id_pemesan'] == $data_pemesan['id']) echo 'selected="selected"'; ?> ><?=$data_pemesan['kode'] . "-" . $data_pemesan['ket']; ?></option>
									<?php } while($data_pemesan = mysql_fetch_assoc($query_pemesan)); ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Batch Code</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="kode_batch" placeholder="Code" type="number" value="<?= $row_edit['kode_batch'] ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Tanggal Mulai Produksi</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control date-picker" name="tgl_mulai" placeholder="Select Date" type="text" value="<?= $row_edit['tgl_mulai'] ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Tanggal Akhir Produksi</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control date-picker" name="tgl_akhir" placeholder="Select Date" type="text" value="<?= $row_edit['tgl_akhir'] ?>">
							</div>
						</div>
						<div class="clearfix">
							<div class="pull-right">
								<button type="submit" name="update" class="btn btn-primary btn-sm" role="button">Create</button>
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