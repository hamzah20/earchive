<?php include('include/header.php'); ?>

<body>
	<div class="wrapper">
		<!-- Sidebar in posyandu/include -->
		<?php include('include/sidebar.php'); ?>

		<div class="main">
			<!-- Header top in posyandu/include -->
			<?php include('include/header_top.php'); ?>

			<div class="card">
				<div class="card-body">
					<div class="row">
						<h2> <span class="badge bg-success mb-3">BERKAS MASUK</span></h2> 
						<table class="table" id="scheduleTable">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode</th>
									<th>Nama</th>  
									<th>File</th> 
									<th>Pengirim</th>
									<th>Tanggal</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									$sql="select * from v_catatan_keluar where id_penerima='".$_SESSION['user_id']."' order by tanggal_kirim desc";
									$r=mysqli_query($conn,$sql);
									while($rs=mysqli_fetch_array($r)){
										?>
										<tr>
											<td><?php echo $i?></td>
											<td><?php echo $rs['kode_surat_tanda_terima']?></td>
											<td><?php echo $rs['nama_berkas_dokumen']?></td> 
											<td><?php echo $rs['nama_file']?></td> 
											<td><?php echo $rs['nama_pengirim']?></td> 
											<td><?php echo $rs['tanggal_kirim']?></td> 
											<td>
												<a class="btn btn-sm btn-success"  href="controller/master_p.php?role=DOWNLOAD_FILE&kode=<?php echo $rs['kode_surat_tanda_terima'];?>"><i class="align-middle" data-feather="download"></i></a> 
											</td>  
										</tr>
										<?php
										$i++;
									}
								?>
								
								
							</tbody>
						</table>
					</div> 
				</div>
			</div>   
			<?php include('include/footer.php'); ?>

		</div>
	</div>
	<!-- Source of javascript for this role -->
	<?php include('include/javascript.php'); ?>

</body>

</html>