<?php 
session_start();
require 'functions.php';
$pelektronik = query("SELECT * FROM pelektronik");

if(isset($_SESSION['username'])) {
	header("Location: index.php");
	exit;
};

if(isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$cek_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	if(mysqli_num_rows($cek_user)== 1) {

		$user = mysqli_fetch_assoc($cek_user);
		if(password_verify($password, $user['password'])) {
			// login berhasil, masuk ke indexj
			$_SESSION['username'] = $username;
			header('Location: index.php');
			exit;
		} else {
			$error = 'Password salah!!!';
		}

	} else {
		// login gagal
		$error = 'username belum terdaftar!';
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>
<style>
	body {
		background : url('assets/img/gambar.jpg');
		background-size: cover;
	}
</style>
<body>

		<?php if(isset($error)) : ?>
			<p><?= $error; ?></p>
		<?php endif; ?>

	<nav class="navbar navbar-default">
	<h4>WELCOME</h4>
		<p>[ Username : utami ] ===== [ Password : 6789 ]</p>
		<ul class="nav navbar-nav navbar-right">
			<li>
				<form action="" method="post">
					<label>Username : </label>
					<input type="text" name="username">
					<label>Password : </label>
					<input type="password" name="password">
					<button type="submit" name="login" class="btn btn-primary">Login</button>				
				</form>
			</li>
				<li>
					<a class="navbar-brand" href="registrasi.php"><button type="submit" name="registrasi" class="btn btn-info">Registrasi</button></a>
				</li>
		</ul>
	</nav>

	<div class="container">
		<h3>Daftar Peralatan Elektronik</h3>
		<div class="container">
			<?php foreach($pelektronik as $pe): ?>
				<img src="assets/img/<?= $pe['Gambar']; ?>" width="150px">
				<p>
					<a href="profil.php?Id=<?= $pe['Id']; ?>" style="text-decoration: none;"><?= $pe['Nama_Peralatan']; ?><br><?= $pe['Produksi']; ?></a>
				</p>
				<br>
			<?php endforeach ?>
		</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>