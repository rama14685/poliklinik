<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Klinik Sehat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #64b5f6;
            /* Light Blue */
            --primary-dark: #2196f3;
            /* Slightly darker blue */
            --secondary-color: #90a4ae;
            /* Light Blue Grey */
            --light-color: #f0f8f8;
            /* Very Light Teal */
            --dark-color: #455a64;
            /* Dark Blue Grey */
            --form-control-border-radius: 0.3rem;
            --btn-border-radius: 0.3rem;
            --card-border-radius: 0.5rem;
            --box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s ease-in-out;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(135deg, #ffffff, #e0f2f1);
            /* Very Light Teal */
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .register-container {
            background-color: #ffffff;
            border-radius: var(--card-border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            width: 100%;
            max-width: 500px;
            padding: 2rem;
        }

        .register-header {
            text-align: center;
            padding-bottom: 1.2rem;
            border-bottom: 1px solid #e0e0e0;
        }

        .register-header h2 {
            color: var(--dark-color);
            font-weight: 600;
            font-size: 1.5rem;
            margin-bottom: 0.3rem;
        }

        .register-form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.3rem;
            color: var(--dark-color);
            font-weight: 500;
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 0.6rem 0.8rem;
            border: 1px solid #cfd8dc;
            border-radius: var(--form-control-border-radius);
            font-size: 0.95rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.15rem rgba(100, 181, 246, 0.25);
        }

        .input-group {
            display: flex;
            align-items: center;
        }

        .input-group-text {
            background-color: var(--light-color);
            color: var(--secondary-color);
            padding: 0.6rem 0.8rem;
            border: 1px solid #cfd8dc;
            border-right: none;
            border-radius: var(--form-control-border-radius) 0 0 var(--form-control-border-radius);
        }

        .input-group-text i {
            margin-right: 0.4rem;
        }

        textarea.form-control {
            resize: vertical;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: #fff;
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: var(--btn-border-radius);
            cursor: pointer;
            font-size: 0.95rem;
            transition: var(--transition);
            width: 100%;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
        }

        .register-footer {
            text-align: center;
            margin-top: 1.2rem;
            color: var(--secondary-color);
            font-size: 0.85rem;
        }

        .register-footer a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .register-footer a:hover {
            text-decoration: underline;
        }

        /* Subtle Background Pattern (Optional) */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='6' height='6' viewBox='0 0 6 6' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23e0f2f1' fill-opacity='0.2'%3E%3Cpath d='M4 6H2v-2h2V6zm-1-1h1v-1H3v1zm-1-1h1V3H2v1zM0 6h1V5H0V6zm0-2h1V3H0V4zm0-2h1V1H0V2zM5 0v1h-1V0H5zm-1 2v1h-1V2H4zm-1 1h1V2H3v1zM6 0h-1v1h1V0zm0 2h-1v1h1V2zm0 2h-1v1h1V4z'/%3E%3C/g%3E%3C/svg%3E");
            /* Replace with a more subtle pattern if desired */
            opacity: 0.1;
            z-index: -1;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <div class="register-header">
            <h2><i class="fas fa-notes-medical"></i> Daftar Akun</h2>
        </div>
        <form class="register-form" action="/register" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat" class="form-label">Alamat</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                    <textarea id="alamat" name="alamat" class="form-control" rows="2"
                        placeholder="Alamat Lengkap" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="no_hp" class="form-label">Nomor HP</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    <input type="tel" id="no_hp" name="no_hp" class="form-control"
                        placeholder="Nomor HP (Contoh: 08123456789)" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Alamat Email"
                        required>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                    <input type="password" id="password" name="password" class="form-control"
                        placeholder="Buat Password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
            <div class="register-footer">
                Sudah punya akun? <a href="/login">Masuk</a>
            </div>
        </form>
    </div>
</body>

</html>