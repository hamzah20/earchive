<?php include('include/header.php'); ?>

<body>
	<div class="wrapper">
		<!-- Sidebar in posyandu/include -->
		<?php include('include/sidebar.php'); ?>

		<div class="main">
			<!-- Header top in posyandu/include -->
			<?php include('include/header_top.php'); ?> 
			<div class="row">
				<div class="col">
					<a href="dokumen.php">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Dokumen</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary">
										<i class="align-middle" data-feather="bookmark"></i>
									</div>
								</div>
							</div>
							<?php 
								$sql_dokumen = "SELECT COUNT(*) AS TOTAL FROM dokumen";
            					$r_dokumen 	= mysqli_query($conn,$sql_dokumen);
            					$rs_dokumen 	= mysqli_fetch_array($r_dokumen); 
							?>
							<h1 class="mt-1 mb-3 text-success"><?= $rs_dokumen['TOTAL']; ?></h1>
						</div>
					</div>
					</a>
				</div>	
				<div class="col">
					<a href="kader.php">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Proyek</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary">
										<i class="align-middle" data-feather="bookmark"></i>
									</div>
								</div>
							</div>
							<?php 
								$sql_proyek  = "SELECT COUNT(*) AS TOTAL FROM proyek";
            					$r_proyek 	= mysqli_query($conn,$sql_proyek);
            					$rs_proyek 	= mysqli_fetch_array($r_proyek); 
							?>
							<h1 class="mt-1 mb-3 text-success"><?= $rs_proyek['TOTAL']; ?></h1>
						</div>
					</div>
					</a>
				</div>	
			</div>
			
			<div class="row">
				<div class="col">
					<a href="bidan.php">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Rak</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary">
										<i class="align-middle" data-feather="bookmark"></i>
									</div>
								</div>
							</div>
							<?php 
								$sql_rak  = "SELECT COUNT(*) AS TOTAL FROM rak";
            					$r_rak 	= mysqli_query($conn,$sql_rak);
            					$rs_rak 	= mysqli_fetch_array($r_rak); 
							?>
							<h1 class="mt-1 mb-3 text-success"><?= $rs_rak['TOTAL']; ?></h1>
						</div>
					</div>
					</a>
				</div>	
				<div class="col">
					<a href="laporan.php">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Map</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary">
										<i class="align-middle" data-feather="bookmark"></i>
									</div>
								</div>
							</div>
							<?php 
								$sql_map = "SELECT COUNT(*) AS TOTAL FROM map";
            					$r_map   = mysqli_query($conn,$sql_map);
            					$rs_map  = mysqli_fetch_array($r_map); 
							?>
							<h1 class="mt-1 mb-3 text-success"><?= $rs_map['TOTAL']; ?></h1>
						</div>
					</div>
					</a>
				</div>	
			</div>  
			<div class="row">
				<div class="col">
					<a href="informasi.php">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Berkas Masuk</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary">
										<i class="align-middle" data-feather="bookmark"></i>
									</div>
								</div>
							</div>
							<?php 
								$sql_masuk  = "SELECT COUNT(*) AS TOTAL FROM berkas";
            					$r_masuk 	= mysqli_query($conn,$sql_masuk);
            					$rs_masuk 	= mysqli_fetch_array($r_masuk); 
							?>
							<h1 class="mt-1 mb-3 text-success"><?= $rs_masuk['TOTAL']; ?></h1>
						</div>
					</div>
					</a>
				</div>	
				<div class="col">
					<a href="makanan.php">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Berkas Keluar</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary">
										<i class="align-middle" data-feather="bookmark"></i>
									</div>
								</div>
							</div>
							<?php 
								$sql_keluar  = "SELECT COUNT(*) AS TOTAL FROM surat_tanda_terima";
            					$r_keluar 	  = mysqli_query($conn,$sql_keluar);
            					$rs_keluar   = mysqli_fetch_array($r_keluar); 
							?>
							<h1 class="mt-1 mb-3 text-success"><?= $rs_keluar['TOTAL']; ?></h1>
						</div>
					</div>
					</a>
				</div>	
			</div> 

			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<!-- Source of javascript for this role -->
	<?php include('include/javascript.php'); ?>

</body>

</html>