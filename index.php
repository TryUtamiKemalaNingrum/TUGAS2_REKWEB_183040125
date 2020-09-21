<?php
session_start();

if(!isset($_SESSION['username'])) {
	header("Location: login.php");
	exit;
}


require 'functions.php';

$pelektronik = query("SELECT * FROM pelektronik");

if(isset($_GET['cari'])) {
	$keyword = $_GET['keyword'];
	$query_cari = "SELECT * FROM pelektronik WHERE
					Nama_Peralatan LIKE '%$keyword%' OR
					Type LIKE '%$keyword%' OR
					Produksi LIKE '%$keyword%' OR
					Harga_Baru LIKE '%$keyword%' OR
					Harga_Second LIKE '%keyword%' OR
					Gambar LIKE '%keyword%'
					";
	$pelektronik = query($query_cari);
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Daftar Peralatan Elektronik</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

</head>
<style>
	body {
		background: url('assets/img/gambar.jpg') no-repeat;
		background-size: cover;
		color: white;
	}

	h2 {
		color: black;
	}

	.container {
		width: 1000px;
		height: 1000px;
	}
</style>
<body>
				
	<h2 align="center">Daftar Peralatan Elektronik</h2>

	<a href="logout.php"><button type="submit" class="btn btn-info">Logout</button></a>
	<a href="tambah.php"><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus">Tambah Data</span></button></a>
	
	<form action="" method="get" align="center">
		<input type="text" name="keyword" id="keyword" autocomplete="off" style="color: black;">
		<button type="button" name="cari" id="tombol-cari">Cari!</button>
	</form>
	<br>

	<div id="tempat">
		<table border="1" cellspacing="0" cellpadding="10" align="center" class="container">
			<tr align="center">
				<th>ID</th>
				<th>Gambar</th>
				<th>Nama Peralatan</th>
				<th>Type</th>
				<th>Produksi</th>
				<th>Harga Baru</th>
				<th>Harga Second</th>
				<th>Opsi</th>
			</tr>

			<?php if(empty($pelektronik)) : ?>
				<tr>
					<td colspan="8">Data tidak ditemukan!</td>
				</tr>
			<?php endif; ?>

			<?php $i = 1;?>
			<?php foreach($pelektronik as $pe): ?>
			<tr align="center">
				<td><?= $i++;?></td>
				<td><img src="assets/img/<?php echo $pe['Gambar']; ?>" width="100px"></td>
				<td><?php echo $pe['Nama_Peralatan']; ?></td>
				<td><?php echo $pe['Type']; ?></td>
				<td><?php echo $pe['Produksi']; ?></td>
				<td><?php echo $pe['Harga_Baru']; ?></td>
				<td><?php echo $pe['Harga_Second']; ?></td>
				<td>
					<a href="ubah.php?Id=<?= $pe['Id'] ?>"><button type="submit" name="ubah">Ubah</button></a>
					<a href="hapus.php?Id=<?= $pe['Id'] ?>" onclick="return confirm('yakin')"><button type="submit" name="hapus">Hapus</button></a>
				</td>
			</tr>
		<?php endforeach;?>
		</table>
	</div>

	<script src="script.js"></script>

</body>
</html>