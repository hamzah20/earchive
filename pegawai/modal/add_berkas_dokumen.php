<div class="modal fade" id="addBerkasDokumen" tabindex="-1" aria-labelledby="addBerkasDokumen" aria-hidden="true">
  <div class="in modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addBerkasDokumen"><i class="align-middle me-2" data-feather="plus"></i> Berkas Dokumen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="controller/master_p.php?role=TAMBAH_BERKAS" method="POST" enctype="multipart/form-data"> 
      <input type="hidden" name="txt_admin" class="form-control" value="<?php echo $_SESSION['user_id'];?>">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nomor</label>
            <input type="text" name="txt_nomor" class="form-control" placeholder="Nomor Dokumen" >
          </div>  
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="txt_nama" class="form-control" placeholder="Nama Dokumen">
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
              ?>
              <option value="<?= $rs_dok['kode_dokumen']; ?>"><?= $rs_dok['jenis_dokumen']; ?></option> 
              <?php } ?>
            </select>
          </div>  
          <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="txt_tanggal" class="form-control">
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
              ?>
              <option value="<?= $rs_pro['kode_proyek']; ?>"><?= $rs_pro['nama_proyek']; ?></option> 
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
                  ?>
                  <option value="<?= $rs_rak['kode_rak']; ?>"><?= $rs_rak['nama_rak']; ?></option> 
                  <?php } ?>
                </select>
              </div>  
            </div>
            <div class="col">
              <div class="mb-3">
                <!-- Ambil data map -->
                <?php 
                  $sql2  = "SELECT * FROM map";
                  $r    = mysqli_query($conn,$sql2);
                ?>
                <label class="form-label">Map</label>
                <select class="form-select" name="txt_map"> 
                  <?php
                    while($rs = mysqli_fetch_array($r)){
                  ?>
                  <option value="<?= $rs['kode_map']; ?>"><?= $rs['nama_map']; ?></option> 
                  <?php } ?>
                </select>
              </div>
            </div>
          </div> 
          <div class="mb-3">
            <label>Dokumen</label>
            <input type="file"  class="form-control" required="" name="txt_file">
            <div class="invalid-feedback">File tidak boleh kosong!</div>
          </div>
          <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-select" name="txt_status"> 
              <option value="Aktif">Aktif</option>
              <option value="Tidak Aktif">Tidak Aktif</option> 
            </select>
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