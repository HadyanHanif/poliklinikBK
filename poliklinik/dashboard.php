<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Poliklinik</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
        background-color: #eaeaea;
        }
        .navbar-custom {
            background-color: #1f97f0;
        }
        .navbar-custom .navbar-brand {
            font-size: 18px;
            font-weight: bold;
            color: white;
            display: flex;
            align-items: center;
        }
        .navbar-custom .navbar-subtitle {
            font-size: 25px;
            color: white;
            line-height: 1;
        }
        .navbar-logo {
            width: 70px;
            height: 70px;
        }
        .navbar-text {
            margin-left: 15px;
        }
        .contact-container {
            display: flex;
            align-items: center;
            gap: 30px;
        }
        .contact-item {
            display: flex;
            align-items: center;
            color: white;
            font-size: 14px;
        }
        .contact-icon {
            font-size: 24px;
            margin-right: 10px;
            color: white;
        }
        .contact-text {
            display: flex;
            flex-direction: column;
        }
        .contact-number {
            font-weight: bold;
        }
        .login-button {
            background-color: #34cc0b;
            color: white;
            font-weight: bold;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
            text-decoration: none;
        }
        .login-button:hover {
            background-color: #2daa09;
        }
        .section-title {
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
        }
        .card-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="#">
                <img src="logopoli.png" alt="Logo Poliklinik" class="navbar-logo">
                <div class="navbar-text">
                    <span style="color: white;">POLIKLINIK</span><br>
                    <span class="navbar-subtitle">Sehat Bahagia</span>
                </div>
            </a>

            <div class="contact-container">
                <div class="contact-item">
                    <i class="fas fa-phone-alt contact-icon"></i>
                    <div class="contact-text">
                        <span>Layanan Emergensi</span>
                        <span class="contact-number">(024) 8502244</span>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone-alt contact-icon"></i>
                    <div class="contact-text">
                        <span>Layanan Pelanggan</span>
                        <span class="contact-number">(024) 8310076</span>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone-alt contact-icon"></i>
                    <div class="contact-text">
                        <span>WhatsApp</span>
                        <span class="contact-number">0812 6773 557</span>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope contact-icon"></i>
                    <div class="contact-text">
                        <span>Email</span>
                        <span class="contact-number">sehatbahagia@gmail.com</span>
                    </div>
                </div>
                <a href="login_pasien.php" class="login-button">Login</a>
            </div>
        </div>
    </nav>

    <!-- Carousel -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="1.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="3.png" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>

    <!-- Janji Temu Dokter -->
    <div class="section-title"><h2>Janji Temu Dokter</h2></div>

    <!-- Card Section -->
    <div class="card-container">
        <div class="card" style="width: 50rem;">
            <h5 class="card-header" style="background-color: #1f97f0; color: white;">Buat Janji Dengan Dokter</h5>
            <div class="card-body">
                <h5 class="card-title">Buat Janji Temu dengan Dokter di Poliklinik Sehat Bahagia!</h5>
                <p class="card-text">Klik, atur waktu, dan kami siap melayani Anda dengan sepenuh hati!. "Sehat Bahagia, langkah pertama menuju kesehatan yang optimal".</p>
                <a href="login_pasien.php" class="btn btn-primary" style="background-color: #34cc0b;">Buat Janji</a>
            </div>
        </div>
    </div>

    <!-- Ruang Lingkup Layanan -->
    <div class="section-title" style="margin-top: 40px;">
        <h2>Lokasi Poliklinik Sehat Bahagia</h2>
    </div>

    <!-- Embed Google Map -->
    <div class="container mb-5 d-flex justify-content-center">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.127920602184!2d110.40490941021537!3d-6.994211792977745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b41831c7b9d%3A0xcb17f1f8f9b49a67!2sRSUP%20Dr%20Kariadi!5e0!3m2!1sid!2sid!4v1733298369278!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FontAwesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>