<div class="modal fade" id="addAdmin" tabindex="-1" aria-labelledby="addAdmin" aria-hidden="true">
<div class="in modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="addAdmin"><i class="align-middle me-2" data-feather="plus"></i> Admin</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="controller/profile_p.php?role=TAMBAH_ADMIN" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="txt_nama" class="form-control" placeholder="Nama Lengkap" >
        </div> 
        <div class="mb-3">
            <label class="form-label">Tempat Lahir</label>
            <input type="text" name="txt_tempat" class="form-control" placeholder="Tempat Lahir" >
        </div> 
        <div class="mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" name="txt_tanggal" class="form-control" placeholder="Tanggal Lahir" >
        </div> 
        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select class="form-select" name="txt_jeniskelamin"> 
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option> 
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">No Telpon</label>
            <input type="text" name="txt_telpon" class="form-control" placeholder="No Telpon" >
        </div>  
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="txt_email" class="form-control" placeholder="Email" >
        </div>  
        <hr>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="txt_username" class="form-control" placeholder="Username" >
        </div> 
        <div class="mb-3">
            <label class="form-label">Paassword</label>
            <input type="password" name="txt_password" class="form-control" placeholder="Password" >
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