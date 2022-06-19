		<nav id="sidebar" class="sidebar js-sidebar ">
			<?php
				//Cek jenis user untuk menentukan warna pada sidebar
				$status_user = $_SESSION['user_group'];
				if($status_user == 'Super Admin'){
					$warna_sidebar = '#03204C';
				} elseif($status_user == 'Admin'){
					$warna_sidebar = '#04396D';
				} elseif($status_user == 'Pegawai'){
					$warna_sidebar = '#035C96';
				}
			?>
			<div class="sidebar-content js-simplebar bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;">
				<a class="sidebar-brand  py-1">
          			<!-- <span class="align-middle">Eposyandu</span> -->
          			<img src="../boostrap/img/images/logo-ejmgip.png" class="text-center" width="150px" />
        		</a>

				<ul class="sidebar-nav bg-sidebar">
					<li class="sidebar-header  bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;"></li>
					<li class="sidebar-item active  bg-sidebar">
						<a class="sidebar-link bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;" href="dashboard.php">
             				<i class="align-middle" data-feather="sliders"></i> 
             			 	<span class="align-middle">Dashboard</span>
            			</a>
					</li> 
					<?php if($_SESSION['user_group'] == 'Admin'){ ?>
						<li class="sidebar-item bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;">
							<a class="sidebar-link bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;" href="dokumen.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Master Dokumen</span>
	            			</a>
						</li> 
						<li class="sidebar-item  bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;">
							<a class="sidebar-link  bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;" href="proyek.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Master Proyek</span>
	            			</a>
						</li>
						<li class="sidebar-item  bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;">
							<a class="sidebar-link  bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;" href="rak.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Master RAK</span>
	            			</a>
						</li>
						<li class="sidebar-item  bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;">
							<a class="sidebar-link  bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;" href="map.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Master Map</span>
	            			</a>
						</li>
					<?php }  ?>
					<?php if($_SESSION['user_group'] == 'Admin' OR $_SESSION['user_group'] == 'Super Admin'){ ?>
						<li class="sidebar-item  bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;">
							<a class="sidebar-link  bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;" href="berkas_dokumen.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Berkas</span>
	            			</a>
						</li>
					<?php } ?>
					<?php if($_SESSION['user_group'] == 'Admin'){ ?>
						<li class="sidebar-item  bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;">
							<a class="sidebar-link  bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;" href="informasi.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Catatan</span>
	            			</a>
						</li>
						<li class="sidebar-item  bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;">
							<a class="sidebar-link  bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;" href="informasi.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Surat</span>
	            			</a>
						</li>
					<?php } ?>  
					<?php if($_SESSION['user_group'] == 'Super Admin'){ ?>
						<li class="sidebar-item  bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;">
							<a class="sidebar-link  bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;" href="profil_admin.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Admin</span>
	            			</a>
						</li>
						<li class="sidebar-item  bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;">
							<a class="sidebar-link  bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;" href="profil_pegawai.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Pegawai</span>
	            			</a>
						</li>
					<?php } ?>
						<li class="sidebar-item bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;"> 
							<a class="sidebar-link bg-sidebar" style="background-color: <?= $warna_sidebar; ?>;" href="controller/login_p.php?role=LOGOUT">
	              				<i class="align-middle" data-feather="log-out"></i> 
	              				<span class="align-middle">Sign Out</span>
	            			</a>
					</li>  
				</ul>
			</div>
		</nav>