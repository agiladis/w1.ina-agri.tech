<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
$usernow = $_SESSION['nama'];
$datee = date("d-m-Y H:i:s");

if (isset($_POST['sdelete'])) {
	require_once("koneksi.php");
	$sdelete = $_POST['sdelete'];

	$query_delete = mysql_query("SELECT * FROM perangkat WHERE id=$sdelete");
	$row_delete = mysql_fetch_assoc($query_delete);
	$infoo = $usernow . " melakukan delete pada perangkat " . $row_delete['nama_perangkat'] . " dengan no batch-" . $row_delete["no_batch"];
	mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");

	mysql_query("DELETE FROM perangkat WHERE id=$sdelete");
} elseif (isset($_POST['good'])) {
	$penanggung_jawab = $_SESSION['nama'];
	require_once("koneksi.php");
	$id_good = $_POST['good'];

	$query_good = mysql_query("SELECT * FROM perangkat WHERE id=$id_good");
	$row_good = mysql_fetch_assoc($query_good);
	$infoo = $usernow . " mengubah QC pada perangkat " . $row_good['nama_perangkat'] . " batch ke-" . $row_good["no_batch"] . " dengan kondisi Good";
	mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");

	mysql_query("UPDATE perangkat SET kondisi = 'Good', penanggung_jawab = '$penanggung_jawab' WHERE id ='$id_good'");
} elseif (isset($_POST['not-good'])) {
	$penanggung_jawab = $_SESSION['nama'];
	require_once("koneksi.php");
	$id_not_good = $_POST['not-good'];

	$query_not_good = mysql_query("SELECT * FROM perangkat WHERE id=$id_not_good");
	$row_not_good = mysql_fetch_assoc($query_not_good);
	$infoo = $usernow . " mengubah QC pada perangkat " . $row_not_good['nama_perangkat'] . " batch ke-" . $row_not_good["no_batch"] . " dengan kondisi Not Good";
	mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");

	mysql_query("UPDATE perangkat SET kondisi = 'Not Good', penanggung_jawab = '$penanggung_jawab' WHERE id ='$id_not_good'");
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
									<li class="breadcrumb-item">Quality Control</li>
									<li class="breadcrumb-item active" aria-current="page">Incoming-QC</li>
								</ol>
							</nav>
						</div>

					</div>
				</div>

				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="row invoice-wrap">
						<table class='data-table stripe hover'>
							<thead>
								<tr>
									<th class="table-plus">No.</th>
									<th class="text-center">Jenis Perangkat</th>
									<!-- <th class="text-center">Qty</th> -->
									<th class="text-center">No. Batch</th>
									<!-- <th class="text-center">No. Kardus</th> -->
									<th class="text-center">Tangal Incoming</th>
									<th class="text-center">Quality Control</th>
									<th class="text-center">Data QC (Critical/Major/Minor)</th>
									<th class="text-center">No. Surat Jalan</th>
									<th class="text-center">Sudah Digunakan</th>
									<th class="text-center">Aksi</th>
									<!-- <th class="datatable-nosort"></th> -->
								</tr>
							</thead>
							<tbody>
								<?php
								include "koneksi.php";
								$query_mysql = mysql_query("SELECT * FROM perangkat ORDER BY kondisi = 'NULL' ASC, id ASC") or die(mysql_error());
								$numb = 1;
								while ($data = mysql_fetch_array($query_mysql)) {
									$status = '';
									if ($data['kondisi'] == 'Not Good') {
										$status = '<i class="fa fa-times" style="color:red"></i>'; // tanda silang merah
									} else if ($data['kondisi'] == 'Good') {
										$status = '<i class="fa fa-check" style="color:green"></i>'; // tanda centang hijau
									}
								?>

									<tr>
										<td class="table-plus"> <?php echo $numb; ?> </td>
										<td> <?php echo $data['nama_perangkat']; ?> </td>
										<!-- <td> <?php echo $data['unit_barang']; ?> Unit</td> -->
										<td><?php echo $data['no_batch'] . "." . str_pad($data['no_kardus'], 3, "0", STR_PAD_LEFT) . ".100"; ?></td>
										<!-- <td><?php echo $data['no_kardus']; ?></td> -->
										<td> <?php echo $data['tgl_datang']; ?></td>
										<td class="text-center">
											<?php if ($status != null) :
												echo $status . "<br/>(" . $data['penanggung_jawab'] . ")";
											?>
											<?php else :
												echo "belum qc";
											?>
											<?php endif ?>

										</td>
										<td class="text-center"> <?php echo $data['qc_critical'] . ' / ' . $data['qc_major'] . ' / ' . $data['qc_minor']; ?></td>
										<td class="text-center"> <?php echo $data['no_surat_jalan']; ?></td>
										<td class="text-center"> <?php echo boolval($data['taken']) ? '<i class="fa fa-check" style="color:green"></i>' : ''; ?></td>
										<td>
											<div class="dropdown">
												<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
													<i class="fa fa-ellipsis-h"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="input-qc-param.php?id_unit=<?= $data['id'] ?>&no=<?= $data['no_batch'] . '.' . $data['no_kardus'] . '.' . $data['unit_barang'] ?>&unit=<?= $data['unit_barang'] ?>&kategori=<?= $data['nama_perangkat'] ?>"><i class="fa fa-pencil"></i>Input QC Data</a>
													<form method="POST">
														<!-- <button class="btn dropdown-item" name="good" value="<?php echo $data['id']; ?>" type="submit"><i class="fa fa-check" style="color:green"></i> Good</button>
														 <button class="btn dropdown-item" name="not-good" value="<?php echo $data['id']; ?>" type="submit"><i class="fa fa-times" style="color:red"></i> Not Good</button> -->
														<button onclick="return confirm('Are you sure you want to delete this item?');" <?php echo $acc1; ?> class="btn dropdown-item" name="sdelete" value="<?php echo $data['id']; ?>" type="submit"><i class="fa fa-trash"></i> Delete</button>
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
		$('document').ready(function() {
			$('.data-table').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [
					[10, 25, 50, -1],
					[10, 25, 50, "All"]
				],
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
				"lengthMenu": [
					[10, 25, 50, -1],
					[10, 25, 50, "All"]
				],
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