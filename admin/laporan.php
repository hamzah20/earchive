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
                        <h2> <span class="badge bg-success mb-3">LAPORAN</span></h2> 
                        <div class="col-4"> 
                            <form action="controller/master_p.php?role=EXPORT_LAPORAN" method="POST" enctype="multipart/form-data"> 
                                <div class="mb-3">
                                    <label class="form-label">Kategori</label>
                                    <select class="form-select" name="txt_kategori">  
                                        <option value="Masuk">Berkas Masuk</option>
                                        <option value="Keluar">Berkas Keluar</option>  
                                    </select>
                                </div> 
                                <input type="submit" class="btn btn-primary" value="Download">
                            </form>
                        </div>
					</div> 
				</div>
			</div> 
									
			<?php include('modal/add_rak.php'); ?>		
			<?php include('modal/edit_rak.php'); ?>		
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<!-- Source of javascript for this role -->
	<?php include('include/javascript.php'); ?>

</body>

</html>