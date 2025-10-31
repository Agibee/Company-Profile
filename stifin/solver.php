<?php

include 'partials/navbar.php';

$query = " SELECT * FROM solver ORDER BY nama ";
$solvers = [];
if (isset($koneksi)) {
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $solvers[] = $row;
        }
    }
}
?>

<style>
    .trainer-card {
        text-align: center;
        padding: 25px 20px;
        margin-bottom: 30px;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        height: 100%;
        background-color: #ffffff;

        /* Kunci Kerapian: Flexbox untuk menyamakan tinggi kartu */
        display: flex;
        flex-direction: column;
    }

    .trainer-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(25, 135, 84, 0.2);
    }

    .trainer-photo {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 15px;
        border: 4px solid #198754;
        padding: 3px;
        box-shadow: 0 0 0 1px rgba(25, 135, 84, 0.5);
    }

    .trainer-name {
        font-weight: 700;
        color: #212529;
        margin-bottom: 5px;
    }

    .trainer-designation {
        /* Menggunakan warna yang sama untuk konsistensi */
        color: #198754;
        font-style: italic;
        font-weight: 500;
        margin-bottom: 10px;
        font-size: 1rem;
    }

    /* Area Detail Tengah (Mengambil sisa ruang) */
    .trainer-details-area {
        flex-grow: 1;
        /* PENTING: Membuat area ini mengisi ruang agar footer terdorong ke bawah */
    }

    .trainer-field {
        color: #495057;
        font-size: 0.9rem;
        margin-bottom: 15px;
    }

    .trainer-field strong {
        background-color: #e9f5ee;
        padding: 2px 8px;
        border-radius: 5px;
        font-weight: 600;
        color: #198754;
    }

    .trainer-description {
        font-size: 0.85rem;
        color: #495057;
        text-align: center;
        min-height: 50px;
        margin-bottom: 10px;
    }
</style>

<div class="text-left mb-5">
    <h2 class="text-center text-primary fw-bold mb-4" style="padding: 50px;">Tim Solver STIFIn </h2>

    <div class="container my-4">
        <div class="row align-items-center">
            <div class="col-md-6 mb-3 mb-md-0">
                <img src="image/solve.webp" alt="Solver STIFIn" class="img-fluid rounded shadow">
            </div>

            <div class="col-md-6">
                <h4 class="fw-bold text-dark mb-3">Apa Sih Solver STIFIn?</h4>
                <p style="text-align: justify;">
                    **Solver STIFIn** adalah individu yang memiliki pemahaman mendalam tentang Konsep STIFIn dan fokus pada **penerapan praktis** hasilnya. Mereka membantu klien memahami dan memecahkan masalah pribadi, profesional, atau keluarga berdasarkan hasil Tes STIFIn.
                    Tugas utama Solver meliputi sesi konsultasi personal, memberikan solusi yang ditargetkan, dan membantu klien memaksimalkan potensi genetik mereka dalam kehidupan sehari-hari.
                </p>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <h3 class="text-center text-dark fw-bold mb-4">Daftar Solver & Spesialisasi 🌟</h3>
        <p class="text-center text-muted mb-5">Kenali para ahli dan profesional yang akan membantu memecahkan masalah Anda.</p>

        <div class="row">
            <?php if (!empty($solvers)): ?>
                <?php foreach ($solvers as $solver): ?>
                    <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch">
                        <div class="trainer-card w-100">

                            <?php
                            $photo_path = 'admin/assets/img/solver/' . htmlspecialchars($solver['foto']);
                            if (!file_exists($photo_path) || empty($solver['foto']) || !is_file($photo_path)) {
                                $photo_path = 'path/to/default-avatar.png'; // Ganti dengan path foto default
                            }
                            ?>
                            <img src="<?= $photo_path ?>" alt="Foto <?= htmlspecialchars($solver['nama']) ?>" class="trainer-photo">

                            <div class="trainer-details-area">
                                <h5 class="trainer-name"><?= htmlspecialchars($solver['nama']) ?></h5>
                                <p class="trainer-designation"><?= htmlspecialchars($solver['jabatan']) ?></p>
                                <p class="trainer-field">Bidang: <strong><?= htmlspecialchars($solver['bidang']) ?></strong></p>

                                <p class="trainer-description">
                                    <?= htmlspecialchars(substr($solver['deskripsi'], 0, 120)) . (strlen($solver['deskripsi']) > 120 ? '...' : '') ?>
                                </p>
                            </div>

                            <div class="mt-auto pt-3">
                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle me-1" title="LinkedIn">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle me-1" title="WhatsApp">
                                    <i class="bi bi-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-warning text-center" role="alert">
                        Data Solver belum tersedia atau koneksi database gagal.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>