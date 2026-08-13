<?php
$id_artikel = intval($_GET['id']);
// Query ambil data artikel berdasarkan ID
$sql = "SELECT judul, gambar, isi, tanggal_upload, tanggal_update FROM artikel WHERE id_artikel = $id_artikel";
$data = $koneksi->query($sql);
$artikel = $data->fetch_assoc(); // Ambil 1 baris hasil
?>

<!-- HEADER -->
<section class="bg-success bg-opacity-10 py-4 text-center" style="margin-top: 0; width:100%; height:100px;">
    <h3 class="text-success my-2">DETAIL ARTIKEL</h3>
</section>

<!-- ISI ARTIKEL -->
<div class="container my-5">
    <div class="card border-0 shadow-sm py-2 px-3">

        <!-- Gambar artikel -->
        <?php if (!empty($artikel['gambar'])): ?>
            <img src="admin/assets/img/artikel/<?php echo htmlspecialchars($artikel['gambar']); ?>"
                class="img-fluid rounded mb-2"
                alt="<?php echo htmlspecialchars($artikel['judul']); ?>">
        <?php endif; ?>

        <!-- Tanggal upload -->
        <?php if (!empty($artikel['tanggal_upload'])): ?>
            <p class="text-muted mb-1" style="font-size: 0.9rem;">
                <small><i class="bi bi-calendar3"></i>
                    Dipublikasikan pada: <?php echo date('d M Y', strtotime($artikel['tanggal_upload'])); ?></small>
            </p>
        <?php endif; ?>

        <!-- Judul artikel -->
        <h2 class="mb-2 text-success" style="font-size: 1.5rem;">
            <?php echo htmlspecialchars($artikel['judul']); ?>
        </h2>

        <!-- Isi artikel -->
        <div class="artikel-isi" style="text-align: justify; line-height: 1.5; font-size: 0.95rem;">
            <?php echo nl2br($artikel['isi']); ?>
        </div>

        <!-- Tombol kembali -->
        <div class="mt-3">
            <a href="?page=artikel/index" class="btn btn-outline-warning btn-sm">&larr; Kembali </a>
            <a href="?page=home" class="btn btn-outline-success btn-sm">&larr; Kembali ke Beranda</a>
        </div>
    </div>
</div>