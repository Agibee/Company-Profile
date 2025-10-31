<?php
$id = $_GET['id_kerjasama'];
$q = mysqli_query($koneksi, "SELECT * FROM kerjasama WHERE id_kerjasama='$id'");
$edit = mysqli_fetch_array($q);
?>

<div class="container-fluid">
    <h3 class="mb-4 text-gray-800">Ubah Data Kerjasama</h3>

    <form action="?page=kerjasama/proses_ubah" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_kerjasama" value="<?= $edit['id_kerjasama'] ?>">

        <div class="form-group mb-3">
            <label>Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" value="<?= $edit['nama_perusahaan'] ?>" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required><?= $edit['alamat'] ?></textarea>
        </div>

        <div class="form-group mb-3">
            <label>No. Telepon</label>
            <input type="text" name="no_telp" value="<?= $edit['no_telp'] ?>" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" value="<?= $edit['email'] ?>" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Logo</label><br>
            <?php if ($edit['logo']) { ?>
                <img src="assets/img/kerjasama/<?= $edit['logo'] ?>" width="100"><br><br>
            <?php } ?>
            <input type="file" name="logo" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>