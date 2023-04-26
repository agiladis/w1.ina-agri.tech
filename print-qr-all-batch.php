<?php
    session_start();
    include('koneksi.php');
    $query = mysql_query("SELECT * FROM serial_number ORDER BY id DESC LIMIT 1");
    $row_last_id = mysql_fetch_assoc($query);
    $id = $row_last_id['id_batch'];

    $query_select = mysql_query("SELECT serial_number FROM serial_number WHERE id_batch=$id");
    $serial_numbers = array(); // inisialisasi array
    while ($row_sn = mysql_fetch_assoc($query_select)) {
        $serial_numbers[] = $row_sn['serial_number']; // tambahkan serial number ke dalam array
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<style>
.qr-code-grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  grid-gap: 1rem;
}

.qr-code {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.qrcode-label {
  margin-top: 0.5rem;
  font-size: 0.8rem;
  text-align: center;
}
</style>
</html>

