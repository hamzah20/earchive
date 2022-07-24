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
						<h2> <span class="badge bg-success mb-3">DATA PEGAWAI</span></h2>
						<div class="row">
							<div class="col- mb-3">
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPegawai"><i class="align-middle me-2" data-feather="plus"></i>
							  Input Pegawai
							</button> 
							</div>
						</div> 
						<table class="table" id="scheduleTable">
							<thead>
								<tr>
									<th>No</th>
									<th>ID</th>
									<th>Nama</th>  
									<th>Tempat & Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Telp</th>
                                    <th>Email</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									$sql="select * from pegawai";
									$r=mysqli_query($conn,$sql);
									while($rs=mysqli_fetch_array($r)){
										?>
										<tr>
											<td><?php echo $i?></td>
											<td><?php echo $rs['id_pegawai']?></td>
											<td><?php echo $rs['nama_pegawai']?></td> 
                                            <td><?php echo $rs['tempat_lahir_pegawai'].", ".$rs['tanggal_lahir_pegawai']?></td> 
                                            <td><?php echo $rs['jenis_kelamin_pegawai']?></td>
                                            <td><?php echo $rs['no_telp_pegawai']?></td>
                                            <td><?php echo $rs['email_pegawai']?></td>
											<?php
                                                if($rs['status_pegawai'] == 'Aktif'){
                                                    $warna_status = 'bg-success';
                                                } elseif($rs['status_pegawai'] == 'Tidak Aktif'){
                                                    $warna_status = 'bg-danger';
                                                } else{
                                                    $warna_status = 'bg-secondary';
                                                }
                                            ?>
											<td><span class="badge <?php echo $warna_status; ?>"><?php echo $rs['status_pegawai']?></span></td>
											<td>  
												<button class="btn btn-sm btn-warning"  onclick="edit_pegawai('<?php echo $rs['id_pegawai']?>')"><i class="align-middle" data-feather="edit"></i></button> 
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
			<?php include('modal/add_profil_pegawai.php'); ?>	
			<?php include('modal/edit_profil_pegawai.php'); ?>	
			<?php include('include/footer.php'); ?>

		</div>
	</div>
	<!-- Source of javascript for this role -->
	<?php include('include/javascript.php'); ?>

</body>

</html>