<?php 
	@ob_start();
	session_start();

		 if(!empty($_SESSION['admin sistem'])){
			require 'config.php';
			include $view;
			$lihat = new view($config);
            $toko = $lihat -> toko();
            // echo "Anda sedang di halaman pemilik";
            // echo '<a href="logout.php">Logout</a>';
			//  admin
            include 'admin_sistem/template/header.php';
            include 'admin_sistem/template/sidebar.php';
            	if(!empty($_GET['page'])){
                		include 'admin_sistem/module/'.$_GET['page'].'/index.php';
					}else{
                    		include 'admin_sistem/template/home.php';
                    	}
                    include 'admin_sistem/template/footer.php';

                    // end admin
        }
        elseif (!empty($_SESSION['kasir'])) {
            require 'config.php';
            include $view;
			$lihat = new view($config);
            $toko = $lihat -> toko();
            include 'kasir/template/header.php';
            include 'kasir/template/sidebar.php';
            	if(!empty($_GET['page'])){
                		include 'kasir/module/'.$_GET['page'].'/index.php';
					}else{
                    		include 'kasir/template/home.php';
                    	}
                    include 'kasir/template/footer.php';
            // echo "Anda sedang di Kasir";
            // echo '<a href="logout.php">Logout</a>';
        }
        else{
			echo '<script>window.location="login.php";</script>';
		}
?>