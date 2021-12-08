<?php 
session_start();
if(!empty($_SESSION['admin sistem'])){
	require '../../config.php';
	if(!empty($_GET['pengaturan'])){
		$nama= htmlentities($_POST['namatoko']);
		$alamat = htmlentities($_POST['alamat']);
		$kontak = htmlentities($_POST['kontak']);
		$pemilik = htmlentities($_POST['pemilik']);
		$id = '1';
		
		$data[] = $nama;
		$data[] = $alamat;
		$data[] = $kontak;
		$data[] = $pemilik;
		$data[] = $id;
		$sql = 'UPDATE toko SET nama_toko=?, alamat_toko=?, tlp=?, nama_pemilik=? WHERE id_toko = ?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=pengaturan&success=edit-data"</script>';
	}

	if(!empty($_GET['kategori'])){
		$nama= htmlentities($_POST['kategori']);
		$id= htmlentities($_POST['id']);
		$data[] = $nama;
		$data[] = $id;
		$sql = 'UPDATE kategori SET  nama_kategori=? WHERE id_kategori=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=kategori&uid='.$id.'&success-edit=edit-data"</script>';
	}

	if(!empty($_GET['stok'])){
		$restok = htmlentities($_POST['restok']);
		$id = htmlentities($_POST['id']);
		$dataS[] = $id;
		$sqlS = 'select*from barang WHERE id_barang=?';
		$rowS = $config -> prepare($sqlS);
		$rowS -> execute($dataS);
		$hasil = $rowS -> fetch();
		
		$stok = $restok + $hasil['stok'];
		
		$data[] = $stok;
		$data[] = $id;
		$sql = 'UPDATE barang SET stok=? WHERE id_barang=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=barang&success-stok=stok-data"</script>';
	}

	if(!empty($_GET['barang'])){
		$id = htmlentities($_POST['id']);

		$dataS[] = $id;
		$sqlS = 'select*from barang WHERE id_barang=?';
		$rowS = $config -> prepare($sqlS);
		$rowS -> execute($dataS);
		$hasil = $rowS -> fetch();

		$kategori = htmlentities($_POST['kategori']);
		$nama = htmlentities($_POST['nama']);
		$merk = htmlentities($_POST['merk']);
		$namsup = htmlentities($_POST['namsup']);
		$beli = htmlentities($_POST['beli']);
		
		$untung = htmlentities($_POST['untung']);
		$satuan = htmlentities($_POST['satuan']);
		$stok_kel = htmlentities($_POST['stok_kel']) + htmlentities($hasil['stok_kel']);
		$stok = htmlentities($_POST['stok']) - htmlentities($_POST['stok_kel']) ;
		$ukuran = htmlentities($_POST['ukuran']);
		$tgl = htmlentities($_POST['tgl']);
		$ket = htmlentities($_POST['ket']);
		
		if($untung === "5"){
			$p = $beli* 0.05;
			$jual = $beli + $p;
		}elseif($untung === '10'){
			$p = $beli* 0.1;
			$jual = $beli + $p;
		}elseif($untung === '15'){
			$p = $beli* 0.15;
			$jual = $beli + $p;
		}

		$data[] = $kategori;
		$data[] = $nama;
		$data[] = $merk;
		$data[] = $namsup;
		$data[] = $beli;
		$data[] = $jual;
		$data[] = $untung;
		$data[] = $satuan;
		
		$data[] = $tgl;
	
		$data[] = $id;
		$sql = 'UPDATE barang SET id_kategori=?, nama_barang=?, merk=?, id_supplier=?,
				harga_beli=?, harga_jual=?, untung=?, satuan_barang=?, tgl_update=?  WHERE id_barang=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=barang/edit&barang='.$id.'&success=edit-data"</script>';
	}
	if(!empty($_GET['ukuran'])){
		$id = htmlentities($_POST['id_ukuran']);

		$dataS[] = $id;
		$sqlS = 'select*from ukuran WHERE id_ukuran=?';
		$rowS = $config -> prepare($sqlS);
		$rowS -> execute($dataS);
		$hasil = $rowS -> fetch();

		$stok_kel = htmlentities($_POST['stok_kel']) + htmlentities($hasil['stok_kel2']);
		$stok = htmlentities($_POST['stok']) - htmlentities($_POST['stok_kel']) ;
		$ukuran = htmlentities($_POST['ukuran']);
		$ket = htmlentities($_POST['ket']);
		
	

		$data[] = $stok_kel;
		$data[] = $stok;
		$data[] = $ukuran;
		$data[] = $ket;
		
	
		$data[] = $id;
		$sql = 'UPDATE ukuran SET stok_kel2=?, stok2=?,  ukuran2=?, ket2=?   WHERE id_ukuran=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=ukuran/edit&barang='.$id.'&success=edit-data"</script>';
	}
	
	if(!empty($_GET['supplier'])){
		$namsup = htmlentities($_POST['namsup']);
		$nampem = htmlentities($_POST['nampem']);
		$alamat = htmlentities($_POST['alamat']);
		$no_hp = htmlentities($_POST['no_hp']);
		$email = htmlentities($_POST['email']);
		$tgl = htmlentities($_POST['tgl']);
		$id = htmlentities($_POST['id']);
		
	
		$data[] = $namsup;
		$data[] = $alamat;
		$data[] = $no_hp;
		$data[] = $tgl;
		$data[] = $nampem;
		$data[] = $email;
		$data[] = $id;
		$sql = 'UPDATE supplier SET nama_supplier=?, alamat=?,
				no_hp=?,  tgl_update=?, nama_pemilik=?, email=?  WHERE id_supplier=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=supplier/edit&barang='.$id.'&success=edit-data"</script>';
	}

	if(!empty($_GET['gambar'])){
		$id = htmlentities($_POST['id']);
		set_time_limit(0);
		$allowedImageType = array("image/gif",   "image/JPG",   "image/jpeg",   "image/pjpeg",   "image/png",   "image/x-png"  );
		
		if ($_FILES['foto']["error"] > 0) {
			$output['error']= "Error in File";
		} elseif (!in_array($_FILES['foto']["type"], $allowedImageType)) {
			echo "You can only upload JPG, PNG and GIF file";
			echo "<font face='Verdana' size='2' ><BR><BR><BR>
					<a href='../../index.php?page=user'>Back to upform</a><BR>";

		}elseif (round($_FILES['foto']["size"] / 1024) > 4096) {
			echo "WARNING !!! Besar Gambar Tidak Boleh Lebih Dari 4 MB";
			echo "<font face='Verdana' size='2' ><BR><BR><BR>
					<a href='../../index.php?page=user'>Back to upform</a><BR>";

		}else{
			$target_path = '../../assets/img/user/';
			$target_path = $target_path . basename( $_FILES['foto']['name']); 
			if (file_exists("$target_path")){ 
				echo "<font face='Verdana' size='2' >Ini Terjadi Karena Telah Masuk Nama File Yang Sama,
				<br> Silahkan Rename File terlebih dahulu<br>";

			echo "<font face='Verdana' size='2' ><BR><BR><BR>
					<a href='../../index.php?page=user'>Back to upform</a><BR>";

				}elseif(move_uploaded_file($_FILES['foto']['tmp_name'], $target_path)){
					//post foto lama
				$foto2 = $_POST['foto2'];
				//remove foto di direktori
				unlink('../../assets/img/user/'.$foto2.'');
				//input foto
				$id = $_POST['id'];
				$data[] = $_FILES['foto']['name'];
				$data[] = $id;
				$sql = 'UPDATE member SET gambar=?  WHERE member.id_member=?';
				$row = $config -> prepare($sql);
				$row -> execute($data);
				echo '<script>window.location="../../index.php?page=user&success=edit-data"</script>';
			}
		}
	}

	if(!empty($_GET['profil'])){
		$id = htmlentities($_POST['id']);
		$nama = htmlentities($_POST['nama']);
		$alamat = htmlentities($_POST['alamat']);
		$tlp = htmlentities($_POST['tlp']);
		$email = htmlentities($_POST['email']);
		$nik = htmlentities($_POST['nik']);
		
		$data[] = $nama;
		$data[] = $alamat;
		$data[] = $tlp;
		$data[] = $email;
		$data[] = $nik;
		$data[] = $id;
		$sql = 'UPDATE member SET nm_member=?,alamat_member=?,telepon=?,email=?,NIK=? WHERE id_member=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=user&success=edit-data"</script>';
	}
	if(!empty($_GET['pass'])){
		$id = htmlentities($_POST['id']);
		$user = htmlentities($_POST['user']);
		$pass = htmlentities($_POST['pass']);
		
		$data[] = $user;
		$data[] = $pass;
		$data[] = $id;
		$sql = 'UPDATE login SET user=?,pass=md5(?) WHERE id_member=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=user&success=edit-data"</script>';
	}

	if(!empty($_GET['jual'])){
		$id = htmlentities($_POST['id']);
		$id_ukuran = htmlentities($_POST['id_ukuran']);
		$jumlah = htmlentities($_POST['jumlah']);
		
		$sql_tampil = "select ukuran.*, barang.* from ukuran inner join barang on ukuran.id_barang = barang.id_barang where ukuran.id_ukuran=?";
		$row_tampil = $config -> prepare($sql_tampil);
		$row_tampil -> execute(array($id_ukuran));
		$hasil = $row_tampil -> fetch();

		if($hasil['stok2'] > $jumlah)
		{
			$jual = $hasil['harga_jual'];
			$total = $jual * $jumlah;
			$data1[] = $jumlah;
			$data1[] = $total;
			$data1[] = $id;
			$sql1 = 'UPDATE penjualan SET jumlah=?,total=? WHERE id_penjualan=?';
			$row1 = $config -> prepare($sql1);
			$row1 -> execute($data1);
			echo '<script>window.location="../../index.php?page=jual#keranjang"</script>';
		}else{
			echo '<script>alert("Keranjang Melebihi Stok Barang Anda !");
					window.location="../../index.php?page=jual#keranjang"</script>';
		}
		
	}

	if(!empty($_GET['cari_barang'])){
		$cari = trim(strip_tags($_POST['keyword']));
		if($cari == '')
		{

		}else{
			$sql = "select barang.*, ukuran.*, kategori.id_kategori, kategori.nama_kategori, supplier.id_supplier, supplier.nama_supplier
					from ukuran inner join barang on ukuran.id_barang = barang.id_barang
					inner join kategori on barang.id_kategori = kategori.id_kategori 
					inner join supplier on barang.id_supplier = supplier.id_supplier 
					where barang.id_barang like '%$cari%' or barang.nama_barang like '%$cari%' or barang.merk like '%$cari%' or ukuran.ukuran2 like '%$cari%'
					order by ukuran.id_barang";
			$row = $config -> prepare($sql);
			$row -> execute();
			$hasil1= $row -> fetchAll();
	?>
		<table class="table table-stripped" width="100%" id="example2">
			<tr>
				<th>ID Barang</th>
				<th>Nama Barang</th>
				<th>Merk</th>
				<th>Stok</th>
				<th>Ukuran</th>
				<th>Harga Jual</th>
				<th>Aksi</th>
			</tr>
		<?php foreach($hasil1 as $hasil){?>
			<tr>
				<td><?php echo $hasil['id_barang'];?></td>
				<td><?php echo $hasil['nama_barang'];?></td>
				<td><?php echo $hasil['merk'];?></td>
				<td><?php echo $hasil['stok2'];?></td>
				<td><?php echo $hasil['ukuran2'];?></td>
				<td><?php echo $hasil['harga_jual'];?></td>
				<td>
				<a href="fungsi/tambah/tambah.php?jual=jual&id=<?php echo $hasil['id_barang'];?>&idu=<?php echo $hasil['id_ukuran'];?>&id_kasir=<?php echo $_SESSION['admin sistem']['id_member'];?>&hrg=<?php echo $hasil['harga_jual'];?>" 
					class="btn btn-success">
					<i class="fa fa-shopping-cart"></i></a></td>
			</tr>
		<?php }?>
		</table>
<?php	
		}
	}

	if(!empty($_GET['beli'])){
		$id = htmlentities($_POST['id']);
		$id_barang = htmlentities($_POST['id_barang']);
		$jumlah = htmlentities($_POST['jumlah']);
		
		$sql_tampil = "select *from barang where barang.id_barang=?";
		$row_tampil = $config -> prepare($sql_tampil);
		$row_tampil -> execute(array($id_barang));
		$hasil = $row_tampil -> fetch();

		// if($hasil['stok'] > $jumlah)
		// {
			$beli2 = $hasil['harga_beli'];
			$total = $beli2 * $jumlah;
			$data1[] = $jumlah;
			$data1[] = $total;
			$data1[] = $id;
			$sql1 = 'UPDATE pembelian SET jumlah=?,total=? WHERE id_pembelian=?';
			$row1 = $config -> prepare($sql1);
			$row1 -> execute($data1);
			echo '<script>window.location="../../index.php?page=beli#keranjang"</script>';
		// }else{
		// 	echo '<script>alert("Keranjang Melebihi Stok Barang Anda !");
		// 			window.location="../../index.php?page=beli#keranjang"</script>';
		// }
		
	}

	if(!empty($_GET['cari_barang_beli'])){
		$cari = trim(strip_tags($_POST['keyword']));
		if($cari == '')
		{

		}else{
			$sql = "select barang.*, ukuran.*, kategori.id_kategori, kategori.nama_kategori, supplier.id_supplier, supplier.nama_supplier
					from ukuran inner join barang on ukuran.id_barang = barang.id_barang
					inner join kategori on barang.id_kategori = kategori.id_kategori 
					inner join supplier on barang.id_supplier = supplier.id_supplier 
					where barang.id_barang like '%$cari%' or barang.nama_barang like '%$cari%' or barang.merk like '%$cari%' or ukuran.ukuran2 like '%$cari%' or supplier.nama_supplier like '%$cari%'
					order by ukuran.id_barang";
			$row = $config -> prepare($sql);
			$row -> execute();
			$hasil1= $row -> fetchAll();
	?>
		<table class="table table-stripped" width="100%" id="example2">
			<tr>
				<th>ID Barang</th>
				<th>Nama Barang</th>
				<th>Merk</th>
				<th>Supplier</th>
				<th>Stok</th>
				<th>Ukuran</th>
				<th>Harga Beli</th>
				<th>Aksi</th>
			</tr>
		<?php foreach($hasil1 as $hasil){?>
			<tr>
				<td><?php echo $hasil['id_barang'];?></td>
				<td><?php echo $hasil['nama_barang'];?></td>
				<td><?php echo $hasil['merk'];?></td>
				<td><?php echo $hasil['nama_supplier'];?></td>
				<td><?php echo $hasil['stok2'];?></td>
				<td><?php echo $hasil['ukuran2'];?></td>
				<td><?php echo $hasil['harga_beli'];?></td>
				<td>
				<a href="fungsi/tambah/tambah.php?beli=beli&id=<?php echo $hasil['id_barang'];?>&idu=<?php echo $hasil['id_ukuran'];?>&id_kasir=<?php echo $_SESSION['admin sistem']['id_member'];?>&ids=<?php echo $hasil['id_supplier']?>&hrg=<?php echo $hasil['harga_beli'];?>" 
					class="btn btn-success">
					<i class="fa fa-shopping-cart"></i></a></td>
			</tr>
		<?php }?>
		</table>
<?php	
		}
	}

	
}

