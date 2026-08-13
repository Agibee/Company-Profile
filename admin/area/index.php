<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Area</h1>
    <p class="mb-4">DataTables adalah plugin pihak ketiga yang digunakan untuk menampilkan tabel di bawah ini secara interaktif.
        Untuk informasi lebih lanjut mengenai DataTables, silakan kunjungi <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="?page=area/tambah" class="btn btn-success"> <i class="fa 
                        fa-plus"> Tambah Data</i>
                </a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama area</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $area = mysqli_query($koneksi, "SELECT * FROM area ORDER BY id_area ASC");
                        while ($data = mysqli_fetch_array($area)) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama_area'] ?></td>
                                <td>
                                    <a href="?page=area/ubah&id_area=<?= $data['id_area'] ?>" class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="?page=area/hapus&id_area=<?= $data['id_area'] ?>"
                                        class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus area <?= addslashes($data['nama_area']) ?>?')">
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