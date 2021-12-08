 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data Suplier</h3>
						<?php
								echo "
								<div class='alert alert-warning'>
									<span class='glyphicon glyphicon-info-sign'></span> Hati Hati dalam <a style='color:red'> Hapus dan Edit Data Supllier </a> karena dapat berpengaruh dalam laporan !!
								</div>
								";	
							
						?>
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
						
						

						<!-- Trigger the modal with a button -->
						
						<button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
							<i class="fa fa-plus"></i> Insert Data Supplier</button>
						<div class="clearfix"></div>
						<br/>
						
						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-bordered table-striped" id="example1">
								<thead>
									<tr style="background:#DFF0D8;color:#333;">
										<th>No.</th>
										<th>Nama Supplier</th>
										<th>Nama Pemilik</th>
										<th>Alamat</th>
										<th>No Handphone</th>
										<th>Email</th>
										<th>Tanggal Input</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>

								<?php 
									$hasil = $lihat -> supplier();
									$no=1;
									foreach($hasil as $isi) {
								?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $isi['nama_supplier'];?></td>
										<td><?php echo $isi['nama_pemilik'];?></td>
										<td><?php echo $isi['alamat'];?></td>
										<td><?php echo $isi['no_hp'];?></td>
										<td><?php echo $isi['email'];?></td>
										<td><?php echo $isi['tgl_input'];?></td>
										<td>
											
										
											<a href="index.php?page=supplier/edit&barang=<?php echo $isi['id_supplier'];?>"><button class="btn btn-warning btn-xs">Edit</button></a>
											<a href="fungsi/hapus/hapus.php?supplier=hapus&id=<?php echo $isi['id_supplier'];?>" onclick="javascript:return confirm('Hapus Data Supllier ?');"><button class="btn btn-danger btn-xs">Hapus</button></a>
											</td>	
											
											
									</tr>
								<?php 
										$no++; 
									
									}
								?>
								</tbody>
								<tfoot>
									<tr>
										
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
									<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Supplier</h4>
								</div>										
								<form action="fungsi/tambah/tambah.php?supplier=tambah" method="POST">
									<div class="modal-body">
								
										<table class="table table-striped bordered">
											
											
											<tr>
												<td>Nama Supplier</td>
												<td><input type="text" placeholder="Nama Supplier" class="form-control"  name="namsup"></td>
											</tr>
											<tr>
												<td>Nama Pemilik</td>
												<td><input type="text" placeholder="Nama Pemilik" class="form-control"  name="nampem"></td>
											</tr>
											<tr>
												<td>Alamat</td>
												<td><input type="text" placeholder="Alamat" required class="form-control" name="alamat"></td>
											</tr>
											<tr>
												<td>No Handphone</td>
												<td><input type="text" placeholder="Nomor Handphone" required class="form-control"  name="no_hp"></td>
											</tr>
											<tr>
												<td>Email</td>
												<td><input type="text" placeholder="Alamat Email" required class="form-control"  name="email"></td>
											</tr>
											<tr>
												<td>Tanggal Input</td>
												<td><input type="text" required readonly="readonly" class="form-control" value="<?php echo  date("j F Y, G:i");?>" name="tgl"></td>
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
	
