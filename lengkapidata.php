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
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="style2.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="app.js"></script>
</head>

<body>
    <div class="wrapper">
        <nav class="navbar" x-data>
            <div class="navbar-nav">
                <a href="user.php" id="profile-icon"><i class="bi bi-person"></i></a>
                <div class="username-container">
                    <a href="#" class="lengkapi-data">Lengkapi Data</a>
                </div>
            </div>
        </nav>

        <main class="container">
            <div class="row">
                <form action="">
                    <div class="input-group">
                        <i data-feather="credit-card"></i>
                        <input type="text" placeholder="NIK" />
                    </div>
                    <div class="input-group">
                        <i data-feather="user"></i>
                        <input type="text" placeholder="Nama" />
                    </div>
                    <div class="input-group">
                        <i data-feather="home"></i>
                        <input type="text" placeholder="Alamat" />
                    </div>
                    <div class="input-group">
                        <i data-feather="phone"></i>
                        <input type="text" placeholder="No Hp" />
                    </div>
                    <div class="input-group">
                        <i data-feather="mail"></i>
                        <input type="email" placeholder="Email" />
                    </div>
                    <div class="input-group">
                        <i data-feather="file"></i>
                        <input type="file" accept="image/*" placeholder="Foto Kartu Identitas" />
                    </div>
                    <p class="description">
                        Silakan unggah foto kartu identitas Anda. Pastikan gambar <br>yang diunggahjelas dan terbaca.
                        Format yang diterima adalah JPG, PNG.
                    </p>
                    <button type="submit" class="btn">SIMPAN DATA</button>
                </form>

            </div>
        </main>

        <footer>
            <div class="social-media">
                <a href="http://Instagram.com/fatisda_uns"><i class="bi-instagram"></i></a>
                <a href="http://Wa.me/6282231365741"><i class="bi bi-whatsapp"></i></a>
                <a href="https://www.tiktok.com/@spmbuns.official?_t=8n4dKHNJ0aW&_r=1"><i class="bi-tiktok"></i></a>
            </div>
            <p><a href="#home">Home</a> | <a href="#about">About</a> | <a href="#products">Katalog</a> | <a href="#contact">Contact</a></p>
            <p>Created by Kelompok 7 | &copy; 2024</p>
        </footer>
    </div>

    <script>
        feather.replace();
    </script>
    <script src="script.js"></script>
</body>

</html>