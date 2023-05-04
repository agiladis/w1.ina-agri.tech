<?php 
    include('../koneksi.php');

    $id_pemesan = $_POST['id_pemesan'];
    $id_kategori = $_POST['id_kategori'];
    $kondisi_kategori = FALSE;

    if ($id_kategori) {
        // Get data kode kategori where id = $id_kategori
        $query_category = mysql_query("SELECT kode FROM kategori_produk WHERE id = $id_kategori");
        $row_category = mysql_fetch_assoc($query_category);
        $category_code = $row_category['kode'];

        // turn kondisi into true value
        $kondisi_kategori = TRUE;
    }
    
    if ($id_pemesan && $kondisi_kategori) :

        // GET LAST KODE NOMOR FOR INCREMENT
        $query_kode = mysql_query("SELECT * FROM batch_produksi WHERE id_pemesan = $id_pemesan AND kategori = '$category_code' ORDER BY id DESC LIMIT 1");
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
<?php else :?>
    <input class="form-control" name="kode_batch"  type="text" readonly>
<?php endif ?>