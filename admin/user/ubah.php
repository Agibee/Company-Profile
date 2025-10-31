<?php
$id_user = $_GET['id_user'];
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE
 id_user = '$id_user'");
$ubah = mysqli_fetch_array($sql);
?>
<!-- Begin Page Content -->
<div class="card">
    <div class="card-header">
        <h5><b>Form Ubah User</b></h5>
    </div>
    <div class="card-body">
        <form action="?page=user/proses_ubah" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_user" value="<?= $ubah['id_user'] ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $ubah['username'] ?>" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="<?= $ubah['password'] ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" value="<?= $ubah['nama_lengkap'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nomor Handphone</label>
                        <input type="number" name="no_hp" class="form-control" value="<?= $ubah['no_hp'] ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Foto</label>
                        <img src="assets/img/user/<?= $ubah['foto'] ?>"
                            width="60" height="60" style="object-fit: cover; border-radius: 5px;">
                        <input type="file" name="foto" class="form-control">
                    </div>
                </div>
                <div class=" col-md-6">
                    <div class="form-group">
                        <label>Level User</label>
                        <select name="level_user" class="form-control" value="<?= $ubah['level_user'] ?>">
                            <option value="">-- Pilih Level --</option>
                            <option value="Owner" <?= ($ubah['level_user'] == "Owner") ? 'selected' : '' ?>>Owner</option>
                            <option value="Admin" <?= ($ubah['level_user'] == "Admin") ? 'selected' : '' ?>>Admin</option>
                            <option value="User" <?= ($ubah['level_user'] == "User") ? 'selected' : '' ?>>User</option>
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