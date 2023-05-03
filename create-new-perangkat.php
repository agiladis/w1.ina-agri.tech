<?php
include('koneksi.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Default Date now
date_default_timezone_set("Asia/Jakarta");
$date = date('d F Y ', time());

if (isset($_POST['register'])) {
    require_once("koneksi.php");
    $no_surat_jalan = $_POST['no_surat_jalan'];
    $tgl = $_POST['tgl'];
    $batch = $_POST['batch'];
    $kardus = $_POST['kardus'];
    $jenis = $_POST['jenis'];
    $qty = $_POST['qty'];
    $datee = date("d-m-Y H:i:s");
    $usernow = $_SESSION['nama'];

    $filter = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat='$jenis' AND no_batch='$batch' AND no_kardus='$kardus'");
    $row_filter = mysql_fetch_assoc($filter);

    if (!$tgl || !$qty || !$batch || !$kardus || !$jenis) {
        $message = "Masih ada data yang kosong!";
    } else {

        if ($row_filter) {
            $message = "No kardus sudah ada";
        } else {
            $simpan = mysql_query("INSERT INTO perangkat(unit_barang,tgl_datang,no_batch,no_kardus,nama_perangkat, no_surat_jalan) VALUES('$qty','$tgl','$batch','$kardus','$jenis', '$no_surat_jalan')");
            if ($simpan) {
                $message = "Berhasil Menyimpan!";
                $infoo = "User " . $usernow . " menambahkan item incoming hardware " . $jenis . " dengan kode " . $batch . "-" . $kardus . "-100";
                mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");
            } else {
                $message = "Proses Gagal!";
            }
        }
    }
    echo "<script type='text/javascript'>alert('$message');</script>";
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

        $infoo = $usernow . " menambahkan pemesan baru dengan code " . $kode;
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
                                <h4>New Incoming Entry</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Incoming</li>
                                    <li class="breadcrumb-item active" aria-current="page">Create New</li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>
                <!-- Default Basic Forms Start -->
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <form method="POST" autocomplete="off">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">No Surat Jalan</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="cth : IX/023" name="no_surat_jalan">
                            </div>
                        </div>

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
                                    <option value="Rocker-Switch">Rocker Switch</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Banyaknya Barang (unit)</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="cth : 24" name="qty" value="100" readonly>
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
                                <input class="form-control date-picker" value="<?= $date; ?>" name="tgl">
                            </div>
                        </div>

                        <div class="clearfix">
                            <div class="pull-right">
                                <button name="register" type="submit" class="btn btn-primary btn-sm scroll-click" data-toggle="collapse" role="button"> Entry </button>
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