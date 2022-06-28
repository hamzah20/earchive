<?php
	include('../../conn.php');

	$role=$_GET['role'];
    switch ($role) {
        //---------------------- CASE PROFILE KADER POSYANDU ---------------------------------------------------
        case'TAMBAH_ADMIN': 
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
                header  ("location:../profil_admin.php");
                exit();
            } 
            
            //------------- Mencari nomer terakhir, untuk memberikan id admin
            $LastNum      = "select count(*) as TOTAL from admin where substring(id_admin,3,2)='".$year."'";
            $queryLastNum = mysqli_query($conn,$LastNum);
            $fetchLastNum = mysqli_fetch_array($queryLastNum);
            if ($fetchLastNum["TOTAL"] != 0)
            {
                $proLastNum = "select substring(id_admin,7,4) as LAST_NO from admin WHERE substring(id_admin,3,2)='".$year."' order by substring(id_admin,7,4) desc";
                $queryProLastNum = mysqli_query($conn,$proLastNum);
                $fetchProLastNum = mysqli_fetch_array($queryProLastNum);
                $run_no = str_pad(strval(intval($fetchProLastNum["LAST_NO"]) + 1), 4, "0", STR_PAD_LEFT);
            }else{
                $run_no = str_pad(strval(intval(1)), 4, "0", STR_PAD_LEFT);
            }
            $doc_no="A-".$year.$month.$run_no;

            //------------- Insert data admin kedalam table admin
            $insAdmin      = "INSERT INTO `admin`(`id_admin`, `nama_admin`, `tempat_lahir_admin`, `tanggal_lahir_admin`, `jenis_kelamin_admin`, `no_telp_admin`, `email_admin`,`status_admin`) 
            VALUES ('".$doc_no."','".$nama."','".$tempat."','".$tanggal."','".$jenis."','".$telp."','".$email."','Aktif')";
            $queryInsAdmin = mysqli_query($conn,$insAdmin); 

            //------------- Insert data admin kedalam table user
            $insUser       = "INSERT INTO user (id_user,username,password,user_group) values('".$doc_no."','".$username."','".$password."','Admin')";
            $queryInsUser = mysqli_query($conn,$insUser);
            header  ("location:../profil_admin.php");

        break;

        case"EDIT_ADMIN":
            $id = $_POST['id_admin'];
            $getDataEdit        = "SELECT * FROM `admin` where id_admin='".$id."'";
            $r_getDataEdit      = mysqli_query($conn,$getDataEdit);
            $rs_getDataEdit     = mysqli_fetch_array($r_getDataEdit);
?>
            <input type="hidden" name="txt_admin" class="form-control" value="<?php echo $rs_getDataEdit['id_admin'];?>">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="txt_nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $rs_getDataEdit['nama_admin'];?>">
            </div> 
            <div class="mb-3">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" name="txt_tempat" class="form-control" placeholder="Tempat Lahir" value="<?php echo $rs_getDataEdit['tempat_lahir_admin'];?>">
            </div> 
            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="txt_tanggal" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $rs_getDataEdit['tanggal_lahir_admin'];?>" >
            </div> 
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <?php
                    $jk_admin = isset($rs_getDataEdit['jenis_kelamin_admin']) ? $rs_getDataEdit['jenis_kelamin_admin'] : ''; 
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
                <input type="text" name="txt_telpon" class="form-control" placeholder="No Telpon" value="<?php echo $rs_getDataEdit['no_telp_admin'];?>">
            </div>  
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="txt_email" class="form-control" placeholder="Email" value="<?php echo $rs_getDataEdit['email_admin'];?>">
            </div>     
            <div class="mb-3">
                <label class="form-label">Status</label>
                <?php
                    $status_admin = isset($rs_getDataEdit['status_admin']) ? $rs_getDataEdit['status_admin'] : ''; 
                    if($status_admin == 'Aktif'){
                        $selected_aktif = 'selected';
                    } else{
                        $selected_aktif= '';
                    }

                    if($status_admin == 'Tidak Aktif'){
                        $selected_non = 'selected';
                    } else{
                        $selected_non = '';
                    }
                ?>
                <select class="form-select" name="txt_status"> 
                <option value="Aktif" <?= $selected_aktif; ?>>Aktif</option>
                <option value="Tidak Aktif" <?= $selected_non; ?> >Tidak Aktif</option> 
                </select>
            </div>     
