<?php

$conn = mysqli_connect('localhost','root','','pw09_183040125');

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);

	$rows = [];
	while($row = mysqli_fetch_assoc($result)) {
 	$rows [] = $row;
	}
	return $rows;
}

function tambah($data) {
	global $conn;

	// upload gambar
	$Gambar = upload();
	if(!$Gambar) {
		return false;
	}
	
	$Nama_Peralatan = htmlspecialchars($data['Nama_Peralatan']);
	$Type = htmlspecialchars($data['Type']);
	$Produksi = htmlspecialchars($data['Produksi']);
	$Harga_Baru = htmlspecialchars($data['Harga_Baru']);
	$Harga_Second = htmlspecialchars($data['Harga_Second']);

	$query = "INSERT INTO pelektronik
				VALUES
				('','$Nama_Peralatan','$Type','$Produksi','$Harga_Baru','$Harga_Second','$Gambar')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload() {

	$namaFile = $_FILES['Gambar']['name'];
	$ukuran = $_FILES['Gambar']['size'];
	$error = $_FILES['Gambar']['error'];
	$tmpName = $_FILES['Gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang muncul
	if( $error === 4){
		echo"<script>
				alert('pilih gambar terlebih dahulu');
			</script>";
		return false;
	}

	// upload hanya gambar saja
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo"<script>
				alert('yang anda upload bukan gambar');
			</script>";
		return false;
	} 
	if($ukuran > 1000000) {
		echo"<script>
				alert('ukuran terlalu besar');
			</script>";
		return false;
	}
	// belum berfungsi

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	 // belum berfungsi

	move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
	return $namaFileBaru;

}

function hapus($Id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM pelektronik WHERE Id = $Id");

	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;
	$Id = $data['Id'];
	$gambarLama = htmlspecialchars($data['gambarLama']);

	if($_FILES['Gambar']['error'] === 4) {
		$Gambar = $gambarLama;
	} else {
		$Gambar = upload();
	}

	$Nama_Peralatan = htmlspecialchars($data['Nama_Peralatan']);
	$Type = htmlspecialchars($data['Type']);
	$Produksi = htmlspecialchars($data['Produksi']);
	$Harga_Baru = htmlspecialchars($data['Harga_Baru']);
	$Harga_Second = htmlspecialchars($data['Harga_Second']);


	$query = "UPDATE pelektronik SET
				Nama_Peralatan = '$Nama_Peralatan',
				Type = '$Type',
				Produksi = '$Produksi',
				Harga_Baru = '$Harga_Baru',
				Harga_Second = '$Harga_Second',
				Gambar = '$Gambar'
				WHERE Id = $Id
			";

	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function registrasi($data) {
	global $conn;
	$username = $data['username'];
	$password1 = $data['password1'];
	$password2 = $data['password2'];

	// cek user
	$cek_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	if(mysqli_num_rows($cek_user) > 0) {
		echo "<script>
				alert('Username sudah terdaftar!!!');
				document.location.herf = 'registrasi.php';
			</script>";
		return false;
	}

	// password1 tidak sama dengan password2
	if($password1 != $password2) {
		echo "<script>
				alert('Konfirmasi Password tidak sesuai!')
				document.location.herf = 'registrasi.php';
			</script>";
		return false;
	}

	// username dan password sudah OK
	$password = password_hash($password1, PASSWORD_DEFAULT);

	$query = "INSERT INTO user VALUES
				('', '$username', '$password')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


?>