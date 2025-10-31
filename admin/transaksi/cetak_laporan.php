<div class="container mt-4">
    <div class="text-center border-bottom border-primary mb-4 pb-2">
        <h4 class="text-primary fw-bold mb-1">LAPORAN TRANSAKSI</h4>
        <p class="mb-0">E-Commerce System</p>
        <small><?= date('d F Y, H:i') ?></small>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Tanggal Transaksi</th>
                        <th>Alamat</th>
                        <th>Total Bayar</th>
                        <th>Status Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = mysqli_query($koneksi, "
                    SELECT transaksi.*, user.nama_lengkap 
                    FROM transaksi 
                    JOIN user ON transaksi.id_user = user.id_user
                    ORDER BY transaksi.tgl_transaksi DESC");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= htmlspecialchars($data['nama_lengkap']) ?></td>
                            <td><?= date('d-m-Y', strtotime($data['tgl_transaksi'])) ?></td>
                            <td><?= htmlspecialchars($data['alamat']) ?></td>
                            <td>Rp <?= number_format($data['total_harga'], 0, ',', '.') ?></td>
                            <td class="text-center">
                                <?php if ($data['status_bayar'] == 'Pending'): ?>
                                    <span class="badge bg-warning text-dark">Pending</span>
                                <?php elseif ($data['status_bayar'] == 'Diterima'): ?>
                                    <span class="badge bg-success">Diterima</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Ditolak</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="text-end mt-5">
                <p><strong>Tanggal Cetak:</strong> <?= date('d/m/Y') ?></p>
                <p><strong>Admin,</strong></p>
                <br><br>
                <p><u>________________________</u></p>
            </div>

            <div class="text-center mt-4 no-print">
                <button onclick="window.print()" class="btn btn-primary me-2">
                    <i class="fa fa-print"></i> Cetak
                </button>
                <a href="index.php" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>