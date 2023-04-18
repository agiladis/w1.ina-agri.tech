<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Default Date now
date_default_timezone_set("Asia/Jakarta");
$date = date('d F Y ', time());

if(isset($_POST['register'])){
	require_once("koneksi.php");
	$tgl = $_POST['tgl'];
	$batch = $_POST['batch'];
	$kardus = $_POST['kardus'];
	$jenis = $_POST['jenis'];
	$qty = $_POST['qty'];
	$datee = date("d-m-Y H:i:s");
	$usernow = $_SESSION['nama'];

	
	if(!$tgl || !$qty || !$batch || !$kardus || !$jenis){
		$message="Masih ada data yang kosong!";
	} else {
		$simpan = mysql_query("INSERT INTO perangkat(unit_barang,tgl_datang,no_batch,no_kardus,nama_perangkat) VALUES('$qty','$tgl','$batch','$kardus','$jenis')");
		if($simpan) {
			$message="Berhasil Menyimpan!";
			$infoo ="User ".$usernow." menambahkan item incoming hardware" ;
			mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");

		} else {
			$message="Proses Gagal!";
		}
	}
	echo "<script type='text/javascript'>alert('$message');</script>";
	
}

if(isset($_POST['sdelete'])){
	require_once("koneksi.php");
	$sdelete = $_POST['sdelete'];
	mysql_query("DELETE FROM perangkat WHERE id=$sdelete");
}
elseif(isset($_POST['good'])){
	$penanggung_jawab = $_SESSION['nama'];
	require_once("koneksi.php");
	$id_good = $_POST['good'];
	mysql_query("UPDATE perangkat SET kondisi = 'Good', penanggung_jawab = '$penanggung_jawab' WHERE id ='$id_good'");
}
elseif(isset($_POST['bad'])){
	$penanggung_jawab = $_SESSION['nama'];
	require_once("koneksi.php");
	$id_bad = $_POST['bad'];
	mysql_query("UPDATE perangkat SET kondisi = 'Bad', penanggung_jawab = '$penanggung_jawab' WHERE id ='$id_bad'");
}
?>



<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">
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
								<h4>List Incoming Hardware</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Incoming</li>
									<li class="breadcrumb-item active" aria-current="page">List Incoming</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>

				<!-- Input User Incoming Hardware -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">New Incoming Entry</h4>
							<p></p>
						</div>
					</div>
					<form method="POST" autocomplete="off">
					<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Jenis Barang</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="jenis">
									<option selected="">Pilih...</option>
									<option value="LCD">LCD</option>
									<option value="PCB-TDWS">PCB-TDWS</option>
									<option value="PCB-BBWS ">PCB-BBWS</option>
                                    <option value="Loadcell-TDWS">Loadcell-TDWS</option>
									<option value="Loadcell-BBWS">Loadcell-BBWS</option>
								</select>
							</div>
					</div>

					<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Banyaknya Barang (unit)</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="cth : 24" name="qty">
							</div>
					</div>

					<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">No Bacth</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="cth : 12" name="batch">
							</div>
					</div>

					<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">No Kardus</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="cth : 13" name="kardus">
							</div>
					</div>

					<div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Tanggal Kedatangan</label>
                        <div class="col-sm-12 col-md-10">
							<input class="form-control date-picker" value="<?= $date;?>" name="tgl">
                        </div>
                    </div>
                    
					<div class="clearfix">
						<div class="pull-right">
							<button name="register" type="submit" class="btn btn-primary btn-sm scroll-click"  data-toggle="collapse" role="button"> Entry </button>
						</div>
					</div>
				</div>	
				<!-- END - Input User Incoming Hardware -->


				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="row invoice-wrap">
						<table class='data-table stripe hover nowrap'>
						<thead>
								<tr>
									<th class="table-plus">No.</th>
									<th>Jenis Perangkat</th>
									<th>Qty</th>
									<th>No. Batch</th>
									<th>No. Kardus</th>
									<th>Tangal Incoming</th>
									<th>Quality Control</th>
                                    <th>Aksi</th>
                                    <th class="datatable-nosort"></th>
								</tr>
							</thead>
							<tbody>
								<?php
									include "koneksi.php";
									$query_mysql = mysql_query("SELECT * FROM perangkat")or die(mysql_error());
									$numb=1;
									while($data = mysql_fetch_array($query_mysql)){
										$status = '';
										if ($data['kondisi'] == 'Bad') {
											$status = '<i class="fa fa-times" style="color:red"></i>'; // tanda silang merah
										} else if ($data['kondisi'] == 'Good') {
												$status = '<i class="fa fa-check" style="color:green"></i>'; // tanda centang hijau
										}
								?>

								<tr>
									<td class="table-plus"> <?php echo $numb; ?> </td>
									<td> <?php echo $data['nama_perangkat']; ?> </td>
                                    <td> <?php echo $data['unit_barang']; ?> Unit</td>
									<td> Batch-No.<?php echo $data['no_batch']; ?></td>
									<td> Box-No.<?php echo $data['no_kardus']; ?></td>
									<td> <?php echo $data['tgl_datang']; ?></td>
									<td class="text-center"> 
										<?php if ($status != null)
											echo $status . "(" . $data['penanggung_jawab'] . ")";
										?>

									</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
											<form method="POST">
												<button class="dropdown-item" name="good" value="<?php echo $data['id']; ?>" type="submit" ><i class="fa fa-check" style="color:green"></i> Good</a>
												<button class="dropdown-item" name="bad" value="<?php echo $data['id']; ?>" type="submit" ><i class="fa fa-times" style="color:red"></i> Bad</a>
												<button onclick="return confirm('Are you sure you want to delete this item?');" class="dropdown-item" name="sdelete" value="<?php echo $data['id']; ?>" type="submit" ><i class="fa fa-trash"></i> Delete</a>
											</form>
											</div>
										</div>
									</td>
								</tr>

							<?php
							$numb++;
							}
							?>

							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
	<script src="src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
	<script src="src/plugins/datatables/media/js/dataTables.responsive.js"></script>
	<script src="src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/media/js/button/dataTables.buttons.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.bootstrap4.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.print.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.html5.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.flash.js"></script>
	<script src="src/plugins/datatables/media/js/button/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/media/js/button/vfs_fonts.js"></script>
	<script>
		$('document').ready(function(){
			$('.data-table').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
			});
			$('.data-table-export').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
				dom: 'Bfrtip',
				buttons: [
				'copy', 'csv', 'pdf', 'print'
				]
			});
			
		});

		
	</script>
</body>
</html>
