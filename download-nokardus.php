<?php
include('koneksi.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$filename = dirname(__FILE__) . '/file_print/no_kardus.txt';
 header('Content-Description: File Transfer');
 header('Content-Type: application/octet-stream');
 header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
 header('Expires: 0');
 header('Cache-Control: must-revalidate');
 header('Pragma: public');
 header('Content-Length: ' . filesize($filename));
 readfile($filename);
 exit;
