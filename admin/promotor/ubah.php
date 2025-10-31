<?php
$id_promotor = $_GET['id_promotor'];

// ambil data promotor berdasarkan id
$query = mysqli_query($koneksi, "SELECT * FROM promotor WHERE id_promotor='$id_promotor'");
$data = mysqli_fetch_array($query);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Form Ubah Promotor</h5>
        </div>

        <div class="card-body">
            <form action="?page=promotor/proses_ubah" method="post">
                <input type="hidden" name="id_promotor" value="<?= $data['id_promotor']; ?>">

                <div class="row">
                    <!-- Nama promotor -->
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="nama_promotor">Nama Promotor</label>
                            <input type="text" name="nama_promotor" id="nama_promotor"
                                value="<?= $data['nama_promotor']; ?>"
                                class="form-control" required>
                        </div>
                    </div>

                    <!-- Area -->
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="id_area">Area</label>
                            <select name="id_area" id="id_area" class="form-control" required>
                                <option value="">-- Pilih Area --</option>
                                <?php
                                $area = mysqli_query($koneksi, "SELECT * FROM area ORDER BY nama_area ASC");
                                while ($a = mysqli_fetch_array($area)) {
                                    $selected = ($a['id_area'] == $data['id_area']) ? 'selected' : '';
                                    echo "<option value='{$a['id_area']}' $selected>{$a['nama_area']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="no_telepon">Telepon</label>
                            <input type="text" name="no_telepon" id="no_telepon"
                                value="<?= $data['no_telepon']; ?>"
                                class="form-control" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-3">
                    <i class="fa fa-save"></i> Update
                </button>
                <a href="?page=promotor/index" class="btn btn-secondary mt-3">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->