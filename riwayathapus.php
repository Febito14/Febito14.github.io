<?php
// Database connection
include "koneksi.php";

// Ambil id dari URL
$id = $_GET['id'];

// Query untuk menghapus data detail transaksi berdasarkan id transaksi
$queryDetail = "DELETE FROM detail_transaksi WHERE id_transaksi=$id";

// Jalankan query
$resultDetail = $conn->query($queryDetail);

// Cek hasil
if ($resultDetail === false) {
    echo "Error: " . $conn->error;
} else {
    // Query untuk menghapus data riwayat berdasarkan id
    $query = "DELETE FROM transaksi WHERE id=$id";

    // Jalankan query
    $result = $conn->query($query);

    // Cek hasil
    if ($result === false) {
        echo "Error: " . $conn->error;
    } else {
        echo "Data riwayat berhasil dihapus.";
        header("Location: riwayat.php"); // Redirect ke halaman riwayat setelah data dihapus
    }
}

// Tutup koneksi
$conn->close();
?>