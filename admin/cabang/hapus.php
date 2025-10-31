<?php
// include '../../koneksi.php'; // sesuaikan path koneksi kamu
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Trainer</h1>
    <p class="mb-4">
        DataTables digunakan untuk menampilkan daftar Trainer STIFIn secara interaktif.
        Untuk informasi lebih lanjut, kunjungi
        <a target="_blank" href="https://datatables.net">dokumentasi DataTables</a>.
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Data Trainer</h6>
            <a href="?page=trainer/tambah" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr class="text-center">
                            <th width="5%">No</th>
                            <th>Foto</th>
                            <th>Nama Trainer</th>
                            <th>Jabatan</th>
                            <th>Bidang</th>
                            <th>Deskripsi</th>
                            <th width="12%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM trainer ORDER BY nama ASC");
                        while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center">
                                    <?php if (!empty($row['foto'])) { ?>
                                        <img src="admin/image/<?= $row['foto']; ?>" alt="<?= $row['nama']; ?>" width="60" class="rounded">
                                    <?php } else { ?>
                                        <img src="assets/img/no-image.png" alt="No Image" width="60" class="rounded">
                                    <?php } ?>
                                </td>
                                <td><?= htmlspecialchars($row['nama']); ?></td>
                                <td><?= htmlspecialchars($row['jabatan']); ?></td>
                                <td><?= htmlspecialchars($row['bidang']); ?></td>
                                <td><?= htmlspecialchars($row['deskripsi']); ?></td>
                                <td class="text-center">
                                    <a href="?page=trainer/ubah&id=<?= $row['id_trainer']; ?>" class="btn btn-success btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="trainer/hapus.php?hapus=<?= $row['id_trainer']; ?>"
                                        class="btn btn-danger btn-sm"
                                        title="Hapus"
                                        onclick="return confirm('Yakin ingin menghapus trainer ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End of Page Content -->