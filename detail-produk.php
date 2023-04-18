<?php
    include('koneksi.php');

    if (isset($_GET['sn'])) {
		$sn = $_GET['sn'];
		$query = "SELECT * FROM serial_number WHERE serial_number = '$sn'";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
        $serial = $row['serial_number'];

        //Menganbil data LCD
        $id_lcd = $row['LCD'];
        $query_lcd= mysql_query("SELECT * FROM perangkat WHERE id = $id_lcd"); 
        $row_lcd = mysql_fetch_assoc($query_lcd); 
        
        //Mengambil data PCB
        $id_pcb = $row['PCB'];
        $query_PCB= mysql_query("SELECT * FROM perangkat WHERE id = $id_pcb"); 
        $row_pcb = mysql_fetch_assoc($query_PCB);

        //Mengambil data LoadCell
        $id_loadcell = $row['LOADCELL'];
        $query_loadcell= mysql_query("SELECT * FROM perangkat WHERE id = $id_loadcell"); 
        $row_loadcell = mysql_fetch_assoc($query_loadcell);

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
</head>
<body>
    <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalTour">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-body p-5">
        <h2  class="fw-bold mb-0 text-center">Serial Number : <br><?= $sn;?></h2>
        <h2 class="fw-bold mb-0 text-center"><br>Data Produk</h2>

        <div class="container text-center mx-0">
            <div class="row my-3">
                <?php echo "LCD : Batch-".$row_lcd['no_batch']. "  Kardus-". $row_lcd['no_kardus'] . "  tgl (". $row_lcd['tgl_datang'].")</br>";?>
            </div>
            <div class="row my-3">
                <?php echo "PCB : Batch-".$row_pcb['no_batch']."  Kardus-".$row_pcb['no_kardus'] ."  tgl (". $row_pcb['tgl_datang'] . ")</br>";?>
            </div>
            <div class="row my-3">
            <?php echo "LOADCELL : Batch-".$row_loadcell['no_batch']. "  Kardus-". $row_loadcell['no_kardus']. " tgl (". $row_loadcell['tgl_datang'].")</br>" ;?>.
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>