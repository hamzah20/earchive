		<nav id="sidebar" class="sidebar js-sidebar ">
			<?php
				//Cek jenis user untuk menentukan warna pada sidebar 
				$warna_sidebar = '#035C96'; 
			?>
			<div class="sidebar-content js-simplebar bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;">
				<a class="sidebar-brand  py-1">
          			<!-- <span class="align-middle">Eposyandu</span> -->
          			<img src="../boostrap/img/images/logo-ejmgip.png" class="text-center" width="200px" />
        		</a>

				<ul class="sidebar-nav bg-sidebar">
					<li class="sidebar-header  bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;"></li>
					<li class="sidebar-item active  bg-sidebar">
						<a class="sidebar-link bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;" href="dashboard.php">
             				<i class="align-middle" data-feather="sliders"></i> 
             			 	<span class="align-middle">Dashboard</span>
            			</a>
					<!-- </li>  
					<li class="sidebar-item bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;">
						<a class="sidebar-link bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;" href="dokumen.php">
							<i class="align-middle" data-feather="book"></i> <span class="align-middle">Master Dokumen</span>
						</a>
					</li>   -->
					<li class="sidebar-item  bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;">
						<a class="sidebar-link  bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;" href="berkas_masuk_pegawai.php">
							<i class="align-middle" data-feather="book"></i> <span class="align-middle">Berkas Masuk</span>
						</a>
					</li> 
				</ul>
			</div>
		</nav>