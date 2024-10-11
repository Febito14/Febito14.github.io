<?php
include "header.php";
?>
    <!-- Hero Section Start -->
    <section id="menu" class="menu">
      <h2 style="color: #814100">
        Menu<span style="color: black"> Kami</span>
      </h2>
      <h3>Mari Beli Pilihan Produk Terbaik Kami</h3>

      <div class="row">
        <div class="menu-card">
          <img src="IMG/Menu1.JPG" alt="" class="menu-card-img" />

          <h3 class="menu-card-title">Spesial Macha Chesse</h3>
          <p class="menu-card-price">IDR 20.000</p>
          <a
            href="#"
            class="tombol_menu"
            id="addToCartBtn1"
            onclick="addToCart('Spesial Macha Chesse', 20000)"
          >
            MASUKAN KERANJANG
          </a>
        </div>
        <div class="menu-card">
          <img src="IMG/Menu2.JPG" alt="" class="menu-card-img" />

          <h3 class="menu-card-title">Spesial Americano Chesse</h3>
          <p class="menu-card-price">IDR 19.000</p>
          <a
            href="#"
            class="tombol_menu"
            id="addToCartBtn2"
            onclick="addToCart('Spesial Americano Chesse', 19000)"
          >
            MASUKAN KERANJANG
          </a>
        </div>
        <div class="menu-card">
          <img src="IMG/Menu3.JPG" alt="" class="menu-card-img" />

          <h3 class="menu-card-title">Spesial Strawbery Chesse</h3>
          <p class="menu-card-price">IDR 18.000</p>
          <a
            href="#"
            class="tombol_menu"
            id="addToCartBtn2"
            onclick="addToCart('Spesial Strawbery Chesse', 18000)"
          >
            MASUKAN KERANJANG
          </a>
        </div>
        <div class="menu-card">
          <img src="IMG/Menu4.JPG" alt="" class="menu-card-img" />

          <h3 class="menu-card-title">Spesial Strawbery Chocolate</h3>
          <p class="menu-card-price">IDR 18.000</p>
          <a
            href="#"
            class="tombol_menu"
            id="addToCartBtn2"
            onclick="addToCart('Spesial Strawbery Chocolate', 18000)"
          >
            MASUKAN KERANJANG
          </a>
        </div>
      </div>
    </section>

<?php
include "footer.php";
?>