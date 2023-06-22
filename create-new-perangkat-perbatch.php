<?php
session_start();
include('koneksi.php');
// Default Date now
date_default_timezone_set("Asia/Jakarta");
$date = date('d F Y ', time());

$usernow = $_SESSION['nama'];

if (isset($_POST['register'])) {
    // initiate kode_perangkat
    $kode_perangkat = array(
        "LCD" => "LCD",
        "PCB-TDWS" => "PCB-T",
        "PCB-BBWS" => "PCB-B",
        "Loadcell-TDWS" => "LC-T",
        "Loadcell-BBWS" => "LC-B",
        "Tiang-Stadio" => "TS",
        "Base-Infanto" => "BI",
        "Pita-Lila" => "P-LILA",
    );

    $no_surat_jalan = $_POST['no_surat_jalan'];
    $tgl = $_POST['tgl'];
    $batch = $_POST['batch'];
    $jml_kardus = $_POST['kardus'];
    $jenis = $_POST['jenis'];
    $qty = $_POST['qty'];
    $datee = date("d-m-Y H:i:s");

    // Check for duplicate no batch
    $query_check_batch = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat = '$jenis' AND no_batch = '$batch' ");

    if (!$tgl || !$qty || !$batch || !$jml_kardus || !$jenis) {
        echo "<script type='text/javascript'>alert('Masih ada data yang kosong!');</script>";
    } elseif (mysql_num_rows($query_check_batch) > 0) {
        echo "<script type='text/javascript'>alert('Kode batch yang anda masukan sudah ada!');</script>";
    } else {
        for ($i = 1; $i <= $jml_kardus; $i++) {
            $simpan = mysql_query("INSERT INTO perangkat(unit_barang, tgl_datang, no_batch, no_kardus, nama_perangkat, kode_perangkat, no_surat_jalan) VALUES('$qty','$tgl','$batch','$i','$jenis','$kode_perangkat[$jenis]','$no_surat_jalan')");
        }
        if ($simpan) {
            // write txt.
            $filename = dirname(__FILE__) . '/file_print/no_kardus.txt';
            $myfile = fopen($filename, "w") or die("Unable to open file!");
            fwrite($myfile, "No-Kardus,\n");
            for ($no = 1; $no <= $jml_kardus; $no++) {   
                // WRITE TO TXT
                fwrite($myfile, $batch . "." . str_pad($no, 3, "0", STR_PAD_LEFT) . "." . $qty . "." . $kode_perangkat[$jenis] . ",\n");
            }
            // CLOSE FILE TXT
            fclose($myfile);
            // Force download the file
            echo '<script type="text/javascript">window.open("download-nokardus.php", "_blank"); </script>';

            //log
            $infoo = $usernow . " menambahkan item incoming hardware " . $jenis . " dengan jumlah " . $jml_kardus . " kardus";
            mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");
            // header('Location: create-new-perangkat-perbatch.php?create=success&id_batch=' . $batch);
            // header('Location: create-new-perangkat-perbatch.php?create=success');
        } else {
            header('Location: create-new-perangkat-perbatch.php?create=failed');
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <?php include('include/head.php'); ?>
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
                                <h4>New Incoming Entry (Batch Entry) </h4>
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
                                    <option value="PCB-BBWS">PCB-BBWS</option>
                                    <option value="Loadcell-TDWS">Loadcell-TDWS</option>
                                    <option value="Loadcell-BBWS">Loadcell-BBWS</option>
                                    <option value="Tiang-Stadio">Tiang Stadio</option>
                                    <option value="Base-Infanto">Base Infanto</option>
                                    <option value="Pita-Lila">Pita LILA</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Banyaknya Barang (unit) per Kardus</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="cth : 24" name="qty" value="100">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">No Batch</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="cth : 30-05" name="batch">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label"><b>Jumlah Kardus</b></label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="cth : 50" name="kardus">
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