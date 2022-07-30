<?php
	include('../../conn.php');

	$role=$_GET['role'];
    switch ($role) {
        case"DOWNLOAD_FILE":
            if (isset($_GET['kode'])) {
                $kode = $_GET['kode'];
                // Cek nama file
                $cekNamaFile    = "SELECT * FROM surat_tanda_terima WHERE kode_surat_tanda_terima='".$kode."'";
                $r_cekNamaFile  = mysqli_query($conn,$cekNamaFile);
                $rs_cekNamaFile = mysqli_fetch_array($r_cekNamaFile);

                $nama_file_db   = $rs_cekNamaFile['nama_file'];
                $nama_file_exp  = explode('/',$nama_file_db);
                $nama_file      = $nama_file_exp[2];
                
                $back_dir = '../../admin/file/data_pengiriman/'; 
                $file = $back_dir.$nama_file; 
                // exit();
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
        case"DOWNLOAD_MEMO":
            if (isset($_GET['kode'])) {
                $kode = $_GET['kode'];
                // Cek nama file
                $cekNamaFile    = "SELECT * FROM surat_tanda_terima WHERE kode_surat_tanda_terima='".$kode."'";
                $r_cekNamaFile  = mysqli_query($conn,$cekNamaFile);
                $rs_cekNamaFile = mysqli_fetch_array($r_cekNamaFile);

                $nama_file_db   = $rs_cekNamaFile['memo_file'];
                $nama_file_exp  = explode('/',$nama_file_db);
                $nama_file      = $nama_file_exp[2];
                
                $back_dir = '../../admin/file/data_memo/'; 
                $file = $back_dir.$nama_file; 
                // exit();
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
    }
?>