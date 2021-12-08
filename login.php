<?php
    // print_r($hasil);
    // echo "<br>", $hasil, "<br>";
    // print($hasil['user']);
    // echo'<br>';

	@ob_start();
	session_start();
	if(isset($_POST['proses'])){
		require 'config.php';
			
		$user = strip_tags($_POST['user']);
		$pass = strip_tags($_POST['pass']);

		$sql = 'select member.*, login.user, login.pass, login.level
				from member inner join login on member.id_member = login.id_member
				where user =? and pass = md5(?)';
		$row = $config->prepare($sql);
		$row -> execute(array($user,$pass));
		$jum = $row -> rowCount();
		if($jum > 0){
            $hasil = $row -> fetch();
            if($hasil['level']=='admin sistem'){

                $_SESSION['admin sistem'] = $hasil;
                $_SESSION['id_member'] = $hasil['id_member'];
                // $_SESSION['nama'] = $hasil['nm_member'];
                echo '<script>alert("Login Sukses");window.location="index.php"</script>';
                // print_r($hasil);
            }
            elseif($hasil['level']=='kasir'){
                $_SESSION['kasir'] = $hasil;
                // $_SESSION['nama'] = $hasil['nm_member'];
                echo '<script>alert("Login Sukses");window.location="index.php"</script>';
                // echo 'True';
            }
            else{
                echo '<script>alert("Login Gagal");history.go(-1);</script>';
                // echo "false";
            }
		}else{
			echo '<script>alert("Login Gagal");history.go(-1);</script>';
		}
	}
?>


<html>
<head>
	<title>Log In</title>
    <link rel="stylesheet" href="assets/css/stylelogin.css">
</head>
<body>
 
	<h1>Aplikasi Kasir Toko Sepatu</h1>
 
 
	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>
 
		<form method="post">
			<label>Username</label>
			<input type="text" name="user" class="form_login" placeholder="Username .." required="required" autofocus>
 
			<label>Password</label>
			<input type="password" name="pass" class="form_login" placeholder="Password .." required="required">
 
			<input type="submit" class="tombol_login" name="proses" value="Masuk">
 
			<br/>
			<br/>
		</form>
		
	</div>
</body>
</html>
