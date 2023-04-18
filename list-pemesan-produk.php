<?php
	include('koneksi.php');

	$query = "SELECT * FROM pemesan";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	
	
	

?>

</script>

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
	<?php
	if (isset($_GET['delete'])) {
		$id = $_GET['delete'];
		$row_delete = mysql_fetch_assoc(mysql_query("SELECT * FROM pemesan where id=$id"));
		$query = "DELETE FROM pemesan WHERE id = '$id'";
		$result = mysql_query($query);

		if($result) {
			$datee = date("d-m-Y H:i:s");
			$usernow = $_SESSION['nama'];
			$infoo =$usernow." menghapus pemesan ".$row_delete['kode'];
			mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");
			// Jika berhasil, redirect ke halaman list kategori produk
			header('Location: list-pemesan-produk.php');	
			exit;
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
								<h4>List Pemesan Produk</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Production</li>
									<li class="breadcrumb-item active" aria-current="page">List Pemesan Produk</li>
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
							<a href="create-pemesan-produk.php" class="btn btn-success btn-lg" role="button">Create New</a>
						</div>
					</div>
					<div class="row">
						<table class='data-table stripe hover nowrap'>
						<thead>
								<tr>
									<th class="table-plus">No.</th>
									<th>Code</th>
									<th>Keterangan</th>
                                    <th class="datatable-nosort"></th>
								</tr>
							</thead>
							<tbody>
								<?php	
									if (mysql_num_rows($result) == 0){
								?>
								<tr>
									<td colspan="4" class="text-center font-weight-bold font-italic">It's empty in here.</td>
								</tr>
								<?php
									} else{  
										$i=1;
										$t=1;do  { 
								?>
								<tr>
									<td class="table-plus"><?= $i++;?></td>
									<td><?= $row['kode'];?></td>
									<td><?=$row['ket'];?></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="edit-pemesan-produk.php?edit=<?=$row['id']?>&table=<?= $t++?>"><i class="fa fa-pencil"></i> Edit</a>
												<a class="dropdown-item" href="list-pemesan-produk.php?delete=<?=$row['id']?>"  onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i> Delete</a>

												<!-- <a class="dropdown-item" href="list-pemesan-produk.php?delete=<?=$row['id']?>"><i class="fa fa-trash"></i> Delete</a> -->
											</div>
										</div>
									</td>
								</tr>
								<?php } while ($row = mysql_fetch_assoc($result)); }?>
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