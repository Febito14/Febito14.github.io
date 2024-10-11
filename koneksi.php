<?php
    $conn = mysqli_connect("localhost", "root", "", "kelompok10");
    
    // Periksa Koneksi
    if (mysqli_connect_errno()) {
        echo "Gagal mengkoneksikan ke MySQL: " . mysqli_connect_error();
        exit();
    }
?>