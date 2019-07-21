<?php
	session_start();
	session_destroy();
	unset($_SESSION['nama']);
	header("location:login.php");
?>