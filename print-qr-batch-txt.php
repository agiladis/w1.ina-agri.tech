<?php
    session_start();
    include('koneksi.php');
    if (isset($_GET['id_pemesan']) && isset($_GET['id_batch'])) {
      $id_pemesan = $_GET['id_pemesan'];
      $id_batch = $_GET['id_batch'];
      $query_serial = mysql_query("SELECT * FROM serial_number WHERE id_pemesan = $id_pemesan AND id_batch=$id_batch");
      $row_sn = mysql_fetch_assoc($query_serial);
      
      // GENERATE TXT
      $myfile = fopen(dirname(__FILE__).'/serial_number/' . $row_sn['serial_number'] . " - 100.txt", "w") or die("Unable to open file!");

      // GIVE NOTIFICATION TO USER
      echo "serial number converted into txt : " . dirname(__DIR__)."/serial_number/" . $row_sn['serial_number'] . " - 100.txt";
      
      // SET HEADER FILE TXT
      fwrite($myfile, "SN,\n");

      do {
        // WRITE TO TXT
        fwrite($myfile, $row_sn['serial_number'] . ",\n");
        
      } while ($row_sn = mysql_fetch_assoc($query_serial));

      
      // CLOSE FILE TXT
      fclose($myfile);
    }

?>