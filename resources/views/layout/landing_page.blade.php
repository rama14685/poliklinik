<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang!</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f8ff; /* Light Cyan */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            transition: background-color 0.3s ease;
        }

        .container {
            background-color: #fff;
            padding: 60px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            text-align: center;
            max-width: 90%;
            width: 500px;
        }

        header h1 {
            color: #2e8b57; /* Sea Green */
            margin-bottom: 20px;
            font-size: 2.5em;
            letter-spacing: 1px;
        }

        main p {
            color: #555;
            font-size: 1.1em;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .button-group {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .button {
            display: inline-block;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.1em;
            text-decoration: none;
            color: #fff;
            transition: background-color 0.3s ease, transform 0.2s ease-in-out;
        }

        .login-button {
            background-color: #007bff; /* Blue */
        }

        .register-button {
            background-color: #28a745; /* Green */
        }

        .button:hover {
            transform: scale(1.05);
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .container {
                padding: 40px;
                border-radius: 8px;
            }

            header h1 {
                font-size: 2em;
                margin-bottom: 15px;
            }

            main p {
                font-size: 1em;
                margin-bottom: 20px;
            }

            .button-group {
                flex-direction: column;
                gap: 15px;
            }

            .button {
                width: 100%;
                padding: 12px 25px;
                font-size: 1em;
            }
        }

        /* Animasi Sederhana (Opsional) */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .container {
            animation: fadeIn 0.8s ease-out;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Selamat Datang di Platform Kami!</h1>
        </header>
        <main>
            <p>Bergabunglah dengan komunitas kami dan nikmati berbagai fitur menarik yang dirancang untuk meningkatkan produktivitas dan koneksi Anda.</p>
            <div class="button-group">
                <a href="/login" class="button login-button">Masuk</a>
                <a href="/register" class="button register-button">Daftar</a>
            </div>
        </main>
    </div>
</body>
</html>