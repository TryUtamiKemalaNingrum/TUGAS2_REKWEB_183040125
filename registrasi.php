<?php 
require 'functions.php';
if(isset($_POST['registrasi'])) {
	if(registrasi($_POST) > 0) {
		echo "<script>
				alert('Registrasi Berhasil!!!');
				document.location.href = 'login.php';
			 </script>";
	}
}	
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Form Registrasi</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">

</head>
<style>
	body {
		background: url('assets/img/1.jpg');
		background-size: cover;
	}
	h3 {
		color: white;
	}
</style>
<body>
	<h3 align="center">Form Registrasi</h3>
	<form action="" method="post">
		<ul align="center">
				<label>Username :</label><br>
				<input type="text" name="username" required><br>

				<label>Password :</label><br>
				<input type="password" name="password1" required><br>

				<label>Konfirmasi Password :</label><br>
				<input type="password" name="password2" required><br>

				<button type="submit" name="registrasi">Registrasi</button>
		</ul>
	</form>
</body>
</html>