<?php
include '../koneksi.php';
$id = $_GET['id_artikel'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM artikel WHERE id_artikel='$id'"));
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary">Form Ubah Artikel</h5>
        </div>
        <div class="card-body">
            <form action="?page=artikel/proses_ubah" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_artikel" value="<?= $data['id_artikel']; ?>">

                <div class="mb-3">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($data['judul']); ?>" required>
                </div>

                <div class="mb-3">
                    <label>Gambar</label><br>
                    <?php if (!empty($data['gambar'])): ?>
                        <img src="assets/img/artikel/<?= $data['gambar']; ?>" width="120" class="rounded mb-2">
                    <?php endif; ?>
                    <input type="file" name="gambar" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Isi</label>
                    <textarea id="isi" name="isi" rows="10" class="form-control"><?= $data['isi']; ?></textarea>
                </div>

                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                <a href="?page=artikel/index" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </form>
        </div>
    </div>
</div>