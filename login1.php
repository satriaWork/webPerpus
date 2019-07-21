<?php
	session_start();
	$db =mysqli_connect("localhost","root","","cobalogin");

	if (isset($_POST['login_btn'])) {
		
		$nim = mysql_real_escape_string($_POST['nim']);
    
		$pass = mysql_real_escape_string($_POST['pass']);
	   
       $pass=md5($pass);
       $sql="SELECT * FROM user WHERE nim='$nim' AND password='$pass'";
       $result=mysqli_query($db,$sql);

       if (mysqli_num_rows($result)==1) {
           $get=mysqli_fetch_array($result);
           $levell=$get['level'];
           if ($levell=="user") {
             $_SESSION['nama']=$nama;
              header("location:index.php");
           }elseif($levell=="admin"){
             $_SESSION['nama']=$nama;
              header("location:indexA.php");
           }else{
            echo "<script>alert('Login Gagal')</script>";
           }    
       }else{
            echo "<script>alert('Data tidak sesuai')</script>";
       }
	}

?>