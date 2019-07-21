<?php
	session_start();
	$db =mysqli_connect("localhost","root","","perpus");

	if (isset($_POST['register_btn'])) {
    if ($_POST['username']==""&&$_POST['nama']==""&&$_POST['email']==""&&$_POST['pass']==""&&$_POST['pass2']=="") {
      echo "<script>alert('Data harus diisi semua')</script>";
    }else{

      $username=mysqli_real_escape_string($db,$_POST['username']);
      $nama = mysqli_real_escape_string($db,$_POST['nama']);
      $email = mysqli_real_escape_string($db,$_POST['email']);
      $pass = mysqli_real_escape_string($db,$_POST['pass']);
      $pass2 = mysqli_real_escape_string($db,$_POST['pass2']);

      $sql_u="SELECT * FROM user WHERE username='$username'";
      $res_u=mysqli_query($db,$sql_u)or die(mysqli_error($db));
        
      if (mysqli_num_rows($res_u)>0) {
          echo "<script>alert('Username sudah digunakan')</script>";
      }else{
        if ($pass==$pass2) {
          $pass=md5($pass);
          $sql="INSERT INTO user(username,nama,email,pass) VALUES('$username','$nama','$email','$pass')";
          mysqli_query($db,$sql);
          $_SESSION['nama']=$nama;
          header("location:login.php");
        }else{
          $_SESSION['message']="The second password is not match";
        }
    }
    }
	}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>
    <link rel="icon" type="jpg/css" href="img/logo.png">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="css/freelancer.css">
    <link href="css/freelancer.min.css" rel="stylesheet">
    
	
</head>
<body>
	<section class="success" id="about">
      <div class="container">
        <img class="img-fluid" src="img/logo.png" alt="logo" style="width:600px;height:200px;margin-left: 250px;">
        <h2 class="text-center">Register</h2>
        <hr class="star-light">
        <div class="row">
          <div style="margin: auto;">
            <form method="post" action="register.php">
            	<table>
                    <tr>
                        <td>Username </td>
                        <td><input type="text" name="username" class="textInput"></td>
                    </tr>
            		<tr>
            			<td>Nama </td>
            			<td><input type="text" name="nama" class="textInput"></td>
            		</tr>
            		<tr>
            			<td>Email </td>
            			<td><input type="text" name="email" class="textInput"></td>
            		</tr>
            		<tr>
            			<td>Password </td>
            			<td><input type="password" name="pass" class="textInput"></td>
            		</tr>
            		<tr>
            			<td>Masukkan Password lagi </td>
            			<td><input type="password" name="pass2" class="textInput"></td>
            		</tr>
            		<tr>
            			<td></td>
            			<td><input type="submit" name="register_btn" value="Register"></td>         			
            		</tr>
            		
            	</table>
            </form>
          </div>
          </div>
        </div>
      </div>
    </section>

</body>
</html>