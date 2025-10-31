<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Kerjasama</h1>
    <p class="mb-4">
        Berikut daftar perusahaan yang bekerja sama dengan kami.
    </p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="?page=kerjasama/tambah" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data
                </a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th>Alamat</th>
                            <th>No. Telp</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = mysqli_query($koneksi, "SELECT * FROM kerjasama");
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama_perusahaan'] ?></td>
                                <td><?= $row['alamat'] ?></td>
                                <td><?= $row['no_telp'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td>
                                    <?php if ($row['logo']) { ?>
                                        <img src="assets/img/kerjasama/<?= $row['logo'] ?>" width="70">
                                    <?php } else { ?>
                                        <i>Tidak ada logo</i>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="?page=kerjasama/ubah&id_kerjasama=<?= $row['id_kerjasama'] ?>" class="btn btn-success btn-sm">Ubah</a>
                                    <a href="?page=kerjasama/hapus&id_kerjasama=<?= $row['id_kerjasama'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>