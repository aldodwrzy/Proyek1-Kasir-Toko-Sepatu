   
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
<?php 
  $id = $_SESSION['kasir']['id_member'];
  $hasil_profil = $lihat -> member_edit($id);
?>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a><img src="assets/img/user/<?php echo $hasil_profil['gambar'];?>" class="img-circle" width="100" height="110"></a></p>
              	  <h5 class="centered"><?php echo $hasil_profil['nm_member'];?></h5>
              	  <h5 class="centered">( <?php echo $hasil_profil['NIK'];?> )</h5>
              	  <h5 class="centered">Kasir</h5>
              	  	
                  <li class="mt">
                      <a href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>


                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Sepatu <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                      </a>
                      <ul class="sub">
                          <li><a  href="index.php?page=kategori">Kategori</a></li>
                          <li><a  href="index.php?page=barang">Sepatu</a></li>
                          <li><a  href="index.php?page=ukuran">Ukuran</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="index.php?page=jual">
                          <i class="fa fa-desktop"></i>
                          <span>Transaksi Jual</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="index.php?page=user">
                          <i class="fa fa-cog"></i>
                          <span>Setting User</span>
                      </a>
                  </li>



                 
                 
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
