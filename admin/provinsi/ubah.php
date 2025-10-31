<?php
$id_provinsi = $_GET['id_provinsi'];
$sql = mysqli_query($koneksi, "SELECT * FROM provinsi WHERE
 id_provinsi = '$id_provinsi'");
$ubah = mysqli_fetch_array($sql);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h5><b>Form Ubah provinsi</b></h5>
        </div>
        <div class="card-body">
            <form action="?page=provinsi/proses_ubah" method="post">
                <input type="hidden" name="id_provinsi" value="<?= $ubah['id_provinsi'] ?>">
                <div class="row">
                    <div class="cold-md-6">
                        <div class="form-group">
                            <label for="">Nama provinsi</label>
                            <input type="text" name="nama_provinsi" value="<?= $ubah['nama_provinsi'] ?>"
                                class="form-control" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->