<?php
$id_area = $_GET['id_area'];
$sql = mysqli_query($koneksi, "SELECT * FROM area WHERE
 id_area = '$id_area'");
$ubah = mysqli_fetch_array($sql);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h5><b>Form Ubah area</b></h5>
        </div>
        <div class="card-body">
            <form action="?page=area/proses_ubah" method="post">
                <input type="hidden" name="id_area" value="<?= $ubah['id_area'] ?>">
                <div class="row">
                    <div class="cold-md-6">
                        <div class="form-group">
                            <label for="">Nama area</label>
                            <input type="text" name="nama_area" value="<?= $ubah['nama_area'] ?>"
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