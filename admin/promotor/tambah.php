<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Form Tambah promotor</h5>
        </div>

        <div class="card-body">
            <form action="?page=promotor/proses_tambah" method="post">
                <div class="row">
                    <!-- Nama promotor -->
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="nama_promotor">Nama Promotor</label>
                            <input type="text" name="nama_promotor" id="nama_promotor" class="form-control" required>
                        </div>
                    </div>

                    <!-- area -->
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="id_area">area</label>
                            <select name="id_area" id="id_area" class="form-control" required>
                                <option value="">-- Pilih area --</option>
                                <?php
                                $area = mysqli_query($koneksi, "SELECT * FROM area ORDER BY nama_area ASC");
                                while ($data = mysqli_fetch_array($area)) {
                                    echo "<option value='{$data['id_area']}'>{$data['nama_area']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <!-- Telepon -->
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="no_telepon">Telepon</label>
                            <input type="text" name="no_telepon" id="no_telepon" class="form-control" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-save"></i> Simpan
                </button>
                <a href="?page=promotor/index" class="btn btn-secondary mt-3">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->