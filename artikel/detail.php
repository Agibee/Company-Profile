<?php

$id_artikel = intval($_GET['id']);

// Query ambil data artikel berdasarkan ID
$sql = "SELECT judul, gambar, isi, tanggal_upload,tanggal_update FROM artikel WHERE id_artikel = $id_artikel";
$data = $koneksi->query($sql); // ganti dari $result ke $data

$artikel = $data->fetch_assoc(); // Ambil 1 baris hasil
?>

<!-- HEADER -->
<section class="bg-success bg-opacity-10 py-4 text-center" style="margin-top: 0; width:100%; height:100px;">
    <h3 class="text-success my-2">DETAIL ARTIKEL</h3>
</section>

<!-- ISI ARTIKEL -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card border-0 shadow-sm p-4">
                <h2 class="mb-3 text-success">
                    <?php echo htmlspecialchars($artikel['judul']); ?>
                </h2>

                <?php if (!empty($artikel['tanggal_upload_upload_upload'])): ?>
                    <p class="text-muted mb-4">
                        <small><i class="bi bi-calendar3"></i>
                            Dipublikasikan pada: <?php echo date('d M Y', strtotime($artikel['tanggal_upload_upload'])); ?></small>
                    </p>
                <?php endif; ?>

                <?php if (!empty($artikel['gambar'])): ?>
                    <img src="admin/assets/img/artikel/<?php echo htmlspecialchars($artikel['gambar']); ?>"
                        class="img-fluid rounded mb-4"
                        alt="<?php echo htmlspecialchars($artikel['judul']); ?>">
                <?php endif; ?>

                <div class="artikel-isi" style="text-align: justify; line-height: 1.8;">
                    <?php echo nl2br($artikel['isi']); ?>
                </div>

                <div class="mt-4">
                    <a href="?page=artikel/index" class="btn btn-outline-warning">&larr; Kembali </a>
                    <a href="?page=home" class="btn btn-outline-success">&larr; Kembali ke Beranda</a>
                </div>
            </div>

        </div>
    </div>
</div>