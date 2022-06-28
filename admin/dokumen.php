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
						<h2> <span class="badge bg-success mb-3">DATA DOKUMEN</span></h2>
						<div class="row">
							<div class="col- mb-3">
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDokumen"><i class="align-middle me-2" data-feather="plus"></i> Input Dokumen </button> 
							</div>  
						</div> 
						<table class="table" id="dokumenTable">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode</th>
									<th>Jenis</th> 
									<th>Status</th> 
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<!-- Menampilkan semua data dokumen -->
							<?php  
								$no 			= 1;
								$DataDok 		= "SELECT * FROM dokumen";
								$queryDataDok	= mysqli_query($conn,$DataDok);
								while($RSDataDok = mysqli_fetch_array($queryDataDok)){ 
							?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><p class="<?php echo $warna_font;?>"><?php echo $RSDataDok['kode_dokumen']; ?></p></td>
									<td><?php echo $RSDataDok['jenis_dokumen']; ?></td>  
									<?php
										if($RSDataDok['status_dokumen'] == 'Aktif'){
											$warna_status = 'bg-success';
										} elseif($RSDataDok['status_dokumen'] == 'Tidak Aktif'){
											$warna_status = 'bg-danger';
										} else{
											$warna_status = 'bg-secondary';
										}
									?>
									<td><span class="badge <?php echo $warna_status; ?>"><?php echo $RSDataDok['status_dokumen']; ?></span></td>  
									<td>  
										<button class="btn btn-sm btn-warning"  onclick="edit_dokumen('<?php echo $RSDataDok['kode_dokumen']?>')"><i class="align-middle" data-feather="edit"></i></button> 
									</td>  
								</tr>
							<?php  
								$no++;
								}
							?> 
							</tbody>
						</table>
					</div> 
				</div>
				
			</div> 	
			<?php include('modal/add_dokumen.php'); ?>	
			<?php include('modal/edit_dokumen.php'); ?>		
			<?php include('include/footer.php'); ?>
		</div>

	</div>
	<!-- Source of javascript for this role -->
	<?php include('include/javascript.php'); ?>

</body>

</html>