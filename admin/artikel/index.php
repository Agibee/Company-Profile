<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Tabel Artikel</h1>
    <p class="mb-4">
        DataTables digunakan untuk menampilkan tabel artikel secara interaktif.
    </p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="?page=artikel/tambah" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Data
            </a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Tanggal Upload</th>
                            <th>Tanggal Update</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../koneksi.php';
                        $no = 1;
                        $sql = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY id_artikel ASC");

                        while ($artikel = mysqli_fetch_assoc($sql)) {
                            $judul  = htmlspecialchars($artikel['judul']);
                            $isi    = htmlspecialchars(substr(strip_tags($artikel['isi']), 0, 100)) . '...';
                            $gambar = !empty($artikel['gambar']) ? $artikel['gambar'] : 'default.jpg';
                            $tglUpload = date('d M Y H:i', strtotime($artikel['tanggal_upload']));
                            $tglUpdate = date('d M Y H:i', strtotime($artikel['tanggal_update']));
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center">
                                    <img src="assets/img/artikel/<?= $gambar; ?>" alt="<?= $judul; ?>" width="100" class="rounded shadow-sm">
                                </td>
                                <td><?= $judul; ?></td>
                                <td><?= $isi; ?></td>
                                <td class="text-center"><?= $tglUpload; ?></td>
                                <td class="text-center"><?= $tglUpdate; ?></td>
                                <td class="text-center">
                                    <a href="?page=artikel/ubah&id_artikel=<?= $artikel['id_artikel']; ?>" class="btn btn-success btn-sm" title="Ubah">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="?page=artikel/hapus&id_artikel=<?= $artikel['id_artikel']; ?>"
                                        class="btn btn-danger btn-sm"
                                        title="Hapus"
                                        onclick="return confirm('Yakin ingin menghapus artikel ini?');">
                                        <i class="fa fa-trash"></i>
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