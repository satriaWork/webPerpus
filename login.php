<?php
	session_start();
	$db =mysqli_connect("localhost","root","","perpus");

	if (isset($_POST['login_btn'])) {
		if ($_POST['username']=="" && $_POST['pass']=="") {
      echo "<script>alert('Data belum diisi')</script>";}
    else{
      $username = mysqli_real_escape_string($db,$_POST['username']);
  	  $pass = mysqli_real_escape_string($db,$_POST['pass']);
	   
      $pass=md5($pass);
      $sql="SELECT * FROM user WHERE username='$username' AND pass='$pass'";
      $result=mysqli_query($db,$sql);

      if (mysqli_num_rows($result)==1) {
        $get=mysqli_fetch_array($result);
        $levell=$get['level'];
        if ($levell=="user") {
          $_SESSION['username']=$username;
          header("location:index2.php");
        }elseif($levell=="admin"){
          $_SESSION['username']=$username;
          header("location:indexA.php");
        }else{
          echo "<script>alert('Login Gagal')</script>";
        }    
      }else{
        echo "<script>alert('Data tidak sesuai')</script>";
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
    
    <title>Login</title>
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
      <div class="container" >
        <img class="img-fluid" src="img/logo.png" alt="SKI" style="width:600px;height:200px;margin-left: 250px;">
        <h2 class="text-center">Login</h2>
        <hr class="star-light">
        <div class="row">
          <div style="margin: auto;">
            <form method="post" action="login.php">
            	<table>
            		
                    <tr>
                        <td>Username </td>
                        <td><input type="text" name="username" class="textInput"></td>
                    </tr>
            		<tr>
            			<td>Password </td>
            			<td><input type="password" name="pass" class="textInput"></td>
            		</tr>
            		<tr>
            			<td></td>
            			<td><input type="submit" name="login_btn" value="Login"></td>         			
            		</tr>
            	</table>
            </form>
          </div>
          </div>
        </div>
      </div>

      <p style="margin-left: 550px;margin-top: 50px;">Klik <a style="color: blue;" href="register.php">disini</a> jika kamu belum memiliki akun</p>
    </section>

</body>
</html>