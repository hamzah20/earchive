<?php
	include('../../conn.php');

	$role=$_GET['role'];
    switch ($role) {
        //---------------------- case master rak ---------------------------------------------------
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

        //--------------------------------------------------------- DOKUMEN
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
            $sql="INSERT INTO dokumen (kode_dokumen,jenis_dokumen) values('".$doc_no."','".$jenis."')";
            $r=mysqli_query($conn,$sql);
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
        case"DELETE_DOKUMEN":
            $id  = $_POST['id_dokumen'];
            $sql = "DELETE FROM dokumen WHERE kode_dokumen='".$id."'";
            $r   = mysqli_query($conn,$sql);
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
<?php 
        break;
        case"PROSES_EDIT_DOKUMEN":
            $kode  = $_POST['txt_kode'];
            $jenis = $_POST['txt_jenis'];  

            $sql="UPDATE dokumen SET jenis_dokumen='".$jenis."' where kode_dokumen='".$kode."'";
            $r=mysqli_query($conn,$sql);  
            header('location:../dokumen.php'); 
        break;
        //---------------------------------------------------------------- MAP
        case'TAMBAH_MAP': 
            $nama = $_POST['txt_nama'];

            //------------- mencari apakah ada nama rak yang sama
            $sql="select count(*) as TOTAL from rak map nama_map='".$nama."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            if ($rs["TOTAL"]>0)
            {
                $_SESSION["message"]="Nama MAP sudah ada";
                header  ("location:../map.php");
                exit;
            }
            
            //------------- mencari nomor terkhir untuk penambahan jadwal
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

            //------------- menambahkan jadwal ke dalam database
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
        //-------------------------------------------- perhitungan
        case"TAMBAH_PERHITUNGAN":
            $ibu_hamil=$_POST['slc_hamil'];
            $bidan=$_POST['slc_bidan'];
            $aktivitas=$_POST['slc_aktivitas'];
            $tgl=$_POST['txt_tgl'];
            $tb=$_POST['txt_tb'];
            $bb=$_POST['txt_bb'];
            $usia=$_POST['txt_usia'];
            $r_rumus=$_POST['r_rumus'];
            $keluhan=$_POST['txt_keluhan'];
            $catatan=$_POST['txt_catatan'];
            $bee=0;
            $tee=0;
            $sql_kali="SELECT * FROM aktivitas where rec_id='".$aktivitas."'";
            $r_kali=mysqli_query($conn,$sql_kali);
            $rs_kali=mysqli_fetch_array($r_kali);

            if($r_rumus==1){
                $bee=655+(9.6*$bb)+(1.8*$tb)-(4.7*$usia);
                $tee=$bee*$rs_kali['perkalian']+100;
            }else{
                $bee=655+(9.6*$bb)+(1.8*$tb)-(4.7*$usia);
                $tee=$bee*$rs_kali['perkalian']+300;
            }


            $tanggal=date("Y-m-d",strtotime($tgl));
            $year=date("Y",strtotime($tgl));

            
            //------------- mencari nomor terkhir untuk penambahan infromasi
             $sql="select count(*) as TOTAL from laporan where substring(id_laporan,2,4)='".$year."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            if ($rs["TOTAL"]!=0)
            {
                $sql1 = "select substring(id_laporan,6,5) as LAST_NO from laporan WHERE substring(id_laporan,2,4)='".$year."' order by substring(id_laporan,6,5) desc";
                $result= mysqli_query($conn,$sql1);
                $rs = mysqli_fetch_array($result);
                $run_no = str_pad(strval(intval($rs["LAST_NO"]) + 1), 5, "0", STR_PAD_LEFT);
            }else{
                $run_no = str_pad(strval(intval(1)), 5, "0", STR_PAD_LEFT);
            }
              $doc_no="L".$year.$run_no;

            $sql_ibu="SELECT tanggal_lahir_ibu_hamil from ibu_hamil where id_ibu_hamil='".$ibu_hamil."'";
            $r_ibu=mysqli_query($conn,$sql_ibu);
            $rs_ibu=mysqli_fetch_array($r_ibu);
             $rs_ibu['tanggal_lahir_ibu_hamil'];
           $usia_ibu_hamil= hitung_umur($rs_ibu['tanggal_lahir_ibu_hamil']);
            //echo $usia_ibu_hamil;
             $sql="INSERT INTO laporan ( id_laporan, id_kader_posyandu, id_bidan, id_ibu_hamil, tanggal_laporan, berat_badan, tinggi_badan, usia_ibu_hamil, bee, usia_kehamilan, tee, keluhan, catatan, kehamilan) VALUES ('".$doc_no."','".$_SESSION['user_id']."','".$bidan."','".$ibu_hamil."','".$tanggal."','".$bb."','".$tb."','".$usia_ibu_hamil."','".$bee."','".$usia."','".$tee."','".$keluhan."','".$catatan."','1')";
             $r=mysqli_query($conn,$sql);
             header('location:../perhitungan.php');


        break;
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

       