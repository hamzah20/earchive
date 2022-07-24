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
						<h2> <span class="badge bg-success mb-3">DATA KIRIM BERKAS</span></h2> 
						<div class="row">
							<div class="col- mb-3">
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sendBerkasDokumen"><i class="align-middle me-2" data-feather="send"></i>
							  		Kirim Berkas Dokumen
								</button> 
							</div>
						</div> 
						<table class="table" id="scheduleTable">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode</th>
									<th>Pengirim</th>  
									<th>Penerima</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									$sql="select * from v_catatan_keluar";
									$r=mysqli_query($conn,$sql);
									while($rs=mysqli_fetch_array($r)){
										?>
										<tr>
											<td><?php echo $i?></td>
											<td><?php echo $rs['kode_surat_tanda_terima']?></td>
											<td><?php echo $rs['nama_pengirim']?></td>
											<td><?php echo $rs['nama_penerima']?></td>
											<td><?php echo $rs['keperluan']?></td>  
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
			<?php include('modal/kirim_berkas_dokumen.php'); ?>		 
			<?php include('include/footer.php'); ?>

		</div>
	</div>
	<!-- Source of javascript for this role -->
	<?php include('include/javascript.php'); ?>

</body>

</html>