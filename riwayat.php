<?php include "header.php"; ?>

<section class="menu">
    <div class="purchase-history">
        <h2>Riwayat Pembelian</h2>
        <?php
        // Database connection
        include "koneksi.php";

        // Query to retrieve purchase history
        // Mendapatkan data Query yang berada di histori
        $query = "SELECT transaksi.id, 
                         transaksi.nama, 
                         GROUP_CONCAT(CONCAT(detail_transaksi.nama_produk, ' x ', detail_transaksi.kuantitas) SEPARATOR ', ') AS produk_dan_jumlah, 
                         transaksi.alamat, 
                         transaksi.no_hp, 
                         transaksi.tanggal_checkout, 
                         transaksi.total_biaya,
                         transaksi.email
                  FROM transaksi 
                  INNER JOIN detail_transaksi ON transaksi.id = detail_transaksi.id_transaksi 
                  GROUP BY transaksi.id";

        $result = $conn->query($query);

        if ($result === false) {
            echo "Error: " . $conn->error;
        } elseif ($result->num_rows > 0) {
        ?>
    
    <!-- Ini adalah Tabel untuk menampilkan Riwayat yang dituju -->
        <table>
            <tr>
                <th>Nama</th>
                <th>Produk dan Jumlah</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>Total Pembelian</th>
                <th>email</th>
                <!-- <th>Status Pembayaran</th> -->
                <th>Tanggal Beli</th>
                <!-- <th>Bukti Pembayaran</th> -->
                <th>Aksi</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row["nama"]; ?></td>
                    <td>
                        <?php
                        // Split concatenated string into individual products
                        $products = explode(", ", $row["produk_dan_jumlah"]);
                        // Output each product in a list
                        echo "<ul>";
                        foreach ($products as $product) {
                            echo "<li>".$product."</li>";
                        }
                        echo "</ul>";
                        ?>
                    </td>
                    <td><?php echo $row["alamat"]; ?></td>
                    <td><?php echo $row["no_hp"]; ?></td>
                    <td>IDR <?php echo $row["total_biaya"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["tanggal_checkout"]; ?></td>
                    <td>
    <?php 
    // Berikut ini adalah Bukti pembayaran yang dipilih dari setiap user melakukan transaksu
    // $metode_pembayaran = $row["metode_pembayaran"];
    // switch ($metode_pembayaran) {
    //     case 'Transfer':
    //         echo 'Transfer';
    //         break;
    //     case 'M-Banking':
    //         echo 'M-Banking';
    //         break;
    //     case 'Alfamart':
    //         echo 'Alfamart';
    //         break;
    //     case 'QRIS':
    //         echo 'QRIS';
    //         break;
    //     default:
    //         echo 'Metode pembayaran tidak valid';
    //         break;
    // }
    
    ?>
                    
                        
                        <?php { ?>
                            <!-- Jika belum dibayar, tampilkan tombol edit dan hapus -->
                            <a href="riwayathapus.php?id=<?php echo $row['id']; ?>" class="delete-button" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">Hapus</a>
                        <?php } ?>
                    </td>
                </tr>     
            <?php } ?>
        </table>
        <?php } else { ?>
            Tidak ada riwayat pembelian tersedia.
        <?php } ?>
    </div>
</section>

<?php include "footer.php"; ?>