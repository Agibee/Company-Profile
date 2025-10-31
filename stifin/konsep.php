<?php
include 'partials/navbar.php';

// Ambil tipe dari URL, misal ?page=stifin/konsep&tipe=Sensing
$tipe = isset($_GET['tipe']) ? ucfirst(strtolower(trim($_GET['tipe']))) : 'Sensing';
?>

<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="text-success fw-bold">Konsep <?= htmlspecialchars($tipe) ?></h2>
    </div>

    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM konsep_stifin WHERE tipe='$tipe' ORDER BY id ASC");

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
    ?>
            <div class="mb-5 pb-5 border-bottom border-success-subtle">
                <div class="text-center mb-4">
                    <?php if (!empty($row['gambar'])) { ?>
                        <img src="admin/assets/img/stifin/<?= htmlspecialchars($row['gambar']); ?>"
                            class="img-fluid rounded shadow-sm"
                            alt="<?= htmlspecialchars($row['judul']); ?>"
                            style="max-width:600px; max-height:400px; object-fit:cover;">
                    <?php } ?>
                </div>

                <h3 class="fw-bold text-success text-center mb-3"><?= htmlspecialchars($row['judul']); ?></h3>
                <p class="text-muted" style="text-align: justify; font-size: 1.05rem;">
                    <?= nl2br(htmlspecialchars($row['deskripsi'])); ?>
                </p>
            </div>
    <?php
        }
    } else {
        echo "<div class='text-center text-muted py-5'>Data $tipe belum tersedia di database.</div>";
    }
    ?>
</div>