<?php
include '../koneksi.php'; // pastikan koneksi sudah benar

if (isset($_GET['id_area'])) {
    $id_area = $_GET['id_area'];

    // Cek apakah ID valid (harus angka)
    if (!ctype_digit($id_area)) {
        echo "<script>
            alert('ID area tidak valid');
            window.location.href = '?page=area/index';
        </script>";
        exit;
    }

    // 1️⃣ Cek apakah data dengan ID tersebut ada
    $stmt = $koneksi->prepare("SELECT id_area FROM area WHERE id_area = ?");
    $stmt->bind_param("i", $id_area);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "<script>
            alert('Data tidak ditemukan');
            window.location.href = '?page=area/index';
        </script>";
        exit;
    }

    // 2️⃣ Hapus data dengan prepared statement
    $stmt_delete = $koneksi->prepare("DELETE FROM area WHERE id_area = ?");
    $stmt_delete->bind_param("i", $id_area);
    $stmt_delete->execute();

    // 3️⃣ Cek apakah benar-benar terhapus
    if ($stmt_delete->affected_rows > 0) {
        echo "<script>
            alert('Data berhasil dihapus');
            window.location.href = '?page=area/index';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data');
            window.location.href = '?page=area/index';
        </script>";
    }

    $stmt->close();
    $stmt_delete->close();
} else {
    echo "<script>
        alert('ID area tidak ditemukan');
        window.location.href = '?page=area/index';
    </script>";
}
