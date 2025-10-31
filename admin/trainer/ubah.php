<?php
$id_trainer = $_GET['id_trainer'];
$sql = mysqli_query($koneksi, "SELECT * FROM trainer WHERE id_trainer = '$id_trainer'");
$ubah = mysqli_fetch_array($sql);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h5><b>Form Ubah Trainer</b></h5>
        </div>
        <div class="card-body">
            <form action="?page=trainer/proses_ubah" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_trainer" value="<?= $ubah['id_trainer'] ?>">

                <div class="row">
                    <!-- Nama -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Trainer</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                value="<?= $ubah['nama'] ?>" required>
                        </div>
                    </div>

                    <!-- Jabatan -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan" class="form-control"
                                value="<?= $ubah['jabatan'] ?>" required>
                        </div>
                    </div>

                    <!-- Bidang -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bidang">Bidang</label>
                            <input type="text" name="bidang" id="bidang" class="form-control"
                                value="<?= $ubah['bidang'] ?>" required>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required><?= $ubah['deskripsi'] ?></textarea>
                        </div>
                    </div>

                    <!-- Foto -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Foto Sekarang</label><br>
                            <?php if (!empty($ubah['foto'])) { ?>
                                <img src="assets/img/trainer/<?= $ubah['foto'] ?>" width="100" height="100"
                                    style="object-fit:cover; border-radius:8px;">
                            <?php } else { ?>
                                <p><i>Belum ada foto</i></p>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="foto">Ganti Foto (Opsional)</label>
                            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                            <small class="text-muted">Kosongkan jika tidak ingin mengganti.</small>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-save"></i> Simpan
                </button>
                <a href="?page=trainer/index" class="btn btn-secondary mt-3">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->