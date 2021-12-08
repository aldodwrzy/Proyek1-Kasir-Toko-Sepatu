<?php
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);

	$host 	= 'localhost'; 
	$user 	= 'root';  
	$pass 	= ''; 
	$dbname = 'toko_sepatu'; 
	
	try{
		$config = new PDO("mysql:host=$host;dbname=$dbname;", $user,$pass);
		// echo 'sukses';
	}catch(PDOException $e){
		echo 'KONEKSI GAGAL' .$e -> getMessage();
	}
	
	$view = 'fungsi/view/view.php'; 
?>