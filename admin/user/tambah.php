 <!-- Begin Page Content -->
 <div class="container-fluid">

     <div class="card">
         <div class="card-header">
             <h5><b>Form Tambah User</b></h5>
         </div>
         <div class="card-body">
             <form action="?page=user/proses_tambah" method="post" enctype="multipart/form-data">

                 <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                             <label>Username</label>
                             <input type="text" name="username" class="form-control" required>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group">
                             <label>Password</label>
                             <input type="password" name="password" class="form-control" required>
                         </div>
                     </div>
                 </div>

                 <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                             <label>Nama Lengkap</label>
                             <input type="text" name="nama_lengkap" class="form-control" required>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group">
                             <label>Nomor Handphone</label>
                             <input type="number" name="no_hp" class="form-control" required>
                         </div>
                     </div>
                 </div>

                 <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                             <label>Foto</label>
                             <input type="file" name="foto" class="form-control" required>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group">
                             <label>Level User</label>
                             <select name="level_user" class="form-control" required>
                                 <option value="">-- Pilih Level --</option>
                                 <option value="owner">Owner</option>
                                 <option value="admin">Admin</option>
                                 <option value="user">User</option>
                             </select>
                         </div>
                     </div>
                 </div>

                 <div class="mt-3">
                     <button type="submit" class="btn btn-primary">Simpan</button>
                     <a href="?page=user/index" class="btn btn-secondary">Batal</a>
                 </div>
             </form>
         </div>
     </div>

 </div>
 <!-- /.container-fluid -->