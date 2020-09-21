<?php 
require 'functions.php';

$keyword = $_GET['keyword'];
	$query_cari = "SELECT * FROM pelektronik WHERE
					Nama_Peralatan LIKE '%$keyword%' OR
					Type LIKE '%$keyword%' OR
					Produksi LIKE '%$keyword%' OR
					Harga_Baru LIKE '%$keyword%' OR
					Harga_Second LIKE '%keyword%'
					";
	$pelektronik = query($query_cari);

 ?>

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
	