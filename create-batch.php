<?php
session_start();
include('koneksi.php');
$usernow = $_SESSION['nama'];
$datee = date("d-m-Y H:i:s");
//GENERATE BATCH PRODUKSI
$id_pemesan = $_POST['id_pemesan'];
$kode_batch = $_POST['kode_batch'];
$tgl_mulai = $_POST['tgl_mulai'];

// GENERATE SERIAL NUMBER
// $id_batch_produksi = $_POST['batch_produksi'];
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

//INSERT_to_TB_batch-produksi
$query_create = mysql_query("INSERT INTO batch_produksi (id_pemesan, kode_batch, tgl_mulai, kategori) VALUES ('$id_pemesan', '$kode_batch', '$tgl_mulai', '$kode_kategori')");

// $kode_nomor = $_POST['kode_nomor'];
$jumlah = $_POST['jumlah'];
$LCD = isset($_POST['LCD']) ? covertIntoStr($_POST['LCD']) : 0;
$PCB = isset($_POST['PCB']) ? covertIntoStr($_POST['PCB']) : 0;
$LOADCELL = isset($_POST['LOADCELL']) ? covertIntoStr($_POST['LOADCELL']) : 0;
$rocker_switch = isset($_POST['rocker-switch']) ? covertIntoStr($_POST['rocker-switch']) : 0;
$tiang_stadio_1 = isset($_POST['tiang-stadio-1']) ? covertIntoStr($_POST['tiang-stadio-1']) : 0;
$tiang_stadio_2 = isset($_POST['tiang-stadio-2']) ? covertIntoStr($_POST['tiang-stadio-2']) : 0;
$tiang_stadio_3 = isset($_POST['tiang-stadio-3']) ? covertIntoStr($_POST['tiang-stadio-3']) : 0;
$tiang_stadio_4 = isset($_POST['tiang-stadio-4']) ? covertIntoStr($_POST['tiang-stadio-4']) : 0;
$base_infanto_1 = isset($_POST['base-infanto-1']) ? covertIntoStr($_POST['base-infanto-1']) : 0;
$base_infanto_2 = isset($_POST['base-infanto-2']) ? covertIntoStr($_POST['base-infanto-2']) : 0;
$pita_lila = isset($_POST['pita-lila']) ? covertIntoStr($_POST['pita-lila']) : 0;

for ($i = 1; $i <= $jumlah; $i++) {
    $kode_nomor = str_pad($i, 3, "0", STR_PAD_LEFT); // menambahkan nomor urutan pada variabel kode_nomor
    $serial_number = $kode_pemesan . "-" . $kode_kategori . "-" . $kode_batch . "-" . $kode_nomor;
    $query_insert = mysql_query("INSERT INTO serial_number (id_batch, id_kategori, id_pemesan, serial_number, LCD, PCB, LOADCELL, rocker_switch,tiang_stadio_1,tiang_stadio_2,tiang_stadio_3,tiang_stadio_4,base_infanto_1,base_infanto_2,pita_lila) VALUES ('$kode_batch', '$id_kategori_produk', '$id_pemesan', '$serial_number', '$LCD', '$PCB', '$LOADCELL', '$rocker_switch','$tiang_stadio_1','$tiang_stadio_2','$tiang_stadio_3','$tiang_stadio_4','$base_infanto_1','$base_infanto_2','$pita_lila')");
}

// PATCH DATA TAKEN PERANGKAT TABEL : LCD, PCB, LOADCELL IF CREATE BATCH SUCCESS
if ($query_create) {
    if ($LCD != 0) {
        takenHardware($_POST['LCD']);
    }
    if ($PCB != 0) {
        takenHardware($_POST['PCB']);
    }
    if ($LOADCELL != 0) {
        takenHardware($_POST['LOADCELL']);
    }
    if ($rocker_switch != 0) {
        takenHardware($_POST['rocker-switch']);
    }
    if ($tiang_stadio_1 != 0) {
        takenHardware($_POST['tiang-stadio-1']);
    }
    if ($tiang_stadio_2 != 0) {
        takenHardware($_POST['tiang-stadio-2']);
    }
    if ($tiang_stadio_3 != 0) {
        takenHardware($_POST['tiang-stadio-3']);
    }
    if ($tiang_stadio_4 != 0) {
        takenHardware($_POST['tiang-stadio-4']);
    }
    if ($base_infanto_1 != 0) {
        takenHardware($_POST['base-infanto-1']);
    }
    if ($base_infanto_2 != 0) {
        takenHardware($_POST['base-infanto-2']);
    }
    if ($pita_lila != 0) {
        takenHardware($_POST['pita-lila']);
    }
}

// insert multiple value of perangkat into char
function covertIntoStr(array $arr_perangkat) {
    $str_buff = "";
    foreach ($arr_perangkat as $value) {
        $str_buff .= $value . ",";
    }

    return rtrim(substr($str_buff, 0, -1));
}

// set perangkat taken value = 1
function takenHardware(array $str_perangkat) {
    foreach ($str_perangkat as $char) {
        $id = (int)$char;
        mysql_query("UPDATE perangkat SET taken = 1 WHERE id = $id");
    }
}

$infoo = $usernow . " menambahkan batch produksi baru dengan kode batch " . $kode_batch;
mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");

if (!$query_insert) {
    header("Location: create-batch-production.php?generate=failed");
} else {
    // $url = "print-qr-all-batch.php?id_pemesan=$id_pemesan&id_batch=$kode_batch";
?>
    <script>
        window.location = 'batch-production-table.php';
    </script>
<?php
}
?>