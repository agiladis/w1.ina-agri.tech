<?php
    session_start();
    include('koneksi.php');
    $usernow = $_SESSION['nama'];
    //GENERATE BATCH PRODUKSI
    $id_pemesan = $_POST['id_pemesan'];
    $kode_batch = $_POST['kode_batch'];
    $tgl_mulai = $_POST['tgl_mulai'];

    $query_create = mysql_query("INSERT INTO batch_produksi (id_pemesan, kode_batch, tgl_mulai) VALUES ('$id_pemesan', '$kode_batch', '$tgl_mulai')");

    // GENERATE SERIAL NUMBER
    $id_kategori_produk = $_POST['kategori_produk'];
    // QUERY PEMESAN
    $query_pemesan = mysql_query("SELECT * FROM pemesan WHERE id = $id_pemesan ");
    $row_pemesan = mysql_fetch_assoc($query_pemesan);
    // query join produksi

    $query_kategori = mysql_query("SELECT * FROM kategori_produk WHERE id = $id_kategori_produk ");
    $row_kategori = mysql_fetch_assoc($query_kategori);


    // INSERT INTO TABLE serial_number FIELD serial_number, LCD, PCB, LOADCELL
    $kode_pemesan = $row_pemesan['kode'];
    $kode_kategori = $row_kategori['kode'];

    // $kode_nomor = $_POST['kode_nomor'];
    $LCD = $_POST['LCD'];
    $PCB = $_POST['PCB'];
    $LOADCELL = $_POST['LOADCELL'];
    $datee = date("d-m-Y H:i:s");

    for ($i = 1; $i <= 100; $i++) {
        $kode_nomor = str_pad($i, 2, "0", STR_PAD_LEFT); // menambahkan nomor urutan pada variabel kode_nomor
        $serial_number = $kode_pemesan . "-" . $kode_kategori . "-" . $kode_batch . "-" . $kode_nomor;
        $query_insert = mysql_query("INSERT INTO serial_number (id_batch, id_kategori, id_pemesan, serial_number, LCD, PCB, LOADCELL) VALUES ('$kode_batch', '$id_kategori_produk', '$id_pemesan', '$serial_number', '$LCD', '$PCB', '$LOADCELL')");
    }

    // PATCH DATA TAKEN PERANGKAT TABEL : LCD, PCB, LOADCELL
    if ($LCD != 0) {
        $query_patch_lcd = mysql_query("UPDATE perangkat SET taken = 1 WHERE id = $LCD"); // For LCD data
    }
    if ($PCB != 0) {
        $query_patch_pcb = mysql_query("UPDATE perangkat SET taken = 1 WHERE id = $PCB"); // For PCB data
    }
    if ($LOADCELL != 0) {
        $query_patch_loadcell = mysql_query("UPDATE perangkat SET taken = 1 WHERE id = $LOADCELL"); // For LOADCELL data
    }

    $infoo =$usernow." menambahkan batch produksi baru ".$kode_batch ;
    mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");

    if(!$query_insert) {
        header("Location: create-batch-production.php?generate=failed");
    } else {
        $url = "print-qr-all-batch.php?id_pemesan=$id_pemesan&id_batch=$kode_batch";
        ?>
        <script> window.open('<?php echo $url; ?>','_blank'); window.location = 'batch-production-table.php'; </script>
        <?php
    }
?>
