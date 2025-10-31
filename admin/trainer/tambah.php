<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Form Tambah Trainer</h5>
        </div>

        <div class="card-body">
            <form action="?page=trainer/proses_tambah" method="post" enctype="multipart/form-data">
                <div class="row">
                    <!-- Nama -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Trainer</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama trainer" required>
                        </div>
                    </div>

                    <!-- Jabatan -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Masukkan jabatan trainer" required>
                        </div>
                    </div>

                    <!-- Bidang -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bidang">Bidang</label>
                            <input type="text" name="bidang" id="bidang" class="form-control" placeholder="Masukkan bidang keahlian" required>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" placeholder="Tuliskan deskripsi singkat tentang trainer" required></textarea>
                        </div>
                    </div>

                    <!-- Foto -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control" accept="image/*" required>
                            <small class="text-muted">Format: JPG, PNG, atau JPEG. Maksimal 2MB.</small>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-save"></i> Simpan
                </button>
                <a href="?page=trainer/index" class="btn btn-secondary mt-3">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->