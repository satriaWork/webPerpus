<?php
  error_reporting(0);
	session_start();
	$db =mysqli_connect("localhost","root","","perpus");
	$result=mysqli_query($db,'SELECT * FROM buku WHERE id ="'.$_GET['id'].'"');
    $data = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    

    
    <title>Daftar Buku</title>
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
<body class="bg-default" style="background-color:#fafafa">
	<section class="success" id="about" style="height: 1800px;">
      <div class="container" >

        <a ><img class="img-fluid" src="img/logo.png" alt="logo" style="width:600px;height:200px;margin-left: 250px;"></a>
      
        <h2 class="text-center"><?php echo $data['judul'] ?></h2>
        <div class="text-center"><?php echo "<img src='foto/".$data['foto']."' style= 'height:500px;width:400px'";?> </div>
          <div style="margin: auto;">
          	<table>
        <tr>
          <td>
            <p>ID Buku</p>
            <p>Penulis</p>
            <P>Penerbit</P>
            <p>jumlah ketersedian</p>
            <p>Deskripsi</p>
          </td>
          <td>
          	<p>:</p>
          	<p>:</p>
          	<p>:</p>
          	<p>:</p>
          	<p>:</p>
          </td>
          <td>
            <p><?php echo $data['id'] ?></p>
            <p><?php echo $data['penulis'] ; ?></p>
            <p><?php echo $data['penerbit'] ?></P>
            <p><?php echo $data['jumlah'] ?></p>
            <p><?php echo $data['deskripsi'] ?></p>
          </td>
        </tr>
      </table>
		  </div>
        </div>

        <div id="comment">
        	<?php 
      if ($_SESSION){
        $db =mysqli_connect("localhost","root","","perpus");
        $email = $_SESSION['email'];
        $sql_e=mysqli_query($db,'SELECT * FROM user WHERE email ="'.$email.'"');
        $data_e = mysqli_fetch_array($sql_e);
        $sql_b=mysqli_query($db,'SELECT * FROM buku WHERE id ="'.$_GET['id'].'"');
        $data_b= mysqli_fetch_array($sql_b);
        ?> 
        <form action="" method="post" enctype="multipart/form-data">
        	<br>Nama<br>
        	<input value="<?php echo $data_e['nama'] ?>" type="text" name="nama" />
        	<br>email<br>
        	<input value="<?php echo $data_b['email'] ?>" type="text" name="id_buku"  /><br>
         	komentar<br>
        	<textarea value="" type="text" name="komentar" style="color: black; width: 400px; height: 200px;" /></textarea><br>
        
         <input type="submit" name="submit" value="Submit"/><br>
      </form>
       <?php
       $tgl = date("Ymd");
       $time=date("H:i:s");
          if(isset($_POST['submit'])){
            $db =mysqli_connect("localhost","root","","perpus");
            $komen = mysqli_query($db, "INSERT INTO komentar (nama, email,tgl, time, pesan)  VALUES (
              
              '".$_POST['nama']."',
              '".$_POST['email']."',
              '".$tgl."',
              '".$time."',
              '".$_POST['pesan']."'
             
              )");
           
            
            }
          }

            ?>
            <div class="bataskomentar"></div>
        
        <h3>Komentar</h3>
        <div class="tabel" style="color: black; overflow-y: scroll;overflow-x: hidden; max-height: 250px;">

          <table>
           
            <!-- menampilkan foto referensi dari http://www.mynotescode.com/cara-membuat-crud-plus-upload-gambar-dengan-php-dan-mysql/ -->
               
                      
                <?php
                  $db =mysqli_connect("localhost","root","","perpus");
                 
                    $sql=mysqli_query($db,'SELECT  *FROM komentar where id ="'.$_GET['id'].'" ');
                       $i=1;
                      while( $data = mysqli_fetch_array($sql, MYSQL_ASSOC)) { 
                      	?>
                
                 
              <div >
                <p><?php echo $data['nama'] ; ?><?php echo $data['tgl']  ; ?> </p>
                 <p></p>
                <h4><?php echo $data['komentar'] ; ?></h4>
              </div>
            
            <?php $i++;}?>
            </table>
            </div>
        </div>
    </section>



</body>
</html>
