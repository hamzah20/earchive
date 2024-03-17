<?php include('include/header.php'); ?>
<body>
	<div class="wrapper">
		<!-- Sidebar in posyandu/include -->
		<?php include('include/sidebar.php'); ?>

		<div class="main">
			<!-- Header top in posyandu/include -->
			<?php include('include/header_top.php'); ?>

			<?php if($_SESSION['user_group'] == 'Pegawai' ){ ?>
			<div class="row">
				<div class="col">
					<a href="berkas_masuk_pegawai.php">
					<div class="card" style="background-color:#F08080;">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 style="font-size: 25px; color: white;" class="card-title">Jumlah Berkas Masuk</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary" style="width:50px; height: 50px; background-color:#F08080">
										<i class="align-middle" style="width:150px; height: 150px; stroke: white;" data-feather="inbox"></i>
									</div>
								</div>
							</div>
							<?php 
								$sql_berkas = "SELECT COUNT(*) AS TOTAL_BERKAS_MASUK FROM v_catatan_keluar where id_penerima='".$_SESSION['user_id']."' order by kode_surat_tanda_terima desc";
            					$r_berkas 	= mysqli_query($conn,$sql_berkas);
            					$rs_berkas 	= mysqli_fetch_array($r_berkas); 
							?>
							<h1 style="color: white; font-size:40px;" class="mt-1 mb-3"><?= $rs_berkas['TOTAL_BERKAS_MASUK']; ?></h1>
						</div>
					</div>
				</a>
			</div>
		<div class="col">
			<div class="col-auto">
				<a href="berkas_masuk_pegawai.php">
					<div class="card">
						<div class="card-body" style="background-color:	#F0E68C;">
							<div class="row">
								<div class="col mt-0">
									<h5 style="font-size: 25px; color: white;" class="card-title">Jumlah Surat Masuk</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary" style="width:50px; height: 50px; background-color:	#F0E68C;">
										<i class="align-middle" style="width:150px; height: 150px; stroke: white;" data-feather="mail"></i>
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

			<?php } ?>
		<div>
			<?php include('include/footer.php'); ?>
		</div>
	<!-- Source of javascript for this role -->
	<?php include('include/javascript.php'); ?>
	
</body>

</html>