<?php
include('koneksi.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Default Date now
date_default_timezone_set("Asia/Jakarta");
$date = date("d-m-Y H:i:s");
$usernow = $_SESSION['nama'];

// Get id
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query_data = mysql_query("SELECT * FROM serial_number WHERE id = $id");
    $selected_data = mysql_fetch_assoc($query_data);
    // split char cacat_final separate by comma(,)
    $arr_cacat_final = explode(",", $selected_data['cacat_final']);

    // GET kategori
    $id_kategori = $selected_data['id_kategori'];
    $query_kategori = mysql_query("SELECT kode FROM kategori_produk WHERE id = $id_kategori ");
    $kode_kategori = mysql_fetch_assoc($query_kategori);
    $kode_kategori = $kode_kategori['kode'];
}

if (isset($_POST['update'])) {
    $penanggung_jawab_final = $_SESSION['nama'];
    // Set value for cacat final (set data type)
    $LCD = $_POST['kondisi-lcd'];
    $PCB = $_POST['kondisi-pcb'];
    $LOADCELL = $_POST['kondisi-loadcell'];
    $tiang_stadio_1 = $_POST['kondisi-tiang-stadio-1'];
    $tiang_stadio_2 = $_POST['kondisi-tiang-stadio-2'];
    $tiang_stadio_3 = $_POST['kondisi-tiang-stadio-3'];
    $tiang_stadio_4 = $_POST['kondisi-tiang-stadio-4'];
    $base_infanto_1 = $_POST['kondisi-base-infanto-1'];
    $base_infanto_2 = $_POST['kondisi-base-infanto-2'];
    $pita_lila = $_POST['kondisi-pita-lila'];
    $cacat_final_tambahan = $_POST['kondisi-cacat-lainnya'];
    echo "cacat final tambahan : " . gettype($cacat_final_tambahan);
    // check is it cacat final any not good condition?
    $arr = array($LCD, $PCB, $LOADCELL, $tiang_stadio_1, $tiang_stadio_2, $tiang_stadio_3, $tiang_stadio_4, $base_infanto_1, $base_infanto_2, $pita_lila);
    // Initiate var to get defect hardware
    $arr_string = "";
    foreach ($arr as $value) {
        if ($value != "") {
            $arr_string .= $value . ",";
        }
    }
    // Initiate var to get additional defect hardware
    $additional_arr_string = "";
    foreach ($cacat_final_tambahan as $value) {
        $additional_arr_string  .= $value . ";";
    }
    // Delete last comma (,) and delete whitespace
    $arr_string = rtrim(substr($arr_string, 0, -1));
    $additional_arr_string = rtrim(substr($additional_arr_string, 0, -1));
    echo "cacat final tambahan string : " . $additional_arr_string;

    $kondisi_cacat = $LCD . ' ' . $PCB . ' ' . $LOADCELL . ' ' . $tiang_stadio_1 . ' ' . $tiang_stadio_2 . ' ' . $tiang_stadio_3 . ' ' . $tiang_stadio_4 . ' ' . $base_infanto_1 . ' ' . $base_infanto_2 . ' ' . $pita_lila;

    if ($arr_string == "" && $additional_arr_string == "") {
        $query = mysql_query("UPDATE serial_number SET kondisi_final = 'Good', cacat_final = NULL, cacat_final_tambahan = NULL, penanggung_jawab_final = '$penanggung_jawab_final' WHERE id = $id");
    } else {
        $query = mysql_query("UPDATE serial_number SET kondisi_final = 'Not Good', penanggung_jawab_final = '$penanggung_jawab_final', cacat_final = '$arr_string', cacat_final_tambahan = '$additional_arr_string' WHERE id = $id");
    }
    if ($query) {
        // LOG HERE
        if ($arr_string == "" && $additional_arr_string == "") {
            $infoo = $usernow . " input final QC pada SN " . $selected_data['serial_number'] . " dengan kondisi final Good";
            mysql_query("INSERT INTO log(date,note) VALUES('$date','$infoo')");
        } else {
            $infoo = $usernow . " input final QC pada SN " . $selected_data['serial_number'] . ' kondisi Not Good dengan cacat ' . $kondisi_cacat . $additional_arr_string;
            mysql_query("INSERT INTO log(date,note) VALUES('$date','$infoo')");
        }

        header('Location: final-qc.php');
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
                                <h4>Defect data QC Final </h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item">Quality Control</li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="final-qc.php">Final QC</a></li>
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
                                <input class="form-control" value="<?php echo $selected_data['serial_number']; ?>" name="serial_number" disabled required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Tanggal Mulai Produksi</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control date-picker" name="tanggal_produksi" type="text" value="<?= $selected_data['tanggal_produksi'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Group Produksi</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="group_produksi" type="text" value="<?= $selected_data['group_produksi'] ?>" disabled>
                            </div>
                        </div>
                        <?php if ($kode_kategori == "TDWS" || $kode_kategori == "BBWS") : ?>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">LCD</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="radio" value="" class="btn-check good" name="kondisi-lcd" id="good-lcd" autocomplete="off" checked>
                                    <label class="btn btn-outline-success" for="good-lcd">Good</label>

                                    <input type="radio" value="LCD" class="btn-check not-good" name="kondisi-lcd" id="not-good-lcd" autocomplete="off" <?php echo in_array("LCD", $arr_cacat_final) ? 'checked' : '' ?>>
                                    <label class="btn btn-outline-danger" for="not-good-lcd">Not Good</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">PCB</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="radio" value="" class="btn-check good" name="kondisi-pcb" id="good-pcb" autocomplete="off" checked>
                                    <label class="btn btn-outline-success" for="good-pcb">Good</label>

                                    <input type="radio" value="PCB" class="btn-check not-good" name="kondisi-pcb" id="not-good-pcb" autocomplete="off" <?php echo in_array("PCB", $arr_cacat_final) ? 'checked' : '' ?>>
                                    <label class="btn btn-outline-danger" for="not-good-pcb">Not Good</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Load Cell</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="radio" value="" class="btn-check good" name="kondisi-loadcell" id="good-loadcell" autocomplete="off" checked>
                                    <label class="btn btn-outline-success" for="good-loadcell">Good</label>

                                    <input type="radio" value="LOADCELL" class="btn-check not-good" name="kondisi-loadcell" id="not-good-loadcell" autocomplete="off" <?php echo in_array("LOADCELL", $arr_cacat_final) ? 'checked' : '' ?>>
                                    <label class="btn btn-outline-danger" for="not-good-loadcell">Not Good</label>
                                </div>
                            </div>
                        <?php elseif ($kode_kategori == "INFT") : ?>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Base Infanto 1</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="radio" value="" class="btn-check good" name="kondisi-base-infanto-1" id="good-base-infanto-1" autocomplete="off" checked>
                                    <label class="btn btn-outline-success" for="good-base-infanto-1">Good</label>

                                    <input type="radio" value="base_infanto_1" class="btn-check not-good" name="kondisi-base-infanto-1" id="not-good-base-infanto-1" autocomplete="off" <?php echo in_array("base_infanto_1", $arr_cacat_final) ? 'checked' : '' ?>>
                                    <label class="btn btn-outline-danger" for="not-good-base-infanto-1">Not Good</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Base Infanto 2</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="radio" value="" class="btn-check good" name="kondisi-base-infanto-2" id="good-base-infanto-2" autocomplete="off" checked>
                                    <label class="btn btn-outline-success" for="good-base-infanto-2">Good</label>

                                    <input type="radio" value="base_infanto_2" class="btn-check not-good" name="kondisi-base-infanto-2" id="not-good-base-infanto-2" autocomplete="off" <?php echo in_array("base_infanto_2", $arr_cacat_final) ? 'checked' : '' ?>>
                                    <label class="btn btn-outline-danger" for="not-good-base-infanto-2">Not Good</label>
                                </div>
                            </div>
                        <?php elseif ($kode_kategori == "STDO") : ?>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Tiang Stadio 1</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="radio" value="" class="btn-check good" name="kondisi-tiang-stadio-1" id="good-tiang-stadio-1" autocomplete="off" checked>
                                    <label class="btn btn-outline-success" for="good-tiang-stadio-1">Good</label>

                                    <input type="radio" value="tiang_stadio_1" class="btn-check not-good" name="kondisi-tiang-stadio-1" id="not-good-tiang-stadio-1" autocomplete="off" <?php echo in_array("tiang_stadio_1", $arr_cacat_final) ? 'checked' : '' ?>>
                                    <label class="btn btn-outline-danger" for="not-good-tiang-stadio-1">Not Good</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Tiang Stadio 2</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="radio" value="" class="btn-check good" name="kondisi-tiang-stadio-2" id="good-tiang-stadio-2" autocomplete="off" checked>
                                    <label class="btn btn-outline-success" for="good-tiang-stadio-2">Good</label>

                                    <input type="radio" value="tiang_stadio_2" class="btn-check not-good" name="kondisi-tiang-stadio-2" id="not-good-tiang-stadio-2" autocomplete="off" <?php echo in_array("tiang_stadio_2", $arr_cacat_final) ? 'checked' : '' ?>>
                                    <label class="btn btn-outline-danger" for="not-good-tiang-stadio-2">Not Good</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Tiang Stadio 3</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="radio" value="" class="btn-check good" name="kondisi-tiang-stadio-3" id="good-tiang-stadio-3" autocomplete="off" checked>
                                    <label class="btn btn-outline-success" for="good-tiang-stadio-3">Good</label>

                                    <input type="radio" value="tiang_stadio_3" class="btn-check not-good" name="kondisi-tiang-stadio-3" id="not-good-tiang-stadio-3" autocomplete="off" <?php echo in_array("tiang_stadio_3", $arr_cacat_final) ? 'checked' : '' ?>>
                                    <label class="btn btn-outline-danger" for="not-good-tiang-stadio-3">Not Good</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Tiang Stadio 4</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="radio" value="" class="btn-check good" name="kondisi-tiang-stadio-4" id="good-tiang-stadio-4" autocomplete="off" checked>
                                    <label class="btn btn-outline-success" for="good-tiang-stadio-4">Good</label>

                                    <input type="radio" value="tiang_stadio_4" class="btn-check not-good" name="kondisi-tiang-stadio-4" id="not-good-tiang-stadio-4" autocomplete="off" <?php echo in_array("tiang_stadio_4", $arr_cacat_final) ? 'checked' : '' ?>>
                                    <label class="btn btn-outline-danger" for="not-good-tiang-stadio-4">Not Good</label>
                                </div>
                            </div>
                        <?php elseif ($kode_kategori == "LILA") : ?>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Pita Lila</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="radio" value="" class="btn-check good" name="kondisi-pita-lila" id="good-pita-lila" autocomplete="off" checked>
                                    <label class="btn btn-outline-success" for="good-pita-lila">Good</label>

                                    <input type="radio" value="pita_lila" class="btn-check not-good" name="kondisi-pita-lila" id="not-good-pita-lila" autocomplete="off" <?php echo in_array("pita_lila", $arr_cacat_final) ? 'checked' : '' ?>>
                                    <label class="btn btn-outline-danger" for="not-good-pita-lila">Not Good</label>
                                </div>
                            </div>
                        <?php endif ?>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Cacat Final Lainnya</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="btn btn-outline-dark" type="button" id="add-field" value="+ Add Field">
                                <div class="input-group mb-3 mt-3" id="defect-dynamic-field"></div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $("#add-field").click(function() {
            $("#defect-dynamic-field").append(`<div class="input-block input-group mb-3">
                                        <input type="text" name="kondisi-cacat-lainnya[]" class="form-control" placeholder="masukkan cacat final lainnya" aria-label="cacat final lainnya" aria-describedby="cacat-final-tambahan">
                                        <div class="input-group-append">
                                            <button class="remove-field btn btn-outline-secondary" type="button">Remove</button>
                                        </div>
                                    </div>`);
        });

        $(document).on("click", ".remove-field", function() {
            $(this).closest(".input-block").remove();
        });
    </script>
    <?php include('include/script.php'); ?>
</body>

</html>