<?php
        break;
        case"PROSES_EDIT_ADMIN":
            $admin      = $_POST['txt_admin'];
            $nama       = $_POST['txt_nama'];
            $tempat     = $_POST['txt_tempat'];
            $tanggal    = $_POST['txt_tanggal'];
            $jenis      = $_POST['txt_jeniskelamin'];
            $telp       = $_POST['txt_telpon']; 
            $email      = $_POST['txt_email'];
            $status     = $_POST['txt_status'];

            $updateAdmin = "UPDATE `admin` SET `nama_admin`='".$nama."',`tempat_lahir_admin`='".$tempat."',`tanggal_lahir_admin`='".$tanggal."',`jenis_kelamin_admin`='".$jenis."',
            `no_telp_admin`='".$telp."',`email_admin`='".$email."',`status_admin`='".$status."' WHERE `id_admin`='".$admin."'";
            $r_updateAdmin = mysqli_query($conn,$updateAdmin); 

            header  ("location:../profil_admin.php");
        break;
        //---------------------- END CASE PROFILE ADMIN ---------------------------------------------------

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
            <div class="mb-3">
                <label class="form-label">Status</label>
                <?php
                    $status_admin = isset($rs_getDataEdit['status_pegawai']) ? $rs_getDataEdit['status_pegawai'] : ''; 
                    if($status_admin == 'Aktif'){
                        $selected_aktif = 'selected';
                    } else{
                        $selected_aktif= '';
                    }

                    if($status_admin == 'Tidak Aktif'){
                        $selected_non = 'selected';
                    } else{
                        $selected_non = '';
                    }
                ?>
                <select class="form-select" name="txt_status"> 
                <option value="Aktif" <?= $selected_aktif; ?>>Aktif</option>
                <option value="Tidak Aktif" <?= $selected_non; ?> >Tidak Aktif</option> 
                </select>
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
        $status     = $_POST['txt_status'];

        $updatePegawai = "UPDATE `pegawai` SET `nama_pegawai`='".$nama."',`tempat_lahir_pegawai`='".$tempat."',`tanggal_lahir_pegawai`='".$tanggal."',`jenis_kelamin_pegawai`='".$jenis."',
        `no_telp_pegawai`='".$telp."',`email_pegawai`='".$email."',`status_pegawai`='".$status."' WHERE `id_pegawai`='".$pegawai."'";
        $r_updatePegawai = mysqli_query($conn,$updatePegawai); 

        header  ("location:../profil_pegawai.php");

        break;
        
        //---------------------- END CASE PROFILE BIDAN POSYANDU -----------------------------------------------
        //---------------------- CASE PROFILE PASIEN POSYANDU --------------------------------------------------
        case'TAMBAH_PASIEN': 
            $nama       = $_POST['txt_nama'];   
            $tempat     = $_POST['txt_tempat']; 
            $tanggal    = $_POST['txt_tanggal']; 
            $telp       = $_POST['txt_telp']; 
            $pekerjaan  = $_POST['txt_pekerjaan']; 
            $alamat     = $_POST['txt_alamat']; 
            $darah      = $_POST['txt_darah']; 
            $kehamilan  = $_POST['txt_kehamilan']; 
            $suami      = $_POST['txt_suami']; 
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
                header  ("location:../add_ibu_hamil.php");
                exit();
            } 
            
            //------------- Mencari nomer terakhir, untuk memberikan id bidan
            $LastNum      = "select count(*) as TOTAL from ibu_hamil where substring(id_ibu_hamil,3,2)='".$year."'";
            $queryLastNum = mysqli_query($conn,$LastNum);
            $fetchLastNum = mysqli_fetch_array($queryLastNum);
            if ($fetchLastNum["TOTAL"] != 0)
            {
                $proLastNum = "select substring(id_ibu_hamil,7,4) as LAST_NO from ibu_hamil WHERE substring(id_ibu_hamil,3,2)='".$year."' order by substring(id_ibu_hamil,7,4) desc";
                $queryProLastNum = mysqli_query($conn,$proLastNum);
                $fetchProLastNum = mysqli_fetch_array($queryProLastNum);
                $run_no = str_pad(strval(intval($fetchProLastNum["LAST_NO"]) + 1), 4, "0", STR_PAD_LEFT);
            }else{
                $run_no = str_pad(strval(intval(1)), 4, "0", STR_PAD_LEFT);
            }
            $doc_no="P-".$year.$month.$run_no;

            //------------- Insert data kader kedalam table kader
            $insPasien      = "INSERT INTO ibu_hamil (`id_ibu_hamil`, `nama_ibu_hamil`, `tempat_lahir_ibu_hamil`, `tanggal_lahir_ibu_hamil`, `gol_darah_ibu_hamil`, `alamat_ibu_hamil`, `pekerjaan_ibu_hamil`, `kehamilan`, `no_telp_ibu_hamil`, `nama_suami`) values('".$doc_no."','".$nama."','".$tempat."','".$tanggal."','".$darah."','".$alamat."','".$pekerjaan."','".$kehamilan."','".$telp."','".$suami."')";
            $queryInsPasien = mysqli_query($conn,$insPasien); 

            //------------- Insert data kader kedalam table user
            $insUser       = "INSERT INTO user (id_user,username,password,user_group) values('".$doc_no."','".$username."','".$password."','Pasien')";
            $queryInsUser = mysqli_query($conn,$insUser);
            header  ("location:../ibu_hamil.php");

        break;

        case"DELETE_PASIEN":
            // Get ID Pasien
            $id            = $_POST['id_pasien'];

            // Cek apakah ID Kader ada pada table laporan
            $cekPasienLap    = "SELECT COUNT(*) AS TOTAL_USER FROM laporan where id_ibu_hamil='".$id."'";
            $r_cekPasienLap  = mysqli_query($conn,$cekPasienLap);
            $rs_cekPasienLap = mysqli_fetch_array($r_cekPasienLap);

             // Cek apakah user sedang login atau tidak
            $cekLogUser    = "SELECT active  FROM user where id_user='".$id."'";
            $r_cekLogUser  = mysqli_query($conn,$cekLogUser);
            $rs_cekLogUser = mysqli_fetch_array($r_cekLogUser);

            // Jika ada atau == 0 maka akan ada alert
            // Data berhasil dihapus, selain itu
            // Gagal hapus data, data sudah pernah dipakai

            if($rs_cekPasienLap['TOTAL_USER'] == 0){
                if($rs_cekLogUser == '0'){
                    $delPasien      = "DELETE FROM ibu_hamil where id_ibu_hamil='".$id."'";
                    $queryDelBidan = mysqli_query($conn,$delPasien);

                    $delUser      = "DELETE FROM user where id_user='".$id."'";
                    $queryDelUser = mysqli_query($conn,$delUser);
                } else{
                    // Kirim alert, berhasil menghapus data 
                }
            } else{
                // Kirim alert, gagal menghapus data
            }
            header  ("location:../ibu_hamil.php");

        break; 

        case"PROSES_EDIT_PASIEN":
            $id         = $_POST['txt_id'];
            $nama       = $_POST['txt_nama'];   
            $tempat     = $_POST['txt_tempat']; 
            $tanggal    = $_POST['txt_tanggal']; 
            $telp       = $_POST['txt_telp']; 
            $pekerjaan  = $_POST['txt_pekerjaan']; 
            $alamat     = $_POST['txt_alamat']; 
            $darah      = $_POST['txt_darah']; 
            $kehamilan  = $_POST['txt_kehamilan']; 
            $suami      = $_POST['txt_suami'];  

            $updatePasien = "UPDATE `ibu_hamil` SET `nama_ibu_hamil`='".$nama."',`tempat_lahir_ibu_hamil`='".$tempat."',`tanggal_lahir_ibu_hamil`='".$tanggal."',`gol_darah_ibu_hamil`='".$darah."',`alamat_ibu_hamil`='".$alamat."',`pekerjaan_ibu_hamil`='".$pekerjaan."',`kehamilan`='".$kehamilan."',`no_telp_ibu_hamil`='".$telp."',`nama_suami`='".$suami."' WHERE `id_ibu_hamil`='".$id."'";
            $r_updatePasien = mysqli_query($conn,$updatePasien);

            if($r_updatePasien){

            } else{

            }

            header  ("location:../ibu_hamil.php");
           
        break;
    }
?>

       