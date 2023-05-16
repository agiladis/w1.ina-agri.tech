<?php
include('koneksi.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Default Date now
date_default_timezone_set("Asia/Jakarta");
$date = date("d-m-Y H:i:s");
$usernow = $_SESSION['nama'];

// Get serial number
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query_data = mysql_query("SELECT * FROM serial_number WHERE id = $id");
    $selected_data = mysql_fetch_assoc($query_data);
}

if (isset($_POST['update'])) {
    // require_once("koneksi.php");
    $kondisi_inprocess = $_POST['kondisi_inprocess'];
    $penanggung_jawab_inprocess = $_SESSION['nama'];
    $tanggal_produksi = $_POST['tanggal_produksi'];
    $group_produksi = $_POST['group_produksi'];
    // if kondisi_inprocess change to Not Good set kondisi_final & penanggung_jawab_final NULL
    if ($kondisi_inprocess == 'Not Good') {
        $query = mysql_query("UPDATE serial_number SET kondisi_inprocess = '$kondisi_inprocess', penanggung_jawab_inprocess = '$penanggung_jawab_inprocess', kondisi_final = NULL, penanggung_jawab_final = NULL, tanggal_produksi = '$tanggal_produksi', group_produksi = '$group_produksi' WHERE id = $id");
    } else {
        $query = mysql_query("UPDATE serial_number SET kondisi_inprocess = '$kondisi_inprocess', penanggung_jawab_inprocess = '$penanggung_jawab_inprocess', tanggal_produksi = '$tanggal_produksi', group_produksi = '$group_produksi' WHERE id = $id");
    }
    // $query = mysql_query("UPDATE serial_number SET kondisi_inprocess = '$kondisi_inprocess', penanggung_jawab_inprocess = '$penanggung_jawab_inprocess', group_produksi = '$group_produksi' WHERE id = $id");
    if ($query) {
        header('Location: final-inprocess-qc.php');

        // LOG HERE
        $infoo = "User " . $usernow . " input QC in-proses pada serial-number " . $selected_data['serial_number'] . " dengan kondisi " . $kondisi_inprocess;
        mysql_query("INSERT INTO log(date,note) VALUES('$date','$infoo')");
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
                                <h4> Input / Edit QC Inprocess </h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item">Quality Control</li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="final-inprocess-qc.php">Final In-process QC</a></li>
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
							<label class="col-sm-12 col-md-2 col-form-label">Serial Number</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="<?php echo $selected_data['serial_number'];?>" name="serial_number" disabled required>
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Tanggal Produksi</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control date-picker" name="tanggal_produksi" placeholder="Select Date" type="text" value="<?= $selected_data['tanggal_produksi'] ?>" required>
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Group Produksi</label>
							<div class="col-sm-12 col-md-10">
								<select name="group_produksi" class="custom-select col-12" required>
									<option selected value="">Choose...</option>
                                    <option value="group 1" <?php echo $selected_data['group_produksi'] == 'group 1' ? 'selected' : '' ?> >Group 1</option>
                                    <option value="group 2" <?php echo $selected_data['group_produksi'] == 'group 2' ? 'selected' : '' ?>>Group 2</option>
								</select>
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Kondisi</label>
							<div class="col-sm-12 col-md-10">
								<select name="kondisi_inprocess" class="custom-select col-12" required>
									<option selected value="">Choose...</option>
                                    <option value="Good" class="font-weight-bold" style="color:green" <?php echo $selected_data['kondisi_inprocess'] == 'Good' ? 'selected' : '' ?>>Good</option>
                                    <option value="Not Good" class="font-weight-bold" style="color:red" <?php echo $selected_data['kondisi_inprocess'] == 'Not Good' ? 'selected' : '' ?>> Not Good</option>
								</select>
							</div>
						</div>
                        
                        <div class="clearfix">
                            <div class="pull-right">
                                <button name="update" type="submit" class="btn btn-primary btn-sm scroll-click" data-toggle="collapse" role="button"> Update </button>
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