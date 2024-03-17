<?php include('include/header.php'); ?>
<body>
	<div class="wrapper">
		<!-- Sidebar in posyandu/include -->
		<?php include('include/sidebar.php'); ?>

		<div class="main">
			<!-- Header top in posyandu/include -->
			<?php include('include/header_top.php'); ?>

			<?php if($_SESSION['user_group'] == 'Admin' OR $_SESSION['user_group'] == 'Super Admin'){ ?>
			<div class="row">
				<div class="col">
					<a href="berkas_dokumen.php">
					<div class="card" style="background-color:#F08080;">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 style="font-size: 25px; color: white;" class="card-title">Jumlah Penyimpanan Berkas</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary" style="width:50px; height: 50px; background-color:#F08080">
										<i class="align-middle" style="width:150px; height: 150px; stroke: white;" data-feather="archive"></i>
									</div>
								</div>
							</div>
							<?php 
								$sql_berkas = "SELECT COUNT(*) AS TOTAL_BERKAS FROM berkas";
            					$r_berkas 	= mysqli_query($conn,$sql_berkas);
            					$rs_berkas 	= mysqli_fetch_array($r_berkas); 
							?>
							<h1 style="color: white; font-size:40px;" class="mt-1 mb-3"><?= $rs_berkas['TOTAL_BERKAS']; ?></h1>
						</div>
					</div>
				</a>
			</div>
		<div class="col">
			<div class="col-auto">
				<a href="proyek.php">
					<div class="card">
						<div class="card-body" style="background-color:	#F0E68C;">
							<div class="row">
								<div class="col mt-0">
									<h5 style="font-size: 25px; color: white;" class="card-title">Jumlah Proyek</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary" style="width:50px; height: 50px; background-color:	#F0E68C;">
										<i class="align-middle" style="width:150px; height: 150px; stroke: white;" data-feather="home"></i>
									</div>
								</div>
							</div>
							<?php 
								$sql_proyek = "SELECT COUNT(*) AS TOTAL_PROYEK FROM proyek";
            					$r_proyek 	= mysqli_query($conn,$sql_proyek);
            					$rs_proyek 	= mysqli_fetch_array($r_proyek); 
							?>
							<h1 style="font-size:40px; color: white;" class="mt-1 mb-3"><?= $rs_proyek['TOTAL_PROYEK']; ?></h1>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-body" style="background-color:	#90EE90">
							<div class="row">
								<div class="col mt-0">
									<h5 style="font-size: 25px; color: white;" class="card-title">Jumlah Pegawai</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary" style="width:50px; height: 50px; background-color:	#90EE90">
										<i class="align-middle" style="width:150px; height: 150px; stroke: white;" data-feather="users"></i>
									</div>
								</div>
							</div>
							<?php 
								$sql_pegawai = "SELECT COUNT(*) AS TOTAL_PEGAWAI FROM pegawai";
            					$r_pegawai 	= mysqli_query($conn,$sql_pegawai);
            					$rs_pegawai 	= mysqli_fetch_array($r_pegawai); 

							?>
							<h1 style="font-size:40px; color: white;" class="mt-1 mb-3"><?= $rs_pegawai['TOTAL_PEGAWAI']; ?></h1>
						</div>
				</div>
			</div>
					<?php } ?>
					<?php if($_SESSION['user_group'] == 'Admin'){ ?>
			<div class="col">
				<div class="col-auto">
					<a href="catatan_berkas_keluar.php">
					<div class="card">
						<div class="card-body" style="background-color:#ADD8E6;">
							<div class="row">
								<div class="col mt-0">
									<h5 style="font-size: 25px; color: white;" class="card-title">Jumlah Pengiriman Berkas</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary" style="width:50px; height: 50px; background-color:#ADD8E6">
										<i class="align-middle" style="width:150px; height: 150px; stroke: white;" data-feather="send"></i>
									</div>
								</div>
							</div>
							<?php 
								$sql_pengiriman_berkas = "SELECT COUNT(*) AS TOTAL_PENGIRIMAN_BERKAS FROM v_catatan_keluar";
            					$r_pengiriman_berkas 	= mysqli_query($conn,$sql_pengiriman_berkas);
            					$rs_pengiriman_berkas 	= mysqli_fetch_array($r_pengiriman_berkas); 
							?>
							<h1 style="font-size:40px; color: white;" class="mt-1 mb-3"><?= $rs_pengiriman_berkas['TOTAL_PENGIRIMAN_BERKAS']; ?></h1>
						</div>
					</div>
					</a>
				</div>
			</div>
			<?php } ?>
		<?php if($_SESSION['user_group'] == 'Super Admin'){ ?>
				<div class="col">
					<a href="profil_admin.php">
					<div class="card" style="background-color:#ADD8E6;">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 style="font-size: 25px; color: white;" class="card-title">Jumlah Admin</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary" style="width:50px; height: 50px; background-color:#ADD8E6">
										<i class="align-middle" style="width:150px; height: 150px; stroke: white;" data-feather="user"></i>
									</div>
								</div>
							</div>
							<?php 
								$sql_admin = "SELECT COUNT(*) AS TOTAL_ADMIN FROM admin";
            					$r_admin 	= mysqli_query($conn,$sql_admin);
            					$rs_admin 	= mysqli_fetch_array($r_admin); 
							?>
							<h1 style="color: white; font-size:40px;" class="mt-1 mb-3"><?= $rs_admin['TOTAL_ADMIN']; ?></h1>
						</div>
					</div>
					</a>
				</div>
			</div>

			<?php } ?>
		<div>
			<?php include('include/footer.php'); ?>
		</div>
	<!-- Source of javascript for this role -->
	<?php include('include/javascript.php'); ?>
	
</body>

</html>