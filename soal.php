<?php
session_start();
error_reporting(0);
function mysqli_result($jumlah_soal , $offset , $field = 0){
    $jumlah_soal->data_seek($offset);
    $row = $jumlah_soal->fetch_array();
    return $row[$field];
}

$db=mysqli_connect("localhost","root","","cobalogin");
if (!$db) {
	# code...
	echo "gabisa konek";
}

if (isset($_POST['btn_nilai'])) {
	$jawaban=$_POST['jawaban'];
	$benar=0;
	
	if (count($jawaban)<1) {
		echo "<script>alert('Anda belum menjawab soal')</script>";
	}else{
		

		foreach($jawaban as $nmr => $nilai){
			$data_soal=mysqli_query($db,"SELECT * FROM soal_pilihan WHERE nomor='$nmr'");
			$data_jawab=mysqli_fetch_assoc($data_soal);
			if ($data_jawab['jawaban']==$nilai) {
				$benar=$benar+1;
			}
			
		}
		
		$jumlah_soal=mysqli_query($db,"SELECT count(*) FROM soal_pilihan");
		$jum_soal=mysqli_result($jumlah_soal, 0);
		
		
		$nilai_per_soal=100/$jum_soal;
		$jawaban_salah=$jum_soal-$benar;
		$prosentase_benar=round($benar/$jum_soal*100,2);
	
	}
	
	$nama=mysql_real_escape_string($_SESSION['username']);
	
	$sql="INSERT INTO nilai(username,nilai)VALUES('$nama','$prosentase_benar')";
	$masuk_nilai=mysqli_query($db,$sql);

}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Soal</title>
    <link rel="icon" type="jpg/css" href="img/ski.jpg">

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
	<section class="success" id="about" style="background-color: #2c3e50";>
      <div class="container" >
        <h2 class="text-center">POSTTEST</h2>
        <hr class="star-light">
        <div class="row">
          <div style="margin: auto;">
          	<h3>Nilai Anda : <?php 
          		echo $prosentase_benar;
          	?></h3>
            <form method="post" action="soal.php">
            	<?php 

            	$nmr=0;
				$sql="SELECT * FROM soal_pilihan";
				$soal=mysqli_query($db,$sql);



            	while($data=mysqli_fetch_assoc($soal)){
				$nmr++;
				 echo $nmr.". ".$data['pertanyaan']."<br>";
				 echo "a.<input type='radio' value='a' name='jawaban[".$data["nomor"]."]'/> ".$data["jawab_a"]."<br>";
				 echo "b.<input type='radio' value='b' name='jawaban[".$data["nomor"]."]'/> ".$data["jawab_b"]."<br>";
				 echo "c.<input type='radio' value='c' name='jawaban[".$data["nomor"]."]'/> ".$data["jawab_c"]."<br>";
				 echo "d.<input type='radio' value='d' name='jawaban[".$data["nomor"]."]'/> ".$data["jawab_d"]."<br><br>";
			}
			echo"<input type='submit' name='btn_nilai' value='Lihat Hasil'>";
			echo"</form>";
            	?>
            </form>
          </div>
          </div>
        </div>
      </div>

     
</body>
</html>