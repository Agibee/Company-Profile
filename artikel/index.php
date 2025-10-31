<section class="bg-success bg-opacity-10 py-4 text-center" style="margin-top: 0; width:100%; height:100px;">
    <h3 class="text-success my-2">INFO TERKINI</h3>
</section>

<div class="container my-5">
    <h2 class="mb-4">Artikel Terbaru STIFIn</h2>

    <div class="row row-cols-1 row-cols-md-3 g-4">

        <?php
        if ($koneksi) {
            // Ambil 3 artikel terbaru dari database
            $sql = "SELECT id_artikel, judul, gambar, isi FROM artikel ORDER BY id_artikel DESC LIMIT 3";
            $data = $koneksi->query($sql);

            if ($data && $data->num_rows > 0) {
                while ($row = $data->fetch_assoc()) {
                    // Ringkasan isi artikel
                    $ringkasan = substr($row["isi"], 0, 150);
                    if (strlen($row["isi"]) > 150) {
                        $ringkasan .= "...";
                    }

                    // Path gambar
                    $image_path = "admin/assets/img/artikel/" . htmlspecialchars($row["gambar"]);

                    // URL tujuan (aman dan rapi)
                    $detail_url = "index.php?page=artikel/detail&id=" . urlencode($row["id_artikel"]);
        ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="<?php echo $image_path; ?>"
                                class="card-img-top"
                                alt="<?php echo htmlspecialchars($row["judul"]); ?>"
                                style="height: 200px; object-fit: cover;">

                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row["judul"]); ?></h5>
                                <p class="card-text text-muted"><?php echo $ringkasan; ?></p>
                            </div>

                            <div class="card-footer bg-white border-0 text-center">
                                <button
                                    class="btn btn-success"
                                    onclick="window.location.href='<?php echo $detail_url; ?>'">
                                    Read More →
                                </button>
                            </div>
                        </div>
                    </div>
        <?php
                }
            } else {
                echo '<div class="col-12 text-center text-muted">Belum ada artikel terbaru.</div>';
            }

            $koneksi->close();
        } else {
            echo '<div class="col-12 text-center text-danger">Koneksi ke database gagal.</div>';
        }
        ?>

    </div>
</div>