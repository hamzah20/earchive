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
						<h2> <span class="badge bg-success mb-3"> DATA BERKAS KELUAR</span></h2> 
						<table class="table" id="scheduleTable">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Catatan</th> 
									<th>Nama Berkas</th>
									<th>Tanggal</th>
                                    <th>Admin</th> 
									<th>Penerima</th> 
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i 	 = 1;
									$sql = "select * from v_catatan_keluar order by kode_surat_tanda_terima desc";
									$r 	 = mysqli_query($conn,$sql);
									while($rs=mysqli_fetch_array($r)){
										?>
										<tr>
											<td><?php echo $i?></td>
                                            <td><?php echo $rs['kode_surat_tanda_terima']?></td>
											<td><?php echo $rs['nama_berkas_dokumen']?></td>
											<td><?php echo $rs['tanggal_kirim']?></td> 
											<td><?php echo $rs['nama_pengirim']?></td> 
                                            <td><?php echo $rs['nama_penerima']?></td>  
											<td><span class="badge bg-success">Pengiriman</span></td> 
											<td> </td>
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