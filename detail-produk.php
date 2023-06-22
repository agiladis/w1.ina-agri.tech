<?php
    include('koneksi.php');

    if (isset($_GET['sn'])) {
		$sn = $_GET['sn'];
		$query = "SELECT * FROM serial_number WHERE serial_number = '$sn'";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);

    $id_lcd = $row['LCD'];
    $id_pcb = $row['PCB'];
    $id_loadcell = $row['LOADCELL'];
    $id_tiang = $row['tiang_stadio'];
    $id_base_1 = $row['base_infanto'];
    $id_pita = $row['pita_lila'];
    $grup = str_replace('g','G',$row['group_produksi']);
    $status = '';
    if ($row['kondisi_inprocess'] == 'Not Good'){
      $status = '<i class="fa fa-times" style="color:red"></i>'.$row['kondisi_inprocess']; // tanda silang merah
    }else if ($row['kondisi_inprocess'] == 'Good'){
      $status = '<i class="fa fa-check" style="color:green"></i>'.$row['kondisi_inprocess']; // tanda centang hijau
    }
	  }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="src\plugins\bootstrap-4.0.0\dist\css\bootstrap.min.css">
    <script type="text/javascript" src="src\plugins\bootstrap-4.0.0\dist\js\bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="vendors\styles\style.css">
</head>
<body>
    <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalTour">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-body p-5">
        <h2  class="fw-bold mb-0 text-center">Serial Number : <br><?= $sn;?></h2>
        <h2 class="fw-bold mb-0 text-center"><br>Data Produk</h2>

        <div class="container text-center mx-0">
        <?php
            if ($id_lcd == 0) {
              // echo "LCD : -</br>";
            } else {
              echo '<div class="row my-4">';
              getdetail($id_lcd);
              echo '</div>';
            }
            if ($id_pcb == 0) {
              // echo "PCB : -</br>";
            } else {
              echo '<div class="row my-3">';
              getdetail($id_pcb);
              echo '</div>';
            }
            if ($id_loadcell == 0) {
              // echo "LOADCELL : -</br>";
            } else {
              echo '<div class="row my-3">';
              getdetail($id_loadcell);
              echo '</div>';
            }
            if ($id_tiang == 0) {
              // echo "Rocker-Switch : -</br>";
            } else {
              echo '<div class="row my-3">';
              getdetail($id_tiang);
              echo '</div>';
            }
            if ($id_base== 0) {
              // echo "Rocker-Switch : -</br>";
            } else {
              echo '<div class="row my-3">';
              getdetail($id_base);
              echo '</div>';
              
            }
            if ($id_pita == 0) {
              // echo "Rocker-Switch : -</br>";
            } else {
              echo '<div class="row my-3">';
              getdetail($id_pita);
              echo '</div>';
            }

            if ($status != null){
              echo '<div class="row my-3">';
              echo "Status QC : ".$status . "(" . $row['penanggung_jawab_inprocess'] . ")";
              echo '</div>';
            }
            if ($grup != null) {
              echo '<div class="row my-3">';
              echo "Group Produksi : ".$grup;
              echo '</div>';
            }

          function getdetail($id){
            $value = explode(",",$id);
            $no_kardus = "";
            $no_batch = "";
            $unique_batches = array(); // Array untuk menyimpan nomor batch yang unik

            foreach ($value as $i) {
              $i = (int) $i;
              $query = mysql_query("SELECT * FROM perangkat WHERE id = $i");
              $row = mysql_fetch_assoc($query);
              $no_kardus .= $row['no_kardus'] . ', ';

              if (!in_array($row['no_batch'], $unique_batches)) {
                $unique_batches[] = $row['no_batch']; // Tambahkan nomor batch baru ke array unik
                $no_batch .= $row['no_batch'] . ', ';
              }
            }
            echo $row['nama_perangkat'] . " : Batch-" .  substr($no_batch,0,-2) . "  Kardus-  " . substr($no_kardus,0,-2) . "  tgl (" . $row['tgl_datang'] . ")</br>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
