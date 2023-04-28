<?php
    session_start();
    include('koneksi.php');
    if(isset($_GET['id_pemesan']) && isset($_GET['id_batch'])){
      $id_pemesan = $_GET['id_pemesan'];
		  $id_batch = $_GET['id_batch'];
      $query_serial = mysql_query("SELECT * FROM serial_number WHERE id_pemesan = $id_pemesan AND id_batch=$id_batch");
      $serial_numbers = array(); // inisialisasi array
      while ($row_sn = mysql_fetch_assoc($query_serial)) {
          $serial_numbers[] = $row_sn['serial_number']; // tambahkan serial number ke dalam array
      }
      $query_printed = mysql_query("UPDATE batch_produksi SET printed = '1' WHERE id_pemesan = $id_pemesan AND kode_batch=$id_batch");
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS -->
	  <link rel="stylesheet" href="vendors/styles/style.css">
</head>
<body>
<div class="qr-code-grid">
  <?php foreach ($serial_numbers as $serial) : ?>
    <div class="qr-code">
      <div class="qrcode" id="qrcode-<?php echo $serial; ?>"></div>
    </div>
  <?php endforeach; ?>
  </div>
    <script src="vendors\scripts\jquery.min.js"></script>
    <script src="vendors\scripts\jquery-qrcode-0.18.0.js"></script>
    <script>
        $(document).ready(function() {
            <?php foreach ($serial_numbers as $serial) : ?>
                var text = '<?php echo $serial; ?>';
                $('#qrcode-<?php echo $serial; ?>').qrcode({
                    render: 'image',
                    text: text,
                    quiet: 4,
                    mSize: 0.07,
                    mPosX: 0.5,
                    mPosY: 0.95,
                    mode: 2,
                    label: text,
                    fontname: 'sans',
                    fontcolor: '#000',
                });
            <?php endforeach; ?>
        });
        </script>


</body>

</html>

