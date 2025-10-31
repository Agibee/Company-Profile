<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Kota</h1>
    <p class="mb-4">DataTables adalah plugin pihak ketiga yang digunakan untuk menampilkan tabel di bawah ini secara interaktif.
        Untuk informasi lebih lanjut mengenai DataTables, silakan kunjungi <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="?page=kota/tambah" class="btn btn-primary"> <i class="fa 
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
                            <th>Nama Provinsi</th>
                            <th>Nama Kota</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = mysqli_query($koneksi, "SELECT * FROM kota LEFT JOIN provinsi
             ON kota.id_provinsi = provinsi.id_provinsi");

                        while ($kota = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $kota['nama_provinsi'] ?></td>
                                <td><?php echo $kota['nama_kota'] ?></td>
                                <td>
                                    <a href="?page=kota/ubah&id_kota=<?php echo $kota['id_kota'] ?>" class="btn btn-success">Ubah</a>
                                    <a href="hapus.php?id_kota=<?php echo $kota['id_kota'] ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <script>
                $(document).ready(function() {
                    $('#dataTable').DataTable({
                        "pageLength": 5, // jumlah baris per halaman
                        "lengthMenu": [5, 10, 25, 50], // opsi dropdown jumlah baris
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
            <!-- /.container-fluid -->
        </div>