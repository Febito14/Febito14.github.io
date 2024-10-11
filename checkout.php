<?php
include "header.php";
?>

<section id="menu" class="menu">
    <div class="checkout">
        <div class="containercheckout">
            <h2>Checkout</h2>
            <div class="checkout-table">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // ini Ambil data dari form
                        $productNames = $_POST['productName'];
                        $prices = $_POST['price'];
                        $quantities = $_POST['quantity'];

                        // Hitung total biaya yang diambil dari beberapa total dan jumlah yang telah diambil
                        $totalCost = 0;

                        // Tampilkan data dalam tabel (berikut ini adalah tabel yang menampilkan data yang telah diambil dari shop cart)
                        for ($i = 0; $i < count($productNames); $i++) {
                            $productName = $productNames[$i];
                            $price = $prices[$i];
                            $quantity = $quantities[$i];

                            // Hitung total untuk produk ini berikut ini menghitung total jumlah produk yang dibeli 
                            $subtotal = $price * $quantity;
                            $totalCost += $subtotal;

                            // Tampilkan baris tabel untuk produk yang telah di chekout 
                            echo "<tr>";
                            echo "<td>$productName</td>";
                            echo "<td>IDR $price</td>";
                            echo "<td>$quantity</td>";
                            echo "<td>IDR $subtotal</td>";
                            echo "</tr>";
                        }
                        echo "<tr>";
                        echo "<th colspan='3'>Total Belanja</th>";
                        echo "<td>IDR $totalCost</td>";
                        echo "</tr>";
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- Ini adalah proses memasuka Nama, Nomor Hp dan Alamat pelanggan yang memesan pesanan. -->
            <div class="checkout-form">
                <form method="post" action="checkout_proses.php" enctype="multipart/form-data">
                    <!-- Form untuk data pelanggan -->
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" id="nama" name="nama" required>
                    </div>
                     <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required></input>
                    </div>

                    <div class="form-group">
                        <label for="no_hp">Nomor HP:</label>
                        <input type="text" id="no_hp" name="no_hp" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea id="alamat" name="alamat" required></textarea>
                    </div>
                    

                    <!-- Select untuk metode pembayaran
                    <div class="form-group">
                        <label for="metode_pembayaran">Metode Pembayaran:</label>
                        <select id="metode_pembayaran" name="metode_pembayaran" >
                            <option value="">Pilih Metode Pembayaran</option>
                            <option value="Transfer">Transfer</option>
                            <option value="M-Banking">M-Banking</option>
                            <option value="Alfamart">Alfamart</option>
                            <option value="QRIS">QRIS</option>
                        </select>
                    </div> -->

                    <!-- Input untuk unggah foto transaksi yang telah diminta  -->
                    <!-- <div class="form-group">
                        <label for="bukti_pembayaran">Unggah Foto Bukti Pembayaran:</label>
                        <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*">
                    </div> -->

                    <!-- Hidden fields to pass product data to checkout_proses.php -->
                    <?php
                    for ($i = 0; $i < count($productNames); $i++) {
                        echo "<input type='hidden' name='productName[]' value='$productNames[$i]'>";
                        echo "<input type='hidden' name='price[]' value='$prices[$i]'>";
                        echo "<input type='hidden' name='quantity[]' value='$quantities[$i]'>";
                    }
                    ?>

                    <button type="submit" name="submit">Pesan Sekarang</button>
                </form>
            </div>
        </div> 
    </div>
</section>

<?php
include "footer.php";
?>