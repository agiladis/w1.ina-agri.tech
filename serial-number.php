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
			$infoo =$usernow." menghapus serial number ".$row_sn['serial_number'];
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
									<th>QC</th>
                                    <th class="datatable-nosort"></th>
								</tr>
							</thead>
							<tbody>
								
								<?php if (mysql_num_rows($query) == 0) : ?>
									<tr>
										<td colspan="4" class="text-center font-weight-bold font-italic">It's empty in here.</td>
									</tr>
								<?php else: $i=1; do {
										$status = '';
										if ($row_serial_number['QC'] == 'NotGood') {
											$status = '<i class="fa fa-times" style="color:red"></i>'; // tanda silang merah
										} else if ($row_serial_number['QC'] == 'Good') {
												$status = '<i class="fa fa-check" style="color:green"></i>'; // tanda centang hijau
										} else{
											$status = '<i>NotQC</i>';
										}
									
									//Menganbil data LCD
									$id_lcd = $row_serial_number['LCD'];
									$query_lcd= mysql_query("SELECT * FROM perangkat WHERE id = $id_lcd"); 
									$row_lcd = mysql_fetch_assoc($query_lcd); 
									
									//Mengambil data PCB
									$id_pcb = $row_serial_number['PCB'];
									$query_PCB= mysql_query("SELECT * FROM perangkat WHERE id = $id_pcb"); 
									$row_pcb = mysql_fetch_assoc($query_PCB);

									//Mengambil data LoadCell
									$id_loadcell = $row_serial_number['LOADCELL'];
									$query_loadcell= mysql_query("SELECT * FROM perangkat WHERE id = $id_loadcell"); 
									$row_loadcell = mysql_fetch_assoc($query_loadcell);
									?>
									<tr>
										<td class="table-plus"><?= $i++ ?></td>
										<td><?= $row_serial_number['serial_number']; ?></td>
										<td><?php 

										if ($id_lcd == 0){
										echo "LCD : -</br>";
										}
										else {
											echo "LCD : Batch-".$row_lcd['no_batch']. "  Kardus-". $row_lcd['no_kardus'] . "  tgl (". $row_lcd['tgl_datang'].")</br>";
										}
										if ($id_pcb == 0){
											echo "PCB : -</br>";
										}
										else {
											echo "PCB : Batch-".$row_pcb['no_batch']."  Kardus-".$row_pcb['no_kardus'] ."  tgl (". $row_pcb['tgl_datang'] . ")</br>";
										}
										if ($id_loadcell == 0){
											echo "LOADCELL : -</br>";
										}
										else {
											echo "LOADCELL : Batch-".$row_loadcell['no_batch']. "  Kardus-". $row_loadcell['no_kardus']. " tgl (". $row_loadcell['tgl_datang'].")</br>" ; 	
										}
										
										?></td>										
										<td class="text-center"> 
											<?php if ($status != null)
												echo $status;
											?>

										</td>
										<td>
											<div class="dropdown">
												<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
													<i class="fa fa-ellipsis-h"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="print-qr.php?print=<?= $row_serial_number['id'] ?>" target="_blank"><i class="fa fa-print"></i> Print QR</a>
													<a class="dropdown-item" href="serial-number.php?delete=<?= $row_serial_number['id'] ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
								<?php
								}  while ($row_serial_number = mysql_fetch_assoc($query)); endif ?>
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