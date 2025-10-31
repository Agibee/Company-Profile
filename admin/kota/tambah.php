 <div class="container-fluid">
     <form action="?page=kota/prosestambah" method="post" enctype="multipart/form-data">


         <div class="form-group">
             <label for="">Nama provinsi</label>
             <select name="id_provinsi" id="" class="form-control">
                 <option value="">Pilih provinsi</option>
                 <?php
                    include '../koneksi.php';
                    $sql = mysqli_query($koneksi, "SELECT * FROM provinsi");
                    while ($provinsi = mysqli_fetch_array($sql)) {
                    ?>
                     <option value="<?php echo $provinsi['id_provinsi'] ?>">
                         <?php echo $provinsi['nama_provinsi'] ?>
                     </option>
                 <?php } ?>
             </select>
         </div>
         <div class="form-group mt-3 mb-3">
             <label for="">Nama kota</label>
             <input type="text" name="nama_kota" class="form-control" required>
         </div>

         <button type="submit" name="submit" class="btn btn-warning mt-3">Simpan</button>

     </form>
 </div>