<?php
include "header.php";
include "koneksi.php";

// Proses form saat tombol diklik
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Simpan data ke database
    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "Pesan berhasil dikirim.";
    } else {
        echo "Pesan gagal dikirim.";
    }

    $stmt->close();
}

$conn->close();
?>

<!-- Kontak Section Start -->
<section id="contact" class="contact">
  <h2 style="color: #814100">
    Contact<span style="color: black"> Us</span>
  </h2>
  <p>
    Berikut ini jika anda ingin menghubungi kami terkait dengan ulasan
    ataupun pesan yang ingin disampaikan kepada kami bisa langsung kirim
    pesan anda sekalian.
  </p>
  <div class="row">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.235264423311!2d110.40075037357997!3d-7.764856977011353!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a599565566693%3A0xe4180ce0746f331c!2sPisang%20Kemul%20By%20Putra%20Ragil%2C%20Condong%20Catur!5e0!3m2!1sid!2sid!4v1714484134397!5m2!1sid!2sid"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"
      class="map"
    ></iframe>
    <form action="Contact Us.php" method="POST" class="form">
      <div class="input-group">
        <i data-feather="user"></i>
        <input
          type="text"
          id="name"
          name="name"
          class="input input-name"
          placeholder="Nama Lengkap"
          required
        />
      </div>
      <div class="input-group">
        <i data-feather="mail"></i>
        <input
          type="email"
          id="email"
          name="email"
          class="input input-email"
          placeholder="Email Address"
          required
        />
      </div>
      <div class="input-group">
        <i data-feather="message-square"></i>
        <input
          type="text"
          id="message"
          name="message"
          class="input input-nomor"
          placeholder="Your Message"
          required
        />
      </div>
      <button type="submit" class="btn">Kirim Pesan</button>
    </form>
  </div>
</section>
<!-- Kontak Section End -->

<!-- Footer start -->
<?php
include "footer.php";
?>