<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PISANG KEMUL BY PUTRA RAGIL</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Style CSS -->
    <link rel="stylesheet" type="text/css" href="CSS/Style.css" />
    <link rel="stylesheet" href="CSS/riwayat.css">
    <link rel="stylesheet" href="CSS/checkout.css">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/menu.css">
  </head>

  <body>
    <!-- Navbar Start -->
    <nav class="navbar">
      <a href="Index.php" class="navbar-logo"
        >Pisang Kemul <span><small>by Putra Ragil</small></span></a
      >
      <div class="navbar-nav">
        <a href="Index.php">Home</a>
        <a href="About Us.php">About Us</a>
        <a href="Menu.php">Menu</a>
        <a href="Contact Us.php">Contact Us</a>
        <a href="riwayat.php">Riwayat</a>
      </div>

      <div class="navbar-extra">
        <!-- example icon Search -->
        <a href="#" id="search-button"><i data-feather="search"></i></a>
        <!-- example icon shooping cart -->
        <a href="#" id="shopping-cart-button"
          ><i data-feather="shopping-cart"></i
        ></a>
        <!-- example icon HUMBERGER MENU -->
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
      </div>
    </nav>
    <!-- Navbar end -->
    <!-- Modal Search-->
    <div id="myModal" class="modal-2">
      <div class="modal-dialog">
        <div class="modal-content-2">
          <div class="modal-header">
            <h5 class="modal-title">Search Produk</h5>
            <button
              type="button"
              class="close"
              aria-label="Close"
              onclick="closeModal('#myModal')"
            >
              &times;
            </button>
          </div>
          <div class="modal-body">
            <input
            type="text"
            id="search-box"
            placeholder="Ketikkan nama produk"
            onkeyup="searchProduct()"
            />
          </div>
        </div>
      </div>
    </div>

  <!-- Modal Keranjang-->
     <div id="keranjang" class="modal-2">
      <div class="modal-dialog">
        <div class="modal-content-2">
          <div class="modal-header">
            <h5 class="modal-title">Keranjang Produk</h5>
            <button
              type="button"
              class="close"
              aria-label="Close"
              onclick="closeModal('#keranjang')"
            >
              &times;
            </button>
          </div>
          <div class="cart-item">
            <h3 class="modal-title-body">Nama Produk:</h3>
            <ul id="productNameList"></ul>
            <ul id="quantityList"></ul>
          </div>
          <div class="cart-item">
            <h3 class="modal-title-body">Total biaya:</h3>
            <h3 class="modal-title-body" id="totalCost">IDR 0</h3>
            <!-- Tampilkan daftar produk di sini -->
            <ul id="cartItemList"></ul>
          </div>
          <div class="modal-body">
            <button
              type="button"
              id="search-button-modal-2"
              onclick="btnCheckout()"
            >
              Checkout
            </button>
          </div>
        </div>
      </div>
    </div>
  
    <script type="text/javascript"
    src="https://app.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-_25Tp0rtkY1kcHc8"></script>
    </body>