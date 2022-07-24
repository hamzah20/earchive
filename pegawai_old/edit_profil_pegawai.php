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
                        <?php
                            $i 	 = 1;
                            $sql = "select * from pegawai where id_pegawai='".$_SESSION['user_id']."'";
                            $r 	 = mysqli_query($conn,$sql);
                            $rs  = mysqli_fetch_array($r);
                        ?>
						<form>
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="text" class="form-control" id="txt_nama"> 
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
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