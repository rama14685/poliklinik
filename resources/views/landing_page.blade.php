<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Klinik Antena</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9fafc;
            display: flex;
            /* Menggunakan Flexbox */
            min-height: 100vh;
            transition: background-color 0.3s ease;
        }

        .container {
            display: flex;
            width: 100%;
            /* Memenuhi lebar halaman */
            max-width: 1200px;
            /* Lebar maksimum */
            margin: auto;
            /* Menengahkan jika lebih lebar dari 1200px */
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            /* Memastikan konten tidak keluar dari container */
        }

        .left-section {
            flex: 1;
            /* Mengambil sebagian besar ruang */
            padding: 40px;
            text-align: left;
            background-color: #ffffff;

        }

        .right-section {
            flex: 0.8;
            /* Mengambil sebagian kecil ruang */
            background-color: #ffffff;
            /* Latar belakang berbeda untuk visual */
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }

        header {
            margin-bottom: 20px;
        }

        header h1 {
            color: #007bff;
            font-size: 2em;
            letter-spacing: 0.5px;
        }

        main p {
            color: #6b7280;
            font-size: 1.1em;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .button-group {
            display: flex;
            gap: 15px;
        }

        .button {
            display: inline-block;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1em;
            text-decoration: none;
            color: #fff;
            transition: background-color 0.3s ease, transform 0.2s ease-in-out;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .login-button {
            background-color: #007bff;
        }

        .register-button {
            background-color: #4caf50;
        }

        .button:hover {
            transform: scale(1.03);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .icon-text {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .icon-text i {
            font-size: 1.1em;
        }

        .clinic-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            object-fit: cover;
            /* Tambahkan ini */
            object-position: center;
            /* Tambahkan ini */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                /* Tumpuk vertikal pada layar kecil */
            }

            .left-section,
            .right-section {
                padding: 20px;
                text-align: center;
            }

            .button-group {
                justify-content: center;
            }
        }

        /* Animasi Sederhana (Opsional) */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .left-section {
            animation: fadeIn 0.8s ease-out;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left-section">
            <header>
                <h1>
                    <i class="fas fa-hospital"></i> Selamat Datang di Klinik Antena
                </h1>
            </header>
            <main>
                <p>
                    Kami menyediakan layanan kesehatan yang komprehensif dan berkualitas untuk Anda dan keluarga.
                    <br><br>
                    Mulai dari pemeriksaan rutin hingga perawatan khusus, tim medis kami siap membantu Anda.
                </p>
                <div class="button-group">
                    <a href="/login" class="button login-button">
                        <span class="icon-text">
                            <i class="fas fa-sign-in-alt"></i> Masuk
                        </span>
                    </a>
                    <a href="/register" class="button register-button">
                        <span class="icon-text">
                            <i class="fas fa-user-plus"></i> Daftar
                        </span>
                    </a>
                </div>
            </main>
        </div>
        <div class="right-section">
            <img src="{{ asset('assets/klinik.jpg') }}" class="clinic-image">

        </div>
    </div>
</body>

</html>