<div class="modal fade" id="sendBerkasDokumen" tabindex="-1" aria-labelledby="sendBerkasDokumen" aria-hidden="true">
  <div class="in modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sendBerkasDokumen"><i class="align-middle me-2" data-feather="plus"></i> Kirim Berkas Dokumen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="controller/master_p.php?role=TAMBAH_KIRIM_BERKAS" method="POST" enctype="multipart/form-data"> 
      <input type="hidden" name="txt_admin" class="form-control" value="<?php echo $_SESSION['user_id'];?>">
        <div class="modal-body">   
        <div class="mb-3">
            <input type="hidden" name="txt_admin" class="form-control" value="<?php echo $_SESSION['user_id']?>">
            <!-- Ambil data pegawai -->
            <?php 
              $sql_peg  = "SELECT * FROM pegawai";
              $r_peg    = mysqli_query($conn,$sql_peg);
            ?>
            <label class="form-label">Nama Pegawai</label>
            <select class="form-select" name="txt_pegawai"> 
              <?php
                while($rs_peg = mysqli_fetch_array($r_peg)){
              ?>
              <option value="<?= $rs_peg['id_pegawai']; ?>"><?= $rs_peg['nama_pegawai']; ?></option> 
              <?php } ?>
            </select>
          </div>     
          <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="txt_tanggal" class="form-control" required>
          </div>  
          <div class="mb-3">
            <label class="form-label">Nama Dokumen</label>
            <input type="text" name="txt_nama" class="form-control" required>
          </div>   
          <div class="mb-3">
            <label class="form-label">Dokumen</label>
            <input type="file" name="txt_file" class="form-control" required>
          </div>  
          <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <input type="text" name="txt_keterangan" class="form-control" required>
          </div>   
        </div> 
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
        <input type="submit" class="btn btn-primary" value="Save changes">
      </div>
      </form>
    </div>
  </div>
</div>