<?php
	session_start();
	$db =mysqli_connect("localhost","root","","perpus");
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
	<section class="success" id="about" style="height: 1000px;">
      <div class="container" >
        <img class="img-fluid" src="img/logo.png" alt="logo" style="width:600px;height:200px;margin-left: 250px;">
        <h2 class="text-center">Daftar Buku</h2>
        <hr class="star-light">
          <div style="margin: auto;">

	<div class="container-fluid">
	  <div class="row">
	  	<div class="col-md-2"></div>
	    <div class="col-md-8">
	    	<div style="padding:1rem">
		    	<div class="card">
		    		<div class="card-body">
				    	
				    	<h3 style="color:black;">Daftar Buku</h3>
				    	<table class="table table-striped bg-white table-hover">
							  <thead>
							    <tr class="bg-primary text-white">
							      <th scope="col">Foto</th>
							      <th scope="col">id</th>
							      <th scope="col">Judul</th>
							      <th scope="col">Penulis</th>
							      <th scope="col">Tahun</th>
							      <th scope="col">Penerbit</th>

							      <th scope="col">Jumlah</th>
							  
							    </tr>
							  </thead>
							  <tbody>
							    <?php  
									// Perintah untuk menampilkan data
							    	
									$queri="SELECT * FROM buku" ;  //menampikan SEMUA data dari tabel siswa
									$hasil=mysqli_query ($db,$queri);    //fungsi untuk SQL
									$i=1;
									// perintah untuk membaca dan mengambil data dalam bentuk array
									while ($data = mysqli_fetch_array ($hasil,MYSQLI_ASSOC)){?>
									
									        <tr>
									        <th style="color:black;"><?php echo"<img src='foto/".$data['foto']."' width='50px' height='50px'>"?></th>
									        <th style="color:black;"><?=$data['id']?></th>
									        <td style="color:black;"><a href="detail.php?id=<?php echo $data['id']?>"><?=$data['judul']?></a></td>
									        <td style="color:black;"><?=$data['penulis']?></td>
									        <td style="color:black;"><?=$data['tahun']?></td>
									        <td style="color:black;"><?=$data['penerbit']?></td>
									        
									        <td style="color:black;"><?=$data['jumlah']?></td>
									        
										      </tr>
									        <?php $i++;}?>
							</tbody>
						</table>
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
