<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KliNiku - Kesehatan Modern, Akses Mudah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* ============================================
          PALET WARNA & GAYA GLOBAL - TEMA "KLINIKU"
          ============================================ */
        :root {
            --primary-blue: #00509E;
            --accent-orange: #FF7A59;
            --dark-text: #333333;
            --light-text: #6c757d;
            --bg-light: #F7F9FB;
            --white: #ffffff;
            --border-color: #e9ecef;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--bg-light);
            color: var(--dark-text);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ============================================
          Navbar
          ============================================ */
        .navbar {
            padding: 20px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: background-color 0.3s ease, padding 0.3s ease;
        }
        
        .navbar.scrolled {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 15px 0;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-logo {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--white);
            text-decoration: none;
        }
        .navbar.scrolled .nav-logo {
            color: var(--primary-blue);
        }
        
        .nav-links a {
            color: var(--white);
            text-decoration: none;
            font-weight: 700;
            margin-left: 25px;
            transition: color 0.3s ease;
        }
        .navbar.scrolled .nav-links a {
            color: var(--primary-blue);
        }
        .nav-links a.button-primary {
            background-color: var(--accent-orange);
            padding: 10px 25px;
            border-radius: 50px;
            box-shadow: 0 4px 15px rgba(255, 122, 89, 0.3);
        }
        .nav-links a.button-primary:hover {
            background-color: #ff6b4a;
            transform: translateY(-2px);
        }

        /* ============================================
          HERO SLIDER
          ============================================ */
        .slider-container {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .slider-wrapper {
            display: flex;
            width: 300%; /* Karena ada 3 slide */
            height: 100%;
            transition: transform 0.7s ease-in-out;
        }

        .slide {
            width: calc(100% / 3);
            height: 100%;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            text-align: center;
            position: relative;
        }
        /* Overlay gelap untuk keterbacaan teks */
        .slide::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .slide-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            padding: 20px;
        }
        
        .slide-content h1 {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 20px;
        }
        
        .slide-content p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        .slide-content .button-primary {
             background-color: var(--accent-orange);
             padding: 15px 35px;
             border-radius: 50px;
             text-decoration: none;
             color: var(--white);
             font-weight: 700;
             font-size: 1.1rem;
             display: inline-block;
             transition: all 0.3s ease;
             box-shadow: 0 4px 20px rgba(255, 122, 89, 0.4);
        }
        .slide-content .button-primary:hover {
            transform: translateY(-3px);
            background-color: #ff6b4a;
        }

        /* Navigasi Slider (Panah & Titik) */
        .slider-nav {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            z-index: 3;
            padding: 0 20px;
        }

        .slider-nav button {
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            font-size: 2rem;
            cursor: pointer;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            transition: background-color 0.3s ease;
        }
        .slider-nav button:hover {
            background-color: rgba(255, 255, 255, 0.4);
        }

        .slider-dots {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
            display: flex;
            gap: 10px;
        }

        .dot {
            width: 12px;
            height: 12px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .dot.active {
            background-color: var(--white);
        }

        /* ============================================
          Bagian Konten Lainnya (Layanan, dll)
          ============================================ */
        .content-section {
            padding: 80px 0;
        }
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 50px;
            position: relative;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background-color: var(--accent-orange);
            border-radius: 2px;
        }
        
        .services-grid, .how-it-works-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        .service-card {
            background-color: var(--white);
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border-top: 4px solid var(--white);
            transition: all 0.3s ease;
        }
        .service-card:hover {
            transform: translateY(-10px);
            border-top-color: var(--primary-blue);
        }
        .service-card .icon {
            font-size: 3rem;
            color: var(--primary-blue);
            margin-bottom: 20px;
        }
        .service-card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .service-card p {
            color: var(--light-text);
        }
        
        .how-it-works-grid .step {
            text-align: center;
        }
        .step .icon {
            width: 80px;
            height: 80px;
            background-color: #e6f0ff;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--primary-blue);
            margin-bottom: 15px;
            position: relative;
        }
        .step .step-number {
            position: absolute;
            top: -5px; right: -5px;
            background-color: var(--accent-orange);
            color: var(--white);
            width: 30px; height: 30px;
            border-radius: 50%;
            font-size: 1rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid var(--white);
        }

        /* ============================================
          Footer
          ============================================ */
        .footer {
            background-color: #111B29;
            color: #a9b3c1;
            padding: 60px 0;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }
        .footer-col h4 {
            color: var(--white);
            font-size: 1.2rem;
            margin-bottom: 20px;
        }
        .footer-col p, .footer-col ul li {
            margin-bottom: 10px;
        }
        .footer-col ul {
            list-style: none;
        }
        .footer-col a {
            color: #a9b3c1;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer-col a:hover {
            color: var(--accent-orange);
        }
        .footer-bottom {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #2a3443;
        }

        /* ============================================
          Responsivitas
          ============================================ */
        @media (max-width: 768px) {
            .nav-links { display: none; }
            .slide-content h1 { font-size: 2.5rem; }
            .slide-content p { font-size: 1rem; }
        }
    </style>
</head>

<body>
    
    <nav class="navbar">
        <div class="container nav-container">
            <a href="/" class="nav-logo">KliNiku</a>
            <div class="nav-links">
                <a href="#layanan">Layanan</a>
                <a href="#tentang">Tentang</a>
                <a href="/login">Masuk</a>
                <a href="/register" class="button-primary">Daftar</a>
            </div>
        </div>
    </nav>
    
    <section class="slider-container">
        <div class="slider-wrapper">
            <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1551192422-a8b33a2a498a?q=80&w=2070&auto=format&fit=crop');">
                <div class="slide-content">
                    <h1>Kesehatan Modern, Akses Mudah</h1>
                    <p>Selamat datang di KliNiku, platform digital untuk semua kebutuhan kesehatan Anda.</p>
                    <a href="/register" class="button-primary">Mulai Sekarang</a>
                </div>
            </div>
            <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1579684385127-1ef15d508118?q=80&w=2070&auto=format&fit=crop');">
                 <div class="slide-content">
                    <h1>Jadwalkan Temu Tanpa Ribet</h1>
                    <p>Pilih dokter terbaik dan atur jadwal konsultasi Anda secara online kapan saja.</p>
                    <a href="/register" class="button-primary">Cari Dokter</a>
                </div>
            </div>
            <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1538108149393-fbbd81895907?q=80&w=2128&auto=format&fit=crop');">
                 <div class="slide-content">
                    <h1>Ditangani oleh Tim Ahli</h1>
                    <p>Kami bekerja sama dengan para profesional medis berpengalaman untuk Anda.</p>
                    <a href="/register" class="button-primary">Lihat Tim Kami</a>
                </div>
            </div>
        </div>
        
        <div class="slider-nav">
            <button id="prevSlide">&lt;</button>
            <button id="nextSlide">&gt;</button>
        </div>
        
        <div class="slider-dots"></div>
    </section>

    <section class="content-section" id="layanan">
        <div class="container">
            <h2 class="section-title">Layanan Unggulan Kami</h2>
            <div class="services-grid">
                <div class="service-card">
                    <div class="icon"><i class="fas fa-calendar-check"></i></div>
                    <h3>Poliklinik Yang Sesuai Dengan Kondisi Anda</h3>
                    <p>tersedia 5 Poli Dengan Dokter Spesialis di Bidangnya</p>
                </div>
                <div class="service-card">
                    <div class="icon"><i class="fas fa-file-medical-alt"></i></div>
                    <h3>Janji Temu sesuai harimu</h3>
                    <p>janjian dengan doktermu nyesuaiin harimu</p>
                </div>
                <div class="service-card">
                    <div class="icon"><i class="fas fa-pills"></i></div>
                    <h3>Resep & Farmasi</h3>
                    <p>Dapatkan resep digital dari dokter dan tebus langsung melalui farmasi rekanan.</p>
                </div>
            </div>
        </div>
    </section>
    
     <section class="content-section" style="background-color: var(--white);">
        <div class="container">
            <h2 class="section-title">Hanya 3 Langkah Mudah</h2>
            <div class="how-it-works-grid">
                <div class="step">
                    <div class="icon"><div class="step-number">1</div><i class="fas fa-user-plus"></i></div>
                    <h3>Daftar Akun</h3>
                    <p>Buat akun KliNiku Anda dalam beberapa menit untuk memulai.</p>
                </div>
                <div class="step">
                    <div class="icon"><div class="step-number">2</div><i class="fas fa-search"></i></div>
                    <h3>Cari Dokter</h3>
                    <p>Temukan dokter berdasarkan spesialisasi dan lokasi yang Anda inginkan.</p>
                </div>
                <div class="step">
                    <div class="icon"><div class="step-number">3</div><i class="fas fa-hand-pointer"></i></div>
                    <h3>Pilih Jadwal</h3>
                    <p>Pilih waktu konsultasi yang tersedia dan konfirmasi jadwal Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4>KliNiku</h4>
                    <p>Platform kesehatan digital yang menghubungkan Anda dengan layanan medis terbaik secara mudah dan aman.</p>
                </div>
                <div class="footer-col">
                    <h4>Navigasi</h4>
                    <ul>
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#layanan">Layanan</a></li>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Kontak</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Layanan</h4>
                    <ul>
                        <li><a href="#">Booking Online</a></li>
                        <li><a href="#">Konsultasi Video</a></li>
                        <li><a href="#">Rekam Medis</a></li>
                    </ul>
                </div>
                 <div class="footer-col">
                    <h4>Hubungi Kami</h4>
                    <p>Jl. Kesehatan No. 123<br>Semarang, Jawa Tengah</p>
                    <p>Email: support@kliniku.com</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 KliNiku. All Rights Reserved.</p>
            </div>
        </div>
    </footer>


    <script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // --- Script untuk Navbar ---
        const navbar = document.querySelector('.navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // --- Script untuk Slider ---
        const sliderWrapper = document.querySelector('.slider-wrapper');
        const slides = document.querySelectorAll('.slide');
        const prevBtn = document.getElementById('prevSlide');
        const nextBtn = document.getElementById('nextSlide');
        const dotsContainer = document.querySelector('.slider-dots');

        let currentIndex = 0;
        const totalSlides = slides.length;

        // Buat dots navigasi
        for (let i = 0; i < totalSlides; i++) {
            const dot = document.createElement('div');
            dot.classList.add('dot');
            dot.addEventListener('click', () => goToSlide(i));
            dotsContainer.appendChild(dot);
        }
        const dots = document.querySelectorAll('.dot');
        
        function updateDots() {
            dots.forEach((dot, index) => {
                if (index === currentIndex) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
        }
        
        function goToSlide(index) {
            if (index < 0) {
                index = totalSlides - 1;
            } else if (index >= totalSlides) {
                index = 0;
            }
            sliderWrapper.style.transform = `translateX(-${index * (100 / totalSlides)}%)`;
            currentIndex = index;
            updateDots();
        }

        nextBtn.addEventListener('click', () => {
            goToSlide(currentIndex + 1);
        });

        prevBtn.addEventListener('click', () => {
            goToSlide(currentIndex - 1);
        });

        // Auto-play slider
        setInterval(() => {
            goToSlide(currentIndex + 1);
        }, 5000); // Ganti slide setiap 5 detik

        // Inisialisasi slide pertama
        goToSlide(0);

    });
    </script>

</body>
</html>