<?php

include 'partials/navbar.php';

// Ambil data trainer dari database
$query = " SELECT * FROM trainer ORDER BY nama ";
$result = mysqli_query($koneksi, $query);
$trainers = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $trainers[] = $row;
    }
}

?>

<style>
    .trainer-card {
        text-align: center;
        padding: 25px 20px;
        margin-bottom: 30px;
        /* Disesuaikan: Menambahkan border tipis */
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        /* Sedikit lebih membulat */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        height: 100%;
        background-color: #ffffff;
    }

    .trainer-card:hover {
        transform: translateY(-5px);
        /* Box shadow lebih tebal saat hover */
        box-shadow: 0 10px 20px rgba(25, 135, 84, 0.2);
    }

    .trainer-photo {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 15px;
        /* Border hijau tebal */
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
        color: #198754;
        font-style: italic;
        font-weight: 500;
        margin-bottom: 10px;
        font-size: 1rem;
    }

    .trainer-field {
        color: #495057;
        /* Warna lebih gelap */
        font-size: 0.9rem;
        margin-bottom: 15px;
    }

    /* Gaya untuk menonjolkan Bidang */
    .trainer-field strong {
        background-color: #e9f5ee;
        /* Background hijau muda */
        padding: 2px 8px;
        border-radius: 5px;
        font-weight: 600;
        color: #198754;
    }

    .trainer-description {
        font-size: 0.85rem;
        color: #495057;
        text-align: justify;
        min-height: 70px;
    }
</style>

<div class="text-left mb-5">
    <h2 class="text-center text-primary fw-bold mb-4" style="padding: 50px;">Tim Trainer STIFIn </h2>

    <div class="container my-4">
        <div class="row align-items-center">
            <div class="col-md-6 mb-3 mb-md-0">
                <img src="image/training.webp" alt="Trainer STIFIn" class="img-fluid rounded shadow">
            </div>

            <div class="col-md-6">
                <h4 class="fw-bold text-dark mb-3">Apa Sih Trainer STIFIn?</h4>
                <p style="text-align: justify;">
                    **Trainer STIFIn** adalah profesional yang memiliki lisensi dan keahlian untuk memberikan edukasi mendalam, pelatihan, dan sertifikasi mengenai Konsep STIFIn kepada publik dan jaringan di bawahnya (seperti Promotor).
                    Berbeda dengan Promotor yang fokus pada Tes dan penjelasan hasil klien, Trainer fokus pada **pengajaran, pengembangan kurikulum, dan standardisasi kualitas pemahaman Konsep STIFIn.**
                    Tugas utama Trainer meliputi menyelenggarakan *Workshop*, menguji kompetensi, dan memastikan transfer ilmu STIFIn berjalan efektif di setiap jenjang.
                </p>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-success">Jenjang Pendidikan Trainer</h2>
            <p class="text-muted">Tahapan kualifikasi dan otoritas untuk menjadi Trainer resmi STIFIn</p>
        </div>

        <div class="timeline position-relative mx-auto" style="max-width: 900px;">
            <div class="timeline-line"></div>

            <div class="timeline-item left">
                <div class="timeline-dot"></div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="fw-bold text-success">Certified Trainer</h5>
                        <p class="fst-italic mb-2 text-muted">The Master of STIFIn Education</p>
                        <p class="text-muted">
                            **Level tertinggi.** Memiliki otoritas penuh untuk mengembangkan kurikulum, melatih dan mensertifikasi *Licensed Trainer* dan seluruh jenjang di bawahnya. Bertanggung jawab atas kualitas keilmuan STIFIn secara luas.
                        </p>
                    </div>
                </div>
            </div>

            <div class="timeline-item right">
                <div class="timeline-dot"></div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="fw-bold text-success">Licensed Trainer</h5>
                        <p class="fst-italic mb-2 text-muted">Facilitating Advanced STIFIn Workshop</p>
                        <p class="text-muted">
                            Memiliki lisensi untuk menyelenggarakan Workshop (seperti WSL 2 dan materi lanjutan) dan melatih para Promotor. Mereka ahli dalam implementasi konsep STIFIn di berbagai bidang.
                        </p>
                    </div>
                </div>
            </div>

            <div class="timeline-item left">
                <div class="timeline-dot"></div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="fw-bold text-success">Associate Trainer</h5>
                        <p class="fst-italic mb-2 text-muted">Foundation of STIFIn Concept</p>
                        <p class="text-muted">
                            **Level awal resmi** untuk Trainer. Fokus pada penguasaan materi dasar (seperti WSL 1) dan keterampilan mengajar dasar. Berperan membantu *Licensed Trainer* dalam sesi pelatihan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <h3 class="text-center text-dark fw-bold mb-4">Daftar Trainer & Spesialisasi 🎓</h3>
        <p class="text-center text-muted mb-5">Kenali para ahli dan profesional yang akan membimbing Anda.</p>

        <div class="row">
            <?php if (!empty($trainers)): ?>
                <?php foreach ($trainers as $trainer): ?>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="trainer-card">
                            <?php
                            // Asumsi path foto yang benar kini adalah 'image/trainer/'
                            // Silakan sesuaikan jika path Anda berbeda
                            $photo_path = 'admin/assets/img/trainer/' . htmlspecialchars($trainer['foto']);

                            // Placeholder check
                            if (!file_exists($photo_path) || empty($trainer['foto']) || !is_file($photo_path)) {
                                $photo_path = 'path/to/default-avatar.png'; // Ganti dengan path foto default
                            }
                            ?>
                            <img src="<?= $photo_path ?>" alt="Foto <?= htmlspecialchars($trainer['nama']) ?>" class="trainer-photo">

                            <h5 class="trainer-name"><?= htmlspecialchars($trainer['nama']) ?></h5>
                            <p class="trainer-designation"><?= htmlspecialchars($trainer['jabatan']) ?></p>
                            <p class="trainer-field">Bidang: <strong><?= htmlspecialchars($trainer['bidang']) ?></strong></p>

                            <p class="trainer-description text-center">
                                <?= htmlspecialchars(substr($trainer['deskripsi'], 0, 120)) . (strlen($trainer['deskripsi']) > 120 ? '...' : '') ?>
                            </p>

                            <div class="mt-3">
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
                        Data Trainer belum tersedia.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>