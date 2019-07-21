<?php
	session_start();
	$db =mysqli_connect("localhost","root","","perpus");

	if (isset($_POST['btn_edit'])) {
		$judul = $_POST['judul'];
		$penulis = $_POST['penulis'];
		$tahun = $_POST['tahun'];
		$penerbit = $_POST['penerbit'];

		$query = "UPDATE buku SET judul='$judul',penulis='$penulis',tahun='$tahun',penerbit='$penerbit' WHERE id='".$_GET['id']."'" ;
		$result = mysqli_query($db,$query);
		if ($result) {
			header('location: daftar.php');
		}
		// vardump_data($query);
		// vardump_data($result);
		// printr_data_ex($user);
	}
	$id=$_GET['id'];
	$query="SELECT * FROM buku WHERE id='$id'";
	$hasil=mysqli_query ($db,$query); 
	$i=1;
	while ($data = mysqli_fetch_array ($hasil,MYSQLI_ASSOC)){
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Edit Buku</title>
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
<body class="bg-default" style="background-color:#fafafa">
	
	<section class="success" id="about" style="height: 1000px;">
      <div class="container" >
        <img class="img-fluid" src="img/logo.png" alt="logo" style="width:600px;height:200px;margin-left: 250px;">
        <h2 class="text-center">Edit Buku</h2>
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
				    	<h3 style="color: black;">Edit Buku</h3>
					    <form method="post" action="edit_buku.php?id=<?php echo $_GET['id'];?>">
							  <div class="form-group">
							    <label for="judul" style="color: black;">Judul Buku</label>
							    <input name="judul" type="text" class="form-control" value="<?=$data['judul']?>"  required="">
							  </div>
							  <div class="form-group">
							    <label for="penulis" style="color: black;">Penulis</label>
							    <input name="penulis" type="text" class="form-control" value="<?=$data['penulis']?>"  required="">
							  </div>
							  <div class="form-group">
							    <label for="tahun" style="color: black;">Tahun Terbit</label>
							    <input name="tahun" type="text" class="form-control" value="<?=$data['tahun']?>" required="">
							  </div>
							  <div class="form-group" style="color: black;">
							    <label for="penerbit">Penerbit</label>
							    <input name="penerbit" type="text" class="form-control" value="<?=$data['penerbit']?>" required="">
							  </div>
						
								<br>
					    	<button class="btn btn-primary" type="submit" name="btn_edit" >&nbsp;&nbsp;&nbsp;&nbsp;Edit Buku&nbsp;&nbsp;&nbsp;&nbsp;</button>
					    	<?php $i++;}?>
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
