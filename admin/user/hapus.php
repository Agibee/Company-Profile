<?php
include '../koneksi.php';

if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    // Cek apakah ID valid (harus angka)
    if (!ctype_digit($id_user)) {
        echo "<script>
            alert('ID User tidak valid');
            window.location.href = '?page=user/index';
        </script>";
        exit;
    }

    // 1️⃣ Cek apakah data dengan ID tersebut ada
    $stmt = $koneksi->prepare("SELECT id_user FROM user WHERE id_user = ?");
    $stmt->bind_param("i", $id_user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "<script>
            alert('Data tidak ditemukan');
            window.location.href = '?page/user/index';
        </script>";
        exit;
    }

    // 2️⃣ Hapus data dengan prepared statement
    $stmt_delete = $koneksi->prepare("DELETE FROM user WHERE id_user = ?");
    $stmt_delete->bind_param("i", $id_user);
    $stmt_delete->execute();

    // 3️⃣ Cek apakah benar-benar terhapus
    if ($stmt_delete->affected_rows > 0) {
        // 4️⃣ Reset AUTO_INCREMENT agar ID tetap urut
        $max_id = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT MAX(id_user) AS max_id FROM user"))['max_id'];
        $next_id = $max_id ? $max_id + 1 : 1;
        mysqli_query($koneksi, "ALTER TABLE user AUTO_INCREMENT = $next_id");

        echo "<script>
            alert('Data berhasil dihapus');
            window.location.href = '?page=user/index';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data');
            window.location.href = '?page/user/index';
        </script>";
    }

    $stmt->close();
    $stmt_delete->close();
} else {
    echo "<script>
        alert('ID User tidak ditemukan');
        window.location.href = '?page/user/index';
    </script>";
}
