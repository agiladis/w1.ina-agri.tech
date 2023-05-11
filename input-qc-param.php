<?php
include('koneksi.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Default Date now
date_default_timezone_set("Asia/Jakarta");
$date = date('d F Y ', time());

//id-sinkron
$id = $_GET['id_unit'];
$no = $_GET['no'];
$unit = $_GET['unit'];
$kategori = $_GET['kategori'];

$query_perangkat = mysql_query("SELECT * FROM perangkat WHERE id=$id");
$row_perangkat = mysql_fetch_assoc($query_perangkat);

if (isset($_POST['register'])) {
    require_once("koneksi.php");
    //user & date
    $datee = date("d-m-Y H:i:s");
    $usernow = $_SESSION['user'];

   
    
    //qc-incoming
    $critical = $_POST['critical'];
    $major = $_POST['major'];
    $minor = $_POST['minor'];

    //$message='HAII';

    
    if($critical==0 && $major<=1 && $minor<=2){
        $qc_result='Good';
    }else{$qc_result='Not Good'; }


    //Log-Input
	$infoo = $usernow . " update QC pada perangkat " . $kategori . " batch ke-" . $no . " dengan kondisi ".$qc_result;
	mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");

    //Db-perangkat-update
    mysql_query("UPDATE perangkat SET kondisi = '$qc_result', penanggung_jawab = '$usernow', qc_critical='$critical',qc_major='$major',qc_minor='$minor' WHERE id ='$id'");

    $message='Hasil QC : '.$qc_result.'. Input Berhasil.';

    //$filter = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat='$jenis' AND no_batch='$batch' AND no_kardus='$kardus'");
    //$row_filter = mysql_fetch_assoc($filter);

    //if (!$tgl || !$qty || !$batch || !$kardus || !$jenis) {
    //    $message = "Masih ada data yang kosong!";
    //} else {
    //    if ($row_filter) {
    //        $message = "No kardus sudah ada";
    //    } else {
    //        $simpan = mysql_query("INSERT INTO perangkat(unit_barang,tgl_datang,no_batch,no_kardus,nama_perangkat, no_surat_jalan) VALUES('$qty','$tgl','$batch','$kardus','$jenis', '$no_surat_jalan')");
    //        if ($simpan) {
    //            $message = "Berhasil Menyimpan!";
    //            $infoo = "User " . $usernow . " menambahkan item incoming hardware " . $jenis . " dengan kode " . $batch . "-" . $kardus . "-100";
    //            mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");
    //        } else {
    //            $message = "Proses Gagal!";
    //        }
    //    }
   // }

//echo "<script type='text/javascript'>alert('$message')</script>";

echo "<script>
//alert('$message');
window.location.href='incoming-qc.php';
</script>";

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

        $infoo = $usernow . " menambahkan qc incoming " . $kode;
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
                                <h4> Input / Edit QC Data </h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item">Quality Control</li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="incoming-qc.php">Incoming-QC</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Data</li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>
                <!-- Default Basic Forms Start -->
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <form method="POST" autocomplete="off">
                                               
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">No</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="jenis">
                                    <option value="<?php echo $no;?>" ><?php echo $no;?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Jenis Barang</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="jenis">
                                    <option value="<?php echo $kategori;?>" ><?php echo $kategori;?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Unit</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="unit">
                                    <option value="<?php echo $unit;?>" ><?php echo $unit;?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Critical</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="<?php echo $row_perangkat['qc_critical'];?>" name="critical">
							</div>
						</div>

                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Major</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="<?php echo $row_perangkat['qc_major'];?>" name="major">
							</div>
						</div>

                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Minor</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="<?php echo $row_perangkat['qc_minor'];?>" name="minor">
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