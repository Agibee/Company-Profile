<?php
include 'partials/navbar.php';

// Ambil data gabungan dari DB
$query = "
SELECT 
  p.nama_provinsi, 
  k.nama_kota, 
  c.nama_cabang, 
  c.alamat, 
  c.jam_buka, 
  c.jam_tutup, 
  c.telepon, 
  c.link_maps
FROM cabang c
JOIN kota k ON c.id_kota = k.id_kota
JOIN provinsi p ON k.id_provinsi = p.id_provinsi
ORDER BY p.nama_provinsi, k.nama_kota, c.nama_cabang
";
$result = mysqli_query($koneksi, $query);

// Kelompokkan per provinsi & kota
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $prov = $row['nama_provinsi'];
    $kota = $row['nama_kota'];
    $data[$prov][$kota][] = $row;
}
?>

<div class="container py-5">

    <div class="text-left mb-5">
        <h2 class="text-center text-primary fw-bold mb-4"> Cabang STIFIn</h2>

        <div class=" container my-4">
            <div class="row align-items-center">
                <!-- Gambar di kiri -->
                <div class="col-md-6 mb-3 mb-md-0">
                    <img src="image/Cabang.webp" alt="Promotor STIFIn" class="img-fluid rounded shadow">
                </div>

                <!-- Teks di kanan -->
                <div class="col-md-6">
                    <h4 class="fw-bold text-dark mb-3">Apa itu Cabang?</h4>
                    <p style="text-align: justify;">
                        Cabang STIFIn adalah perorangan atau badan hukum yang membeli paket cabang STIFIn
                        yang diajukan untuk 1 (satu) Kota/Kab di seluruh Indonesia.
                        Cabang tersebut diberi hak penuh untuk mengelola area di Kota/Kab tersebut.
                        Di setiap Kota/Kab hanya ada 1 (satu) cabang.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <h2 class="text-success fw-bold text-center mb-4" style="margin-top:80px;">Daftar Cabang STIFIn</h2>

    <div class=" accordion" id="accordionProvinsi">
        <?php $i = 0;
        foreach ($data as $provinsi => $kotas): $i++; ?>
            <div class=" accordion-item mb-3 border-0 shadow-sm">
                <h2 class="accordion-header" id="heading<?= $i ?>">
                    <button class="accordion-button bg-success text-white fw-semibold <?= $i > 1 ? 'collapsed' : '' ?>"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapse<?= $i ?>"
                        aria-expanded="<?= $i === 1 ? 'true' : 'false' ?>"
                        aria-controls="collapse<?= $i ?>">
                        <?= htmlspecialchars($provinsi) ?>
                    </button>
                </h2>
                <div id="collapse<?= $i ?>"
                    class="accordion-collapse collapse <?= $i === 1 ? 'show' : '' ?>"
                    aria-labelledby="heading<?= $i ?>"
                    data-bs-parent="#accordionProvinsi">
                    <div class="accordion-body">
                        <?php foreach ($kotas as $kota => $cabangs): ?>
                            <h5 class="fw-bold text-success mb-3"><?= htmlspecialchars($kota) ?></h5>
                            <div class="row">
                                <?php foreach ($cabangs as $cabang): ?>
                                    <div class="col-md-6 mb-4">
                                        <div class="card border-0 shadow-sm p-3 h-100">
                                            <h6 class="fw-bold"><?= htmlspecialchars($cabang['nama_cabang']) ?></h6>
                                            <p class="text-muted mb-1"><?= htmlspecialchars($cabang['alamat']) ?></p>
                                            <small class="text-secondary d-block mb-2">
                                                Jam buka: <?= htmlspecialchars($cabang['jam_buka']) ?> - <?= htmlspecialchars($cabang['jam_tutup']) ?> WIB
                                            </small>
                                            <div>
                                                <?php if (!empty($cabang['telepon'])): ?>
                                                    <a href="tel:<?= htmlspecialchars($cabang['telepon']) ?>"
                                                        class="btn btn-light btn-sm rounded-circle border me-2">
                                                        <i class="bi bi-telephone text-success"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (!empty($cabang['link_maps'])): ?>
                                                    <a href="<?= htmlspecialchars($cabang['link_maps']) ?>"
                                                        target="_blank"
                                                        class="btn btn-light btn-sm rounded-circle border me-2">
                                                        <i class="bi bi-geo-alt text-success"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
    </div>
<?php endforeach; ?>
</div>