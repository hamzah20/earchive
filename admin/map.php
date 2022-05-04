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
						<h2> <span class="badge bg-success mb-3">DATA MAP</span></h2>
						<div class="row">
							<div class="col- mb-3">
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMAP"><i class="align-middle me-2" data-feather="plus"></i>
							  Input Map
							</button> 
							</div>
						</div> 
						<table class="table" id="scheduleTable">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode</th>
									<th>Nama</th>  
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									$sql="select * from map";
									$r=mysqli_query($conn,$sql);
									while($rs=mysqli_fetch_array($r)){
										?>
										<tr>
											<td><?php echo $i?></td>
											<td><?php echo $rs['kode_map']?></td>
											<td><?php echo $rs['nama_map']?></td> 
											<td>  
												<button class="btn btn-sm btn-warning"  onclick="edit_map('<?php echo $rs['kode_map']?>')"><i class="align-middle" data-feather="edit"></i></button> 
												<a class="btn btn-sm btn-danger"  onclick="delete_map('<?php echo $rs['kode_map']?>')"><i class="align-middle text-center" data-feather="trash-2"></i></a>
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
			<?php include('modal/add_map.php'); ?>	
			<?php include('modal/edit_map.php'); ?>	
			<?php include('include/footer.php'); ?>

		</div>
	</div>
	<!-- Source of javascript for this role -->
	<?php include('include/javascript.php'); ?>

</body>

</html>