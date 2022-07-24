<?php
	include('../../conn.php');

	$role=$_GET['role'];
    switch ($role) {
        //---------------------- CASE PROFILE PEGAWAI ---------------------------------------------------
        case'TAMBAH_PEGAWAI': 
            $nama       = $_POST['txt_nama'];
            $tempat     = $_POST['txt_tempat'];
            $tanggal    = $_POST['txt_tanggal'];
            $jenis      = $_POST['txt_jeniskelamin'];
            $telp       = $_POST['txt_telpon']; 
            $email      = $_POST['txt_email'];
            $username   = $_POST['txt_username']; 
            $password   = md5($_POST['txt_password']); 

            // Ambil tahun dan bulan sekarang
            $year  = date("y"); 
            $month = date("m");  

            //------------- mencari apakah ada username yang sama pada table user
            $countUsername = "select count(*) as TOTAL from user where username='".$username."'";
            $queryCountUsername = mysqli_query($conn,$countUsername);
            $fetchCountUsername = mysqli_fetch_array($queryCountUsername); 
            if ($fetchCountUsername["TOTAL"] > 0)
            {
                $_SESSION["message"]="Username Sudah Pernah Dipakai";
                header  ("location:../profil_pegawai.php");
                exit();
            } 
            
            //------------- Mencari nomer terakhir, untuk memberikan id admin
            $LastNum      = "select count(*) as TOTAL from pegawai where substring(id_pegawai,3,2)='".$year."'";
            $queryLastNum = mysqli_query($conn,$LastNum);
            $fetchLastNum = mysqli_fetch_array($queryLastNum);
            if ($fetchLastNum["TOTAL"] != 0)
            {
                $proLastNum = "select substring(id_pegawai,7,4) as LAST_NO from pegawai WHERE substring(id_pegawai,3,2)='".$year."' order by substring(id_pegawai,7,4) desc";
                $queryProLastNum = mysqli_query($conn,$proLastNum);
                $fetchProLastNum = mysqli_fetch_array($queryProLastNum);
                $run_no = str_pad(strval(intval($fetchProLastNum["LAST_NO"]) + 1), 4, "0", STR_PAD_LEFT);
            }else{
                $run_no = str_pad(strval(intval(1)), 4, "0", STR_PAD_LEFT);
            }
            $doc_no="P-".$year.$month.$run_no;

            //------------- Insert data pegawai kedalam table pegawai
            $insPegawai      = "INSERT INTO `pegawai`(`id_pegawai`, `nama_pegawai`,`tempat_lahir_pegawai`, `tanggal_lahir_pegawai`, `jenis_kelamin_pegawai`, 
            `no_telp_pegawai`, `email_pegawai`) 
            VALUES ('".$doc_no."','".$nama."','".$tempat."','".$tanggal."','".$jenis."','".$telp."','".$email."')";
            $queryInsPegawai = mysqli_query($conn,$insPegawai); 

            //------------- Insert data pegawai kedalam table user
            $insUser       = "INSERT INTO user (id_user,username,password,user_group) values('".$doc_no."','".$username."','".$password."','Pegawai')";
            $queryInsUser = mysqli_query($conn,$insUser);
            header  ("location:../profil_pegawai.php");

        break; 

        case"EDIT_PEGAWAI":
            $id = $_POST['id_pegawai'];
            $getDataEdit        = "SELECT * FROM `pegawai` where id_pegawai='".$id."'";
            $r_getDataEdit      = mysqli_query($conn,$getDataEdit);
            $rs_getDataEdit     = mysqli_fetch_array($r_getDataEdit);
?>
            <input type="hidden" name="txt_pegawai" class="form-control" value="<?php echo $rs_getDataEdit['id_pegawai'];?>">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="txt_nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $rs_getDataEdit['nama_pegawai'];?>">
            </div> 
            <div class="mb-3">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" name="txt_tempat" class="form-control" placeholder="Tempat Lahir" value="<?php echo $rs_getDataEdit['tempat_lahir_pegawai'];?>">
            </div> 
            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="txt_tanggal" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $rs_getDataEdit['tanggal_lahir_pegawai'];?>" >
            </div> 
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <?php
                    $jk_admin = isset($rs_getDataEdit['jenis_kelamin_pegawai']) ? $rs_getDataEdit['jenis_kelamin_pegawai'] : ''; 
                    if($jk_admin == 'Laki-Laki'){
                        $selected_aktif = 'selected';
                    } else{
                        $selected_aktif= '';
                    }

                    if($jk_admin == 'Perempuan'){
                        $selected_non = 'selected';
                    } else{
                        $selected_non = '';
                    }
                ?>
                <select class="form-select" name="txt_jeniskelamin"> 
                <option value="Laki-Laki" <?= $selected_aktif; ?>>Laki-Laki</option>
                <option value="Perempuan" <?= $selected_non; ?> >Perempuan</option> 
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">No Telpon</label>
                <input type="text" name="txt_telpon" class="form-control" placeholder="No Telpon" value="<?php echo $rs_getDataEdit['no_telp_pegawai'];?>">
            </div>  
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="txt_email" class="form-control" placeholder="Email" value="<?php echo $rs_getDataEdit['email_pegawai'];?>">
            </div>         
<?php
        break;

        case"PROSES_EDIT_PEGAWAI";
        $pegawai    = $_POST['txt_pegawai'];
        $nama       = $_POST['txt_nama'];
        $tempat     = $_POST['txt_tempat'];
        $tanggal    = $_POST['txt_tanggal'];
        $jenis      = $_POST['txt_jeniskelamin'];
        $telp       = $_POST['txt_telpon']; 
        $email      = $_POST['txt_email']; 

        $updatePegawai = "UPDATE `pegawai` SET `nama_pegawai`='".$nama."',`tempat_lahir_pegawai`='".$tempat."',`tanggal_lahir_pegawai`='".$tanggal."',`jenis_kelamin_pegawai`='".$jenis."',
        `no_telp_pegawai`='".$telp."',`email_pegawai`='".$email."' WHERE `id_pegawai`='".$pegawai."'";
        $r_updatePegawai = mysqli_query($conn,$updatePegawai); 

        header  ("location:../dashboard.php");

        break;
        
    }
?>

       