
<div class="modal fade" id="addRAK" tabindex="-1" aria-labelledby="addRAK" aria-hidden="true">
  <div class="in modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addRAK"><i class="align-middle me-2" data-feather="plus"></i> Input RAK</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="controller/master_p.php?role=TAMBAH_RAK" method="POST">
        <div class="modal-body"> 
        <div class="mb-3">
          <label class="form-label">Nama RAK</label>
          <input type="text" name="txt_nama" class="form-control" placeholder="Nama RAK" >
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