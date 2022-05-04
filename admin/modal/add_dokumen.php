
<div class="modal fade" id="addDokumen" tabindex="-1" aria-labelledby="addDokumen" aria-hidden="true">
  <div class="in modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleDokumen"><i class="align-middle me-2" data-feather="plus"></i> Dokumen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="controller/master_p.php?role=TAMBAH_DOKUMEN" method="POST">
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Jenis Dokumen</label>
          <input type="text" name="txt_jenis" class="form-control" placeholder="Jenis Dokumen" >
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
        <input type="submit" class="btn btn-primary" value="Save Changes">
      </div>
     </form>
    </div>
  </div>
</div>