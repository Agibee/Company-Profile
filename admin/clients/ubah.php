<?php
$id_client = $_GET['id_client'];

// Ambil data client berdasarkan id
$query = mysqli_query($koneksi, "SELECT * FROM clients WHERE id_client='$id_client'");
$data = mysqli_fetch_array($query);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Form Ubah Client</h5>
        </div>

        <div class="card-body">
            <form action="?page=clients/proses_ubah" method="post">
                <input type="hidden" name="id_client" value="<?= $data['id_client']; ?>">

                <div class="row">

                    <!-- Nama Client -->
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="nama_client">Nama Client</label>
                            <input type="text" name="nama_client" id="nama_client"
                                value="<?= $data['nama_client']; ?>"
                                class="form-control" required>
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
                                while ($p = mysqli_fetch_array($promotor)) {
                                    $selected = ($p['id_promotor'] == $data['id_promotor']) ? 'selected' : '';
                                    echo "<option value='{$p['id_promotor']}' $selected>{$p['nama_promotor']}</option>";
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
                                while ($c = mysqli_fetch_array($cabang)) {
                                    $selected = ($c['id_cabang'] == $data['id_cabang']) ? 'selected' : '';
                                    echo "<option value='{$c['id_cabang']}' $selected>{$c['nama_cabang']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Tanggal Tes -->
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="tanggal_tes">Tanggal Tes</label>
                            <input type="date" name="tanggal_tes" id="tanggal_tes"
                                value="<?= $data['tanggal_tes']; ?>"
                                class="form-control" required>
                        </div>
                    </div>

                    <!-- Hasil STIFIn -->
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="hasil_stifin">Hasil STIFIn</label>
                            <select name="hasil_stifin" id="hasil_stifin" class="form-control" required>
                                <option value="">-- Pilih Hasil --</option>
                                <option value="Sensing" <?= ($data['hasil_stifin'] == 'Sensing') ? 'selected' : ''; ?>>Sensing</option>
                                <option value="Intuition" <?= ($data['hasil_stifin'] == 'Intuition') ? 'selected' : ''; ?>>Intuition</option>
                                <option value="Thinking" <?= ($data['hasil_stifin'] == 'Thinking') ? 'selected' : ''; ?>>Thinking</option>
                                <option value="Feeling" <?= ($data['hasil_stifin'] == 'Feeling') ? 'selected' : ''; ?>>Feeling</option>
                                <option value="Insting" <?= ($data['hasil_stifin'] == 'Insting') ? 'selected' : ''; ?>>Insting</option>
                            </select>
                        </div>
                    </div>

                    <!-- Catatan -->
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <textarea name="catatan" id="catatan" class="form-control" rows="3"><?= $data['catatan']; ?></textarea>
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-success mt-3">
                    <i class="fa fa-save"></i> Update
                </button>
                <a href="?page=clients/index" class="btn btn-secondary mt-3">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->