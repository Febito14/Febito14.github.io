<?php
include "header.php";
?>

    <!-- Hero Section HOME Start -->
    <div class="layarpenuh" id="home">
      <div class="intro">
        <h1>SELAMAT DATANG DI PISANG KEMUL</h1>
        <p>
          selamat berkunjung kedalam website kami silahkan menikmati layanan
          dari kami
        </p>
        <a href="Menu.php" class="tombol"> BELI SEKARANG </a>
      </div>
    </div>
    <!-- Hero Section end -->

    <!-- Start About US -->
    <section id="about" class="about">
      <h2 style="color: #814100">About<span style="color: black"> Us</span></h2>

      <div class="row">
        <div class="about-img">
          <img src="IMG/KLMPK.jpg" alt="Tentang Kami" />
        </div>
        <div class="content">
          <h2>Kenapa memilih Pisang Kemul?</h2>
          <p>
            "Pisang Kemul" bukan sekadar pisang biasa, tetapi juga merupakan
            tempat jual makanan yang memiliki inspirasif dan bertemu dengan
            kenyataan, dimana setiap proses pembuatannnya memberikan sensasi
            kehangatan dan perasaan, pisang kemul dibuat dengan pisang pilihan
            yang baik dan terpilih.
          </p>
          <p>
            Pisang kemul juga merupakan makanan pilihan anak-anak, remaja bahkan
            dewasa, karena rasa manisnya yang diberikan dan gurih yang
            didapatkan dapat memberikan sensasi yang menyenangkan.
          </p>
        </div>
      </div>
    </section>
    <!-- End About US -->

    <!-- Section menu start -->
<section class="product" id="product">
    <div class="header">
        <h2 style="color: #814100">Menu<span style="color: black"> Us</span></h2>
        <p>
            Pisang kemul menyajikan berbagai pilihan macam menu dan berbagai jenis
            varian rasa, berikut ini adalah varian rasa yang menjadi Favorite
            dalam penjualan kami kali ini
        </p>
        <div class="row">
            <div class="menu-card">
                <img src="IMG/Menu1.JPG" alt="Spesial Macha Chesse" class="menu-card-img" />
                <h3 class="menu-card-title">Spesial Macha Chesse</h3>
                <p class="menu-card-price">IDR 20.000</p>
                <a href="#" class="tombol_produk" onclick="showPopup('popup1')">Detail Produk</a>
            </div>
            <div class="menu-card">
                <img src="IMG/Menu2.JPG" alt="Spesial Americano Chesse" class="menu-card-img" />
                <h3 class="menu-card-title">Spesial Americano Chesse</h3>
                <p class="menu-card-price">IDR 19.000</p>
                <a href="#" class="tombol_produk" onclick="showPopup('popup2')">Detail Produk</a>
            </div>
            <div class="menu-card">
                <img src="IMG/Menu3.JPG" alt="Spesial Strawbery Chesse" class="menu-card-img" />
                <h3 class="menu-card-title">Spesial Strawbery Chesse</h3>
                <p class="menu-card-price">IDR 18.000</p>
                <a href="#" class="tombol_produk" onclick="showPopup('popup3')">Detail Produk</a>
            </div>
            <div class="menu-card">
                <img src="IMG/Menu4.JPG" alt="Spesial Strawbery Chocolate" class="menu-card-img" />
                <h3 class="menu-card-title">Spesial Strawbery Chocolate</h3>
                <p class="menu-card-price">IDR 18.000</p>
                <a href="#" class="tombol_produk" onclick="showPopup('popup4')">Detail Produk</a>
            </div>
        </div>
    </div>
</section>
<!-- Section menu end -->

<!-- Pop-ups -->
<!-- Pop-ups -->
<div class="popup-overlay" id="popupOverlay" onclick="closePopup()"></div>

<div class="popup" id="popup1">
    <div class="popup_content">
        <div class="popup_img">
            <img src="IMG/Menu1.JPG" alt="Spesial Macha Chesse">
        </div>
        <div class="popup_header">
            <h1>Spesial Macha Chesse</h1>
            <h3>Detail Produk</h3>
        </div>
        <div class="popup_text">
            <p>Special Matcha Chesse dibuat dengan perpaduan tea dan keju yang lezat, kedua perpaduan ini senantiasa 
              membuat kelezatan yang luar biasa, mampu memberikan rasa yang khas dari tea dan keju </p>
        </div>
        <div class="popup_buttons">
            <a href="Menu.php" class="btn_popup">Pesan Sekarang</a>
            <a href="Index.php" class="btn_close" onclick="closePopup()">Kembali Beranda</a>
        </div>
    </div>
</div>

