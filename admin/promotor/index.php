<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Promotor</h1>
    <p class="mb-4">
        DataTables adalah plugin pihak ketiga yang digunakan untuk menampilkan tabel di bawah ini secara interaktif.
        Untuk informasi lebih lanjut mengenai DataTables, silakan kunjungi
        <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.
    </p>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="?page=promotor/tambah" class="btn btn-primary">
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
                            <th>Nama Promotor</th>
                            <th>Kode Promotor</th>
                            <th>Area</th>
                            <th>Nomor Telepon</th>
                            <th>Terdaftar Sejak</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = mysqli_query($koneksi, "
                                SELECT promotor.*, area.nama_area 
                                FROM promotor
                                LEFT JOIN area ON promotor.id_area = area.id_area
                                ORDER BY area.nama_area ASC
                            ");
                        while ($promotor = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $promotor['nama_promotor']; ?></td>
                                <td><?= $promotor['kode_promotor']; ?></td>
                                <td><?= $promotor['nama_area']; ?></td>
                                <td><?= $promotor['no_telepon']; ?></td>
                                <td><?= $promotor['created_at']; ?></td>
                                <td>
                                    <a href="?page=promotor/ubah&id_promotor=<?= $promotor['id_promotor']; ?>" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="hapus.php?id_promotor=<?= $promotor['id_promotor']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">
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

    <!-- DataTables Script -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "pageLength": 5,
                "lengthMenu": [5, 10, 25, 50],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Tidak ada data yang ditemukan",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada data tersedia",
                    "infoFiltered": "(difilter dari total _MAX_ data)"
                }
            });
        });
    </script>

</div>
<!-- /.container-fluid -->