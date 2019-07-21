<?php
	session_start();
	$db =mysqli_connect("localhost","root","","perpus");

if(isset($_POST)){

	$query="DELETE FROM buku WHERE judul='".$_GET['judul']."'";
	$result=mysqli_query($db,$query);

	if($result){
		header('location:daftar.php');
	}
}
?>