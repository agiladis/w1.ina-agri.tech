<?php 
    include('../koneksi.php');

    $id_kategori = $_POST['id_kategori'];

    // GET KODE KATEGORI
    if ($id_kategori) {   
        $query_category = mysql_query("SELECT kode FROM kategori_produk WHERE id = $id_kategori");
        $row_category = mysql_fetch_assoc($query_category);
        $category_code = $row_category['kode'];
    }
?>
<div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label">LCD</label>
    <div class="col-sm-12 col-md-10">
        <select name="LCD" class="custom-select col-12">
            <option selected value="0">Choose...</option>
            <?php 
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "LCD"
                $query_perangkat_lcd = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'LCD%' AND kondisi = 'Good' AND taken = 0 ");
                $data_lcd = mysql_fetch_assoc($query_perangkat_lcd);
                if (mysql_num_rows($query_perangkat_lcd) > 0) :
                do {										
            ?>
                <option value="<?= $data_lcd['id']; ?>" ><?= $data_lcd['nama_perangkat'] . ", " . "Batch-" . $data_lcd['no_batch'] . ", Kardus-" . $data_lcd['no_kardus']; ?></option>
            <?php } while($data_lcd = mysql_fetch_assoc($query_perangkat_lcd)); else : ?>
                <option selected value="0">NOT FOUND</option>
            <?php endif ?>
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
                $query_perangkat_pcb = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE '%PCB-$category_code%' AND kondisi = 'Good' AND taken = 0 ");
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
                $query_perangkat_loadcell = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE '%LOADCELL-$category_code%' AND kondisi = 'Good' AND taken = 0 ");
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