// START BAGIAN HUMBERGER MENU //
// Toggle class active
const navbarNav = document.querySelector(".navbar-nav");
// ketika hambuerger menu di klik
document.querySelector("#hamburger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};
// Klik diluar sidebar untuk menghilangkan Humberger menu/navbar
const hambuger = document.querySelector("#hamburger-menu");

document.addEventListener("click", function (e) {
  if (!hambuger.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
});

// END BAGIAN HUMBERGER MENU //

//BAGIAN MODAL
// Function to open modal
function openModal(modalId) {
  document.querySelector(modalId).style.display = "block";
}

// Function to close modal
function closeModal(modalId) {
  document.querySelector(modalId).style.display = "none";
}

// Get the buttons that open the modals
var searchBtn = document.getElementById("search-button");
var cartBtn = document.getElementById("shopping-cart-button");

// Get the close buttons for modals
var closeBtns = document.querySelectorAll(".close");

// Add event listeners to open modal buttons
searchBtn.addEventListener("click", function () {
  openModal("#myModal");
});

cartBtn.addEventListener("click", function () {
  openModal("#keranjang");
});

// Add event listeners to close modal buttons
closeBtns.forEach(function (btn) {
  btn.addEventListener("click", function () {
    closeModal("#myModal");
    closeModal("#keranjang");
  });
});

// Close modal when clicking outside the modal
window.onclick = function (event) {
  if (event.target.classList.contains("modal")) {
    closeModal("#myModal");
    closeModal("#keranjang");
  }
};

// Search product function
function searchProduct() {
  var input, filter, cards, cardContainer, title, i;
  input = document.getElementById("search-box");
  filter = input.value.toUpperCase();
  cardContainer = document.getElementsByClassName("row")[0];
  cards = cardContainer.getElementsByClassName("menu-card");
  for (i = 0; i < cards.length; i++) {
    title = cards[i].querySelector(".menu-card-title");
    if (title.innerText.toUpperCase().indexOf(filter) > -1) {
      cards[i].style.display = "";
    } else {
      cards[i].style.display = "none";
    }
  }
}

function btnCheckout() {
  // Buat elemen form
  var form = document.createElement("form");
  form.method = "post"; // Metode pengiriman form POST
  form.action = "checkout.php"; // Halaman tujuan

  // Iterasi melalui setiap item dalam keranjang dan tambahkan input tersembunyi untuk setiap item
  cartItems.forEach(function (item) {
    // Buat input untuk setiap properti produk
    var productNameInput = document.createElement("input");
    productNameInput.type = "hidden";
    productNameInput.name = "productName[]";
    productNameInput.value = item.name;
    form.appendChild(productNameInput);

    var priceInput = document.createElement("input");
    priceInput.type = "hidden";
    priceInput.name = "price[]";
    priceInput.value = item.price;
    form.appendChild(priceInput);

    var quantityInput = document.createElement("input");
    quantityInput.type = "hidden";
    quantityInput.name = "quantity[]";
    quantityInput.value = item.quantity;
    form.appendChild(quantityInput);
  });

  // Tambahkan form ke dalam dokumen dan submit secara otomatis
  document.body.appendChild(form);
  form.submit();

  // Opsional: Hapus form setelah dikirim
  document.body.removeChild(form);
}

// END BAGIAN MODAL

// BAGIAN DI BAWAH INI YANG DI EDIT
// Array untuk menyimpan produk yang telah dimasukkan ke keranjang
var cartItems = [];

// Function to add product to cart
function addToCart(productName, price) {
  // Buat objek untuk produk yang akan dimasukkan ke dalam keranjang
  var product = {
    name: productName,
    price: price,
    quantity: 1, // Tambahkan properti quantity untuk menyimpan jumlah produk
  };

  // Cari apakah produk sudah ada di dalam keranjang
  var existingProduct = cartItems.find((item) => item.name === productName);
  if (existingProduct) {
    // Jika produk sudah ada, tambahkan jumlahnya
    existingProduct.quantity++;
  } else {
    // Jika produk belum ada, tambahkan ke dalam array keranjang
    cartItems.push(product);
  }

  // Tampilkan pesan atau lakukan operasi lain sesuai kebutuhan
  alert(productName + " Berhasil ditambahkan ke keranjang!");

  // Perbarui tampilan keranjang
  updateCartUI();
}

// Function to update cart items list and total cost
function updateCartUI() {
  var cartList = document.getElementById("cartItemList");
  var totalCostElem = document.getElementById("totalCost");
  var totalCost = 0;

  // Kosongkan daftar produk sebelum menambahkan yang baru
  cartList.innerHTML = "";

  // Tampilkan nama produk yang dibeli
  var productNameList = document.getElementById("productNameList");
  productNameList.innerHTML = "";
  // Tampilkan jumlah produk yang dibeli
  var quantityList = document.getElementById("quantityList");
  quantityList.innerHTML = "";

  // Loop melalui produk di keranjang dan tambahkan ke daftar produk
  cartItems.forEach(function (item) {
    var productNameLi = document.createElement("li");
    var quantityLi = document.createElement("li");
    productNameLi.textContent =
      item.name + " : " + " IDR " + item.price + " x " + item.quantity;
    productNameLi.style.color = "black"; // Tambahkan style untuk warna tulisan
    quantityList.appendChild(quantityLi);
    productNameList.appendChild(productNameLi);

    // Tambahkan harga produk yang dikalikan dengan jumlahnya ke total biaya
    totalCost += item.price * item.quantity;
  });

  // Tampilkan total biaya yang terupdate
  totalCostElem.textContent = "IDR " + totalCost;
}
// BAGIAN DI ATAS ITU YANG DIEDIT
