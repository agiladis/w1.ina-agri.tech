<?php 
    include('../koneksi.php');

    $id_pemesan = $_POST['id_pemesan'];

    // GET LAST KODE NOMOR FOR INCREMENT
    $query_kode = mysql_query("SELECT * FROM batch_produksi WHERE id_pemesan = $id_pemesan ORDER BY id DESC LIMIT 1");
    if (mysql_num_rows($query_kode) > 0) {
        // if any data get last digit increment
        $row_kode = mysql_fetch_assoc($query_kode);
        $last_kode = $row_kode['kode_batch'];
        $number = $last_kode + 1;
    } else {
        // if no data exist   
        $number = 1;
    }
?>
<input class="form-control" name="kode_batch"  type="text" value="<?= $number ?>" readonly>