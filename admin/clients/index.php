<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Client</h1>
    <p class="mb-4">Berikut adalah data client yang telah mengikuti tes STIFIn.</p>
    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="?page=clients/tambah" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data
                </a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Client</th>
                            <th>Promotor</th>
                            <th>Cabang</th>
                            <th>Tanggal Tes</th>
                            <th>Hasil STIFIn</th>
                            <th>Catatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = mysqli_query($koneksi, "
                            SELECT clients.*, promotor.nama_promotor, cabang.nama_cabang 
                            FROM clients
                            LEFT JOIN promotor ON clients.id_promotor = promotor.id_promotor
                            LEFT JOIN cabang ON clients.id_cabang = cabang.id_cabang
                            ORDER BY clients.tanggal_tes ASC
                        ");
                        while ($client = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $client['nama_client']; ?></td>
                                <td><?= $client['nama_promotor']; ?></td>
                                <td><?= $client['nama_cabang']; ?></td>
                                <td><?= $client['tanggal_tes']; ?></td>
                                <td><?= $client['hasil_stifin']; ?></td>
                                <td><?= $client['catatan']; ?></td>
                                <td>
                                    <a href="?page=clients/ubah&id_client=<?= $client['id_client']; ?>" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="hapus.php?id_client=<?= $client['id_client']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->