<?php
$id_kota = $_GET['id_kota'];
$sql = mysqli_query($koneksi, "SELECT * FROM kota WHERE id_kota='$id_kota'");
$edit = mysqli_fetch_array($sql);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Kota</h1>

    <!-- Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="m-0 font-weight-bold text-primary">
                <a href="?page=kota/index" class="btn btn-warning">
                    <i class="fa fa-share mr-1"></i> Kembali
                </a>
            </h4>
        </div>

        <div class="card-body">
            <form action="?page=kota/prosesubah" method="post" enctype="multipart/form-data" class="multi-form">
                <input type="hidden" name="id_kota" value="<?= $edit['id_kota'] ?>">

                <div class="form-group">
                    <label for="id_provinsi" class="mb-3">Nama Provinsi</label>
                    <select name="id_provinsi" id="id_provinsi" class="form-control" required>
                        <?php
                        $kat = mysqli_query($koneksi, "SELECT * FROM provinsi");
                        while ($k = mysqli_fetch_array($kat)) {
                            $selected = ($edit['id_provinsi'] == $k['id_provinsi']) ? 'selected' : '';
                            echo "<option value='{$k['id_provinsi']}' $selected>{$k['nama_provinsi']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama_kota" class="mb-3">Nama Kota</label>
                    <input type="text" name="nama_kota" id="nama_kota" value="<?= $edit['nama_kota'] ?>"
                        class="form-control" required>
                </div>

                <div>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check mr-1"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>