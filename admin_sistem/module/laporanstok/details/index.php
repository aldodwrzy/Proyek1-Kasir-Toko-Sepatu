 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
<?php 
	$id = $_GET['barang'];
	$hasil = $lihat -> ukuran_edit($id);
?>
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
					  	<a href="index.php?page=ukuran"><button class="btn btn-primary"><i class="fa fa-angle-left"></i> Balik </button></a>
						<h3>Details Sepatu</h3>
						<?php if(isset($_GET['success-stok'])){?>
						<div class="alert alert-success">
							<p>Tambah Stok Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['success'])){?>
						<div class="alert alert-success">
							<p>Tambah Data Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['remove'])){?>
						<div class="alert alert-danger">
							<p>Hapus Data Berhasil !</p>
						</div>
						<?php }?>
						<div class="container">
						<table class="table table-striped">
								<tr>
									<td>ID Sepatu</td>
									<td><?php echo $hasil['id_barang'];?></td>
								</tr>
								<tr>
									<td>Kategori</td>
									<td><?php echo $hasil['nama_kategori'];?></td>
								</tr>
								<tr>
									<td>Nama Sepatu</td>
									<td><?php echo $hasil['nama_barang'];?></td>
								</tr>
								<tr>
									<td>Merk Sepatu</td>
									<td><?php echo $hasil['merk'];?></td>
								</tr>
								<tr>
									<td>Nama Supplier</td>
									<td><?php echo $hasil['nama_supplier'];?></td>
								</tr>
								<tr>
									<td>Harga Beli</td>
									<td><?php echo $hasil['harga_beli'];?></td>
								</tr>
								<tr>
									<td>Harga Jual</td>
									<td><?php echo $hasil['harga_jual'];?></td>
								</tr>
								<tr>
									<td>Satuan Sepatu</td>
									<td><?php echo $hasil['satuan_barang'];?></td>
								</tr>
								<tr>
									<td>Stok</td>
									<td><?php echo $hasil['stok2'];?></td>
								</tr>
								<tr>
									<td>Ukuran Sepatu</td>
									<td><?php echo $hasil['ukuran2'];?></td>
								</tr>
								<tr>
									<td>Tanggal Input</td>
									<td><?php echo $hasil['tgl_input'];?></td>
								</tr>
								<tr>
									<td>Tanggal Update</td>
									<td><?php echo $hasil['tgl_update'];?></td>
								</tr>
								<tr>
									<td>Keterangan</td>
									<td><?php if($hasil['stok_kel2'] > 0){?>Terjadi Perubahan Stok Sebanyak <?= $hasil['stok_kel2']; ?> dikarenakan  <?= $hasil['ket2']; ?><?php }else{echo "Tidak Ada Perubahan Stok";}?></td>
								</tr>
						</table>
						</div>
							

						<div class="clearfix" style="padding-top:16%;"></div>
				  </div>
              </div>
          </section>
      </section>
	