// ======================

else if(!empty($_SESSION['kasir'])){
	require '../../config.php';
	if(!empty($_GET['pengaturan'])){
		$nama= htmlentities($_POST['namatoko']);
		$alamat = htmlentities($_POST['alamat']);
		$kontak = htmlentities($_POST['kontak']);
		$pemilik = htmlentities($_POST['pemilik']);
		$id = '1';
		
		$data[] = $nama;
		$data[] = $alamat;
		$data[] = $kontak;
		$data[] = $pemilik;
		$data[] = $id;
		$sql = 'UPDATE toko SET nama_toko=?, alamat_toko=?, tlp=?, nama_pemilik=? WHERE id_toko = ?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=pengaturan&success=edit-data"</script>';
	}

	if(!empty($_GET['kategori'])){
		$nama= htmlentities($_POST['kategori']);
		$id= htmlentities($_POST['id']);
		$data[] = $nama;
		$data[] = $id;
		$sql = 'UPDATE kategori SET  nama_kategori=? WHERE id_kategori=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=kategori&uid='.$id.'&success-edit=edit-data"</script>';
	}

	if(!empty($_GET['stok'])){
		$restok = htmlentities($_POST['restok']);
		$id = htmlentities($_POST['id']);
		$dataS[] = $id;
		$sqlS = 'select*from barang WHERE id_barang=?';
		$rowS = $config -> prepare($sqlS);
		$rowS -> execute($dataS);
		$hasil = $rowS -> fetch();
		
		$stok = $restok + $hasil['stok'];
		
		$data[] = $stok;
		$data[] = $id;
		$sql = 'UPDATE barang SET stok=? WHERE id_barang=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=barang&success-stok=stok-data"</script>';
	}

	if(!empty($_GET['barang'])){
		$id = htmlentities($_POST['id']);
		$kategori = htmlentities($_POST['kategori']);
		$nama = htmlentities($_POST['nama']);
		$merk = htmlentities($_POST['merk']);
		$beli = htmlentities($_POST['beli']);
		$jual = htmlentities($_POST['jual']);
		$satuan = htmlentities($_POST['satuan']);
		$stok = htmlentities($_POST['stok']);
		$tgl = htmlentities($_POST['tgl']);
		
		$data[] = $kategori;
		$data[] = $nama;
		$data[] = $merk;
		$data[] = $beli;
		$data[] = $jual;
		$data[] = $satuan;
		$data[] = $stok;
		$data[] = $tgl;
		$data[] = $id;
		$sql = 'UPDATE barang SET id_kategori=?, nama_barang=?, merk=?, 
				harga_beli=?, harga_jual=?, satuan_barang=?, stok=?, tgl_update=?  WHERE id_barang=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=barang/edit&barang='.$id.'&success=edit-data"</script>';
	}

	if(!empty($_GET['gambar'])){
		$id = htmlentities($_POST['id']);
		set_time_limit(0);
		$allowedImageType = array("image/gif",   "image/JPG",   "image/jpeg",   "image/pjpeg",   "image/png",   "image/x-png"  );
		
		if ($_FILES['foto']["error"] > 0) {
			$output['error']= "Error in File";
		} elseif (!in_array($_FILES['foto']["type"], $allowedImageType)) {
			echo "You can only upload JPG, PNG and GIF file";
			echo "<font face='Verdana' size='2' ><BR><BR><BR>
					<a href='../../index.php?page=user'>Back to upform</a><BR>";

		}elseif (round($_FILES['foto']["size"] / 1024) > 4096) {
			echo "WARNING !!! Besar Gambar Tidak Boleh Lebih Dari 4 MB";
			echo "<font face='Verdana' size='2' ><BR><BR><BR>
					<a href='../../index.php?page=user'>Back to upform</a><BR>";

		}else{
			$target_path = '../../assets/img/user/';
			$target_path = $target_path . basename( $_FILES['foto']['name']); 
			if (file_exists("$target_path")){ 
				echo "<font face='Verdana' size='2' >Ini Terjadi Karena Telah Masuk Nama File Yang Sama,
				<br> Silahkan Rename File terlebih dahulu<br>";

			echo "<font face='Verdana' size='2' ><BR><BR><BR>
					<a href='../../index.php?page=user'>Back to upform</a><BR>";

				}elseif(move_uploaded_file($_FILES['foto']['tmp_name'], $target_path)){
					//post foto lama
				$foto2 = $_POST['foto2'];
				//remove foto di direktori
				unlink('../../assets/img/user/'.$foto2.'');
				//input foto
				$id = $_POST['id'];
				$data[] = $_FILES['foto']['name'];
				$data[] = $id;
				$sql = 'UPDATE member SET gambar=?  WHERE member.id_member=?';
				$row = $config -> prepare($sql);
				$row -> execute($data);
				echo '<script>window.location="../../index.php?page=user&success=edit-data"</script>';
			}
		}
	}

	if(!empty($_GET['profil'])){
		$id = htmlentities($_POST['id']);
		$nama = htmlentities($_POST['nama']);
		$alamat = htmlentities($_POST['alamat']);
		$tlp = htmlentities($_POST['tlp']);
		$email = htmlentities($_POST['email']);
		$nik = htmlentities($_POST['nik']);
		
		$data[] = $nama;
		$data[] = $alamat;
		$data[] = $tlp;
		$data[] = $email;
		$data[] = $nik;
		$data[] = $id;
		$sql = 'UPDATE member SET nm_member=?,alamat_member=?,telepon=?,email=?,NIK=? WHERE id_member=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=user&success=edit-data"</script>';
	}
	if(!empty($_GET['pass'])){
		$id = htmlentities($_POST['id']);
		$user = htmlentities($_POST['user']);
		$pass = htmlentities($_POST['pass']);
		
		$data[] = $user;
		$data[] = $pass;
		$data[] = $id;
		$sql = 'UPDATE login SET user=?,pass=md5(?) WHERE id_member=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=user&success=edit-data"</script>';
	}

	if(!empty($_GET['jual'])){
		$id = htmlentities($_POST['id']);
		$id_ukuran = htmlentities($_POST['id_ukuran']);
		$jumlah = htmlentities($_POST['jumlah']);
		
		$sql_tampil = "select ukuran.*, barang.* from ukuran inner join barang on ukuran.id_barang = barang.id_barang where ukuran.id_ukuran=?";
		$row_tampil = $config -> prepare($sql_tampil);
		$row_tampil -> execute(array($id_ukuran));
		$hasil = $row_tampil -> fetch();

		if($hasil['stok2'] > $jumlah)
		{
			$jual = $hasil['harga_jual'];
			$total = $jual * $jumlah;
			$data1[] = $jumlah;
			$data1[] = $total;
			$data1[] = $id;
			$sql1 = 'UPDATE penjualan SET jumlah=?,total=? WHERE id_penjualan=?';
			$row1 = $config -> prepare($sql1);
			$row1 -> execute($data1);
			echo '<script>window.location="../../index.php?page=jual#keranjang"</script>';
		}else{
			echo '<script>alert("Keranjang Melebihi Stok Barang Anda !");
					window.location="../../index.php?page=jual#keranjang"</script>';
		}
		
	}


	if(!empty($_GET['cari_barang'])){
		$cari = trim(strip_tags($_POST['keyword']));
		if($cari == '')
		{

		}else{
			$sql = "select barang.*, ukuran.*, kategori.id_kategori, kategori.nama_kategori, supplier.id_supplier, supplier.nama_supplier
					from ukuran inner join barang on ukuran.id_barang = barang.id_barang
					inner join kategori on barang.id_kategori = kategori.id_kategori 
					inner join supplier on barang.id_supplier = supplier.id_supplier 
					where barang.id_barang like '%$cari%' or barang.nama_barang like '%$cari%' or barang.merk like '%$cari%' or ukuran.ukuran2 like '%$cari%'
					order by ukuran.id_barang";
			$row = $config -> prepare($sql);
			$row -> execute();
			$hasil1= $row -> fetchAll();
	?>
		<table class="table table-stripped" width="100%" id="example2">
			<tr>
				<th>ID Barang</th>
				<th>Nama Barang</th>
				<th>Merk</th>
				<th>Stok</th>
				<th>Ukuran</th>
				<th>Harga Jual</th>
				<th>Aksi</th>
			</tr>
		<?php foreach($hasil1 as $hasil){?>
			<tr>
				<td><?php echo $hasil['id_barang'];?></td>
				<td><?php echo $hasil['nama_barang'];?></td>
				<td><?php echo $hasil['merk'];?></td>
				<td><?php echo $hasil['stok2'];?></td>
				<td><?php echo $hasil['ukuran2'];?></td>
				<td><?php echo $hasil['harga_jual'];?></td>
				<td>
				<a href="fungsi/tambah/tambah.php?jual=jual&id=<?php echo $hasil['id_barang'];?>&idu=<?php echo $hasil['id_ukuran'];?>&id_kasir=<?php echo $_SESSION['kasir']['id_member'];?>&hrg=<?php echo $hasil['harga_jual'];?>" 
					class="btn btn-success">
					<i class="fa fa-shopping-cart"></i></a></td>
			</tr>
		<?php }?>
		</table>
<?php	
		}
	}
}
