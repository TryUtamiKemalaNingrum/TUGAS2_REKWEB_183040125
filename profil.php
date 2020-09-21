<?php 
if(!isset($_GET['Id'])) {
	header("Location: index.php");
	exit;
}

require  'functions.php';
$Id = $_GET['Id'];

$pelektronik = query("SELECT * FROM pelektronik WHERE Id = $Id");

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Detail Peralatan Elektronik</title>
 	<link rel="stylesheet" href="assets/css/boostrap.min.css">
 	<link rel="stylesheet" type="text/css" href="assets/css/profil.css">
 </head>

 <style>
 	body {
 		background: url('assets/img/langit.jpg');
 		background-size: cover;
 		color: white;
 	}
 </style>

 <body>
 	<h2 align="center">Detail Data Peralatan Elektronik</h2>
 	<hr>
 	<table border="1" cellspacing="0" align="center">
 	<tr>
 		<th>ID</th>
 		<th>Gambar</th>
 		<th>Nama Peralatan</th>
 		<th>Type</th>
 		<th>Produksi</th>
 		<th>Harga Baru</th>
 		<th>Harga Second</th>
 	</tr>

 	<?php $i = 1;  ?>
 	<?php foreach ($pelektronik as $pe): ?>
 		<tr align="center">
 			<td><?php echo $i++; ?></td>
 			<td><img src="assets/img/<?= $pe['Gambar']; ?>"" width ="150px"></td>
 			<td><?php echo $pe['Nama_Peralatan']; ?></td>
 			<td><?php echo $pe['Type']; ?></td>
 			<td><?php echo $pe['Produksi']; ?></td>
 			<td><?php echo $pe['Harga_Baru']; ?></td>
 			<td><?php echo $pe['Harga_Second']; ?></td>
 		</tr>

 		<form method="post">
 			<br>
 		</form>
 	<?php endforeach; ?>
 	</table>

 	<a href="login.php">
 		<button class="btn btn-primary"><span class="glyphicon glyphicon-circel-arrow-left"></span>Kembali</button>
 	</a>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

 </body>
 </html>