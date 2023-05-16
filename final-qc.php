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
    // HANDLE DELETE
    $datee = date("d-m-Y H:i:s");
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $query_sn = mysql_query("SELECT * FROM serial_number where id=$id");
        $row_sn = mysql_fetch_assoc($query_sn);
        $query_delete = mysql_query("DELETE FROM serial_number WHERE id = $id ");
        if ($query_delete) {
            header('Location: serial-number.php');
        }
        $usernow = $_SESSION['nama'];
        $infoo = $usernow . " menghapus serial number " . $row_sn['serial_number'];
        mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");
    }

    // HANDLE QC
    if (isset($_POST['good'])) {
        $penanggung_jawab = $_SESSION['nama'];
        // require_once("koneksi.php");
        $id_good = $_POST['good'];

        mysql_query("UPDATE serial_number SET kondisi = 'Good', penanggung_jawab = '$penanggung_jawab' WHERE id ='$id_good'");

        $query_good = mysql_query("SELECT * FROM serial_number WHERE id=$id_good");
        $row_good = mysql_fetch_assoc($query_good);
        $infoo = $penanggung_jawab . " mengubah QC pada serial number " . $row_good['serial_number'] . " dengan kondisi Good";
        mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");
    }

    if (isset($_POST['not-good'])) {
        $penanggung_jawab = $_SESSION['nama'];
        // require_once("koneksi.php");
        $id_not_good = $_POST['not-good'];

        $query_not_good = mysql_query("SELECT * FROM serial_number WHERE id=$id_not_good");
        $row_not_good = mysql_fetch_assoc($query_not_good);
        $infoo = $penanggung_jawab . " mengubah QC pada serial number " . $row_not_good['serial_number'] . " dengan kondisi Not Good";
        mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");

        mysql_query("UPDATE serial_number SET kondisi = 'Not Good', penanggung_jawab = '$penanggung_jawab' WHERE id ='$id_not_good'");
    }

    // READ DATA
    $query = mysql_query("SELECT * FROM serial_number ORDER BY kondisi = 'NULL' ASC, id ASC");
    $row_serial_number = mysql_fetch_assoc($query);
    ?>
    <?php include('include/sidebar.php'); ?>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>List Final QC</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Quality Control</li>
                                    <li class="breadcrumb-item active" aria-current="page">List Final QC</li>
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
                        <table class='data-table stripe hover wrap'>
                            <thead>
                                <tr>
                                    <th class="table-plus">No.</th>
                                    <th>Code</th>
                                    <th>Detail</th>
                                    <th>Quality Control</th>
                                    <th>Action</th>
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
                                        if ($row_serial_number['kondisi'] == 'Not Good') {
                                            $status = '<i class="fa fa-times" style="color:red"></i>'; // tanda silang merah
                                        } else if ($row_serial_number['kondisi'] == 'Good') {
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
                                        $id_tiang = $row_serial_number['tiang_stadio'];
                                        $query_tiang = mysql_query("SELECT * FROM perangkat WHERE id = $id_tiang");
                                        $row_tiang = mysql_fetch_assoc($query_tiang);
                                        //Mengambil data base-infanto
                                        $id_base = $row_serial_number['base_infanto'];
                                        $query_base = mysql_query("SELECT * FROM perangkat WHERE id = $id_base");
                                        $row_base = mysql_fetch_assoc($query_base);
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
                                                if ($id_tiang == 0) {
                                                    // echo "Rocker-Switch : -</br>";
                                                } else {
                                                    echo $row_tiang['nama_perangkat'] . " : Batch-" .  $row_tiang['no_batch'] . "  Kardus-" . $row_tiang['no_kardus'] . "  tgl (" . $row_tiang['tgl_datang'] . ")</br>";
                                                }
                                                if ($id_base == 0) {
                                                    // echo "Rocker-Switch : -</br>";
                                                } else {
                                                    echo $row_base['nama_perangkat'] . " : Batch-" .  $row_base['no_batch'] . "  Kardus-" . $row_base['no_kardus'] . "  tgl (" . $row_base['tgl_datang'] . ")</br>";
                                                }
                                                if ($id_pita == 0) {
                                                    // echo "Rocker-Switch : -</br>";
                                                } else {
                                                    echo $row_pita['nama_perangkat'] . " : Batch-" .  $row_pita['no_batch'] . "  Kardus-" . $row_pita['no_kardus'] . "  tgl (" . $row_pita['tgl_datang'] . ")</br>";
                                                }


                                                ?></td>
                                            <td class="text-center">
                                                <?php if ($status != null) :
                                                    echo $status . "(" . $row_serial_number['penanggung_jawab'] . ")";
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
                                                        <form method="POST">
                                                            <button class="btn dropdown-item" name="good" value="<?php echo $row_serial_number['id']; ?>" type="submit"><i class="fa fa-check" style="color:green"></i> Good</button>
                                                            <button class="btn dropdown-item" name="not-good" value="<?php echo $row_serial_number['id']; ?>" type="submit"><i class="fa fa-times" style="color:red"></i> Not Good</button>
                                                            <a class="dropdown-item" href="print-qr.php?print=<?= $row_serial_number['id'] ?>" target="_blank"><i class="fa fa-print"></i> Print QR</a>
                                                            <a <?php echo $acc1; ?> class="dropdown-item" href="serial-number.php?delete=<?= $row_serial_number['id'] ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i> Delete</a>
                                                        </form>
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