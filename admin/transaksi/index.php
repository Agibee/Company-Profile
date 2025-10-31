<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Transaksi</h1>
    <p class="mb-4">
        DataTables adalah plugin pihak ketiga yang digunakan untuk menampilkan tabel di bawah ini secara interaktif.
        Untuk informasi lebih lanjut mengenai DataTables, silakan kunjungi
        <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.
    </p>

    <div class="card shadow mb-4">
        <div class="card-body">

            <!-- Filter -->
            <form method="GET" class="row g-3 mb-4" enctype="multipart/form-data">
                <input type="hidden" name="page" value="transaksi">
                <div class="col-md-3">
                    <label for="status_bayar" class="form-label">Status Bayar</label>
                    <select name="filter_status" id="status_bayar" class="form-control">
                        <option value="">Semua</option>
                        <option value="Pending" <?= (isset($_GET['filter_status']) && $_GET['filter_status'] == 'Pending') ? 'selected' : '' ?>>Pending</option>
                        <option value="Diterima" <?= (isset($_GET['filter_status']) && $_GET['filter_status'] == 'Diterima') ? 'selected' : '' ?>>Diterima</option>
                        <option value="Ditolak" <?= (isset($_GET['filter_status']) && $_GET['filter_status'] == 'Ditolak') ? 'selected' : '' ?>>Ditolak</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="tgl_mulai" class="form-label">Dari Tanggal</label>
                    <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control" value="<?= $_GET['tgl_mulai'] ?? '' ?>">
                </div>
                <div class="col-md-3">
                    <label for="tgl_selesai" class="form-label">Sampai Tanggal</label>
                    <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control" value="<?= $_GET['tgl_selesai'] ?? '' ?>">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="fa fa-filter"></i> Filter
                    </button>
                    <a href="?page=transaksi/index" class="btn btn-secondary">
                        <i class="fa fa-sync"></i> Reset
                    </a>
                </div>
            </form>

            <?php
            include "koneksi.php";

            // ===== KONFIGURASI PAGINATION =====
            $limit = 5;
            $page = isset($_GET['page_no']) ? (int)$_GET['page_no'] : 1;
            $start = ($page - 1) * $limit;
            $no = $start + 1;

            // ===== FILTER KONDISI =====
            $where = "WHERE 1=1";

            if (!empty($_GET['filter_status'])) {
                $status = mysqli_real_escape_string($koneksi, $_GET['filter_status']);
                $where .= " AND transaksi.status_bayar = '$status'";
            }

            if (!empty($_GET['tgl_mulai']) && !empty($_GET['tgl_selesai'])) {
                $tgl_mulai = mysqli_real_escape_string($koneksi, $_GET['tgl_mulai']);
                $tgl_selesai = mysqli_real_escape_string($koneksi, $_GET['tgl_selesai']);
                $where .= " AND DATE(transaksi.tgl_transaksi) BETWEEN '$tgl_mulai' AND '$tgl_selesai'";
            } elseif (!empty($_GET['tgl_mulai'])) {
                $tgl_mulai = mysqli_real_escape_string($koneksi, $_GET['tgl_mulai']);
                $where .= " AND DATE(transaksi.tgl_transaksi) >= '$tgl_mulai'";
            } elseif (!empty($_GET['tgl_selesai'])) {
                $tgl_selesai = mysqli_real_escape_string($koneksi, $_GET['tgl_selesai']);
                $where .= " AND DATE(transaksi.tgl_transaksi) <= '$tgl_selesai'";
            }

            // ===== QUERY DATA TRANSAKSI =====
            $sql = mysqli_query($koneksi, "
                SELECT transaksi.*, user.nama_lengkap 
                FROM transaksi 
                JOIN user ON transaksi.id_user = user.id_user
                $where
                ORDER BY transaksi.tgl_transaksi DESC
                LIMIT $start, $limit
            ");

            // ===== HITUNG TOTAL DATA =====
            $result = mysqli_query($koneksi, "
                SELECT COUNT(*) AS total 
                FROM transaksi 
                JOIN user ON transaksi.id_user = user.id_user
                $where
            ");
            $total = mysqli_fetch_assoc($result)['total'];
            $total_pages = ceil($total / $limit);

            // Simpan parameter filter biar pagination dan cetak laporan tetap bawa filter
            $query_params = "";
            if (!empty($_GET['filter_status'])) $query_params .= "&filter_status=" . $_GET['filter_status'];
            if (!empty($_GET['tgl_mulai'])) $query_params .= "&tgl_mulai=" . $_GET['tgl_mulai'];
            if (!empty($_GET['tgl_selesai'])) $query_params .= "&tgl_selesai=" . $_GET['tgl_selesai'];
            ?>

            <!-- Tombol Cetak Laporan -->
            <div class="mb-3">
                <a href="?page=transaksi/cetak_laporan<?= $query_params ?>" target="_blank" class="btn btn-primary">
                    <i class="fa fa-print"></i> Cetak Laporan
                </a>
            </div>

            <!-- Tabel Transaksi -->
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengguna</th>
                            <th>Tanggal Transaksi</th>
                            <th>Alamat</th>
                            <th>Total Bayar</th>
                            <th>Bukti Bayar</th>
                            <th>Status Bayar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($sql) > 0): ?>
                            <?php while ($data = mysqli_fetch_assoc($sql)): ?>
                                <tr>
                                    <form action="?page=transaksi/proses" method="POST">
                                        <td><?= $no++ ?></td>
                                        <td><?= htmlspecialchars($data['nama_lengkap']) ?></td>
                                        <td><?= date('d-m-Y', strtotime($data['tgl_transaksi'])) ?></td>
                                        <td><?= htmlspecialchars($data['alamat']) ?></td>
                                        <td>Rp <?= number_format($data['total_harga'], 0, ',', '.') ?></td>
                                        <td>
                                            <?php if (!empty($data['bukti_bayar'])): ?>
                                                <img src="/E-Commerce/assets/img/<?= $data['bukti_bayar'] ?>" width="100" height="100" alt="">
                                            <?php else: ?>
                                                <span class="text-muted">Belum ada bukti</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <select name="status_bayar[<?= $data['id_transaksi'] ?>]" class="form-control">
                                                <option value="Pending" <?= $data['status_bayar'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                                <option value="Diterima" <?= $data['status_bayar'] == 'Diterima' ? 'selected' : '' ?>>Diterima</option>
                                                <option value="Ditolak" <?= $data['status_bayar'] == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin menyimpan perubahan status ini?')">
                                                <i class="fa fa-check"></i> <b>Proses</b>
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center text-muted">Tidak ada data ditemukan</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=transaksi&page_no=<?= $page - 1 ?><?= $query_params ?>">Previous</a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                <a class="page-link" href="?page=transaksi&page_no=<?= $i ?><?= $query_params ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($page < $total_pages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=transaksi&page_no=<?= $page + 1 ?><?= $query_params ?>">Next</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
</div>
<!-- End of Main Content -->