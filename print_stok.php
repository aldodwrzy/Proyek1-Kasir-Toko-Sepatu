<?php 
    // fungsi header dengan mengirimkan raw data excel
    // header("Content-type: application/vnd-ms-excel");
    // membuat nama file ekspor "export-to-excel.xls"
    // header("Content-Disposition: attachment; filename=data-laporan-".date('Y-m-d').".xlsx");

    require 'config.php';
    include $view;
    $lihat = new view($config);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>window.print();</script>

    <!-- view barang -->	
    <div class="modal-view">
        <table border="1" width="100%" cellpadding="3" cellspacing="4">
        <thead>
									<tr style="background:#DFF0D8;color:#333;">
										<th>No.</th>
										<th>ID Sepatu</th>
										<th>Nama Sepatu</th>
										<th>Ukuran</th>
										<th>Stok</th>
										<th>Harga Beli</th>
										<th>Harga Jual</th>
										
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
										<th colspan="1" style="background:#ddd"></th>
									</tr>
        </table>
    </div>
   
              
</body>
</html>