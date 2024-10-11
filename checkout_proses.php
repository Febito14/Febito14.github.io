<?php
date_default_timezone_set('Asia/Jakarta');
// Database connection
include "koneksi.php";

// Get form data ( mendapatkan data dari inputan yang telah tuliskan)
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$productNames = $_POST['productName'];
$prices = $_POST['price'];
$quantities = $_POST['quantity'];
$email = $_POST['email']; 


// Calculate total cost menghitung jumlah kalkulasi yang telah ddijabarkan didalam chekout
$totalCost = 0;
for ($i = 0; $i < count($prices); $i++) {
    $totalCost += $prices[$i] * $quantities[$i];
}

$order_id = rand();

// Insert into transaksi table ( ini digunakan untuk menambahkan data transaksi didalam tabel riwayat nanti)
$tanggal_checkout = date('Y-m-d H:i:s');
$stmt = $conn->prepare("INSERT INTO transaksi (order_id, nama, no_hp, alamat, total_biaya, email, tanggal_checkout) VALUES (?, ?, ?, ?, ?, ?, ?)");
if ($stmt === false) {
    die("Error preparing statement for transaksi: " . $conn->error);
}

$stmt->bind_param("ssssdss", $order_id, $nama, $no_hp, $alamat, $totalCost, $email,  $tanggal_checkout);
if (!$stmt->execute()) {
    die("Error executing statement for transaksi: " . $stmt->error);
}

// Get the last inserted id for transaksi (mendapatkan id transaksi dari setiap proses)
$id_transaksi = $stmt->insert_id;
$stmt->close();

// Insert into detail_transaksi table (ini diambil dari data shop cart awal)
$stmt = $conn->prepare("INSERT INTO detail_transaksi (id_transaksi, nama_produk, harga, kuantitas) VALUES (?, ?, ?, ?)");
if ($stmt === false) {
    die("Error preparing statement for detail_transaksi: " . $conn->error);
}

$errors = [];

for ($i = 0; $i < count($productNames); $i++) {
    $stmt->bind_param("isdi", $id_transaksi, $productNames[$i], $prices[$i], $quantities[$i]);
    if (!$stmt->execute()) {
        $errors[] = "Error executing statement for detail_transaksi (product: {$productNames[$i]}): " . $stmt->error;
    }
}
$stmt->close();
$conn->close();

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
    die("There were errors inserting some detail transactions.");
}

echo "<script>alert('Melanjutkan ke Metode Pembayaran!'); window.location.href = 'midtrans/examples/snap/checkout-process-simple-version.php?order_id=$order_id ';</script>";
?>