<?php
session_start();
include "koneksi.php";
$user = $_POST['user'];
$pass = sha1($_POST['password']);
$op = $_GET['op'];
$hai = ".sha1($pass).";

if($op=="in"){
    $sql = mysql_query("SELECT * FROM userlist WHERE user='$user' AND password='$pass'");
    $datee = date("d-m-Y H:i:s");
    if(mysql_num_rows($sql)==1){//jika berhasil akan bernilai 1
        $qry = mysql_fetch_array($sql);
        $_SESSION['idid'] = $qry['idid'];
        $_SESSION['user'] = $qry['user'];
        $_SESSION['nama'] = $qry['nama'];
        $_SESSION['level'] = $qry['level'];
        $_SESSION['ugroup'] = $qry['ugroup'];
        $infoo ="Login berhasil ".$qry['user']." (".$qry['level'].")" ;
        mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");
        mysql_query("UPDATE userlist SET lastlogin='$datee' WHERE user='$user'");
        if($qry['level']=="root"){
            header("location:home.php");
        }

        if($qry['level']=="admin"){
            header("location:home.php");
        }

        else if($qry['level']=="user"){
            header("location:home.php");
        }

    }else{
        $infoo ="Percobaan login salah dengan user : ".$user ;
        mysql_query("INSERT INTO log(date,note) VALUES('$datee','$infoo')");
        //echo $infoo;
        //echo $datee;
        ?>
        <script language="JavaScript">
            alert('Username atau Password yang anda masukkan salah!');
            document.location='login-page.php';
        </script>
        <?php
    }
}else if($op=="out"){
    unset($_SESSION['user']);
    unset($_SESSION['level']);
    header("location:index.php");
}
?>