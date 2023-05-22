<?php
include('../koneksi.php');

$id_kategori = $_POST['id_kategori'];

// GET KODE KATEGORI
if ($id_kategori) {
    $query_category = mysql_query("SELECT kode FROM kategori_produk WHERE id = $id_kategori");
    $row_category = mysql_fetch_assoc($query_category);
    $category_code = $row_category['kode'];
}

if($id_kategori==1){
    $jml_unit=100;
}
elseif($id_kategori==2){
    $jml_unit=50;
}
elseif($id_kategori==3){
    $jml_unit=10;
}
elseif($id_kategori==4){
    $jml_unit=500;
}
elseif($id_kategori==5){
    $jml_unit=100;
}
?>

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Jumlah</label>
        <div id="jumlah-container" class="col-sm-12 col-md-10">
            <input name="jumlah" class="form-control" type="text" value="<?php echo $jml_unit;?>" readonly>
        </div>
    </div>
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
                        <option value="<?= $data_lcd['id']; ?>"><?= $data_lcd['nama_perangkat'] . ", " . "Batch-" . $data_lcd['no_batch'] . ", Kardus-" . $data_lcd['no_kardus']; ?></option>
                    <?php } while ($data_lcd = mysql_fetch_assoc($query_perangkat_lcd));
                else : ?>
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
                        <option value="<?= $data_pcb['id']; ?>"><?= $data_pcb['nama_perangkat'] . ", " . "Batch-" . $data_pcb['no_batch'] . ", Kardus-" . $data_pcb['no_kardus']; ?></option>
                    <?php } while ($data_pcb = mysql_fetch_assoc($query_perangkat_pcb));
                else : ?>
                    <option selected value="0">NOT FOUND</option>
                <?php endif ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Load Cell</label>
        <div class="col-sm-12 col-md-10">
            <select name="LOADCELL" class="custom-select col-12">
                <option selected value="0">Choose...</option>
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "LOADCELL"
                $query_perangkat_loadcell = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE '%LOADCELL-$category_code%' AND kondisi = 'Good' AND taken = 0 ");
                $data_loadcell = mysql_fetch_assoc($query_perangkat_loadcell);
                if (mysql_num_rows($query_perangkat_loadcell) > 0) :
                    do {
                ?>
                        <option value="<?= $data_loadcell['id']; ?>"><?= $data_loadcell['nama_perangkat'] . ", " . "Batch-" . $data_loadcell['no_batch'] . ", Kardus-" . $data_loadcell['no_kardus']; ?></option>
                    <?php } while ($data_loadcell = mysql_fetch_assoc($query_perangkat_loadcell));
                else : ?>
                    <option selected value="0">NOT FOUND</option>
                <?php endif ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Rocker Switch</label>
        <div class="col-sm-12 col-md-10">
            <select name="rocker-switch" class="custom-select col-12">
                <option selected value="0">Choose...</option>
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "Rocker-Switch"
                $query_perangkat_rocker = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'Rocker-Switch%' AND kondisi = 'Good' AND taken = 0 ");
                $data_rocker = mysql_fetch_assoc($query_perangkat_rocker);
                if (mysql_num_rows($query_perangkat_rocker) > 0) :
                    do {
                ?>
                        <option value="<?= $data_rocker['id']; ?>"><?= $data_rocker['nama_perangkat'] . ", " . "Batch-" . $data_rocker['no_batch'] . ", Kardus-" . $data_rocker['no_kardus']; ?></option>
                    <?php } while ($data_rocker = mysql_fetch_assoc($query_perangkat_rocker));
                else : ?>
                    <option selected value="0">NOT FOUND</option>
                <?php endif ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Base Infanto 1</label>
        <div class="col-sm-12 col-md-10">
            <select name="base-infanto-1" class="custom-select col-12">
                <option selected value="0">Choose...</option>
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "Rocker-Switch"
                $query_perangkat_base = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'Base-Infanto-1%' AND kondisi = 'Good' AND taken = 0 ");
                $data_base = mysql_fetch_assoc($query_perangkat_base);
                if (mysql_num_rows($query_perangkat_base) > 0) :
                    do {
                ?>
                        <option value="<?= $data_base['id']; ?>"><?= $data_base['nama_perangkat'] . ", " . "Batch-" . $data_base['no_batch'] . ", Kardus-" . $data_base['no_kardus']; ?></option>
                    <?php } while ($data_base = mysql_fetch_assoc($query_perangkat_base));
                else : ?>
                    <option selected value="0">NOT FOUND</option>
                <?php endif ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Base Infanto 2</label>
        <div class="col-sm-12 col-md-10">
            <select name="base-infanto-2" class="custom-select col-12">
                <option selected value="0">Choose...</option>
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "Rocker-Switch"
                $query_perangkat_base = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'Base-Infanto-2%' AND kondisi = 'Good' AND taken = 0 ");
                $data_base = mysql_fetch_assoc($query_perangkat_base);
                if (mysql_num_rows($query_perangkat_base) > 0) :
                    do {
                ?>
                        <option value="<?= $data_base['id']; ?>"><?= $data_base['nama_perangkat'] . ", " . "Batch-" . $data_base['no_batch'] . ", Kardus-" . $data_base['no_kardus']; ?></option>
                    <?php } while ($data_base = mysql_fetch_assoc($query_perangkat_base));
                else : ?>
                    <option selected value="0">NOT FOUND</option>
                <?php endif ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Tiang Stadio 1</label>
        <div class="col-sm-12 col-md-10">
            <select name="tiang-stadio-1" class="custom-select col-12">
                <option selected value="0">Choose...</option>
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "Rocker-Switch"
                $query_perangkat_tiang = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'Tiang-Stadio-1%' AND kondisi = 'Good' AND taken = 0 ");
                $data_tiang = mysql_fetch_assoc($query_perangkat_tiang);
                if (mysql_num_rows($query_perangkat_tiang) > 0) :
                    do {
                ?>
                        <option value="<?= $data_tiang['id']; ?>"><?= $data_tiang['nama_perangkat'] . ", " . "Batch-" . $data_tiang['no_batch'] . ", Kardus-" . $data_tiang['no_kardus']; ?></option>
                    <?php } while ($data_tiang = mysql_fetch_assoc($query_perangkat_tiang));
                else : ?>
                    <option selected value="0">NOT FOUND</option>
                <?php endif ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Tiang Stadio 2</label>
        <div class="col-sm-12 col-md-10">
            <select name="tiang-stadio-2" class="custom-select col-12">
                <option selected value="0">Choose...</option>
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "Rocker-Switch"
                $query_perangkat_tiang = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'Tiang-Stadio-2%' AND kondisi = 'Good' AND taken = 0 ");
                $data_tiang = mysql_fetch_assoc($query_perangkat_tiang);
                if (mysql_num_rows($query_perangkat_tiang) > 0) :
                    do {
                ?>
                        <option value="<?= $data_tiang['id']; ?>"><?= $data_tiang['nama_perangkat'] . ", " . "Batch-" . $data_tiang['no_batch'] . ", Kardus-" . $data_tiang['no_kardus']; ?></option>
                    <?php } while ($data_tiang = mysql_fetch_assoc($query_perangkat_tiang));
                else : ?>
                    <option selected value="0">NOT FOUND</option>
                <?php endif ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Tiang Stadio 3</label>
        <div class="col-sm-12 col-md-10">
            <select name="tiang-stadio-3" class="custom-select col-12">
                <option selected value="0">Choose...</option>
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "Rocker-Switch"
                $query_perangkat_tiang = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'Tiang-Stadio-3%' AND kondisi = 'Good' AND taken = 0 ");
                $data_tiang = mysql_fetch_assoc($query_perangkat_tiang);
                if (mysql_num_rows($query_perangkat_tiang) > 0) :
                    do {
                ?>
                        <option value="<?= $data_tiang['id']; ?>"><?= $data_tiang['nama_perangkat'] . ", " . "Batch-" . $data_tiang['no_batch'] . ", Kardus-" . $data_tiang['no_kardus']; ?></option>
                    <?php } while ($data_tiang = mysql_fetch_assoc($query_perangkat_tiang));
                else : ?>
                    <option selected value="0">NOT FOUND</option>
                <?php endif ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Tiang Stadio 4</label>
        <div class="col-sm-12 col-md-10">
            <select name="tiang-stadio-4" class="custom-select col-12">
                <option selected value="0">Choose...</option>
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "Rocker-Switch"
                $query_perangkat_tiang = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'Tiang-Stadio-4%' AND kondisi = 'Good' AND taken = 0 ");
                $data_tiang = mysql_fetch_assoc($query_perangkat_tiang);
                if (mysql_num_rows($query_perangkat_tiang) > 0) :
                    do {
                ?>
                        <option value="<?= $data_tiang['id']; ?>"><?= $data_tiang['nama_perangkat'] . ", " . "Batch-" . $data_tiang['no_batch'] . ", Kardus-" . $data_tiang['no_kardus']; ?></option>
                    <?php } while ($data_tiang = mysql_fetch_assoc($query_perangkat_tiang));
                else : ?>
                    <option selected value="0">NOT FOUND</option>
                <?php endif ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Pita Lila</label>
        <div class="col-sm-12 col-md-10">
            <select name="pita-lila" class="custom-select col-12">
                <option selected value="0">Choose...</option>
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "Rocker-Switch"
                $query_perangkat_pita = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'Pita-Lila%' AND kondisi = 'Good' AND taken = 0 ");
                $data_pita = mysql_fetch_assoc($query_perangkat_pita);
                if (mysql_num_rows($query_perangkat_pita) > 0) :
                    do {
                ?>
                        <option value="<?= $data_pita['id']; ?>"><?= $data_pita['nama_perangkat'] . ", " . "Batch-" . $data_pita['no_batch'] . ", Kardus-" . $data_pita['no_kardus']; ?></option>
                    <?php } while ($data_pita = mysql_fetch_assoc($query_perangkat_pita));
                else : ?>
                    <option selected value="0">NOT FOUND</option>
                <?php endif ?>
            </select>
        </div>
    </div>