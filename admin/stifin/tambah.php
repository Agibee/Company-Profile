<div class="container-fluid">
    <form action="?page=stifin/prosestambah" method="post" enctype="multipart/form-data">

        <div class="form-group mb-3">
            <label for="tipe">Tipe STIFIn</label>
            <select name="tipe" id="tipe" class="form-control" required>
                <option value="">-- Pilih Tipe STIFIn --</option>
                <option value="Sensing">Sensing (S)</option>
                <option value="Thinking">Thinking (T)</option>
                <option value="Feeling">Feeling (F)</option>
                <option value="Intuiting">Intuiting (I)</option>
                <option value="Instinct">Instinct (N)</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul konsep" required>
        </div>

        <div class="form-group mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" placeholder="Masukkan deskripsi konsep" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="gambar">Upload Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
            <small class="form-text text-muted">Format gambar: JPG, PNG, atau JPEG</small>
        </div>

        <button type="submit" name="submit" class="btn btn-warning mt-3">Simpan</button>

    </form>
</div>