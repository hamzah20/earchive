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
						<h2> <span class="badge bg-success mb-3"> DATA BERKAS MASUK</span></h2> 
						<table class="table" id="scheduleTable">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Catatan</th>
									<th>Kode Berkas</th>  
									<th>Nama Berkas</th>
									<th>Tanggal</th>
                                    <th>Admin</th> 
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i 	 = 1;
									$sql = "select * from v_catatan where status='Penyimpanan' order by kode_catatan_berkas desc";
									$r 	 = mysqli_query($conn,$sql);
									while($rs=mysqli_fetch_array($r)){
										?>
										<tr>
											<td><?php echo $i?></td>
                                            <td><?php echo $rs['kode_catatan_berkas']?></td>
											<td><?php echo $rs['kode_berkas_dokumen']?></td>
											<td><?php echo $rs['nama_berkas_dokumen']?></td> 
											<td><?php echo $rs['tanggal_berkas_dokumen']?></td> 
                                            <td><?php echo $rs['nama_admin']?></td>  
                                            <?php
                                                if($rs['status'] == 'Penyimpanan'){
                                                    $warna_status = 'bg-primary';
                                                } elseif($rs['status'] == 'Pengiriman'){
                                                    $warna_status = 'bg-success';
                                                } elseif($rs['status'] == 'Perubahan'){
                                                    $warna_status = 'bg-warning';
                                                } else{
                                                    $warna_status = 'bg-secondary';
                                                }
                                            ?>
											<td><span class="badge <?php echo $warna_status; ?>"><?php echo $rs['status']?></span></td> 
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