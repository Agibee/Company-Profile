     <!-- Begin Page Content -->
     <div class="container-fluid">

         <!-- Page Heading -->
         <h1 class="h3 mb-2 text-gray-800">Tabel User</h1>
         <p class="mb-4">DataTables adalah plugin pihak ketiga yang digunakan untuk menampilkan tabel di bawah ini secara interaktif.
             Untuk informasi lebih lanjut mengenai DataTables, silakan kunjungi <a target="_blank"
                 href="https://datatables.net">official DataTables documentation</a>.</p>

         <!-- DataTales Example -->
         <div class="card shadow mb-4">
             <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary">
                     <a href="?page=user/tambah" class="btn btn-primary">
                         <i class="fa fa-plus"></i> Tambah Data
                     </a>
                 </h6>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                             <tr>
                                 <th>No</th>
                                 <th>Foto</th>
                                 <th>Nama Lengkap</th>
                                 <th>Username</th>
                                 <th>Password</th>
                                 <th>Nomor Handphone</th>
                                 <th>Level User</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                                $no = 1;
                                $user = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id_user ASC");
                                while ($data = mysqli_fetch_array($user)) {
                                ?>
                                 <tr>
                                     <td><?= $no++ ?></td>
                                     <td>
                                         <img src="assets/img/user/<?= $data['foto'] ?>"
                                             width="60" height="60" style="object-fit: cover; border-radius: 5px;">
                                     </td>
                                     <td><?= ($data['nama_lengkap']) ?></td>
                                     <td><?= ($data['username']) ?></td>
                                     <td><?= ($data['password']) ?></td>
                                     <td><?= ($data['no_hp']) ?></td>
                                     <td><?= ($data['level_user']) ?></td>
                                     <td>
                                         <a href="?page=user/ubah&id_user=<?= $data['id_user'] ?>" class="btn btn-success btn-sm">
                                             <i class="fa fa-edit"></i>
                                         </a>
                                         <a href="?page=user/hapus&id_user=<?= $data['id_user'] ?>" class="btn btn-danger btn-sm"
                                             onclick="return confirm('Yakin ingin menghapus data ini?');">
                                             <i class="fa fa-trash"></i>
                                         </a>
                                     </td>
                                 </tr>
                             <?php } ?>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>

         <!-- /.container-fluid -->

     </div>
     <!-- End of Main Content -->