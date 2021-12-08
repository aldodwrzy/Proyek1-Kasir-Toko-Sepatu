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
						<?php if(isset($_GET['success'])){?>
						<div class="alert alert-success">
							<p>Edit Data Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['remove'])){?>
						<div class="alert alert-danger">
							<p>Hapus Data Berhasil !</p>
						</div>
						<?php }?>
						
						<table class="table table-striped">
							<form action="fungsi/edit/edit.php?ukuran=edit" method="POST">
								<tr>
									<td>ID Sepatu</td>
									<td><input type="text" readonly="readonly" class="form-control" value="<?php echo $hasil['id_barang'];?>" name="id">
									<input type="hidden" readonly="readonly" class="form-control" value="<?php echo $hasil['id_ukuran'];?>" name="id_ukuran"></td>
								</tr>
								
								<tr>
									<td>Nama Sepatu</td>
									<td><input type="text" readonly class="form-control" value="<?php echo $hasil['nama_barang'];?>" name="nama"></td>
								</tr>
								
								<tr>
									<td>Stok</td>
									<td><input type="number" readonly class="form-control" value="<?php echo $hasil['stok2'];?>" name="stok"></td>
								</tr>
								<tr>
									<td>Stok Keluar</td>
									<td><input type="number" class="form-control"  name="stok_kel" placeholder="Stok Keluar"></td>
								</tr>
								<tr>
									<td>Keterangan Perubahan Stok</td>
									<td><input type="text" class="form-control"  name="ket" placeholder="Keterangan"></td>
								</tr>
								<tr>
									<td>Ukuran Sepatu</td>
									<td><input type="number" class="form-control" value="<?php echo $hasil['ukuran2'];?>" name="ukuran"></td>
								</tr>
								
								<tr>
									<td></td>
									<td><button class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button></td>
								</tr>
							</form>
						</table>
						<?= $stok_kel?>
						<div class="clearfix" style="padding-top:16%;"></div>
				  </div>
              </div>
          </section>
      </section>
