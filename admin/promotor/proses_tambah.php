<?php

$nama_promotor = $_POST['nama_promotor'];
$id_area = $_POST['id_area'];
$no_telepon = $_POST['no_telepon'];

// Ambil nama area untuk kode area
$q_area = mysqli_query($koneksi, "SELECT nama_area FROM area WHERE id_area='$id_area'");
$d_area = mysqli_fetch_assoc($q_area);
$kode_area = strtoupper(substr($d_area['nama_area'], 4, 3)); // contoh: "KAB. PADANG PARIAMAN" -> "PAR"

// Ambil 3 huruf pertama dari nama promotor (tanpa spasi)
$kode_nama = strtoupper(substr(str_replace(' ', '', $nama_promotor), 0, 3));

// Hitung urutan promotor di area itu
$q_urut = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM promotor WHERE id_area='$id_area'");
$d_urut = mysqli_fetch_assoc($q_urut);
$urut = str_pad($d_urut['total'] + 1, 2, '0', STR_PAD_LEFT);

// Bentuk kode promotor
$kode_promotor = "$kode_nama-$kode_area-$urut";

// Simpan data
$query = mysqli_query($koneksi, "INSERT INTO promotor (nama_promotor, kode_promotor, id_area, no_telepon)
VALUES ('$nama_promotor', '$kode_promotor', '$id_area', '$no_telepon')");

if ($query) {
    echo "<script>
        alert('Data promotor berhasil ditambahkan!');
        window.location.href='?page=promotor/index';
    </script>";
} else {
    echo "<script>
        alert('Data promotor Gagal ditambahkan!');
        window.location.href='?page=promotor/index';
    </script>";
}
