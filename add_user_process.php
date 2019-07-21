<?php 
session_start();
	$db =mysqli_connect("localhost","root","","perpus");
if (isset($_POST)) {
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$role = $_POST['role'];

	$query = "INSERT INTO user (`fullname`,`username`,`password`,`email`,`role`) VALUES ('".$fullname."','".$username."','".$password."','".$email."','".$role."')";
	$result = mysql_query($query);
	if ($result) {
		header('location: add_user_success.php');
	}else{
		header('location: add_user_failed.php');
	}
	// vardump_data($query);
	// vardump_data($result);
	// printr_data_ex($user);
}else{
	header('location: add_user.php');
}


?>
