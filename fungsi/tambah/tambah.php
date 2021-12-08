<?php 
session_start();
if(!empty($_SESSION['admin sistem'])||( $_SESSION['kasir'])){
	require '../../config.php';
	if(!empty($_GET['kategori'])){
		$nama= $_POST['kategori'];
		$tgl= date("j F Y, G:i");
		$data[] = $nama;
		$data[] = $tgl;
		$sql = 'INSERT INTO kategori (nama_kategori,tgl_input) VALUES(?,?)';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=kategori&&success=tambah-data"</script>';
	}
	if(!empty($_GET['barang'])){
		$id = $_POST['id'];
		$kategori = $_POST['kategori'];
		$nama = $_POST['nama'];
		$merk = $_POST['merk'];
		$namsup = $_POST['namsup'];
		$beli = $_POST['beli'];
		$untung = $_POST['untung'];
		$satuan = $_POST['satuan'];
		$tgl = $_POST['tgl'];
		
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

		$data[] = $id;
		$data[] = $kategori;
		$data[] = $nama;
		$data[] = $namsup;
		$data[] = $merk;
		$data[] = $beli;
		$data[] = $jual;
		$data[] = $untung;
		$data[] = $satuan;
		
		$data[] = $tgl;
		$sql = 'INSERT INTO barang (id_barang,id_kategori,nama_barang,id_supplier,merk,harga_beli,harga_jual,untung,satuan_barang,tgl_input) 
			    VALUES (?,?,?,?,?,?,?,?,?,?) ';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=barang&success=tambah-data"</script>';
	}
	if(!empty($_GET['ukuran'])){
		$id = $_POST['id'];
		$stok = $_POST['stok'];
		$ukuran = $_POST['ukuran'];
		
		
		

		$data[] = $id;
		$data[] = $stok;
		$data[] = $ukuran;
		
		$sql = 'INSERT INTO ukuran (id_barang,stok2,ukuran2) 
			    VALUES (?,?,?) ';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=ukuran&success=tambah-data"</script>';
	}
	if(!empty($_GET['supplier'])){
		$namsup = $_POST['namsup'];
		$alamat = $_POST['alamat'];
		$no_hp = $_POST['no_hp'];
		$tgl = $_POST['tgl'];
		$nampem = $_POST['nampem'];
		$email = $_POST['email'];
		
		$data[] = $namsup;
		$data[] = $alamat;
		$data[] = $no_hp;
		$data[] = $tgl;
		$data[] = $nampem;
		$data[] = $email;
		$sql = 'INSERT INTO supplier (nama_supplier, alamat, no_hp, tgl_input, nama_pemilik, email) 
			    VALUES (?,?,?,?,?,?) ';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=supplier&success=tambah-data"</script>';
	}
	if(!empty($_GET['jual'])){
		$id = $_GET['id'];
		$idu = $_GET['idu'];
		$kasir =  $_GET['id_kasir'];
		$jumlah = '1';
		$total = $_GET['hrg'];
		$tgl = date("j F Y, G:i");
		
		$data1[] = $id;
		$data1[] = $idu;
		$data1[] = $kasir;
		$data1[] = $jumlah;
		$data1[] = $total;
		$data1[] = $tgl;
		$sql1 = 'INSERT INTO penjualan (id_barang,id_ukuran,id_member,jumlah,total,tanggal_input) VALUES (?,?,?,?,?,?)';
		$row1 = $config -> prepare($sql1);
		$row1 -> execute($data1);
 		echo '<script>window.location="../../index.php?page=jual&success=tambah-data"</script>';
	}
	if(!empty($_GET['beli'])){
		$id = $_GET['id'];
		$idu = $_GET['idu'];
		$kasir =  $_GET['id_kasir'];
		$jumlah = '1';
		$total = $_GET['hrg'];
		$tgl = date("j F Y, G:i");
		$ids =  $_GET['ids'];
		
		$data1[] = $id;
		$data1[] = $kasir;
		$data1[] = $jumlah;
		$data1[] = $total;
		$data1[] = $tgl;
		$data1[] = $ids;
		$data1[] = $idu;
		$sql1 = 'INSERT INTO pembelian (id_barang,id_member,jumlah,total,tanggal_input,id_supplier,id_ukuran) VALUES (?,?,?,?,?,?,?)';
		$row1 = $config -> prepare($sql1);
		$row1 -> execute($data1);
 		echo '<script>window.location="../../index.php?page=beli&success=tambah-data"</script>';
	}
}