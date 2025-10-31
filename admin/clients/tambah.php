<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Form Tambah Client</h5>
        </div>

        <div class="card-body">
            <form action="?page=clients/proses_tambah" method="post">
                <div class="row">

                    <!-- Nama Client -->
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="nama_client">Nama Client</label>
                            <input type="text" name="nama_client" id="nama_client" class="form-control" required>
                        </div>
                    </div>

                    <!-- Promotor -->
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="id_promotor">Promotor</label>
                            <select name="id_promotor" id="id_promotor" class="form-control" required>
                                <option value="">-- Pilih Promotor --</option>
                                <?php
                                $promotor = mysqli_query($koneksi, "SELECT * FROM promotor ORDER BY nama_promotor ASC");
                                while ($data = mysqli_fetch_array($promotor)) {
                                    echo "<option value='{$data['id_promotor']}'>{$data['nama_promotor']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Cabang -->
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="id_cabang">Cabang</label>
                            <select name="id_cabang" id="id_cabang" class="form-control" required>
                                <option value="">-- Pilih Cabang --</option>
                                <?php
                                $cabang = mysqli_query($koneksi, "SELECT * FROM cabang ORDER BY nama_cabang ASC");
                                while ($data = mysqli_fetch_array($cabang)) {
                                    echo "<option value='{$data['id_cabang']}'>{$data['nama_cabang']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Tanggal Tes -->
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="tanggal_tes">Tanggal Tes</label>
                            <input type="date" name="tanggal_tes" id="tanggal_tes" class="form-control" required>
                        </div>
                    </div>

                    <!-- Hasil STIFIn -->
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="hasil_stifin">Hasil STIFIn</label>
                            <select name="hasil_stifin" id="hasil_stifin" class="form-control" required>
                                <option value="">-- Pilih Hasil --</option>
                                <option value="Sensing">Sensing</option>
                                <option value="Intuition">Intuition</option>
                                <option value="Thinking">Thinking</option>
                                <option value="Feeling">Feeling</option>
                                <option value="Insting">Insting</option>
                            </select>
                        </div>
                    </div>

                    <!-- Catatan -->
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <textarea name="catatan" id="catatan" class="form-control" rows="3"></textarea>
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-save"></i> Simpan
                </button>
                <a href="?page=clients/index" class="btn btn-secondary mt-3">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->