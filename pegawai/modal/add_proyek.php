
<div class="modal fade" id="addProyek" tabindex="-1" aria-labelledby="addProyek" aria-hidden="true">
  <div class="in modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProyek"><i class="align-middle me-2" data-feather="plus"></i> Proyek</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="controller/master_p.php?role=TAMBAH_PROYEK" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="txt_nama" class="form-control" placeholder="Nama Proyek" >
          </div>  
          <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="txt_tanggal" class="form-control" >
          </div>  
          <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="txt_alamat" class="form-control" placeholder="Alamat Proyek" >
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