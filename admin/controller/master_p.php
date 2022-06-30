<?php
	include('../../conn.php');

	$role=$_GET['role'];
    switch ($role) {
        //---------------------------------------------------------------- RAK
        case'TAMBAH_RAK': 
            $nama = $_POST['txt_nama'];

            //------------- mencari apakah ada nama rak yang sama
            $sql="select count(*) as TOTAL from rak where nama_rak='".$nama."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            if ($rs["TOTAL"]>0)
            {
                $_SESSION["message"]="Nama RAK sudah ada";
                header  ("location:../rak.php");
                exit;
            }
            
            //------------- mencari nomor terkhir untuk penambahan jadwal
            $sql="select count(*) as TOTAL from rak";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            if ($rs["TOTAL"]!=0)
            {
                $sql1 = "select substring(kode_rak,2,3) as LAST_NO from rak order by substring(kode_rak,2,3) desc";
                $result= mysqli_query($conn,$sql1);
                $rs = mysqli_fetch_array($result);
                $run_no = str_pad(strval(intval($rs["LAST_NO"]) + 1), 3, "0", STR_PAD_LEFT);
            }else{
                $run_no = str_pad(strval(intval(1)), 3, "0", STR_PAD_LEFT);
            }
            $doc_no="R".$run_no;

            //------------- menambahkan jadwal ke dalam database
            $sql="INSERT INTO rak (kode_rak,nama_rak) values('".$doc_no."','".$nama."')";
            $r=mysqli_query($conn,$sql);
            header  ("location:../rak.php");

        break;
        case"DELETE_RAK":
          $kode = $_POST['idx'];
          // Cek apakah RAK sudah pernah dipakai
          // $sql_cek  = "SELECT COUNT(*) as TOTAL FROM berkas_dokumen where kode_rak='".$kode."'";
          // $r_cek    = mysqli_query($conn,$sql_cek); 
          // $rs_cek   = mysql_fetch_array($r_cek);
          // if($rs_cek['TOTAL']<=0){
          //   $sql = "DELETE FROM rak where kode_rak='".$kode."'";
          //   $r   = mysqli_query($conn,$sql);
          // } 
          $sql = "DELETE FROM rak where kode_rak='".$kode."'";
            $r   = mysqli_query($conn,$sql);
        break;
        case"EDIT_RAK":
            $id=$_POST['id'];
            $sql="SELECT * FROM rak where kode_rak='".$id."'";
            $r= mysqli_query($conn,$sql);
            $rs = mysqli_fetch_array($r);
            ?>
                <div class="mb-3">
                  <label class="form-label">Kode RAK</label>
                  <input type="text" name="txt_kode" class="form-control" placeholder="kode" value="<?php echo $rs['kode_rak'];?>" readonly> 
                </div> 
            
                <div class="mb-3">
                  <label class="form-label">Nama RAK</label>
                  <input type="text" name="txt_nama" class="form-control" placeholder="Nama RAK" value="<?php echo $rs['nama_rak'];?>">
                </div>
            <?php
        break;
        case"PROSES_EDIT_RAK":
            $kode = $_POST['txt_kode']; 
            $nama = $_POST['txt_nama'];

            $sql="
                UPDATE rak SET 
                nama_rak ='".$nama."'

                where kode_rak='".$kode."'
            ";
            $r=mysqli_query($conn,$sql);
            header  ("location:../rak.php");
        break;
        //---------------------------------------------------------------- END OF RAK

        //---------------------------------------------------------------- DOKUMEN
        case'TAMBAH_DOKUMEN': 
            $jenis = $_POST['txt_jenis'];

            //------------- mencari apakah ada nama rak yang sama
            $sql="select count(*) as TOTAL from dokumen where jenis_dokumen='".$jenis."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            if ($rs["TOTAL"]>0)
            {
                $_SESSION["message"]="Nama Dokumen sudah ada";
                header  ("location:../dokumen.php");
                exit;
            }
            
            //------------- mencari nomor terkhir untuk penambahan jadwal
            $sql="select count(*) as TOTAL from dokumen";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            if ($rs["TOTAL"]!=0)
            {
                $sql1 = "select substring(kode_dokumen,2,3) as LAST_NO from dokumen order by substring(kode_dokumen,2,3) desc";
                $result= mysqli_query($conn,$sql1);
                $rs = mysqli_fetch_array($result);
                $run_no = str_pad(strval(intval($rs["LAST_NO"]) + 1), 3, "0", STR_PAD_LEFT);
            }else{
                $run_no = str_pad(strval(intval(1)), 3, "0", STR_PAD_LEFT);
            }
            $doc_no="D".$run_no;

            //------------- menambahkan jadwal ke dalam database
            $sql="INSERT INTO dokumen (kode_dokumen,jenis_dokumen,status_dokumen) values('".$doc_no."','".$jenis."','Aktif')";
            $r=mysqli_query($conn,$sql);

            //------------- membuat folder baru sesuai kode dokumen
            $back_dir       = "../file/";
            $nama_folder    = $doc_no;
            mkdir($back_dir.$nama_folder, 0777, true);

            header  ("location:../dokumen.php");

        break;
        case"DETAIL_INFORMASI":
            $id=$_POST['id'];
            //echo$id;
            $sql="SELECT * FROM informasi_gizi where rec_id='".$id."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            ?>
                <div class="mb-3">
                    <label class="form-label">Kode Informasi</label>
                    <input type="text" name="txt_judul" class="form-control" placeholder="Judul" readonly="" value="<?php echo $rs['kode_informasi']?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Judul Informasi</label>
                    <input type="text" name="txt_judul" class="form-control" placeholder="Judul" readonly="" value="<?php echo $rs['judul_informasi']?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Informasi</label>
                    <input type="date" name="txt_tgl" class="form-control" placeholder="Tanggal" readonly="" value="<?php echo $rs['tanggal_informasi']?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name='txt_deskripsi' disabled=""> <?php echo $rs['deskripsi_informasi']?></textarea>
                </div>

                <div class="mb-3">
                <label>Gambar</label>
                    <img src="../<?php echo $rs['gambar_informasi']?>" class="img-fluid">
                </div>
            <?php
        break; 
        case"EDIT_DOKUMEN":
            $id  = $_POST['id_dokumen'];
            $sql = "SELECT * FROM dokumen where kode_dokumen='".$id."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
?>
            <div class="mb-3">
                <label class="form-label">Kode Dokumen</label>
                <input type="text" name="txt_kode" class="form-control" placeholder="Kode Dokumen" readonly="" value="<?php echo $rs['kode_dokumen']?>" readonly>
            </div>    
            <div class="mb-3">
                <label class="form-label">Jenis Dokumen</label>
                <input type="text" name="txt_jenis" class="form-control" placeholder="Jenis Dokumen"  value="<?php echo $rs['jenis_dokumen']?>">
            </div> 
            <div class="mb-3">
                    <label class="form-label">Status</label>
                    <?php
                        $status_berkas = isset($rs['status_dokumen']) ? $rs['status_dokumen'] : ''; 
                        if($status_berkas == 'Aktif'){
                            $selected_aktif = 'selected';
                        } else{
                            $selected_aktif= '';
                        }

                        if($status_berkas == 'Tidak Aktif'){
                            $selected_non = 'selected';
                        } else{
                            $selected_non = '';
                        }
                    ?>
                    <select class="form-select" name="txt_status"> 
                    <option value="Aktif" <?= $selected_aktif; ?>>Aktif</option>
                    <option value="Tidak Aktif" <?= $selected_non; ?>>Tidak Aktif</option> 
                    </select>
                </div>     
<?php 
        break;
        case"PROSES_EDIT_DOKUMEN":
            $kode   = $_POST['txt_kode'];
            $jenis  = $_POST['txt_jenis']; 
            $status = $_POST['txt_status']; 

            $sql="UPDATE dokumen SET jenis_dokumen='".$jenis."',status_dokumen='".$status."' where kode_dokumen='".$kode."'";
            $r=mysqli_query($conn,$sql);  
            header('location:../dokumen.php'); 
        break;
        //---------------------------------------------------------------- END OF DOKUMEN

        //--------------------------------------------------------- PROYEK
        case'TAMBAH_PROYEK': 
            $nama    = $_POST['txt_nama'];
            $tanggal = $_POST['txt_tanggal'];
            $alamat  = $_POST['txt_alamat'];

            //------------- mencari apakah ada nama proyek yang sama
            $sql="select count(*) as TOTAL from proyek where nama_proyek='".$nama."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            if ($rs["TOTAL"]>0)
            {
                $_SESSION["message"]="Nama Proyek sudah ada";
                header  ("location:../proyek.php");
                exit;
            }
            
            //------------- mencari nomor terkhir untuk penambahan proyek
            $sql="select count(*) as TOTAL from proyek";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            if ($rs["TOTAL"]!=0)
            {
                $sql1 = "select substring(kode_proyek,2,3) as LAST_NO from proyek order by substring(kode_proyek,2,3) desc";
                $result= mysqli_query($conn,$sql1);
                $rs = mysqli_fetch_array($result);
                $run_no = str_pad(strval(intval($rs["LAST_NO"]) + 1), 3, "0", STR_PAD_LEFT);
            }else{
                $run_no = str_pad(strval(intval(1)), 3, "0", STR_PAD_LEFT);
            }
            $doc_no="P".$run_no; 

            //------------- menambahkan proyek ke dalam database
            $sql="INSERT INTO proyek (kode_proyek,nama_proyek,tanggal_proyek,lokasi_proyek) values('".$doc_no."','".$nama."','".$tanggal."','".$alamat."')";
            $r=mysqli_query($conn,$sql);
            header  ("location:../proyek.php");

        break;
        case"DETAIL_PROYEK":
            $id=$_POST['id'];
            //echo$id;
            $sql="SELECT * FROM informasi_gizi where rec_id='".$id."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            ?>
                <div class="mb-3">
                    <label class="form-label">Kode Informasi</label>
                    <input type="text" name="txt_judul" class="form-control" placeholder="Judul" readonly="" value="<?php echo $rs['kode_informasi']?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Judul Informasi</label>
                    <input type="text" name="txt_judul" class="form-control" placeholder="Judul" readonly="" value="<?php echo $rs['judul_informasi']?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Informasi</label>
                    <input type="date" name="txt_tgl" class="form-control" placeholder="Tanggal" readonly="" value="<?php echo $rs['tanggal_informasi']?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name='txt_deskripsi' disabled=""> <?php echo $rs['deskripsi_informasi']?></textarea>
                </div>

                <div class="mb-3">
                <label>Gambar</label>
                    <img src="../<?php echo $rs['gambar_informasi']?>" class="img-fluid">
                </div>
            <?php
        break;
        case"DELETE_PROYEK":
            $id    = $_POST['idx'];
            $sql   = "DELETE FROM proyek WHERE kode_proyek='".$id."'";
            $r     = mysqli_query($conn,$sql);
        break;
        case"EDIT_PROYEK":
            $id    = $_POST['id'];
            $sql   = "SELECT * FROM proyek where kode_proyek='".$id."'";
            $r     = mysqli_query($conn,$sql);
            $rs    = mysqli_fetch_array($r);
?>
            <div class="mb-3">
                <label class="form-label">Kode Proyek</label>
                <input type="text" name="txt_kode" class="form-control" placeholder="Kode Proyek" readonly="" value="<?php echo $rs['kode_proyek']?>" readonly>
            </div>    
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="txt_nama" class="form-control" placeholder="Nama Proyek"  value="<?php echo $rs['nama_proyek']?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="txt_tanggal" class="form-control" value="<?php echo $rs['tanggal_proyek']?>">
            </div>    
            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <input type="text" name="txt_lokasi" class="form-control" placeholder="Lokasi Proyek"  value="<?php echo $rs['lokasi_proyek']?>">
            </div>   
<?php 
        break;
        case"PROSES_EDIT_PROYEK":
            echo $kode       = $_POST['txt_kode'];
            echo $nama       = $_POST['txt_nama'];  
            echo $tanggal    = $_POST['txt_tanggal'];  
            echo $lokasi     = $_POST['txt_lokasi'];  

            $sql="UPDATE proyek SET nama_proyek='".$nama."', tanggal_proyek='".$tanggal."', lokasi_proyek='".$lokasi."' where kode_proyek='".$kode."'";
            $r=mysqli_query($conn,$sql);  
            header('location:../proyek.php'); 
        break;
        //---------------------------------------------------------------- END OF PROYEK

        //---------------------------------------------------------------- MAP
        case'TAMBAH_MAP': 
            $nama = $_POST['txt_nama'];

            //------------- mencari apakah ada nama map yang sama
            $sql="select count(*) as TOTAL from rak map nama_map='".$nama."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            if ($rs["TOTAL"]>0)
            {
                $_SESSION["message"]="Nama MAP sudah ada";
                header  ("location:../map.php");
                exit;
            }
            
            //------------- mencari nomor terkhir untuk penambahan map
            $sql="select count(*) as TOTAL from map";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            if ($rs["TOTAL"]!=0)
            {
                $sql1 = "select substring(kode_map,2,3) as LAST_NO from map order by substring(kode_map,2,3) desc";
                $result= mysqli_query($conn,$sql1);
                $rs = mysqli_fetch_array($result);
                $run_no = str_pad(strval(intval($rs["LAST_NO"]) + 1), 3, "0", STR_PAD_LEFT);
            }else{
                $run_no = str_pad(strval(intval(1)), 3, "0", STR_PAD_LEFT);
            }
            $doc_no="M".$run_no;

            //------------- menambahkan map ke dalam database
            $sql="INSERT INTO map (kode_map,nama_map) values('".$doc_no."','".$nama."')";
            $r=mysqli_query($conn,$sql);
            header  ("location:../map.php");

        break; 
        case"EDIT_MAP":
            $id  = $_POST['id_map'];
            $sql = "SELECT * FROM map where kode_map='".$id."'";
            $r   = mysqli_query($conn,$sql);
            $rs  = mysqli_fetch_array($r);
            ?> 
                <div class="mb-3">
                  <label class="form-label">Kode Map</label>
                  <input type="text" name="txt_kode" class="form-control" placeholder="Kode Map"  value="<?php echo $rs['kode_map']?>" readonly>
                </div>

                <div class="mb-3">
                  <label class="form-label">Nama Map</label>
                  <input type="text" name="txt_nama" class="form-control" placeholder="Nama Map" value="<?php echo $rs['nama_map']?>">
                </div> 
            <?php
        break;
        case"DELETE_MAP":
            $id=$_POST['idx'];
            $sql_image="SELECT gambar_makanan FROM menu_makanan where rec_id='".$id."'";
            $r_image=mysqli_query($conn,$sql_image);
            while($rs_image=mysqli_fetch_array($r_image)){
                $path= "../../".$rs_image['gambar_makanan'];
                //echo $path;
                if(unlink($path)){
                    $sql="DELETE FROM menu_makanan WHERE rec_id='".$id."'";
                    mysqli_query($conn,$sql);
                }
            }
        break;
        case"PROSES_EDIT_MAP":
            $kode = $_POST['txt_kode'];
            $nama = $_POST['txt_nama']; 

             $sql = "UPDATE map SET nama_map='".$nama."' where kode_map='".$kode."'";
             $r   = mysqli_query($conn,$sql);  
             header('location:../map.php');        
        break;
        //---------------------------------------------------------------- END OF MAP

        //---------------------------------------------------------------- BERKAS
        case'TAMBAH_BERKAS': 
            $admin      = $_POST['txt_admin'];
            $nomor      = $_POST['txt_nomor'];
            $nama       = $_POST['txt_nama'];
            $dokumen    = $_POST['txt_dokumen'];
            $tanggal    = $_POST['txt_tanggal'];
            $proyek     = $_POST['txt_proyek'];
            $rak        = $_POST['txt_rak'];
            $map        = $_POST['txt_map'];
            $status     = $_POST['txt_status'];
            
            //------------- mencari apakah ada nomor dan nama berkas yang sama
            $sql="select count(*) as TOTAL from berkas where nama_berkas_dokumen='".$nama."' OR kode_berkas_dokumen='".$nomor."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            if ($rs["TOTAL"]>0)
            {
                $_SESSION["message"]="Nomor atau nama berkas sudah ada sudah ada";
                header  ("location:../berkas_dokumen.php");
                exit;
            }

            // Memasukan file ke folder sesuai jenis dokumen
            $tanngal = date('Ymd');
            $waktu   = date('His');
            $name = $tanngal.'_'.$waktu.'_'.str_replace(' ','',$_FILES["txt_file"]["name"]);  
            $path       = "../file/".$dokumen."/".$name.""; 
            $file_name  = "file/".$dokumen."/"; 

            $upload = move_uploaded_file($_FILES["txt_file"]["tmp_name"], $path); 

            if($upload){
                //------------- menambahkan berkas ke dalam database
                $sql = "INSERT INTO `berkas`(`id_admin`,`kode_berkas_dokumen`, `nama_berkas_dokumen`, `kode_dokumen`, `tanggal_berkas_dokumen`, `kode_proyek`, `kode_rak`, 
                `kode_map`, `nama_file`, `status_berkas_dokumen`) 
                VALUES ('".$admin."','".$nomor."','".$nama."','".$dokumen."','".$tanggal."','".$proyek."','".$rak."','".$map."','".$file_name."','".$status."')";
                $r = mysqli_query($conn,$sql);
            }

            // Ambil tahun dan bulan sekarang
            $year  = date("y"); 
            $month = date("m");  

             //------------- Mencari nomer terakhir, untuk memberikan id catatan berkas
             $LastNum      = "select count(*) as TOTAL from catatan_berkas where substring(kode_catatan_berkas,3,2)='".$year."'";
             $queryLastNum = mysqli_query($conn,$LastNum);
             $fetchLastNum = mysqli_fetch_array($queryLastNum);
             if ($fetchLastNum["TOTAL"] != 0)
             {
                 $proLastNum = "select substring(kode_catatan_berkas,7,4) as LAST_NO from catatan_berkas WHERE substring(kode_catatan_berkas,3,2)='".$year."' 
                 order by substring(kode_catatan_berkas,7,4) desc";
                 $queryProLastNum = mysqli_query($conn,$proLastNum);
                 $fetchProLastNum = mysqli_fetch_array($queryProLastNum);
                 $run_no = str_pad(strval(intval($fetchProLastNum["LAST_NO"]) + 1), 4, "0", STR_PAD_LEFT);
             }else{
                 $run_no = str_pad(strval(intval(1)), 4, "0", STR_PAD_LEFT);
             }
             $doc_no="C-".$year.$month.$run_no;

            //------------- menambahkan catatan ke dalam database
            $sql_catatan ="INSERT INTO `catatan_berkas`(`kode_catatan_berkas`, `kode_berkas_dokumen`, `id_admin`, `status`) 
            VALUES ('".$doc_no."','".$nomor."','".$admin."','Penyimpanan')";
            $r_catatan = mysqli_query($conn,$sql_catatan);

            header  ("location:../berkas_dokumen.php");

        break; 
        case"EDIT_BERKAS":
            $id  = $_POST['id'];
            $sql = "SELECT * FROM berkas where kode_berkas_dokumen='".$id."'";
            $r   = mysqli_query($conn,$sql);
            $rs  = mysqli_fetch_array($r);
            ?> 
                <input type="hidden" name="txt_admin" class="form-control" value="<?php echo $_SESSION['user_id'];?>"> 
                <div class="mb-3">
                  <label class="form-label">Nomor</label>
                  <input type="text" name="txt_kode" class="form-control" placeholder="Nomor Berkas"  value="<?php echo $rs['kode_berkas_dokumen']?>" readonly>
                </div>
                <div class="mb-3">
                  <label class="form-label">Nama</label>
                  <input type="text" name="txt_nama" class="form-control" placeholder="Nama Berkas" value="<?php echo $rs['nama_berkas_dokumen']?>">
                </div> 
                <div class="mb-3">
                    <!-- Ambil data dokumen -->
                    <?php 
                        $sql_dok  = "SELECT * FROM dokumen";
                        $r_dok    = mysqli_query($conn,$sql_dok);
                    ?>
                    <label class="form-label">Dokumen</label>
                    <select class="form-select" name="txt_dokumen"> 
                    <?php
                        while($rs_dok = mysqli_fetch_array($r_dok)){
                        if($rs['kode_dokumen'] == $rs_dok['kode_dokumen']){
                            $selected = 'selected';
                        } else{
                            $selected = '';
                        }
                    ?>
                        <option value="<?= $rs_dok['kode_dokumen']; ?>" <?= $selected; ?>><?= $rs_dok['jenis_dokumen']; ?></option> 
                    <?php } ?>
                    </select>
                </div> 
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="txt_tanggal" class="form-control" value="<?= $rs['tanggal_berkas_dokumen']?>">
                </div>  
                <div class="mb-3">
                    <!-- Ambil data proyek -->
                    <?php 
                    $sql_pro  = "SELECT * FROM proyek";
                    $r_pro    = mysqli_query($conn,$sql_pro);
                    ?>
                    <label class="form-label">Proyek</label>
                    <select class="form-select" name="txt_proyek"> 
                    <?php
                        while($rs_pro = mysqli_fetch_array($r_pro)){
                        if($rs['kode_proyek'] == $rs_pro['kode_proyek']){
                            $selected = "selected";
                        } else{
                            $selected = "";
                        }
                    ?>
                    <option value="<?= $rs_pro['kode_proyek'];?>" <?= $selected;?>><?= $rs_pro['nama_proyek']; ?></option> 
                    <?php } ?>
                    </select>
                </div>  
                <div class="row">
                    <div class="col">
                    <div class="mb-3">
                        <!-- Ambil data rak -->
                        <?php 
                        $sql_rak  = "SELECT * FROM rak";
                        $r_rak    = mysqli_query($conn,$sql_rak);
                        ?>
                        <label class="form-label">Rak</label>
                        <select class="form-select" name="txt_rak"> 
                        <?php
                            while($rs_rak = mysqli_fetch_array($r_rak)){
                            if($rs['kode_rak'] == $rs_rak['kode_rak ']){
                                $selected = 'selected';
                            } else{
                                $selected = '';
                            }
                        ?>
                        <option value="<?= $rs_rak['kode_rak']; ?>" <?= $selected;?>><?= $rs_rak['nama_rak']; ?></option> 
                        <?php } ?>
                        </select>
                    </div>  
                    </div>
                    <div class="col">
                    <div class="mb-3">
                        <!-- Ambil data map -->
                        <?php 
                        $sql_map  = "SELECT * FROM map";
                        $r    = mysqli_query($conn,$sql_map);
                        ?>
                        <label class="form-label">Map</label>
                        <select class="form-select" name="txt_map"> 
                        <?php
                            while($rs = mysqli_fetch_array($r)){
                            if($rs['kode_map'] == $rs_map['kode_map']){
                                $selected = 'selected';
                            } else{
                                $selected = '';
                            }
                        ?>
                        <option value="<?= $rs['kode_map']; ?>" <?= $selected;?>><?= $rs['nama_map']; ?></option> 
                        <?php } ?>
                        </select>
                    </div>
                    </div>
                </div> 
                <div class="mb-3">
                    <label class="form-label">Dokumen</label>
                    <input type="file"  class="form-control" name="txt_file">
                    <?php echo $cek_nama_file = isset($rs['nama_file']) ? $rs['nama_file'] : '';?>
                    <input type="text" name="txt_file_old" value="<?php echo $cek_nama_file; ?>"> 
                    <div class="invalid-feedback">File tidak boleh kosong!</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <?php
                        $status_berkas = isset($rs['status_berkas_dokumen']) ? $rs['status_berkas_dokumen'] : ''; 
                        if($status_berkas == 'Aktif'){
                            $selected_aktif = 'selected';
                        } else{
                            $selected_aktif= '';
                        }

                        if($status_berkas == 'Tidak Aktif'){
                            $selected_non = 'selected';
                        } else{
                            $selected_non = '';
                        }
                    ?>
                    <select class="form-select" name="txt_status"> 
                    <option value="Aktif" <?= $selected_aktif; ?>>Aktif</option>
                    <option value="Tidak Aktif" <?= $selected_non; ?>>Tidak Aktif</option> 
                    </select>
                </div>   
            <?php
        break;
        case"PROSES_EDIT_BERKAS":
            $admin      = $_POST['txt_admin'];
            $nomor      = $_POST['txt_kode'];
            $nama       = $_POST['txt_nama'];
            $dokumen    = $_POST['txt_dokumen'];
            $tanggal    = $_POST['txt_tanggal'];
            $proyek     = $_POST['txt_proyek'];
            $rak        = $_POST['txt_rak'];
            $map        = $_POST['txt_map'];
            $file_old   = $_POST['txt_file_old'];
            $file_new   = $_FILES["txt_file"]["name"];
            $status     = $_POST['txt_status'];
            
            if($file_new == '' or empty($file_new) or is_null($file_new)){
                echo $file_name = $file_old;
            } else{
                // Memasukan file ke folder sesuai jenis dokumen
                $tanngal = date('Ymd');
                $waktu   = date('His');
                $name = $tanngal.'_'.$waktu.'_'.$_FILES["txt_file"]["name"]; // nama file 
    
                if($dokumen == 'D001'){
                    $path       = "../file/D001/". $name; // image upload path
                    $file_name  = "file/D001/". $name;
                } elseif($dokumen == 'D002'){
                    $path       = "../file/D002/". $name; // image upload path
                    $file_name  = "file/D003/". $name;
                } elseif($dokumen == 'D003'){
                    $path       = "../file/D003/". $name; // image upload path
                    $file_name  = "file/D003/". $name;
                }
                $upload = move_uploaded_file($_FILES["txt_file"]["tmp_name"], $path);
            }    
            
            $sql = "UPDATE `berkas` SET `id_admin`='".$admin."',`nama_berkas_dokumen`='".$nama."',`kode_dokumen`='".$dokumen."',`tanggal_berkas_dokumen`='".$tanggal."',
             `kode_proyek`='".$proyek."',`kode_rak`='".$rak."',`kode_map`='".$map."',`nama_file`='".$file_name."',`status_berkas_dokumen`='".$status."' WHERE kode_berkas_dokumen='".$nomor."'";
            $r   = mysqli_query($conn,$sql);  
            header('location:../berkas_dokumen.php');        
        break;
        case"DELETE_BERKAS":
            $id = $_POST['id']; 
            $sql = "DELETE FROM berkas WHERE kode_berkas_dokumen='".$id."'";
            mysqli_query($conn,$sql);
        break;
        case"DETAIL_BERKAS":
            $id  = $_POST['id'];
            $sql = "SELECT * FROM v_berkas where kode_berkas_dokumen='".$id."'";
            $r   = mysqli_query($conn,$sql);
            $rs  = mysqli_fetch_array($r);
            ?> 
                <table>
                    <tr>
                        <td>Nomor Dokumen</td>
                        <td style='padding-left:15px;'>:</td>
                        <td style='padding-left:15px;'><?php echo $rs['kode_berkas_dokumen']?></td>
                    </tr> 
                    <tr>
                        <td>Nama Dokumen</td>
                        <td style='padding-left:15px;'>:</td>
                        <td style='padding-left:15px;'><?php echo $rs['nama_berkas_dokumen']?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Penyimpanan</td>
                        <td style='padding-left:15px;'>:</td>
                        <td style='padding-left:15px;'><?php echo $rs['tanggal_berkas_dokumen']?></td>
                    </tr>
                    <tr>
                        <td>Jenis Dokumen</td>
                        <td style='padding-left:15px;'>:</td>
                        <td style='padding-left:15px;'><?php echo $rs['jenis_dokumen']?></td>
                    </tr>
                    <tr>
                        <td>Lokasi Proyek</td>
                        <td style='padding-left:15px;'>:</td>
                        <td style='padding-left:15px;'><?php echo $rs['nama_proyek']?></td>
                    </tr>
                    <tr>
                        <td>Nomor Rak</td>
                        <td style='padding-left:15px;'>:</td>
                        <td style='padding-left:15px;'><?php echo $rs['nama_rak']?></td>
                    </tr>
                    <tr>
                        <td>Nama Map</td>
                        <td style='padding-left:15px;'>:</td>
                        <td style='padding-left:15px;'><?php echo $rs['nama_map']?></td>
                    </tr>
                    <tr>
                        <td>Status Dokumen</td>
                        <td style='padding-left:15px;'>:</td>
                        <td style='padding-left:15px;'><?php echo $rs['status_berkas_dokumen']?></td>
                    </tr>
                    
                </table> 
            <?php
        break;
        case"DOWNLOAD_FILE":
            if (isset($_GET['nama_file'])) {
                $nama_file_db   = explode('/',$_GET['nama_file']);
                $filename       = $nama_file_db[2]; ;
                
                $back_dir = '../';
                $file = $back_dir.$_GET['nama_file'];
                 
                    if (file_exists($file)) {
                        header('Content-Description: File Transfer');
                        header('Content-Type: application/octet-stream');
                        header('Content-Disposition: attachment; filename='.basename($file));
                        header('Content-Transfer-Encoding: binary');
                        header('Expires: 0');
                        header('Cache-Control: private');
                        header('Pragma: private');
                        header('Content-Length: ' . filesize($file));
                        ob_clean();
                        flush();
                        readfile($file);
                        
                        exit;
                    } 
                    else {
                        $_SESSION['pesan'] = "Oops! File - $filename - not found ...";
                        header("location:../berkas_dokumen.php");
                    }
            }
        break;
        //---------------------------------------------------------------- END OF BERKAS

        //---------------------------------------------------------------- KIRIM BERKAS
        case'TAMBAH_KIRIM_BERKAS': 
            $admin      = $_POST['txt_admin'];
            $nama       = $_POST['txt_nama'];
            $pegawai    = $_POST['txt_pegawai']; 
            $tanggal    = $_POST['txt_tanggal'];  
            $keterangan = $_POST['txt_keterangan'];  

            // Ambil tahun dan bulan sekarang
            $year  = date("y"); 
            $month = date("m");  

             //------------- Mencari nomer terakhir, untuk memberikan id catatan berkas keluar
             $LastNum      = "select count(*) as TOTAL from surat_tanda_terima where substring(kode_surat_tanda_terima,3,2)='".$year."'";
             $queryLastNum = mysqli_query($conn,$LastNum);
             $fetchLastNum = mysqli_fetch_array($queryLastNum);
             if ($fetchLastNum["TOTAL"] != 0)
             {
                 $proLastNum = "select substring(kode_surat_tanda_terima,7,4) as LAST_NO from surat_tanda_terima WHERE substring(kode_surat_tanda_terima,3,2)='".$year."' 
                 order by substring(kode_surat_tanda_terima,7,4) desc";
                 $queryProLastNum = mysqli_query($conn,$proLastNum);
                 $fetchProLastNum = mysqli_fetch_array($queryProLastNum);
                 $run_no = str_pad(strval(intval($fetchProLastNum["LAST_NO"]) + 1), 4, "0", STR_PAD_LEFT);
             }else{
                 $run_no = str_pad(strval(intval(1)), 4, "0", STR_PAD_LEFT);
             }
             $nomor="O-".$year.$month.$run_no;
             

            // Memasukan file ke folder sesuai jenis dokumen
            $tanngal = date('Ymd');
            $waktu   = date('His');
            $name = $tanngal.'_'.$waktu.'_'.str_replace(' ','',$_FILES["txt_file"]["name"]); // nama file  
            $path       = "../file/data_pengiriman/".$name."";  
            $file_name  = "file/data_pengiriman/". $name; 

            $upload = move_uploaded_file($_FILES["txt_file"]["tmp_name"], $path);

            if($upload){
                //------------- menambahkan berkas ke dalam database
                $sql = "INSERT INTO `surat_tanda_terima`(`kode_surat_tanda_terima`, `nama_berkas_dokumen`,`id_pengirim`, `id_penerima`, `keperluan`, `nama_file`, `tanggal_kirim`) 
                VALUES ('".$nomor."','".$nama."','".$admin."','".$pegawai."','".$keterangan."','".$file_name."','".$tanggal."')";
                $r = mysqli_query($conn,$sql);
            }

            //------------- Mencari nomer terakhir, untuk memberikan id catatan berkas keluar
            $LastNum      = "select count(*) as TOTAL from catatan_berkas where substring(kode_catatan_berkas,3,2)='".$year."'";
            $queryLastNum = mysqli_query($conn,$LastNum);
            $fetchLastNum = mysqli_fetch_array($queryLastNum);
            if ($fetchLastNum["TOTAL"] != 0)
            {
                $proLastNum = "select substring(kode_catatan_berkas,7,4) as LAST_NO from catatan_berkas WHERE substring(kode_catatan_berkas,3,2)='".$year."' 
                order by substring(kode_catatan_berkas,7,4) desc";
                $queryProLastNum = mysqli_query($conn,$proLastNum);
                $fetchProLastNum = mysqli_fetch_array($queryProLastNum);
                $run_no = str_pad(strval(intval($fetchProLastNum["LAST_NO"]) + 1), 4, "0", STR_PAD_LEFT);
            }else{
                $run_no = str_pad(strval(intval(1)), 4, "0", STR_PAD_LEFT);
            }
            $doc_no="C-".$year.$month.$run_no;

            //------------- menambahkan catatan ke dalam database
            $sql_catatan ="INSERT INTO `catatan_berkas`(`kode_catatan_berkas`, `kode_berkas_dokumen`, `id_admin`, `status`) 
            VALUES ('".$doc_no."','".$nomor."','".$admin."','Pengiriman')";
            $r_catatan = mysqli_query($conn,$sql_catatan);

            header  ("location:../memo.php");

        break;  
        //---------------------------------------------------------------- END OF KIRIM BERKAS
        
        case"VIEW_LAPORAN":
             $id= $_POST['id'];
            ?>
                <table class="table table-grid" id="scheduleTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Laporan</th>
                                    <th>Tanggal Laporan</th>
                                    <th>ID Pasien</th>
                                    <th>Nama Pasien</th>
                                    <th style="text-align: center;">Tinggi <br>Badan</th> 
                                    <th style="text-align: center;">Berat <br>Badan</th> 
                                    <th style="text-align: center;">Usia <br>kehamilan</th> 
                                    <th style="text-align: center;">BEE</th> 
                                    <th style="text-align: center;">TEE</th> 
                                    <th style="text-align: center;">Aksi</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                     $sql="SELECT * FROM v_laporan where id_ibu_hamil='".$id."'";
                                    $r=mysqli_query($conn,$sql);
                                    while($rs=mysqli_fetch_array($r)){
                                        ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $rs['id_laporan'];?></td>
                                            <td><?php echo $rs['tanggal_laporan'];?></td>
                                            <td><?php echo $rs['id_ibu_hamil'];?></td>
                                            <td><?php echo $rs['nama_ibu_hamil'];?></td>
                                            <td style="text-align: center;"><?php echo $rs['tinggi_badan'];?></td>
                                            <td style="text-align: center;"><?php echo $rs['berat_badan'];?></td>
                                            <td style="text-align: center;"><?php echo $rs['usia_kehamilan'];?></td>
                                            <td style="text-align: center;"><?php echo $rs['bee'];?></td>
                                            <td style="text-align: center;"><?php echo $rs['tee'];?></td>
                                            <td style="text-align: center;">
                                                <button class="btn btn-sm btn-danger" title="Hitung" href="#" onclick="delete_laporan('<?php echo $rs['rec_id']?>')">Delete</button> 
                                            </td>
                                            
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                ?>
                            </tbody>
                        </table>
            <?php
        break;
        case"DELETE_LAPORAN":
            $id=$_POST['idx'];
            $sql="DELETE FROM laporan WHERE rec_id='".$id."'";
            mysqli_query($conn,$sql);
             
        break;
        
    }




    function hitung_umur($tanggal_lahir){
    $birthDate = new DateTime($tanggal_lahir);
    $today = new DateTime("today");
    if ($birthDate > $today) { 
        exit("0 tahun 0 bulan 0 hari");
    }
    $y = $today->diff($birthDate)->y;
    $m = $today->diff($birthDate)->m;
    $d = $today->diff($birthDate)->d;
    return $y;
}
?>

       