<?php
		session_start();
		//cek apakah user sudah login
		if(!isset($_SESSION['user'])){
			header("location:login-page.php");
        }
       

		//cek level user
		if($_SESSION['level']=="root"){
			header("location:home.php");
        }
        
        elseif($_SESSION['level']=="admin"){
			header("location:home.php");
        }
        
        if($_SESSION['level']=="user"){
			header("location:home.php");
		}

?>