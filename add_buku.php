<?php 
session_start();
	$db =mysqli_connect("localhost","root","","perpus");
if (isset($_POST['btn_tambah'])) {
	$foto=$_FILES['foto']['name'];
	$tmp=$_FILES['foto']['tmp_name'];
	$foto2=date('dmYHis').$foto;
	$path="foto/".$foto2;

	if (move_uploaded_file($tmp, $path)) {
		$judul = $_POST['judul'];
		$penulis = $_POST['penulis'];
		$tahun = $_POST['tahun'];
		$penerbit = $_POST['penerbit'];
		$deskripsi=$_POST['deskripsi'];
		$jumlah=$_POST['jumlah'];
		

		$query = "INSERT INTO buku (`judul`,`penulis`,`tahun`,`penerbit`,`foto`,`deskripsi`,`jumlah`) VALUES ('".$judul."','".$penulis."','".$tahun."','".$penerbit."','".$foto2."','".$deskripsi."','".$jumlah."')";
		$result = mysqli_query($db,$query);
		if ($result) {
			header('location: daftar.php');
	}
	}

	
	// vardump_data($query);
	// vardump_data($result);
	// printr_data_ex($user);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    

    
    <title>Tambah Buku</title>
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


	<!-- <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css"> -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script type="text/javascript" src="assets/js/jQuery-2.1.4.min.js"></script>
	<!-- <script type="text/javascript" src="assets/js/bootstrap.js"></script> -->
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>
<body class="bg-default"  >

	<section class="success" id="about" style="height: 1500px;">
      <div class="container" >
        <img class="img-fluid" src="img/logo.png" alt="logo" style="width:600px;height:200px;margin-left: 250px;">
        <h2 class="text-center">Tambah Buku</h2>
        <hr class="star-light">
          <div style="margin: auto;">
            
          	<div class="container-fluid">
	  <div class="row">
	  	<div class="col-md-4"></div>
	    <div class="col-md-4">
	    	<div style="padding:1rem">
		    	<div class="card">
		    		<div class="card-body">
				    	<a class="btn btn-outline-warning float-md-right" href="daftar.php">batal</a>
				    	<h3>Tambah Buku</h3>
					    <form method="post" enctype="multipart/form-data" action="add_buku.php">
							  <div class="form-group">
							    <label for="judul" style="color: black;">Judul Buku</label>
							    <input name="judul" type="text" class="form-control"  required="">
							  </div>
							  <div class="form-group">
							    <label for="penulis" style="color: black;">Penulis</label>
							    <input name="penulis" type="text" class="form-control"  required="">
							  </div>
							  <div class="form-group">
							    <label for="tahun" style="color: black;">Tahun Terbit</label>
							    <input name="tahun" type="text" class="form-control"  required="">
							  </div>
							  <div class="form-group" style="color: black;">
							    <label for="penerbit">Penerbit</label>
							    <input name="penerbit" type="text" class="form-control"  required="">
							  </div>
							  <div class="form-group" style="color: black;">
							    <label for="deskripsi">Deskripsi</label>
							    <input name="deskripsi" type="text" class="form-control"  required="">
							  </div>
							  <div class="form-group" style="color: black;">
							    <label for="jumlah">Jumlah</label>
							    <input name="jumlah" type="text" class="form-control"  required="">
							  </div>
							  <div class="form-group" style="color: black;">
							    <label for="foto">Foto</label>
							    <input name="foto" type="file" class="form-control"  required="">
							  </div>
						
								<br>
					    	<button class="btn btn-primary" type="submit" name="btn_tambah" value="tambah">&nbsp;&nbsp;&nbsp;&nbsp;Tambah Buku&nbsp;&nbsp;&nbsp;&nbsp;</button>
					    </form>
		    		</div>
		    	</div>
	    	</div>
	    </div>
	  </div>
	</div>

          </div>
          
        </div>
    </section>

	

</body>
</html>
