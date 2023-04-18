<?php 
    include('../koneksi.php');

    $id_kategori = $_POST['id_kategori'];
    $kode_batch = $_POST['kode_batch'];

    // GET LAST KODE NOMOR FOR INCREMENT
    $query_kode = mysql_query("SELECT * FROM serial_number WHERE id_kategori = $id_kategori AND id_batch = $kode_batch ORDER BY id DESC LIMIT 1");
    if (mysql_num_rows($query_kode) > 0) {
        // if any data get last digit increment
        $row_kode = mysql_fetch_assoc($query_kode);
        $last_digit_kode_nomor = intval(substr($row_kode["serial_number"], -4));
        $number = sprintf('%04d', $last_digit_kode_nomor + 1);
    } else {
        // if no data exist
        $last_digit_kode_nomor = 0001;   
        $number = sprintf('%04d', $last_digit_kode_nomor);
    }

    // GET KODE KATEGORI
    if ($id_kategori) {   
        $query_category = mysql_query("SELECT kode FROM kategori_produk WHERE id = $id_kategori");
        $row_category = mysql_fetch_assoc($query_category);
        $category_code = $row_category['kode'];
    }
?>
<!-- <input name="kode_nomor" class="form-control" type="text" value="<?= $number ?>" readonly> -->
<div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label">Kode Nomor</label>
    <div id="kode-nomor-container" class="col-sm-12 col-md-10">
        <input name="kode_nomor" class="form-control" type="text" value="<?= $number ?>" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label">LCD</label>
    <div class="col-sm-12 col-md-10">
        <select name="LCD" class="custom-select col-12">
            <option selected value="0">Choose...</option>
            <?php 
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "LCD"
                $query_perangkat_lcd = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'LCD%'");
                $data_lcd = mysql_fetch_assoc($query_perangkat_lcd);
                do {										
            ?>
                <option value="<?= $data_lcd['id']; ?>" ><?= $data_lcd['nama_perangkat'] . ", " . "Batch-" . $data_lcd['no_batch'] . ", Kardus-" . $data_lcd['no_kardus']; ?></option>
            <?php } while($data_lcd = mysql_fetch_assoc($query_perangkat_lcd)); ?>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label">PCB</label>
    <div class="col-sm-12 col-md-10">
        <select name="PCB" class="custom-select col-12">
            <option selected value="0">Choose...</option>
            <?php 
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "PCB"
                $query_perangkat_pcb = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE '%PCB-$category_code%'");
                $data_pcb = mysql_fetch_assoc($query_perangkat_pcb);
                if (mysql_num_rows($query_perangkat_pcb) > 0) :
                do {										
            ?>
                <option value="<?= $data_pcb['id']; ?>" ><?= $data_pcb['nama_perangkat'] . ", " . "Batch-" . $data_pcb['no_batch'] . ", Kardus-" . $data_pcb['no_kardus']; ?></option>
            <?php } while($data_pcb = mysql_fetch_assoc($query_perangkat_pcb)); else: ?>
                <option selected value="0">NOT FOUND</option>
            <?php endif ?>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label">Load Cell</label>
    <div class="col-sm-12 col-md-10">
        <select id="asik" name="LOADCELL" class="custom-select col-12">
            <option selected value="0">Choose...</option>
            <?php 
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "LOADCELL"
                $query_perangkat_loadcell = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE '%LOADCELL-$category_code%'");
                $data_loadcell = mysql_fetch_assoc($query_perangkat_loadcell);
                if (mysql_num_rows($query_perangkat_loadcell) > 0) :
                do {										
            ?>
                <option value="<?= $data_loadcell['id']; ?>" ><?= $data_loadcell['nama_perangkat'] . ", " . "Batch-" . $data_loadcell['no_batch'] . ", Kardus-" . $data_loadcell['no_kardus']; ?></option>
            <?php } while($data_loadcell = mysql_fetch_assoc($query_perangkat_loadcell)); else: ?>
                <option selected value="0">NOT FOUND</option>
            <?php endif ?>
        </select>
    </div>
</div>