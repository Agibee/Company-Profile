<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Form Tambah Cabang</h5>
        </div>

        <div class="card-body">
            <form action="?page=cabang/proses_tambah" method="post">
                <div class="row">
                    <!-- Nama Cabang -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_cabang">Nama Cabang</label>
                            <input type="text" name="nama_cabang" id="nama_cabang" class="form-control" required>
                        </div>
                    </div>

                    <!-- Kota -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_kota">Kota</label>
                            <select name="id_kota" id="id_kota" class="form-control" required>
                                <option value="">-- Pilih Kota --</option>
                                <?php
                                $kota = mysqli_query($koneksi, "SELECT * FROM kota ORDER BY nama_kota ASC");
                                while ($data = mysqli_fetch_array($kota)) {
                                    echo "<option value='{$data['id_kota']}'>{$data['nama_kota']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap cabang..." required></textarea>
                        </div>
                    </div>

                    <!-- Jam Buka -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jam_buka">Jam Buka</label>
                            <input type="time" name="jam_buka" id="jam_buka" class="form-control" required>
                        </div>
                    </div>

                    <!-- Jam Tutup -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jam_tutup">Jam Tutup</label>
                            <input type="time" name="jam_tutup" id="jam_tutup" class="form-control" required>
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" name="telepon" id="telepon" class="form-control" required>
                        </div>
                    </div>

                    <!-- Lokasi (Google Maps link atau koordinat) -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Link Google Maps / Koordinat" required>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="Buka">Buka</option>
                                <option value="Tutup">Tutup</option>
                                <option value="Byappointment">By Appointment</option>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-save"></i> Simpan
                </button>
                <a href="?page=cabang/index" class="btn btn-secondary mt-3">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->