<!-- multiselect asset -->
<link href="./vendors/styles/jquery.multiselect.css" rel="stylesheet" />
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="./vendors/scripts/jquery-1.12.4.js"></script>
<script src="./vendors/scripts/jquery.multiselect.js"></script>

<?php
include('../koneksi.php');

$id_kategori = $_POST['id_kategori'];
$lot = $_POST['id_kategori'];

// GET KODE KATEGORI
if ($id_kategori) {
    $query_category = mysql_query("SELECT * FROM kategori_produk WHERE id = $id_kategori");
    $row_category = mysql_fetch_assoc($query_category);
    $category_code = $row_category['kode'];
    $jml_unit = $row_category['unit'];
}
if (isset($_POST['lot'])) {
    $lot = $_POST['lot'];
    $jml_unit *= $lot;
}

?>

<?php
if ($category_code == 'TDWS') {
?>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Jumlah</label>
        <div id="jumlah-container" class="col-sm-12 col-md-10">
            <input name="jumlah" class="form-control" type="text" value="<?php echo $jml_unit; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">LCD</label>
        <div class="col-sm-12 col-md-10">
            <select name="LCD[]" multiple="multiple" class="3col active custom-select col-12">
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "LCD"
                $query_perangkat_lcd = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'LCD%' AND kondisi = 'Good' AND taken = 0 ");
                $data_lcd = mysql_fetch_assoc($query_perangkat_lcd);
                if (mysql_num_rows($query_perangkat_lcd) > 0) :
                    do {
                ?>
                        <option value="<?= $data_lcd['id']; ?>"><?= $data_lcd['no_batch'] . "." . str_pad($data_lcd['no_kardus'], 3, "0", STR_PAD_LEFT) . ".".$data_lcd['unit_barang'] .".".$data_lcd['kode_perangkat']; ?></option>
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
            <select name="PCB[]" multiple="multiple" class="3col active custom-select col-12">
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "PCB"
                $query_perangkat_pcb = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE '%PCB-$category_code%' AND kondisi = 'Good' AND taken = 0 ");
                $data_pcb = mysql_fetch_assoc($query_perangkat_pcb);
                if (mysql_num_rows($query_perangkat_pcb) > 0) :
                    do {
                ?>
                        <option value="<?= $data_pcb['id']; ?>"><?= $data_pcb['no_batch'] . "." . str_pad($data_pcb['no_kardus'], 3, "0", STR_PAD_LEFT) . ".".$data_pcb['unit_barang'] .".".$data_pcb['kode_perangkat']; ?></option>
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
            <select name="LOADCELL[]" multiple="multiple" class="3col active custom-select col-12">
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "LOADCELL"
                $query_perangkat_loadcell = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE '%LOADCELL-$category_code%' AND kondisi = 'Good' AND taken = 0 ");
                $data_loadcell = mysql_fetch_assoc($query_perangkat_loadcell);
                if (mysql_num_rows($query_perangkat_loadcell) > 0) :
                    do {
                ?>
                        <option value="<?= $data_loadcell['id']; ?>"><?= $data_loadcell['no_batch'] . "." . str_pad($data_loadcell['no_kardus'], 3, "0", STR_PAD_LEFT) . ".".$data_loadcell['unit_barang'] .".".$data_loadcell['kode_perangkat']; ?></option>
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
            <select name="rocker-switch[]" multiple="multiple" class="3col active custom-select col-12">
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "Rocker-Switch"
                $query_perangkat_rocker = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'Rocker-Switch%' AND kondisi = 'Good' AND taken = 0 ");
                $data_rocker = mysql_fetch_assoc($query_perangkat_rocker);
                if (mysql_num_rows($query_perangkat_rocker) > 0) :
                    do {
                ?>
                        <option value="<?= $data_rocker['id']; ?>"><?= $data_rocker['no_batch'] . "." . str_pad($data_rocker['no_kardus'], 3, "0", STR_PAD_LEFT) . ".".$data_rocker['unit_barang'] .".".$data_rocker['kode_perangkat']; ?></option>
                    <?php } while ($data_rocker = mysql_fetch_assoc($query_perangkat_rocker));
                else : ?>
                    <option selected value="0">NOT FOUND</option>
                <?php endif ?>
            </select>
        </div>
    </div>
<?php
} elseif ($category_code == 'INFT') {
?>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Jumlah</label>
        <div id="jumlah-container" class="col-sm-12 col-md-10">
            <input name="jumlah" class="form-control" type="text" value="<?php echo $jml_unit; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Base Infanto 1</label>
        <div class="col-sm-12 col-md-10">
            <select name="base-infanto-1[]" multiple="multiple" class="3col active custom-select col-12">
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "Rocker-Switch"
                $query_perangkat_base = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'Base-Infanto-1%' AND kondisi = 'Good' AND taken = 0 ");
                $data_base = mysql_fetch_assoc($query_perangkat_base);
                if (mysql_num_rows($query_perangkat_base) > 0) :
                    do {
                ?>
                        <option value="<?= $data_base['id']; ?>"><?= $data_base['no_batch'] . "." . str_pad($data_base['no_kardus'], 3, "0", STR_PAD_LEFT) . ".".$data_base['unit_barang'] .".".$data_base['kode_perangkat']; ?></option>
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
            <select name="base-infanto-2[]" multiple="multiple" class="3col active custom-select col-12">
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "Rocker-Switch"
                $query_perangkat_base = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'Base-Infanto-2%' AND kondisi = 'Good' AND taken = 0 ");
                $data_base = mysql_fetch_assoc($query_perangkat_base);
                if (mysql_num_rows($query_perangkat_base) > 0) :
                    do {
                ?>
                        <option value="<?= $data_base['id']; ?>"><?= $data_base['no_batch'] . "." . str_pad($data_base['no_kardus'], 3, "0", STR_PAD_LEFT) . ".".$data_base['unit_barang'] .".".$data_base['kode_perangkat']; ?></option>
                    <?php } while ($data_base = mysql_fetch_assoc($query_perangkat_base));
                else : ?>
                    <option selected value="0">NOT FOUND</option>
                <?php endif ?>
            </select>
        </div>
    </div>
<?php
} elseif ($category_code == 'STDO') {
?>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Jumlah</label>
        <div id="jumlah-container" class="col-sm-12 col-md-10">
            <input name="jumlah" class="form-control" type="text" value="<?php echo $jml_unit; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Tiang Stadio 1</label>
        <div class="col-sm-12 col-md-10">
            <select name="tiang-stadio-1[]" multiple="multiple" class="3col active custom-select col-12">
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "Rocker-Switch"
                $query_perangkat_tiang = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'Tiang-Stadio-1%' AND kondisi = 'Good' AND taken = 0 ");
                $data_tiang = mysql_fetch_assoc($query_perangkat_tiang);
                if (mysql_num_rows($query_perangkat_tiang) > 0) :
                    do {
                ?>
                        <option value="<?= $data_tiang['id']; ?>"><?= $data_tiang['no_batch'] . "." . str_pad($data_tiang['no_kardus'], 3, "0", STR_PAD_LEFT) . ".".$data_tiang['unit_barang'] .".".$data_tiang['kode_perangkat']; ?></option>
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
            <select name="tiang-stadio-2[]" multiple="multiple" class="3col active custom-select col-12">
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "Rocker-Switch"
                $query_perangkat_tiang = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'Tiang-Stadio-2%' AND kondisi = 'Good' AND taken = 0 ");
                $data_tiang = mysql_fetch_assoc($query_perangkat_tiang);
                if (mysql_num_rows($query_perangkat_tiang) > 0) :
                    do {
                ?>
                        <option value="<?= $data_tiang['id']; ?>"><?= $data_tiang['no_batch'] . "." . str_pad($data_tiang['no_kardus'], 3, "0", STR_PAD_LEFT) . ".".$data_tiang['unit_barang'] .".".$data_tiang['kode_perangkat']; ?></option>
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
            <select name="tiang-stadio-3[]" multiple="multiple" class="3col active custom-select col-12">
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "Rocker-Switch"
                $query_perangkat_tiang = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'Tiang-Stadio-3%' AND kondisi = 'Good' AND taken = 0 ");
                $data_tiang = mysql_fetch_assoc($query_perangkat_tiang);
                if (mysql_num_rows($query_perangkat_tiang) > 0) :
                    do {
                ?>
                        <option value="<?= $data_tiang['id']; ?>"><?= $data_tiang['no_batch'] . "." . str_pad($data_tiang['no_kardus'], 3, "0", STR_PAD_LEFT) . ".".$data_tiang['unit_barang'] .".".$data_tiang['kode_perangkat']; ?></option>
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
            <select name="tiang-stadio-4[]" multiple="multiple" class="3col active custom-select col-12">
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "Rocker-Switch"
                $query_perangkat_tiang = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'Tiang-Stadio-4%' AND kondisi = 'Good' AND taken = 0 ");
                $data_tiang = mysql_fetch_assoc($query_perangkat_tiang);
                if (mysql_num_rows($query_perangkat_tiang) > 0) :
                    do {
                ?>
                        <option value="<?= $data_tiang['id']; ?>"><?= $data_tiang['no_batch'] . "." . str_pad($data_tiang['no_kardus'], 3, "0", STR_PAD_LEFT) . ".".$data_tiang['unit_barang'] .".".$data_tiang['kode_perangkat']; ?></option>
                    <?php } while ($data_tiang = mysql_fetch_assoc($query_perangkat_tiang));
                else : ?>
                    <option selected value="0">NOT FOUND</option>
                <?php endif ?>
            </select>
        </div>
    </div>

<?php
} elseif ($category_code == 'LILA') {
?>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Jumlah</label>
        <div id="jumlah-container" class="col-sm-12 col-md-10">
            <input name="jumlah" class="form-control" type="text" value="<?php echo $jml_unit; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Pita Lila</label>
        <div class="col-sm-12 col-md-10">
            <select name="pita-lila[]" multiple="multiple" class="3col active custom-select col-12">
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "Pita-Lila"
                $query_perangkat_pita = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'Pita-Lila%' AND kondisi = 'Good' AND taken = 0 ");
                $data_pita = mysql_fetch_assoc($query_perangkat_pita);
                if (mysql_num_rows($query_perangkat_pita) > 0) :
                    do {
                ?>
                        <option value="<?= $data_pita['id']; ?>"><?= $data_pita['no_batch'] . "." . str_pad($data_pita['no_kardus'], 3, "0", STR_PAD_LEFT) . ".".$data_pita['unit_barang'] .".".$data_pita['kode_perangkat']; ?></option>
                    <?php } while ($data_pita = mysql_fetch_assoc($query_perangkat_pita));
                else : ?>
                    <option selected value="0">NOT FOUND</option>
                <?php endif ?>
            </select>
        </div>
    </div>
<?php
} elseif ($category_code == 'BBWS') {
?>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Jumlah</label>
        <div id="jumlah-container" class="col-sm-12 col-md-10">
            <input name="jumlah" class="form-control" type="text" value="<?php echo $jml_unit; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">LCD</label>
        <div class="col-sm-12 col-md-10">
            <select name="LCD[]" multiple="multiple" class="3col active custom-select col-12">
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "LCD"
                $query_perangkat_lcd = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'LCD%' AND kondisi = 'Good' AND taken = 0 ");
                $data_lcd = mysql_fetch_assoc($query_perangkat_lcd);
                if (mysql_num_rows($query_perangkat_lcd) > 0) :
                    do {
                ?>
                        <option value="<?= $data_lcd['id']; ?>"><?= $data_lcd['no_batch'] . "." . str_pad($data_lcd['no_kardus'], 3, "0", STR_PAD_LEFT) . ".".$data_lcd['unit_barang'] .".".$data_lcd['kode_perangkat']; ?></option>
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
            <select name="PCB[]" multiple="multiple" class="3col active custom-select col-12">
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "PCB"
                $query_perangkat_pcb = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE '%PCB-$category_code%' AND kondisi = 'Good' AND taken = 0 ");
                $data_pcb = mysql_fetch_assoc($query_perangkat_pcb);
                if (mysql_num_rows($query_perangkat_pcb) > 0) :
                    do {
                ?>
                        <option value="<?= $data_pcb['id']; ?>"><?= $data_pcb['no_batch'] . "." . str_pad($data_pcb['no_kardus'], 3, "0", STR_PAD_LEFT) . ".".$data_pcb['unit_barang'] .".".$data_pcb['kode_perangkat']; ?></option>
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
            <select name="LOADCELL[]" multiple="multiple" class="3col active custom-select col-12">
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "LOADCELL"
                $query_perangkat_loadcell = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE '%LOADCELL-$category_code%' AND kondisi = 'Good' AND taken = 0 ");
                $data_loadcell = mysql_fetch_assoc($query_perangkat_loadcell);
                if (mysql_num_rows($query_perangkat_loadcell) > 0) :
                    do {
                ?>
                        <option value="<?= $data_loadcell['id']; ?>"><?= $data_loadcell['no_batch'] . "." . str_pad($data_loadcell['no_kardus'], 3, "0", STR_PAD_LEFT) . ".".$data_loadcell['unit_barang'] .".".$data_loadcell['kode_perangkat']; ?></option>
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
            <select name="rocker-switch[]" multiple="multiple" class="3col active custom-select col-12">
                <?php
                // GET ID perangkat FROM TBL perangkat WHERE perangkat = "Rocker-Switch"
                $query_perangkat_rocker = mysql_query("SELECT * FROM perangkat WHERE nama_perangkat LIKE 'Rocker-Switch%' AND kondisi = 'Good' AND taken = 0 ");
                $data_rocker = mysql_fetch_assoc($query_perangkat_rocker);
                if (mysql_num_rows($query_perangkat_rocker) > 0) :
                    do {
                ?>
                        <option value="<?= $data_rocker['id']; ?>"><?= $data_rocker['no_batch'] . "." . str_pad($data_rocker['no_kardus'], 3, "0", STR_PAD_LEFT) . ".".$data_rocker['unit_barang'] .".".$data_rocker['kode_perangkat']; ?></option>
                    <?php } while ($data_rocker = mysql_fetch_assoc($query_perangkat_rocker));
                else : ?>
                    <option selected value="0">NOT FOUND</option>
                <?php endif ?>
            </select>
        </div>
    </div>
<?php
}
?>
<script>
    $(function() {
        var number = <?php echo $lot ?>;
        $('select[multiple].active.3col').multiselect({
            columns: 2,
            search: true,
            texts: {
                placeholder: 'Select Hardware (max ' + number + ')',
                search: 'Search Hardware'
            },
            // selectAll: true,
            onOptionClick: function(element, option) {
                var maxSelect = number;

                // too many selected, deselect this option
                if ($(element).val().length > maxSelect) {
                    if ($(option).is(':checked')) {
                        var thisVals = $(element).val();

                        thisVals.splice(
                            thisVals.indexOf($(option).val()), 1
                        );

                        $(element).val(thisVals);

                        $(option).prop('checked', false).closest('li')
                            .toggleClass('selected');
                    }
                }
                // max select reached, disable non-checked checkboxes
                else if ($(element).val().length == maxSelect) {
                    $(element).next('.ms-options-wrap')
                        .find('li:not(.selected)').addClass('disabled')
                        .find('input[type="checkbox"]')
                        .attr('disabled', 'disabled');
                }
                // max select not reached, make sure any disabled
                // checkboxes are available
                else {
                    $(element).next('.ms-options-wrap')
                        .find('li.disabled').removeClass('disabled')
                        .find('input[type="checkbox"]')
                        .removeAttr('disabled');
                }
            }
        });
    });
</script>