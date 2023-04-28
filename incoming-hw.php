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

				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="row invoice-wrap">
						<table class='data-table stripe hover nowrap'>
							<thead>
								<tr>
								<th class="table-plus">No.</th>
									<th class="text-center">Jenis Perangkat</th>
									<th class="text-center">Qty</th>
									<th class="text-center">No. Batch</th>
									<th class="text-center">No. Kardus</th>
									<th class="text-center">Tangal Incoming</th>
									<th class="text-center">Quality Control</th>
                                    <th class="text-center">No. Surat Jalan</th>
                                    <th class="text-center">Digunakan</th>
									<th class="datatable-nosort"></th>
								</tr>
							</thead>
							<tbody>
								<?php
								include "koneksi.php";
								$query_mysql = mysql_query("SELECT * FROM perangkat ORDER BY id DESC") or die(mysql_error());
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
										<td> <?php echo $data['unit_barang']; ?> Unit</td>
										<td> Batch-No.<?php echo $data['no_batch']; ?></td>
										<td> Box-No.<?php echo $data['no_kardus']; ?></td>
										<td> <?php echo $data['tgl_datang']; ?></td>
										<td class="text-center">
											<?php if ($status != null) :
												echo $status . "(" . $data['penanggung_jawab'] . ")";
											?>
											<?php else : 
                                                echo "undefined";    
                                            ?>
                                            <?php endif ?>

										</td>
										<td> <?php echo $data['no_surat_jalan']; ?></td>
										<td> <?php echo boolval($data['taken']) ? 'TRUE' : 'FALSE'; ?></td>
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