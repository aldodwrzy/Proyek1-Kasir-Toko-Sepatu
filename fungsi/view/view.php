<?php
	 class view {
		protected $db;
		function __construct($db){
			$this->db = $db;
		}
			
			function member(){
				$sql = "select member.*, login.*
						from member inner join login on member.id_member = login.id_member";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function member_edit($id){
				$sql = "select member.*, login.*
						from member inner join login on member.id_member = login.id_member
						where member.id_member= ?";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($id));
				$hasil = $row -> fetch();
				return $hasil;
			}
			
			function toko(){
				$sql = "select*from toko where id_toko='1'";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}

			function kategori(){
				$sql = "select*from kategori";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function barang(){
				$sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori, supplier.id_supplier, supplier.nama_supplier
						from barang inner join kategori on barang.id_kategori = kategori.id_kategori 
						inner join supplier on barang.id_supplier = supplier.id_supplier
						ORDER BY id_barang DESC";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}
			
			function ukuran(){
				$sql = "select barang.*, ukuran.*, kategori.id_kategori, kategori.nama_kategori, supplier.id_supplier, supplier.nama_supplier
						from ukuran inner join barang on ukuran.id_barang = barang.id_barang
						inner join kategori on barang.id_kategori = kategori.id_kategori 
						inner join supplier on barang.id_supplier = supplier.id_supplier
						ORDER BY id_ukuran DESC";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}
	
			function laporan_ukuran(){
				$sql = "select barang.*, ukuran.*, kategori.id_kategori, kategori.nama_kategori, supplier.id_supplier, supplier.nama_supplier
						from ukuran inner join barang on ukuran.id_barang = barang.id_barang
						inner join kategori on barang.id_kategori = kategori.id_kategori 
						inner join supplier on barang.id_supplier = supplier.id_supplier
						ORDER BY barang.id_barang ASC";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}
			
			function supplier(){
				$sql = "SELECT * FROM supplier";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;

			}


			function barang_edit($id){
				$sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori, supplier.id_supplier, supplier.nama_supplier
						from barang inner join kategori on barang.id_kategori = kategori.id_kategori 
						inner join supplier on barang.id_supplier = supplier.id_supplier
						where id_barang=?";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($id));
				$hasil = $row -> fetch();
				return $hasil;
			}
			
			function ukuran_edit($id){
				$sql = "select barang.*, ukuran.*, kategori.id_kategori, kategori.nama_kategori, supplier.id_supplier, supplier.nama_supplier
						from ukuran inner join barang on ukuran.id_barang = barang.id_barang
						inner join kategori on barang.id_kategori = kategori.id_kategori 
						inner join supplier on barang.id_supplier = supplier.id_supplier 
						where id_ukuran=?";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($id));
				$hasil = $row -> fetch();
				return $hasil;
			}
			
			function supplier_edit($id){
				$sql = "SELECT * FROM supplier WHERE id_supplier=?";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($id));
				$hasil = $row -> fetch();
				return $hasil;
			}

			function barang_cari($cari){
				$sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
						from barang inner join kategori on barang.id_kategori = kategori.id_kategori
						where id_barang like '%$cari%' or nama_barang like '%$cari%' or merk like '%$cari%'";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function ukuran_cari($cari){
				$sql = "select barang.*, ukuran.*, kategori.id_kategori, kategori.nama_kategori, supplier.id_supplier, supplier.nama_supplier
						from ukuran inner join barang on ukuran.id_barang = barang.id_barang
						inner join kategori on barang.id_kategori = kategori.id_kategori 
						inner join supplier on barang.id_supplier = supplier.id_supplier
						where id_barang like '%$cari%' or nama_barang like '%$cari%' or merk like '%$cari%' or ukuran2 like '%$cari%'";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function barang_id(){
				$sql = 'SELECT * FROM barang ORDER BY id_barang DESC';
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				
				$urut = substr($hasil['id_barang'], 3, 4);
				$tambah = (int) $urut + 1;
				if(strlen($tambah) == 1){
					 $format = 'SPT00'.$tambah.'';
				}else if(strlen($tambah) == 2){
					 $format = 'SPT0'.$tambah.'';
				}else{
					 $format = 'SPT'.$tambah.'';
				}
				return $format;
			}

			function kategori_edit($id){
				$sql = "select*from kategori where id_kategori=?";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($id));
				$hasil = $row -> fetch();
				return $hasil;
			}

			function kategori_row(){
				$sql = "select*from kategori";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> rowCount();
				return $hasil;
			}

			function barang_row(){
				$sql = "select*from barang";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> rowCount();
				return $hasil;
			}

			function supplier_row(){
				$sql = "select*from supplier";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> rowCount();
				return $hasil;
			}

			function barang_stok_row(){
				$sql ="SELECT SUM(stok2) as jml FROM ukuran";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}

			function barang_beli_row(){
				$sql ="SELECT SUM(harga_beli) as beli FROM barang";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}

			function jual_row(){
				$sql ="SELECT SUM(jumlah) as stok FROM nota";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}
		
			function beli_row(){
				$sql ="SELECT SUM(jumlah) as stok FROM nota_pembelian";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}

			function jual(){
				$sql ="SELECT nota.* , barang.id_barang, barang.nama_barang, member.id_member, ukuran.ukuran2, ukuran.id_ukuran,
						member.nm_member from nota 
					   left join barang on barang.id_barang=nota.id_barang 
					   left join member on member.id_member=nota.id_member
					   left join ukuran on ukuran.id_ukuran=nota.id_ukuran 
					   ORDER BY id_nota DESC";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}
			
			function beli(){
				$sql ="SELECT nota_pembelian.* , barang.id_barang, barang.nama_barang, member.id_member, ukuran.ukuran2, ukuran.id_ukuran,
						member.nm_member,supplier.id_supplier, supplier.nama_supplier  from nota_pembelian
					   	left join barang on barang.id_barang=nota_pembelian.id_barang 
					   	left join member on member.id_member=nota_pembelian.id_member 
						left join ukuran on ukuran.id_ukuran=nota_pembelian.id_ukuran 
						left join supplier on supplier.id_supplier=nota_pembelian.id_supplier 
					   	ORDER BY id_nota_pembelian DESC";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}
			
			function periode_beli($periode){
				$sql ="SELECT nota_pembelian.* , barang.id_barang, barang.nama_barang, member.id_member, ukuran.ukuran2, ukuran.id_ukuran,
						member.nm_member,supplier.id_supplier, supplier.nama_supplier from nota_pembelian 
					   left join barang on barang.id_barang=nota_pembelian.id_barang 
					   left join member on member.id_member=nota_pembelian.id_member 
					   left join ukuran on ukuran.id_ukuran=nota_pembelian.id_ukuran  
					   left join supplier on supplier.id_supplier=nota_pembelian.id_supplier 
					   WHERE nota_pembelian.periode = ?";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($periode));
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function periode_jual($periode){
				$sql ="SELECT nota.* , barang.id_barang, barang.nama_barang, member.id_member, ukuran.ukuran2, ukuran.id_ukuran,
						member.nm_member from nota 
						left join barang on barang.id_barang=nota.id_barang 
						left join member on member.id_member=nota.id_member
						left join ukuran on ukuran.id_ukuran=nota.id_ukuran  
					   WHERE nota.periode = ?";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($periode));
				$hasil = $row -> fetchAll();
				return $hasil;
			}


			function penjualan(){
				$sql ="SELECT penjualan.* , barang.id_barang, barang.nama_barang, member.id_member, ukuran.ukuran2, ukuran.id_ukuran, 
						member.nm_member from penjualan 
					   left join barang on barang.id_barang=penjualan.id_barang 
					   left join member on member.id_member=penjualan.id_member 
					   left join ukuran on ukuran.id_ukuran=penjualan.id_ukuran 
					  
					  
					   ORDER BY id_penjualan";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function pembelian(){
				$sql ="SELECT pembelian.* , barang.id_barang, barang.nama_barang, member.id_member,
						member.nm_member, supplier.id_supplier, supplier.nama_supplier, ukuran.ukuran2, ukuran.id_ukuran 
						from pembelian 
					   left join barang on barang.id_barang=pembelian.id_barang 
					   left join member on member.id_member=pembelian.id_member 
					   left join supplier on supplier.id_supplier=pembelian.id_supplier 
					   left join ukuran on ukuran.id_ukuran=pembelian.id_ukuran
					   ORDER BY id_pembelian";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function jumlah(){
				$sql ="SELECT SUM(total) as bayar FROM penjualan";
				$row = $this -> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}

			function jumlah_beli(){
				$sql ="SELECT SUM(total) as bayar FROM pembelian";
				$row = $this -> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}

			function jumlah_nota(){
				$sql ="SELECT SUM(total) as bayar FROM nota";
				$row = $this -> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}

			function jumlah_nota_pembelian(){
				$sql ="SELECT SUM(total) as bayar FROM nota_pembelian";
				$row = $this -> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}

			function jml(){
				$sql ="SELECT SUM(harga_beli*stok) as byr FROM barang";
				$row = $this -> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}
	 }