<div class="popup" id="popup2">
    <div class="popup_content">
        <div class="popup_img">
            <img src="IMG/Menu2.JPG" alt="Spesial Americano Chesse">
        </div>
        <div class="popup_header">
            <h1>Spesial Americano Chesse</h1>
            <h3>Detail Produk</h3>
        </div>
        <div class="popup_text">
            <p>Spesial Americano Chesse adalah perpaduan eksklusif antara rasa kopi 
              Americano yang kaya dengan keju premium yang creamy. Produk ini dirancang untuk 
              menghadirkan pengalaman rasa yang unik dan memanjakan lidah bagi para pecinta kopi dan keju.</p>
        </div>
        <div class="popup_buttons">
            <a href="Menu.php" class="btn_popup">Pesan Sekarang</a>
            <a href="Index.php" class="btn_close" onclick="closePopup()">Kembali Beranda</a>
        </div>
    </div>
</div>

<div class="popup" id="popup3">
    <div class="popup_content">
        <div class="popup_img">
            <img src="IMG/Menu3.JPG" alt="Spesial Strawbery Chesse">
        </div>
        <div class="popup_header">
            <h1>Spesial Strawbery Chesse</h1>
            <h3>Detail Produk</h3>
        </div>
        <div class="popup_text">
            <p>Spesial Strawberry Chesse merupakan kombinasi unik antara manisnya stroberi segar 
              dan gurihnya keju pilihan. Setiap gigitan menawarkan pengalaman rasa yang berbeda, 
              menggabungkan kesegaran buah dan kelezatan keju yang meleleh di mulut.</p>
        </div>
        <div class="popup_buttons">
            <a href="Menu.php" class="btn_popup">Pesan Sekarang</a>
            <a href="Index.php" class="btn_close">Kembali Beranda</a>
        </div>
    </div>
</div>

<div class="popup" id="popup4">
    <div class="popup_content">
        <div class="popup_img">
            <img src="IMG/Menu4.JPG" alt="Spesial Strawbery Chocolate">
        </div>
        <div class="popup_header">
            <h1>Spesial Strawbery Chocolate</h1>
            <h3>Detail Produk</h3>
        </div>
        <div class="popup_text">
            <p>Spesial Strawberry Chocolate adalah perpaduan sempurna antara manisnya 
              stroberi segar dan lembutnya cokelat premium. Setiap gigitan memberikan sensasi rasa 
              yang menyegarkan dari stroberi yang dipadukan dengan kelezatan cokelat yang meleleh di mulut.</p>
        </div>
        <div class="popup_buttons">
            <a href="Menu.php" class="btn_popup">Pesan Sekarang</a>
            <a href="Index.php" class="btn_close" onclick="closePopup()">Kembali Beranda</a>
        </div>
    </div>
</div>
    <!-- section menu end -->



    <!-- Kontak Section Start -->
    <section id="contact" class="contact">
      <h2 style="color: #814100">
        Contact<span style="color: black"> Us</span>
      </h2>
      <p>
        Beikut ini jika anda ingin menghubungi kami terkait dengan pemesanan
        produk dengan jumlah yang lebih banyak, silahkan kirim pesan.
      </p>

      <div class="row">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.235264423311!2d110.40075037357997!3d-7.764856977011353!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a599565566693%3A0xe4180ce0746f331c!2sPisang%20Kemul%20By%20Putra%20Ragil%2C%20Condong%20Catur!5e0!3m2!1sid!2sid!4v1714484134397!5m2!1sid!2sid"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          class="map"
        ></iframe>
        <form action="" class="form">
          <div class="input-group">
            <i data-feather="user"></i>
            <!-- <label for="name" class="label">Nama lengkap</label> -->
            <input
              type="text"
              id="name"
              class="input input-name"
              placeholder="Nama Lengkap"
            />
          </div>
          <div class="input-group">
            <i data-feather="mail"></i>
            <!-- <label for="Email" class="label">Alamat email</label> -->
            <input
              type="text"
              id="email"
              class="input input-email"
              placeholder="Email Address"
            />
          </div>
          <div class="input-group">
            <i data-feather="message-square"></i>
            <!-- <label for="nomor" class="label">Nomor telepon</label> -->
            <input
              type="text"
              id="message-square"
              class="input input-nomor"
              placeholder="Your Message"
            />
          </div>
          <button type="submit" class="btn">Kirim Pesan</button>
        </form>
      </div>
    </section>
    <!-- Kontak Section End -->

    <script>
 function showPopup(id) {
    console.log('showPopup called with id:', id);
    document.getElementById('popupOverlay').style.display = 'block';
    document.getElementById(id).style.display = 'block';
}

function closePopup() {
    console.log('closePopup called');
    document.getElementById('popupOverlay').style.display = 'none';
    var popups = document.getElementsByClassName('popup');
    for (var i = 0; i < popups.length; i++) {
        popups[i].style.display = 'none';
    }
}
</script>


  
<?php
include "footer.php";
?>