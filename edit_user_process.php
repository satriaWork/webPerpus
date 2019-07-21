<?php
require('connection.php');
require('helper.php');
if (isset($_POST)) {
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$role = $_POST['role'];

	$query = "UPDATE user SET fullname='$fullname',username='$username',password='$password',email='$email',role='$role' WHERE id=3" ;
	$result = mysql_query($query);
	if ($result) {
		header('location: edit_user_success.php');
	}else{
		header('location: edit_user_failed.php');
	}
	// vardump_data($query);
	// vardump_data($result);
	// printr_data_ex($user);
}else{
	header('location: edit_user.php');
}

mysql_close($conn);
?>