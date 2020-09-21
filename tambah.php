<?php
session_start();

if(!isset($_SESSION['username'])) {
	header("Location: login.php");
exit;
}


require 'functions.php';

if( isset($_POST['tambah'])){
	if (tambah($_POST)> 0) {
		echo "<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Form Tambah Peralatan Elektronik</title>
</head>
<style>
	body {
		background: url('assets/img/2.jpg');
		background-size: cover;
		color: white;
	}
</style>
<body>
	<h3 align="center">Form Tambah Peralatan Elektronik</h3>


	<form method="post" action="" align="center" enctype="multipart/form-data">
		<ul>
			<label>Nama Peralatan: </label><br>
			<input type="text" name="Nama_Peralatan" required maxlength="9"><br>
			<label>Type: </label><br>
			<input type="text" name="Type" required><br>
			<label>Produksi: </label><br>
			<input type="text" name="Produksi" required><br>
			<label>Harga Baru: </label><br>
			<input type="text" name="Harga_Baru" required><br>
			<label>Harga Second: </label><br>
			<input type="text" name="Harga_Second" required><br>
			<label>Gambar: </label><br>
			<input type="file" name="Gambar" required><br>				
			<button type="submit" name="tambah">Tambah Data</button>		
		</ul>
	</form>
</body>
</html>