<?php
session_start();

if(!isset($_SESSION['username'])) {
	header("Location: login.php");
	exit;
}


require 'functions.php';

$Id = $_GET['Id'];
$pelektronik = query("SELECT * FROM pelektronik WHERE Id = $Id")[0];

if( isset($_POST['ubah'])){
	if (ubah($_POST)> 0) {
		echo "<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Form Ubah Peralatan Elektronik</title>
</head>
<style>
	body {
		background: url('assets/img/space.jpg');
		color: white;
	}
</style>
<body>
	<h3>Form Ubah Peralatan Elektronik</h3>


	<form method="post" action="" enctype="multipart/form-data">
		<input type="hidden" name="Id" value="<?= $pelektronik['Id']; ?>">
		<ul>
			<li>
				<label>Nama Peralatan: </label><br>
				<input type="text" name="Nama_Peralatan" required value="<?= $pelektronik['Nama_Peralatan']; ?>">
			</li>
			<li>
				<label>Type: </label><br>
				<input type="text" name="Type" required value="<?= $pelektronik['Type']; ?>">
			</li>
			<li>
				<label>Produksi: </label><br>
				<input type="text" name="Produksi" required value="<?= $pelektronik['Produksi']; ?>">
			</li>
			<li>
				<label>Harga Baru: </label><br>
				<input type="text" name="Harga_Baru" required value="<?= $pelektronik['Harga_Baru']; ?>">
			</li>
			<li>
				<label>Harga Second: </label><br>
				<input type="text" name="Harga_Second" required value="<?= $pelektronik['Harga_Second']; ?>">
			</li>
			<li>
				<label>Gambar: </label><br>
				<input type="file" name="Gambar" required value="<?= $pelektronik['Gambar']; ?>">
			</li>
			<li>
				<button type="submit" name="ubah">Ubah Data</button>
			</li>
		</ul>
	</form>
</body>
</html>