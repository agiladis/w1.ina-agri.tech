<!DOCTYPE html>

<?php include('koneksi.php'); ?>
<?php 
	$query = mysql_query("SELECT *, batch_produksi.id as 'id_batch' FROM batch_produksi LEFT JOIN pemesan on batch_produksi.id_pemesan = pemesan.id ORDER BY batch_produksi.id DESC");
	$row_query = mysql_fetch_assoc($query);
?>

<html>
<head>
	<?php include('include/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">
</head>
<body>
	<?php include('include/header.php'); ?>
	<?php
	// HANDLE DELETE 
	if (isset($_GET['delete'])) {
		$id = $_GET['delete'];
		$row_delete = mysql_fetch_assoc(mysql_query("SELECT * FROM batch_produksi where id=$id"));
		$query_delete = mysql_query("DELETE FROM batch_produksi WHERE id = $id");
		
		if ($query_delete) {
			$datee = date("d-m-Y H:i:s");
			$usernow = $_SESSION['nama'];
			$infoo =$usernow." menghapus batch produksi ".$row_delete['kode_batch'];
			mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");
			
			header('Location: batch-production-table.php?delete=success');
		}
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
								<h4>Batch Production</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Production</li>
									<li class="breadcrumb-item active" aria-current="page">Batch Production</li>
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
                    <div class="clearfix mb-20">
						<div class="pull-left">
							<a href="create-batch-production.php" class="btn btn-success btn-lg" role="button">Create New</a>
						</div>
					</div>
					<div class="row">
						<table class='data-table stripe hover nowrap'>
						<thead>
								<tr>
									<th class="table-plus">No.</th>
									<th>Pemesan</th>
									<th>Batch Code</th>
									<th>Tanggal Mulai Produksi</th>
                                    <th>Tanggal Akhir Produksi</th>
                                    <th class="datatable-nosort"></th>
								</tr>
							</thead>
							<tbody>
								<?php if (mysql_num_rows($query) == 0) : ?>
									<tr>
										<td colspan="4" class="text-center font-weight-bold font-italic">It's empty in here.</td>
									</tr>
								<?php
									else:
									$i=1; do {
								?>
									<tr>
										<td class="table-plus"><?= $i++ ?></td>
										<td><?= $row_query['ket']; ?></td>
										<td><?= $row_query['kode_batch']; ?></td>
										<td><?= $row_query['tgl_mulai']; ?></td>
										<td><?= $row_query['tgl_akhir']; ?></td>
										<td>
											<div class="dropdown">
												<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
													<i class="fa fa-ellipsis-h"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="edit-batch-production.php?edit=<?= $row_query['id_batch'] ?>"><i class="fa fa-pencil"></i> Edit</a>
													<a class="dropdown-item" href="batch-production-table.php?delete=<?= $row_query['id_batch'] ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
								<?php } while ($row_query = mysql_fetch_assoc($query)); endif ?>
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