<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
// https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview

namespace Midtrans;

use mysqli;

include ('../../../koneksi.php');
$order_id = $_GET['order_id'];
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
                  WHERE order_id = '".$order_id."' "; 
                  

        $result = $conn->query($query);
        $data = mysqli_fetch_array($result);


require_once dirname(__FILE__) . '/../../Midtrans.php';
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys
Config::$serverKey = 'SB-Mid-server-dN_tP-a3oRBUs5-oQSVz_GiI';
Config::$clientKey = 'SB-Mid-client-_25Tp0rtkY1kcHc8';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

// Uncomment for production environment
// Config::$isProduction = true;
Config::$isSanitized = Config::$is3ds = true;


// Required
$transaction_details = array(
    'order_id' => $order_id,
    'gross_amount' => $data['total_biaya'], // no decimal allowed for creditcard
);


$query = "SELECT * FROM detail_transaksi INNER JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id WHERE order_id = '$order_id'";
$result = mysqli_query($conn, $query);
$item_details = array();
while ($row = mysqli_fetch_assoc($result)) {
    $item_details[] = array(
        'id' => $row['id'],
        'price' => $row['harga'],
        'quantity' => $row['kuantitas'],
        'name' => $row['nama_produk']
    );
}

// // Optional
// $item_details = array (
//     array(
//         'id' => 'a1',
//         'price' => 94000,
//         'quantity' => 1,
//         'name' => "Apple"
//     ),
//   );
// Optional

$query = "SELECT * FROM detail_transaksi INNER JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id WHERE order_id = '$order_id'";
$result = mysqli_query($conn, $query);
$cust_detail = mysqli_fetch_array($result);

$customer_details = array(
    'first_name'    => $cust_detail['nama'],
    'last_name'     => "",
    'email'         => $cust_detail['email'],
    'phone'         => $cust_detail['no_hp'],
    'shipping_address' => $cust_detail['alamat']
);
// Fill transaction details
$transaction = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snap_token = '';
try {
    $snap_token = Snap::getSnapToken($transaction);
}
catch (\Exception $e) {
    echo $e->getMessage();
}

function printExampleWarningMessage() {
    if (strpos(Config::$serverKey, 'your ') != false ) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'<your server key>\';');
        die();
    } 
}

?>

<!DOCTYPE html>
<html> 
    <style>
        button[type="submit"],
#pay-button {
  background-color: #4caf50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

button[type="submit"]:hover,
#pay-button:hover {
  background-color: #45a049;
}
    </style>
    <body>
        <button id="pay-button">Pilih Metode Pembayaran!</button>

        <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey;?>"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function(){
                // SnapToken acquired from previous step
                snap.pay('<?php echo $snap_token?>', {
                    // Optional
                    onSuccess: function(result){
                        window.location.href = '../../../riwayat.php'
                    },
                    // Optional
                    onPending: function(result){
                        /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    // Optional
                    onError: function(result){
                        /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    }
                });
            };
        </script>
    </body>
</html>