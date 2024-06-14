<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman User</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="style2.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="app.js"></script>
</head>
<body>
<nav class="navbar" x-data>
    <div class="navbar-nav">
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
        <div class="username-container">
            <a href="#" class="navbar-logo">Username</a>
            <a href="lengkapidata.php" id="lengkapi-data" class="nav-link">Lengkapi Data</a>
        </div>
    </div>
   
        <div class="navbar-extra">
            <a href="#" id="search-button"><i data-feather="search"></i></a>
            <a href="#" id="shopping-cart-button">
                <i data-feather="shopping-cart"></i>
                <span class="quantity-badge" x-show="$store.cart.totalBarang" x-text="$store.cart.totalBarang > 9 ? $store.cart.totalBarang : $store.cart.totalBarang.toString().replace(/^0+/, '')"></span>
            </a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
        <div class="search-form">
            <input type="search" id="search-box" placeholder="search here...">
            <label for="search-box"><i data-feather="search"></i></label>
        </div>

        <div class="shopping-cart">
            <h4 x-show="!$store.cart.items.length" style="margin-top: 1rem">Keranjang Kosong</h4>
            <div class="form-container" x-show="$store.cart.items.length">
                <form action="server.php" method="post" id="checkoutForm">
                    <template x-for="(item, index) in $store.cart.items" x-keys="index">
                        <div class="cart-item">
                            <img :src="`img/products/${item.img}`" :alt="item.name">
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
                    <input type="hidden" name="produk" x-bind:value="JSON.stringify($store.cart.items)">
                    <h4 x-show="$store.cart.items.length">Total keseluruhan : <span x-text="rupiah($store.cart.totalHarga)"></span><input type="hidden" name="total" x-bind:value="$store.cart.totalHarga"></h4>
                    <h5>Detail Pelanggan</h5>
                    <label for="name"><span>Nama</span></label><input type="text" name="nama" id="name">
                    <label for="email"><span>Email</span></label><input type="email" name="email" id="email">
                    <label for="phone"><span>Phone</span></label><input type="number" name="phone" id="phone" autocomplete="off">
                    <input type="submit" class="btn btn-danger" value="Sewa Sekarang">
                </form>
            </div>
        </div>
    </nav>

    <main class="container">
        <section class="section">
        <h5>Pesanan Saya</h5>
            <div class="accordion custom-accordion" id="accordionExample">

            <!-- BELUM DIBAYAR -->
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <i data-feather="credit-card"></i><h6>Belum Dibayar</h6> 
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <h1><i class="bi bi-cart-x"></i></h1>
                      <h5>Belum Ada Pesanan</h5>
                    </div>
                  </div>
                </div>

            <!-- DALAM PROSES -->
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <i data-feather="package"></i><h6>Dalam Proses</h6> 
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">

                    <div class="accordion-body">
                      <div class="product-container">
                        
                          <div class="product">
                            <div class="product-desc">
                              <img src="img/products/tenda.png" alt="Product Image">
                              <div class="product-info">
                                  <h5 class="product-name">Tenda 4 orang</h5>
                                  <p class="product-price">Rp 70.000</p>
                                  <p>1x</p>
                              </div>
                            </div>
                            <button class="order-button">Sewa Lagi</button>
                          </div>

                          <div class="product">
                            <div class="product-desc">
                              <img src="img/products/gas.jpg" alt="Product Image">
                              <div class="product-info">
                                  <h5 class="product-name">Gas</h5>
                                  <p class="product-price">Rp 32.000</p>
                                  <p>2x</p>
                              </div>
                            </div>
                            <button class="order-button">Sewa Lagi</button>
                          </div>

                      </div>

                  </div>
                </div>

            <!-- DISEWAKAN -->
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      <i data-feather="clock"></i><h6>Dalam Penyewaan</h6> 
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <h1><i class="bi bi-cart-x"></i></h1>
                      <h5>Belum Ada Pesanan</h5>
                    </div>
                  </div>
                </div>

            <!-- SELESAI -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <i data-feather="check-circle"></i><h6>Pesanan Selesai</h6> 
                      </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <h1><i class="bi bi-cart-x"></i></h1>
                        <h5>Belum Ada Pesanan</h5>
                      </div>
                    </div>
                  </div>
              </div>
        </section>
    </main>

    <footer>
        <div class="social-media">
          <a href="http://Instagram.com/fatisda_uns"><i class="bi-instagram"></i></a>
          <a href="http://Wa.me/628156561711"><i class="bi bi-whatsapp"></i></a>
          <a href="https://www.tiktok.com/@spmbuns.official?_t=8n4dKHNJ0aW&_r=1"><i class="bi-tiktok"></i></a>
        </div>
        <p><a href="#home">Home</a> | <a href="#about">About</a> | <a href="#products">Katalog</a> | <a href="#contact">Contact</a></p>
        <p>Created by Kelompok 7 | &copy; 2024</p>
    </footer>
    <script>
      feather.replace();
    </script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
