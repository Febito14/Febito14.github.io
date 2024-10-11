<?php
include "header.php";
include "koneksi.php";

// Periksa apakah ID transaksi ada dalam parameter URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data transaksi berdasarkan ID
    $query = "SELECT transaksi.id, 
                     transaksi.nama, 
                     transaksi.alamat, 
                     transaksi.no_hp, 
                     transaksi.total_biaya,
                     transaksi.metode_pembayaran,
                     transaksi.status_pembayaran,
                     transaksi.bukti_pembayaran
              FROM transaksi 
              WHERE transaksi.id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Transaksi tidak ditemukan.";
        exit();
    }


    // Proses pembaruan data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $metode_pembayaran = $_POST['metode_pembayaran'];
        $status_pembayaran = $row['status_pembayaran']; // Default to current status

        // Upload bukti pembayaran jika ada
        $bukti_pembayaran = $row['bukti_pembayaran']; // Default to current bukti_pembayaran
        if (isset($_FILES['bukti_pembayaran']) && $_FILES['bukti_pembayaran']['error'] == 0) {
            $upload_dir = 'uploads/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            $upload_file = $upload_dir . basename($_FILES['bukti_pembayaran']['name']);
            if (move_uploaded_file($_FILES['bukti_pembayaran']['tmp_name'], $upload_file)) {
                $bukti_pembayaran = $upload_file;
                $status_pembayaran = 'paid'; // Update status to paid if a new bukti_pembayaran is uploaded
            } else {
                echo "Error uploading file.";
            }
        }

        $update_query = "UPDATE transaksi SET nama=?, alamat=?, no_hp=?, metode_pembayaran=?, status_pembayaran=?, bukti_pembayaran=? WHERE id=?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ssssssi", $nama, $alamat, $no_hp, $metode_pembayaran, $status_pembayaran, $bukti_pembayaran, $id);

        if ($stmt->execute()) {
            echo "Data berhasil diperbarui.";
            header("Location: riwayat.php"); // Redirect setelah berhasil memperbarui
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
} else {
    echo "ID transaksi tidak diberikan.";
    exit();
}
?>

<section class="riwayatedit">
    <div class="edit-form">
        <h2 style="color: #814100">Edit<span style="color: black"> Transaksi</span></h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
            <br>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>" required>
            <br>

            <label for="no_hp">No. HP:</label>
            <input type="text" id="no_hp" name="no_hp" value="<?php echo $row['no_hp']; ?>" required>
            <br>

            <label for="total_biaya">Total Biaya:</label>
            <p style="color: black;"><?php echo $row['total_biaya']; ?></p>
            <br>

            <label for="metode_pembayaran">Metode Pembayaran:</label>
            <select id="metode_pembayaran" name="metode_pembayaran" required>
            <option value="Transfer" <?php echo ($row['metode_pembayaran'] == 'Transfer') ? 'selected' : ''; ?>>Transfer</option>
            <option value="M-Banking" <?php echo ($row['metode_pembayaran'] == 'M-Banking') ? 'selected' : ''; ?>>M-Banking</option>
            <option value="Alfamart" <?php echo ($row['metode_pembayaran'] == 'Alfamart') ? 'selected' : ''; ?>>Alfamart</option>
            <option value="QRIS" <?php echo ($row['metode_pembayaran'] == 'QRIS') ? 'selected' : ''; ?>>QRIS</option>
            </select>
            <br>
            
            <label for="bukti_pembayaran">Unggah Bukti Pembayaran (Jika Ada):</label>
            <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*">
            <br>

            <input type="submit" value="Update">
        </form>
    </div>
</section>

<?php include "footer.php"; ?>