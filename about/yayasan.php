<!-- CSS -->
<style>
    .timeline {
        position: relative;
        padding: 2rem 0;
    }

    .timeline-line {
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 4px;
        height: 100%;
        background: rgba(25, 135, 84, 0.3);
        border-radius: 4px;
    }

    .timeline-item {
        position: relative;
        width: 50%;
        padding: 1rem 2rem;
    }

    .timeline-item.left {
        left: 0;
        text-align: right;
    }

    .timeline-item.right {
        left: 50%;
    }

    .timeline-dot {
        position: absolute;
        top: 30px;
        left: 100%;
        transform: translate(-50%, -50%);
        width: 20px;
        height: 20px;
        background: #198754;
        border-radius: 50%;
    }

    .timeline-item.right .timeline-dot {
        left: 0;
        transform: translate(-50%, -50%);
    }

    /* Responsif (mobile 1 kolom) */
    @media (max-width: 767px) {
        .timeline-line {
            left: 8px;
            transform: none;
        }

        .timeline-item {
            width: 100%;
            padding-left: 2.5rem;
            text-align: left !important;
        }

        .timeline-item.right {
            left: 0;
        }

        .timeline-dot {
            left: 0;
            transform: translate(-50%, -50%);
        }
    }
</style>

<section class="bg-success bg-opacity-10 py-4 text-center"
    style="margin-top: 0; width:100%; height:100px;">
</section>

<div class="container py-5">
    <!-- Judul Halaman -->
    <div class="text-center mb-5">
        <h2 class="text-success fw-bold">Yayasan STIFIn</h2>
        <img src="image/yayasan_stifin.webp" alt="" style="width:20%;">
        <br><br>
        <p class="text-muted">Yayasan yang bergerak di bidang sosial, pendidikan, dan keagamaan berdasarkan Konsep STIFIn.</p>
    </div>

    <!-- Tentang Yayasan -->
    <div class="mb-5 mx-auto" style="max-width: 800px;">
        <h4 class="fw-bold mb-3 text-center">Tentang Yayasan STIFIn</h4>
        <p class="text-muted text-justify">
            Yayasan STIFIn merupakan yayasan yang bergerak dalam bidang sosial, pendidikan, dan keagamaan berdasarkan Konsep STIFIn.
            Konsep ini menjadi landasan dalam mengembangkan potensi manusia secara menyeluruh — baik sebagai individu maupun makhluk sosial —
            dengan pendekatan yang <strong>Simple, Akurat, dan Aplikatif</strong>.
        </p>
    </div>

    <!-- Visi dan Misi -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <h4 class="fw-bold text-success mb-3 text-center">Visi</h4>
                    <p class="text-muted text-center">
                        Menjadikan Konsep STIFIn sebagai konsep yang paling mendekati derivasi Al-Qur'an,
                        sehingga layak menjadi <strong>mainstream platform Pengembangan SDM hingga akhir zaman</strong>.
                    </p>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h4 class="fw-bold text-success mb-3 text-center">Misi</h4>
                    <ul class="text-muted text-justify">
                        <li class="mb-3">
                            Menjadikan alat <strong>Tes STIFIn</strong> sebagai alat tes terbaik dalam menentukan jenis kecerdasan
                            dan personaliti seseorang dibandingkan dengan alat tes lainnya.
                        </li>
                        <li class="mb-3">
                            Menjadikan <strong>Konsep STIFIn</strong> sebagai pemodelan, skema, dan algoritma terbaik dalam menjelaskan manusia
                            sebagai makhluk individu maupun makhluk sosial.
                        </li>
                        <li class="mb-3">
                            Berperan besar dalam program-program kebermanfaatan yang berdampak strategis dalam meningkatkan spiritualitas umat dan masyarakat.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Roadmap Sejarah STIFIn -->
    <div class="text-center mb-5">
        <h4 class="fw-bold text-success mb-4">Roadmap Sejarah STIFIn</h4>
    </div>

    <div class="timeline position-relative mx-auto" style="max-width: 900px;">
        <!-- Garis Tengah -->
        <div class="timeline-line"></div>

        <!-- Item 1 -->
        <div class="timeline-item left">
            <div class="timeline-dot"></div>
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold text-success">1999 – Kubik Leadership</h5>
                    <p class="text-muted mb-0">
                        Konsep awal STIFIn mulai ditulis menjadi buku dan dijadikan dasar berdirinya perusahaan pengembangan SDM bernama
                        <strong>Kubik Leadership</strong>.
                    </p>
                </div>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="timeline-item right">
            <div class="timeline-dot"></div>
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold text-success">2006 – Konsep STIFIn</h5>
                    <p class="text-muted mb-0">
                        Pengembangan dari konsep STIF yang kemudian disempurnakan menjadi <strong>STIFIn</strong>.
                    </p>
                </div>
            </div>
        </div>

        <!-- Item 3 -->
        <div class="timeline-item left">
            <div class="timeline-dot"></div>
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold text-success">2009 – STIFIn Menjadi PT</h5>
                    <p class="text-muted mb-0">
                        STIFIn berkembang menjadi badan usaha berbentuk <strong>Perseroan Terbatas (PT)</strong> untuk memperluas penerapan konsepnya.
                    </p>
                </div>
            </div>
        </div>

        <!-- Item 4 -->
        <div class="timeline-item right">
            <div class="timeline-dot"></div>
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold text-success">2012 – Rumah Qur’an STIFIn</h5>
                    <p class="text-muted mb-0">
                        Sebagai bentuk <em>CSR</em> dan bukti nyata bahwa konsep STIFIn aplikatif dalam bidang pendidikan dan keagamaan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Item 5 -->
        <div class="timeline-item left">
            <div class="timeline-dot"></div>
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold text-success">2014 – PT Menjadi Yayasan</h5>
                    <p class="text-muted mb-0">
                        STIFIn resmi berubah bentuk dari PT menjadi <strong>Yayasan STIFIn</strong> untuk fokus pada misi sosial, pendidikan, dan spiritualitas umat.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>