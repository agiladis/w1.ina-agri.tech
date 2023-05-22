<?php
include('koneksi.php');
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
// Default Date now
date_default_timezone_set("Asia/Jakarta");
$date = date('d F Y ', time());

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $table = $_GET['table'];
    $query = "SELECT * FROM perangkat WHERE id = $id";
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
}



if (isset($_POST['register'])) {
    require_once("koneksi.php");
    $no_surat_jalan = $_POST['no_surat_jalan'];
    $tgl = $_POST['tgl'];
    $batch = $_POST['batch'];
    $kardus = $_POST['kardus'];
    $jenis = $_POST['jenis'];
    $buffer = $_POST['buffer'];
    $qty = $_POST['qty'];
    $datee = date("d-m-Y H:i:s");
    $usernow = $_SESSION['nama'];


    if (!$tgl || !$qty || !$batch || !$kardus || !$jenis) {
        $message = "Masih ada data yang kosong!";
    } else {
        $simpan = mysql_query("UPDATE perangkat SET unit_barang='$qty', tgl_datang='$tgl', no_batch='$batch', no_kardus='$kardus', nama_perangkat='$jenis', buffer='$buffer', no_surat_jalan='$no_surat_jalan' WHERE id=$id ");
        if ($simpan) {
            $message = "Berhasil Menyimpan!";
            $infoo = $usernow . " memperbarui item incoming hardware " .$batch ;
            mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");
        } else {
            $message = "Proses Gagal!";
        }
    }
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location: incoming-hw.php");
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
                                <input class="form-control" type="text" placeholder="cth : IX/023" name="no_surat_jalan" value="<?= $row['no_surat_jalan'];?>">
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Jenis Barang</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="jenis">
                                    <option value="<?= $row['nama_perangkat'];?>" > <?= $row['nama_perangkat'];?> </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Banyaknya Barang (unit)</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="cth : 24" name="qty" value="<?= $row['unit_barang'];?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">No Bacth</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="cth : 12" name="batch" value="<?= $row['no_batch'];?>" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">No Kardus</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="cth : 13" name="kardus" value="<?= $row['no_kardus'];?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Tanggal Kedatangan</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control date-picker" name="tgl" value="<?= $row['tgl_datang'];?>" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Buffer</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="buffer">
                                    <option value="0" >Bukan Buffer</option>
                                    <option value="1" >Buffer</option>
                                </select>
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