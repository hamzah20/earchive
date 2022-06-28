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
						<h2> <span class="badge bg-success mb-3">DATA BERKAS DOKUMEN</span></h2>
						<div class="row">
							<div class="col- mb-3">
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBerkasDokumen"><i class="align-middle me-2" data-feather="plus"></i>
							  		Input Berkas Dokumen
								</button>  
							</div>
						</div> 
						<table class="table" id="scheduleTable">
							<thead>
								<tr>
									<th>No</th>
									<th>Nomor</th>
									<th>Nama</th>  
									<th>Jenis</th>
									<th>Tanggal</th>
									<th>Nama Admin</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i 	 = 1;
									$sql = "select * from v_berkas order by kode_berkas_dokumen asc";
									$r 	 = mysqli_query($conn,$sql);
									while($rs=mysqli_fetch_array($r)){
										?>
										<tr>
											<td><?php echo $i?></td>
											<td><?php echo $rs['kode_berkas_dokumen']?></td>
											<td><?php echo $rs['nama_berkas_dokumen']?></td> 
											<td><?php echo $rs['jenis_dokumen']?></td> 
											<td><?php echo $rs['tanggal_berkas_dokumen']?></td> 
											<td><?php echo $rs['nama_admin']?></td>  
											<td>  
												<a class="btn btn-sm btn-success"  href="controller/master_p.php?role=DOWNLOAD_FILE&nama_file=<?php echo $rs['nama_file'];?>"><i class="align-middle" data-feather="download"></i></a> 
												<button class="btn btn-sm btn-primary"  onclick="detail_berkas('<?php echo $rs['kode_berkas_dokumen']?>')"><i class="align-middle" data-feather="file-text"></i></button> 
												<button class="btn btn-sm btn-warning"  onclick="edit_berkas('<?php echo $rs['kode_berkas_dokumen']?>')"><i class="align-middle" data-feather="edit"></i></button> 
												<a class="btn btn-sm btn-danger"  onclick="delete_berkas('<?php echo $rs['kode_berkas_dokumen']?>')"><i class="align-middle text-center" data-feather="trash-2"></i></a>
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
			<?php include('modal/add_berkas_dokumen.php'); ?>	
			<?php include('modal/detail_berkas_dokumen.php'); ?>	
			<?php include('modal/edit_berkas_dokumen.php'); ?>	
			<?php include('include/footer.php'); ?>

		</div>
	</div>
	<!-- Source of javascript for this role -->
	<?php include('include/javascript.php'); ?>

</body>

</html>