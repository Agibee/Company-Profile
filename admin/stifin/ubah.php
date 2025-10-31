<?php
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM konsep_stifin WHERE id='$id'");
$edit = mysqli_fetch_array($sql);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Konsep STIFIn</h1>

    <!-- Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="m-0 font-weight-bold text-primary">
                <a href="?page=stifin/index" class="btn btn-warning">
                    <i class="fa fa-share mr-1"></i> Kembali
                </a>
            </h4>
        </div>

        <div class="card-body">
            <form action="?page=stifin/prosesubah" method="post" enctype="multipart/form-data" class="multi-form">
                <input type="hidden" name="id" value="<?= $edit['id'] ?>">

                <div class="form-group mb-3">
                    <label for="tipe">Tipe STIFIn</label>
                    <select name="tipe" id="tipe" class="form-control" required>
                        <option value="">-- Pilih Tipe STIFIn --</option>
                        <option value="Sensing" <?= ($edit['tipe'] == 'Sensing') ? 'selected' : '' ?>>Sensing (S)</option>
                        <option value="Thinking" <?= ($edit['tipe'] == 'Thinking') ? 'selected' : '' ?>>Thinking (T)</option>
                        <option value="Feeling" <?= ($edit['tipe'] == 'Feeling') ? 'selected' : '' ?>>Feeling (F)</option>
                        <option value="Intuiting" <?= ($edit['tipe'] == 'Intuiting') ? 'selected' : '' ?>>Intuiting (I)</option>
                        <option value="Instinct" <?= ($edit['tipe'] == 'Instinct') ? 'selected' : '' ?>>Instinct (N)</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" id="judul" value="<?= htmlspecialchars($edit['judul']) ?>"
                        class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" required><?= htmlspecialchars($edit['deskripsi']) ?></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="gambar">Gambar</label><br>
                    <?php if (!empty($edit['gambar'])) { ?>
                        <img src="assets/img/stifin/<?= $edit['gambar'] ?>" width="100" class="img-thumbnail mb-2"><br>
                    <?php } ?>
                    <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
                </div>

                <div>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check mr-1"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>