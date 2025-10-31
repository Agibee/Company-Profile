<?php
include 'partials/navbar.php';

// Ambil data promotor dari database
$query = "
SELECT 
  pr.id_promotor,
  pr.nama_promotor,
  pr.kode_promotor,
  pr.no_telepon,
  a.nama_area
FROM promotor pr
LEFT JOIN area a ON pr.id_area = a.id_area
ORDER BY a.nama_area, pr.nama_promotor
";
$result = mysqli_query($koneksi, $query);

// Kelompokkan data per area
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $area = $row['nama_area'] ?? 'Tanpa Area';
    $data[$area][] = $row;
}
?>
<div class="text-left mb-5">
    <h2 class="text-center text-primary fw-bold mb-4" style="padding: 50px;">Promotor STIFIn</h2>

    <div class="container my-4">
        <div class="row align-items-center">
            <!-- Gambar di kiri -->
            <div class="col-md-6 mb-3 mb-md-0">
                <img src="image/Cabang.webp" alt="Promotor STIFIn" class="img-fluid rounded shadow">
            </div>

            <!-- Teks di kanan -->
            <div class="col-md-6">
                <h4 class="fw-bold text-dark mb-3">Apa Sih Promotor STIFIn?</h4>
                <p style="text-align: justify;">
                    Promotor STIFIn merupakan salah satu profesi STIFIn yang sangat populer dengan dibekali pemahaman terkait konsep STIFIn sehingga sangat mumpuni ketika berhubungan dengan klien Tes STIFIn.
                    Posisi Promotor STIFIn berada dibawah naungan Cabang STIFIn sehingga untuk pengisian ulang atau refill voucher atau trouble yang berhubungan dengan aplikasi promotor maka berhak menghubungi Cabang yang dinaungi.
                    Tugas utama Promotor adalah mengetes dan menjelaskan hasil Tes STIFIn kepada klien.
                    Adapun tools yang digunakan promotor untuk melayani klien yaitu laptop dan scanner.
                </p>
            </div>
        </div>
    </div>

    <!-- Konten Jenjang Pendidikan -->
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-success">Jenjang Pendidikan Promotor</h2>
            <p class="text-muted">Tahapan belajar dan pengembangan untuk menjadi Promotor resmi STIFIn</p>
        </div>

        <div class="timeline position-relative mx-auto" style="max-width: 900px;">
            <div class="timeline-line"></div>

            <!-- Licensed Promotor -->
            <div class="timeline-item left">
                <div class="timeline-dot"></div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="fw-bold text-success">Licensed Promotor STIFIn</h5>
                        <p class="fst-italic mb-2 text-muted">Bridging The Concept of STIFIn to Universe</p>
                        <p class="text-muted">
                            Tahap pertama untuk menjadi promotor resmi STIFIn dengan memperkenalkan dasar dan nilai-nilai utama Konsep STIFIn secara menyeluruh.
                        </p>
                    </div>
                </div>
            </div>

            <!-- WSL 2 -->
            <div class="timeline-item right">
                <div class="timeline-dot"></div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="fw-bold text-success">WSL 2</h5>
                        <p class="fst-italic mb-2 text-muted">Licensed Promotor STIFIn – Tentang Loe, Gue Akhirnya</p>
                        <p class="text-muted">
                            Pelatihan lanjutan yang berfokus pada penerapan konsep STIFIn dalam komunikasi dan relasi antar manusia, baik secara personal maupun profesional.
                        </p>
                    </div>
                </div>
            </div>

            <!-- WSL 1 -->
            <div class="timeline-item left">
                <div class="timeline-dot"></div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="fw-bold text-success">WSL 1</h5>
                        <p class="fst-italic mb-2 text-muted">Find The True You – Gue Banget</p>
                        <p class="text-muted">
                            Tahap awal untuk memahami diri sendiri berdasarkan Mesin Kecerdasan STIFIn. Peserta belajar mengenali kelebihan dan pola pikirnya secara mendalam.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Promotor -->
    <div class="container py-5">
        <div class="accordion" id="accordionArea">
            <?php if (!empty($data)): ?>
                <?php $i = 0;
                foreach ($data as $area => $promotors): $i++; ?>
                    <div class="accordion-item mb-3 border-0 shadow-sm">
                        <h2 class="accordion-header" id="heading<?= $i ?>">
                            <button class="accordion-button bg-success text-white fw-semibold <?= $i > 1 ? 'collapsed' : '' ?>"
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $i ?>"
                                aria-expanded="<?= $i === 1 ? 'true' : 'false' ?>" aria-controls="collapse<?= $i ?>">
                                <?= htmlspecialchars($area) ?>
                            </button>
                        </h2>
                        <div id="collapse<?= $i ?>" class="accordion-collapse collapse <?= $i === 1 ? 'show' : '' ?>"
                            aria-labelledby="heading<?= $i ?>" data-bs-parent="#accordionArea">
                            <div class="accordion-body">
                                <div class="row">
                                    <?php foreach ($promotors as $pr): ?>
                                        <div class="col-md-6 mb-4">
                                            <div class="card border-0 shadow-sm p-3 h-100">
                                                <h6 class="fw-bold"><?= htmlspecialchars($pr['nama_promotor']) ?></h6>
                                                <p class="text-muted mb-1">Kode: <?= htmlspecialchars($pr['kode_promotor']) ?></p>
                                                <small class="text-secondary d-block mb-2">
                                                    Jenjang Pendidikan:
                                                    <span class="fw-semibold text-dark">Licensed Promotor STIFIn</span>
                                                </small>
                                                <div class="d-flex">
                                                    <?php if (!empty($pr['no_telepon'])): ?>
                                                        <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $pr['no_telepon']) ?>"
                                                            target="_blank" class="btn btn-light btn-sm rounded-circle border me-2">
                                                            <i class="bi bi-whatsapp text-success"></i>
                                                        </a>
                                                        <a href="tel:<?= htmlspecialchars($pr['no_telepon']) ?>" class="btn btn-light btn-sm rounded-circle border">
                                                            <i class="bi bi-telephone text-success"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center text-muted">Data promotor belum tersedia.</p>
            <?php endif; ?>
        </div>
    </div>