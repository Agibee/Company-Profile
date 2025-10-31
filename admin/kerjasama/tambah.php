<div class="container-fluid">
    <h3 class="mb-4 text-gray-800">Tambah Data Kerjasama</h3>

    <form action="?page=kerjasama/proses_tambah" method="post" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label>Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label>No. Telepon</label>
            <input type="text" name="no_telp" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Logo (opsional)</label>
            <input type="file" name="logo" class="form-control">
        </div>

        <button type="submit" class="btn btn-warning">Simpan</button>
    </form>
</div>