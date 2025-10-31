<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel trainer</h1>
    <p class="mb-4">
        DataTables adalah plugin pihak ketiga yang digunakan untuk menampilkan tabel di bawah ini secara interaktif.
        Untuk informasi lebih lanjut mengenai DataTables, silakan kunjungi
        <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.
    </p>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="?page=trainer/tambah" class="btn btn-primary">
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
                            <th>Foto</th>
                            <th>Nama </th>
                            <th>Jabatan</th>
                            <th>Bidang</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = mysqli_query($koneksi, "SELECT * FROM trainer");
                        while ($trainer = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    <img src="assets/img/trainer/<?= $trainer['foto'] ?>"
                                        width="60" height="60" style="object-fit: cover; border-radius: 5px;">
                                </td>
                                <td><?= $trainer['nama']; ?></td>
                                <td><?= $trainer['jabatan']; ?></td>
                                <td><?= $trainer['bidang']; ?></td>
                                <td><?= $trainer['deskripsi']; ?></td>
                                <td>
                                    <a href="?page=trainer/ubah&id_trainer=<?= $trainer['id_trainer']; ?>" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="?page=trainer/hapus&id_trainer=<?= $trainer['id_trainer']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">
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