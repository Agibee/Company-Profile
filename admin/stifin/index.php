<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Konsep STIFIn</h1>
    <p class="mb-4">
        Data ini menampilkan daftar konsep STIFIn berdasarkan tipe, judul, deskripsi singkat, dan gambar.
        Untuk informasi lebih lanjut, kamu bisa menambah, mengubah, atau menghapus data.
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="?page=stifin/tambah" class="btn btn-primary">
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
                            <th>Gambar</th>
                            <th>Tipe</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = mysqli_query($koneksi, "SELECT * FROM konsep_stifin ORDER BY id ASC");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <?php if (!empty($data['gambar'])) { ?>
                                        <img src="assets/img/stifin/<?= $data['gambar'] ?>" width="80" class="img-thumbnail">
                                    <?php } else { ?>
                                        <span class="text-muted">Tidak ada</span>
                                    <?php } ?>
                                </td>
                                <td><?= htmlspecialchars($data['tipe']) ?></td>
                                <td><?= htmlspecialchars($data['judul']) ?></td>
                                <td><?= substr($data['deskripsi'], 0, 100) ?>...</td>
                                <td>
                                    <a href="?page=stifin/ubah&id=<?= $data['id'] ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="hapus.php?id=<?= $data['id'] ?>&tabel=konsep_stifin" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin hapus data ini?')"><i class="fa fa-trash"></i></i></a>
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
<!-- End of Page Content -->