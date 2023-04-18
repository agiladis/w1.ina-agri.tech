<?php
$hostname  = "localhost";

$username  = "inastekdb1";
$password  = "InamasTekdb1";
$dbname  = "inastekdb1";
$db = mysql_connect($hostname, $username, $password) or die ('Koneksi Gagal! ');
mysql_select_db($dbname);
?>
