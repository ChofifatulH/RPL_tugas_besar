<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>4people outdoor - Sewa tenda dan alat gunung</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="style.css" />
  <script src="https://kit.fontawesome.com/433fd97cd3.js" crossorigin="anonymous"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <script src="src/app.js"></script>
</head>

<body>
  <nav class="navbar" x-data>
    <div class="navbar-left">
      <ul class="nav">
        <li class="nav-item dropdown" x-data="{ open: false }" @click.away="open = false">
          <a class="nav-link dropdown-toggle" href="#" @click="open = !open">
            <i class="bi bi-person"></i>
          </a>
          <ul class="dropdown-menu" x-show="open" x-transition>
            <li><a class="dropdown-item" href="user.php"><i class="bi bi-person-circle"></i> Profile</a></li>
            <li><a class="dropdown-item" href="login.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
      <a href="#" class="navbar-logo">4people<span>Outdoor</span>.</a>
    </div>

    <div class="navbar-nav">
      <a href="#">Home</a>
      <a href="#about">About</a>
      <a href="#products">Katalog</a>
      <a href="#contact" id="search">Contact</a>
    </div>

    <div class="navbar-extra">
      <a href="#" id="search-button"><i data-feather="search"></i></a>
      <a href="#" id="shopping-cart-button">
        <i data-feather="shopping-cart"></i>
        <span class="quantity-badge" x-show="$store.cart.totalBarang"
          x-text="$store.cart.totalBarang > 9 ? $store.cart.totalBarang : $store.cart.totalBarang.toString().replace(/^0+/, '')"></span>
      </a>
      <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>

    <div class="search-form">
      <input type="search" id="search-box" placeholder="search here..." />
      <label for="search-box"><i data-feather="search"></i></label>
    </div>


    <div class="shopping-cart">
      <h4 x-show="!$store.cart.items.length" style="margin-top: 1rem">
        Keranjang Kosong
      </h4>

      <div class="form-container" x-show="$store.cart.items.length">
        <form action="server/server_userBarang.php" method="post" id="checkoutForm">
          <template x-for="(item, index) in $store.cart.items" xkeys="index">
            <div class="cart-item">
              <img :src="`img/products/${item.img}`" :alt="item.name" />
              <div class="item-detail">
                <h3 x-text="item.name"></h3>
                <div>Harga Barang : <a x-text="rupiah(item.price)"></a></div>
                <div>Jumlah Barang : <a x-text="item.quantity"></a></div>
                <div>Mulai sewa : <a x-text="item.startDate"></a></div>
                <div>Selesai sewa : <a x-text="item.endDate"></a></div>
                <div>Total &equals; <a x-text="rupiah(item.total)"></a></div>
              </div>
            </div>
          </template>

          <input type="hidden" name="produk" x-bind:value="JSON.stringify($store.cart.items)" />

          <h4 x-show="$store.cart.items.length">
            Total keseluruhan :
            <span x-text="rupiah($store.cart.totalHarga)"></span>
            <input type="hidden" name="total" x-bind:value="$store.cart.totalHarga" />
          </h4>

          <!-- <h5>Detail Pelanggan</h5>

          <label for="nama">
            <span>Nama</span>
            <input type="text" name="nama" id="name" />
          </label>
          <label for="email">
            <span>Email</span>
            <input type="email" name="email" id="email" />
          </label>
          <label for="phone">
            <span>Phone</span>
            <input type="number" name="phone" id="phone" autocomplete="off" />
          </label> -->
          <input type="submit" class="btn btn-danger" value="Sewa Sekarang" />
          <!-- <button
              class="checkout-button"
              type="submit"
              id="checkout-button"
              value="checkout"
              @click.prevent="$store.pesan.showPesan()"
            >
              Checkout
            </button> -->
        </form>
      </div>
    </div>

  </nav>

  <section class="hero" id="home">
    <main class="content">
      <h1>4people <span>Outdoor</span></h1>
      <p>
        Nikmati Pengalaman Tanpa Batas dengan Peralatan Berkualitas
        yang Menjamin Kenyamanan dan Keamanan Anda.
      </p>
      <a href="#products" class="cta">ORDER NOW</a>
    </main>
  </section>

  <section id="about" class="about">
    <h4><span>ABOUT</span></h4>
    <h1><span>Welcome To 4people Outdoor</span></h1>

    <div class="row">
      <div class="content">
        <p>
          Selamat datang di 4people Outdoor! Kami adalah mitra setia petualangan Anda, menyediakan beragam peralatan
          berkualitas untuk membuat pengalaman Anda tak terlupakan. Dengan fokus pada keamanan, kenyamanan, dan kepuasan
          pelanggan, kami siap mengantar Anda pada petualangan alam yang menyenangkan dan bebas kekhawatiran. Jadikan
          setiap momen di alam terbuka menjadi pengalaman yang berharga bersama 4people Outdoor!
        </p>
      </div>
    </div>
    <div class="icons-row">
      <div class="icon-box">
        <i class="fas fa-shoe-prints"></i>
        <p>Alat Bertahan Hidup</p>
      </div>
      <div class="icon-box">
        <i class="fas fa-solid fa-tent"></i>
        <p>Tenda Ukuran Besar</p>
      </div>
      <div class="icon-box">
        <i class="fa-solid fa-campground"></i>
        <p>Tenda Ukuran Kecil</p>
      </div>
      <div class="icon-box">
        <i class="fa-solid fa-person-hiking"></i>
        <p>Alat Camping</p>
      </div>
      <div class="icon-box">
        <i class="fa-solid fa-mountain-sun"></i>
        <p>Alat Mendaki Gunung</p>
      </div>
    </div>
  </section>

  <b class="products" id="products" x-data="products">
    <h4><span>KATALOG</span></h4>
    <h1><span>Pesan Perlengkapan Outdoor Anda Sekarang!</span></h1>
    <p>
      Temukan perlengkapan outdoor yang tepat di sini! Dari tenda kokoh hingga peralatan memasak portabel, kami memiliki
      semua yang Anda butuhkan untuk menjelajahi alam dengan gaya dan kenyamanan. Siap untuk petualangan tak terlupakan?
      Sewa perlengkapan outdoor Anda sekarang!
    </p>
    <div class="row">
      <template x-for="(item, index) in items.slice(0, 3)" x-key="index">
        <div class="product-card">
          <div class="product-image">
            <img :src="`img/products/${item.img}`" :alt="item.name" />
          </div>
          <div class="product-content">
            <h3 x-text="item.name"></h3>
            <div class="product-price">
              <span x-text="rupiah(item.price)"></span>
            </div>
          </div>
          <div class="product-icons">
            <button type="submit" class="tombol-detail-button btn1" @click.prevent="$store.box.showProductModal(item)">
              ORDER
            </button>
          </div>
        </div>
      </template>
    </div>
    <a href="listProduct.php" class="btn">LIHAT LAINNYA</a>
  </b>

  <section id="contact" class="contact">
    <h4><span>CONTACT</span></h4>
    <h1><span>Kontak Kami</span></h1>

    <div class="row">

      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.1407611144377!2d110.85380557484183!3d-7.559627392454241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a14234667a3fd%3A0xbda63b32997616ad!2sUniversitas%20Sebelas%20Maret%20(UNS)!5e0!3m2!1sid!2sid!4v1717772548853!5m2!1sid!2sid"
        width="600" height="532" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>


      <form action="">
        <div class="input-group">
          <i data-feather="user"></i>
          <input type="text" placeholder="Nama" />
        </div>
        <div class="input-group">
          <i data-feather="phone"></i>
          <input type="text" placeholder="No Hp" />
        </div>
        <div class="input-group">
          <i data-feather="message-square"></i>
          <input type="text" placeholder="Pesan" />
        </div>
        <button type="submit" class="btn">KIRIM PESAN</button>
      </form>
    </div>
  </section>

  <footer>
    <div class="social">
      <a href="http://Wa.me/6282231365741"><i class="bi-whatsapp"></i></a>
      <a href="http://Instagram.com/fatisda_uns"><i class="bi-instagram"></i></a>
      <a href="https://www.tiktok.com/@spmbuns.official?_t=8n4dKHNJ0aW&_r=1"><i class="bi-tiktok"></i></a>
    </div>

    <div class="links">
      <a href="#home">Home</a>
      <a href="#about">About</a>
      <a href="#products">Katalog</a>
      <a href="#contact">Contact</a>
    </div>

    <div class="credit">
      <p>Created by <a href="">Kelompok 7.</a> | &copy; 2024.</p>
    </div>
  </footer>

  <div class="modal" id="item-detail-modal" x-data="{ quantity: 1, startDate: '', endDate: '', selectedItem: {}}">
    <div class="modal-container">
      <a href="#" class="close-icon" @click.prevent="$store.box.hideProductModal()"><i data-feather="x"></i></a>
      <template x-for="(item, index) in $store.box.items" x-keys="index">
        <div class="modal-content">
          <div class="description">
            <img :src="`img/products/${item.img}`" :alt="item.name" />
            <p class="desc-label">Deskripsi :</p>
            <p class="desc-text" x-text="item.description"></p>
          </div>
          <div class="product-content">
            <h3 x-text="item.name"></h3>
            <div class="product-price" x-text="rupiah(item.price)"></div>

            <div class="product-detail-sewa">
              <label for="quantity">Jumlah Barang :</label>
              <input type="number" inputmode="numeric" pattern="[0-9]*" x-model.number="quantity" min="1" value="1" />

              <label for="startDate">Mulai Sewa :</label>
              <input type="date" x-model="startDate" :min="$store.box.getTodayDate()" required />
              <label for="endDate">Selesai Sewa :</label>
              <input type="date" x-model="endDate" :min="$store.box.getMinEndDate(startDate)" :disabled="!startDate"
                required />
            </div>

            <div class="total-barang" x-show="endDate" :disabled="!endDate">
              <p>
                Total barang :
                <span x-text="rupiah($store.box.total(item.price, quantity, startDate, endDate))"></span>
              </p>
            </div>

            <a href="#" @click.prevent="
                $store.box.hideProductModal;
                $store.cart.add(item, quantity, startDate, endDate, $store.box.total(item.price, quantity, startDate, endDate)); 
                ">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-cart2"
                viewBox="0 0 16 16">
                <path
                  d="M0 2.5A.5.5 0 0 1 .5 2H3a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
              </svg>
              <span>ADD TO CHART</span>
            </a>
          </div>
        </div>
      </template>
    </div>
  </div>

  <script>
    feather.replace();
  </script>

  <script src="js/script.js"></script>
</body>

</html>