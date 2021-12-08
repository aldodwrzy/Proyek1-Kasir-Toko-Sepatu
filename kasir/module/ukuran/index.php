 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data Ukuran Sepatu</h3>
						<br/>
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
						
						<?php 
							$sql1=" select ukuran.*, barang.nama_barang from ukuran inner join barang on ukuran.id_barang = barang.id_barang where stok2 <= 3";
							$row1 = $config -> prepare($sql1);
							$row1 -> execute();
							$r = $row1 -> fetchAll();
							foreach($r as $q) {
						?>	
						<?php
								echo "
								<div class='alert alert-warning'>
								<span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['nama_barang']."</a>  / <span style='color:red'> ID ". $q['id_barang']."</span> / <span style='color:red'> Ukuran ". $q['ukuran2']."</span> yang tersisa sudah kurang dari 3 . silahkan lapor ke pemilik !!
								
							</div>
								";	
							}
						
						?>
					

						<!-- Trigger the modal with a button -->
						
						
						<div class="clearfix"></div>
						<br/>
						
						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-bordered table-striped" id="example1">
								<thead>
									<tr style="background:#DFF0D8;color:#333;">
										<th>No.</th>
										<th>ID Sepatu</th>
										<th>Nama Sepatu</th>
										<th>Ukuran</th>
										<th>Stok</th>
										<th>Harga Beli</th>
										<th>Harga Jual</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>

								<?php 
									$totalBeli = 0;
									$totalJual = 0;
									$totalStok = 0;
									$hasil = $lihat -> laporan_ukuran();
									$no=1;
									foreach($hasil as $isi) {
								?>
									<tr>
										<td><?php echo $no;?></td>
										
										<td><?php echo $isi['id_barang'];?></td>
										<td><?php echo $isi['nama_barang'];?></td>
										<td><?php echo $isi['ukuran2'];?></td>
										<td>
											<?php if($isi['stok2'] == '0'){?>
												<button class="btn btn-danger"> Kosong </button>
											<?php }else{?>
												<?php echo $isi['stok2'];?>
											<?php }?>
										</td>
										<td>Rp.<?php echo number_format($isi['harga_beli']);?>,-</td>
										<td>Rp.<?php echo number_format($isi['harga_jual']);?>,-</td>
										<td>
											
											
											<?php if($isi['stok2'] <=  '3'){?>
											<center>
											<p>Silahkan Laporan kepada Pemilik, <br> agar melakukan restok</p>
											<a href="index.php?page=ukuran/details&barang=<?php echo $isi['id_ukuran'];?>"><button class="btn btn-primary btn-xs">Details</button></a>
											</center>
											
											<?php }else{?>
											<center>
											<a href="index.php?page=ukuran/details&barang=<?php echo $isi['id_ukuran'];?>"><button class="btn btn-primary btn-xs">Details</button></a>
											</center>
											<?php }?>
											
											
									</tr>
								<?php 
										$no++; 
										$totalBeli += $isi['harga_beli'] * $isi['stok2']; 
										$totalJual += $isi['harga_jual'] * $isi['stok2'];
										$totalStok += $isi['stok2'];
									}
								?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="4">Total </td>
										<th><?php echo $totalStok;?></td>
										<th>Rp.<?php echo number_format($totalBeli);?>,-</td>
										<th>Rp.<?php echo number_format($totalJual);?>,-</td>
										<th colspan="2" style="background:#ddd"></th>
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="clearfix" style="margin-top:7pc;"></div>
					<!-- end view barang -->
					<!-- tambah barang MODALS-->
						<!-- Modal -->
					
						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content" style=" border-radius:0px;">
								<div class="modal-header" style="background:#285c64;color:#fff;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Ukuran Sepatu</h4>
								</div>										
								<form action="fungsi/tambah/tambah.php?ukuran=tambah" method="POST">
									<div class="modal-body">
								
										<table class="table table-striped bordered">
											
											<?php
												$format = $lihat -> barang_id();
											?>
											<tr>
												<td>Nama Sepatu</td>
												<td>
												<select name="id" class="form-control" required>
													<option>Pilih Nama Sepatu</option>
													<?php  $sep = $lihat -> barang(); foreach($sep as $isi){ 	?>
													<option value="<?php echo $isi['id_barang'];?>"><?php echo $isi['nama_barang'];?></option>
													<?php }?>
												</select>
												
												</td>
											<tr>
												<td>Stok</td>
												<td><input type="number" class="form-control" readonly="readonly" value="0"  name="stok"></td>
											</tr>
											<tr>
												<td>Ukuran Sepatu</td>
												<td><input type="number" required Placeholder="Ukuran" class="form-control"  name="ukuran"></td>
											</tr>
										
										</table>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div>
						
					</div>
              	</div>
          	</section>
      	</section>
	
