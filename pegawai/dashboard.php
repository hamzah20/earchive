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
					<a href="berkas_masuk.php">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Berkas Masuk</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary">
										<i class="align-middle" data-feather="user"></i>
									</div>
								</div>
							</div>
							<?php 
								$sql_berkas = "SELECT COUNT(*) AS TOTAL FROM surat_tanda_terima WHERE id_penerima='".$_SESSION['user_id']."'";
            					$r_berkas 	= mysqli_query($conn,$sql_berkas);
            					$rs_berkas 	= mysqli_fetch_array($r_berkas); 
							?>
							<h1 class="mt-1 mb-3 text-success"><?= $rs_berkas['TOTAL']; ?></h1>
						</div>
					</div>
					</a>
				</div>	
				<div class="col">
					<a href="surat_masuk.php">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Surat Masuk</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary">
										<i class="align-middle" data-feather="user"></i>
									</div>
								</div>
							</div>
							<?php 
								$sql_berkas = "SELECT COUNT(*) AS TOTAL FROM surat_tanda_terima WHERE id_penerima='".$_SESSION['user_id']."'";
            					$r_berkas 	= mysqli_query($conn,$sql_berkas);
            					$rs_berkas 	= mysqli_fetch_array($r_berkas); 
							?>
							<h1 class="mt-1 mb-3 text-success"><?= $rs_berkas['TOTAL']; ?></h1>
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