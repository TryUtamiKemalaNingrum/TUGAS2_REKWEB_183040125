<?php
session_start();

if(!isset($_SESSION['username'])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

$Id = $_GET['Id'];

if(hapus($Id) > 0) {
	echo "<script>
			alert('data berhasil dihapus!');
			document.location.href = 'index.php';
		  </script>";
} 
?>