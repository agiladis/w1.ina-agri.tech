<!DOCTYPE html>
<html>

<head>


	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">
</head>

<body>
	<?php include('include/header.php'); ?>
	<?php include('include/head.php'); ?>
	<?php include('koneksi.php'); ?>
	<?php
	$query = mysql_query("SELECT * FROM serial_number ORDER BY id DESC");
	$row_serial_number = mysql_fetch_assoc($query);

	// HANDLE DELETE
	if (isset($_GET['delete'])) {
		$id = $_GET['delete'];
		$query_sn = mysql_query("SELECT * FROM serial_number where id=$id");
		$row_sn = mysql_fetch_assoc($query_sn);
		$query_delete = mysql_query("DELETE FROM serial_number WHERE id = $id ");
		if ($query_delete) {
			header('Location: serial-number.php');
		}
		$datee = date("d-m-Y H:i:s");
		$usernow = $_SESSION['nama'];
		$infoo = $usernow . " menghapus serial number " . $row_sn['serial_number'];
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
								<h4>List Serial Number</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Production</li>
									<li class="breadcrumb-item active" aria-current="page">List Serial Number</li>
								</ol>
							</nav>
						</div>

					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<!-- <div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-blue">Data Table Simple</h5>
							<p class="font-14">you can find more options <a class="text-primary" href="https://datatables.net/" target="_blank">Click Here</a></p>
						</div>
					</div> -->
					<!-- <div class="clearfix mb-20"> -->
					<!-- <div class="pull-left"> -->
					<!-- <a href="create-serial-number.php" class="btn btn-success btn-lg" role="button">Create New</a> -->
					<!-- <a href="create-serial-number.php" class="btn btn-success btn-lg" role="button">Print All</a> -->
					<!-- </div> -->
					<!-- </div> -->
					<div class="row">
						<table class='data-table stripe hover nowrap'>
							<thead>
								<tr>
									<th class="table-plus">No.</th>
									<th>Code</th>
									<th>Detail</th>
									<th>Quality Control</th>
									<th class="datatable-nosort"></th>
								</tr>
							</thead>
							<tbody>

								<?php if (mysql_num_rows($query) == 0) : ?>
									<tr>
										<td colspan="4" class="text-center font-weight-bold font-italic">It's empty in here.</td>
									</tr>
									<?php else : $i = 1;
									do {
										$status = '';
										if ($row_serial_number['kondisi_final'] == 'Not Good') {
											$status = '<i class="fa fa-times" style="color:red"></i>'; // tanda silang merah
										} else if ($row_serial_number['kondisi_final'] == 'Good') {
											$status = '<i class="fa fa-check" style="color:green"></i>'; // tanda centang hijau
										}

										//Menganbil data LCD
										$id_lcd = $row_serial_number['LCD'];
										$query_lcd = mysql_query("SELECT * FROM perangkat WHERE id = $id_lcd");
										$row_lcd = mysql_fetch_assoc($query_lcd);

										//Mengambil data PCB
										$id_pcb = $row_serial_number['PCB'];
										$query_PCB = mysql_query("SELECT * FROM perangkat WHERE id = $id_pcb");
										$row_pcb = mysql_fetch_assoc($query_PCB);

										//Mengambil data LoadCell
										$id_loadcell = $row_serial_number['LOADCELL'];
										$query_loadcell = mysql_query("SELECT * FROM perangkat WHERE id = $id_loadcell");
										$row_loadcell = mysql_fetch_assoc($query_loadcell);

										//Mengambil data rocker_switch
										$id_rocker = $row_serial_number['rocker_switch'];
										$query_rocker = mysql_query("SELECT * FROM perangkat WHERE id = $id_rocker");
										$row_rocker = mysql_fetch_assoc($query_rocker);

										//Mengambil data tiang-stadio
										$id_tiang_1 = $row_serial_number['tiang_stadio_1'];
										$query_tiang_1 = mysql_query("SELECT * FROM perangkat WHERE id = $id_tiang_1");
										$row_tiang_1 = mysql_fetch_assoc($query_tiang_1);
										//Mengambil data tiang-stadio
										$id_tiang_2 = $row_serial_number['tiang_stadio_2'];
										$query_tiang_2 = mysql_query("SELECT * FROM perangkat WHERE id = $id_tiang_2");
										$row_tiang_2 = mysql_fetch_assoc($query_tiang_2);
										//Mengambil data tiang-stadio
										$id_tiang_3 = $row_serial_number['tiang_stadio_3'];
										$query_tiang_3 = mysql_query("SELECT * FROM perangkat WHERE id = $id_tiang_3");
										$row_tiang_3 = mysql_fetch_assoc($query_tiang_3);
										//Mengambil data tiang-stadio
										$id_tiang_4 = $row_serial_number['tiang_stadio_4'];
										$query_tiang_4 = mysql_query("SELECT * FROM perangkat WHERE id = $id_tiang_4");
										$row_tiang_4 = mysql_fetch_assoc($query_tiang_4);

										//Mengambil data base-infanto
										$id_base_1 = $row_serial_number['base_infanto_1'];
										$query_base_1 = mysql_query("SELECT * FROM perangkat WHERE id = $id_base_1");
										$row_base_1 = mysql_fetch_assoc($query_base_1);
										//Mengambil data base-infanto
										$id_base_2 = $row_serial_number['base_infanto_2'];
										$query_base_2 = mysql_query("SELECT * FROM perangkat WHERE id = $id_base_2");
										$row_base_2 = mysql_fetch_assoc($query_base_2);
										

										//Mengambil data pita-lila
										$id_pita = $row_serial_number['pita_lila'];
										$query_pita = mysql_query("SELECT * FROM perangkat WHERE id = $id_pita");
										$row_pita = mysql_fetch_assoc($query_pita);

									?>
										<tr>
											<td class="table-plus"><?= $i++ ?></td>
											<td><?= $row_serial_number['serial_number']; ?></td>
											<td><?php

												if ($id_lcd == 0) {
													// echo "LCD : -</br>";
												} else {
													echo "LCD : Batch-" . $row_lcd['no_batch'] . "  Kardus-" . $row_lcd['no_kardus'] . "  tgl (" . $row_lcd['tgl_datang'] . ")</br>";
												}
												if ($id_pcb == 0) {
													// echo "PCB : -</br>";
												} else {
													echo "PCB : Batch-" . $row_pcb['no_batch'] . "  Kardus-" . $row_pcb['no_kardus'] . "  tgl (" . $row_pcb['tgl_datang'] . ")</br>";
												}
												if ($id_loadcell == 0) {
													// echo "LOADCELL : -</br>";
												} else {
													echo "LOADCELL : Batch-" . $row_loadcell['no_batch'] . "  Kardus-" . $row_loadcell['no_kardus'] . " tgl (" . $row_loadcell['tgl_datang'] . ")</br>";
												}
												if ($id_rocker == 0) {
													// echo "Rocker-Switch : -</br>";
												} else {
													echo $row_rocker['nama_perangkat'] . " : Batch-" .  $row_rocker['no_batch'] . "  Kardus-" . $row_rocker['no_kardus'] . "  tgl (" . $row_rocker['tgl_datang'] . ")</br>";
												}
												if ($id_tiang_1 == 0) {
													// echo "Rocker-Switch : -</br>";
												} else {
													echo $row_tiang_1['nama_perangkat'] . " : Batch-" .  $row_tiang_1['no_batch'] . "  Kardus-" . $row_tiang_1['no_kardus'] . "  tgl (" . $row_tiang_1['tgl_datang'] . ")</br>";
												}
												if ($id_tiang_2 == 0) {
													// echo "Rocker-Switch : -</br>";
												} else {
													echo $row_tiang_2['nama_perangkat'] . " : Batch-" .  $row_tiang_2['no_batch'] . "  Kardus-" . $row_tiang_2['no_kardus'] . "  tgl (" . $row_tiang_2['tgl_datang'] . ")</br>";
												}
												if ($id_tiang_3 == 0) {
													// echo "Rocker-Switch : -</br>";
												} else {
													echo $row_tiang_3['nama_perangkat'] . " : Batch-" .  $row_tiang_3['no_batch'] . "  Kardus-" . $row_tiang_3['no_kardus'] . "  tgl (" . $row_tiang_3['tgl_datang'] . ")</br>";
												}
												if ($id_tiang_4 == 0) {
													// echo "Rocker-Switch : -</br>";
												} else {
													echo $row_tiang_4['nama_perangkat'] . " : Batch-" .  $row_tiang_4['no_batch'] . "  Kardus-" . $row_tiang_4['no_kardus'] . "  tgl (" . $row_tiang_4['tgl_datang'] . ")</br>";
												}
												if ($id_base_1 == 0) {
													// echo "Rocker-Switch : -</br>";
												} else {
													echo $row_base_1['nama_perangkat'] . " : Batch-" .  $row_base_1['no_batch'] . "  Kardus-" . $row_base_1['no_kardus'] . "  tgl (" . $row_base_1['tgl_datang'] . ")</br>";
												}
												if ($id_base_2 == 0) {
													// echo "Rocker-Switch : -</br>";
												} else {
													echo $row_base_2['nama_perangkat'] . " : Batch-" .  $row_base_2['no_batch'] . "  Kardus-" . $row_base_2['no_kardus'] . "  tgl (" . $row_base_2['tgl_datang'] . ")</br>";
												}
												if ($id_pita == 0) {
													// echo "Rocker-Switch : -</br>";
												} else {
													echo $row_pita['nama_perangkat'] . " : Batch-" .  $row_pita['no_batch'] . "  Kardus-" . $row_pita['no_kardus'] . "  tgl (" . $row_pita['tgl_datang'] . ")</br>";
												}

												?></td>
											<td class="text-center">
												<?php if ($status != null) :
													echo $status . "(" . $row_serial_number['penanggung_jawab_final'] . ")";
												?>
												<?php else :
													echo "undefined";
												?>
												<?php endif ?>

											</td>
											<td>
												<div class="dropdown">
													<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
														<i class="fa fa-ellipsis-h"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<!-- <a class="dropdown-item" href="print-qr.php?print=<?= $row_serial_number['id'] ?>" target="_blank"><i class="fa fa-print"></i> Print QR</a> -->
														<a <?php echo $acc1; ?> class="dropdown-item" href="serial-number.php?delete=<?= $row_serial_number['id'] ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
								<?php
									} while ($row_serial_number = mysql_fetch_assoc($query));
								endif ?>
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