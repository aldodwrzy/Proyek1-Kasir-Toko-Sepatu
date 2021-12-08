 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
<?php 
	$id = $_GET['barang'];
	
	$hasil = $lihat -> barang_edit($id);
?>
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
					  	<a href="index.php?page=barang"><button class="btn btn-primary"><i class="fa fa-angle-left"></i> Balik </button></a>
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
							<form action="fungsi/edit/edit.php?barang=edit" method="POST">
								<tr>
									<td>ID Sepatu</td>
									<td><input type="text" readonly="readonly" class="form-control" value="<?php echo $hasil['id_barang'];?>" name="id"></td>
								</tr>
								<tr>
									<td>Kategori</td>
									<td>
									<select name="kategori" class="form-control">
										<option value="<?php echo $hasil['id_kategori'];?>"><?php echo $hasil['nama_kategori'];?></option>
										<option value="#">Pilih Kategori</option>
										<?php  $kat = $lihat -> kategori(); foreach($kat as $isi){ 	?>
										<option value="<?php echo $isi['id_kategori'];?>"><?php echo $isi['nama_kategori'];?></option>
										<?php }?>
									</select>
									</td>
								</tr>
								<tr>
									<td>Nama Sepatu</td>
									<td><input type="text" class="form-control" value="<?php echo $hasil['nama_barang'];?>" name="nama"></td>
								</tr>
								<tr>
									<td>Merk Sepatu</td>
									<td><input type="text" class="form-control" value="<?php echo $hasil['merk'];?>" name="merk"></td>
								</tr>
								<tr>
									<td>Nama Supplier</td>
									<td>
									<select name="namsup" class="form-control">
										<option value="<?php echo $hasil['id_supplier'];?>"><?php echo $hasil['nama_supplier'];?></option>
										<option value="#">Pilih Kategori</option>
										<?php  $sup = $lihat -> supplier(); foreach($sup as $isi){ 	?>
										<option value="<?php echo $isi['id_supplier'];?>"><?php echo $isi['nama_supplier'];?></option>
										<?php }?>
									</select>
									</td>
								</tr>
								<tr>
									<td>Harga Beli</td>
									<td><input type="number" class="form-control" value="<?php echo $hasil['harga_beli'];?>" name="beli"></td>
								</tr>
								<tr>
									<td>Harga Jual</td>
									<td><input type="number" readonly class="form-control" value="<?php echo $hasil['harga_jual'];?>"></td>
								</tr>
								<tr>
									<td>Ubah Keuntungan</td>
									<td>
									<select name="untung" class="form-control" required>
									<?php if($hasil['untung'] == "5"){?>
									<option value="5">Keuntungan 5%</option>
									<?php }elseif($hasil['untung'] == "10"){
									echo '<option value="10">Keuntungan 10%</option>';
									}elseif($hasil['untung'] == "15"){
										echo '<option value="15">Keuntungan 15%</option>';}?>
									<option value="5">Keuntungan 5%</option>
									<option value="10">Keuntungan 10%</option>
									<option value="15">Keuntungan 15%</option>
									</select>
									</td>
									</tr>
								<tr>
									<td>Satuan Sepatu</td>
									<td>
										<select name="satuan" class="form-control">
											<option value="<?php echo $hasil['satuan_barang'];?>"><?php echo $hasil['satuan_barang'];?></option>
											<option value="#">Pilih Satuan</option>
											<option value="Pasang">Pasang</option>
										</select>
									</td>
								</tr>
								
								<tr>
									<td>Tanggal Update</td>
									<td><input type="text" readonly="readonly" class="form-control" value="<?php echo  date("j F Y, G:i");?>" name="tgl"></td>
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
