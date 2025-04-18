<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Klinik Sehat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4db6ac;
            /* Teal Accent */
            --primary-dark: #009688;
            /* Teal */
            --secondary-color: #78909c;
            /* Blue Grey */
            --light-color: #e0f2f1;
            /* Light Teal */
            --dark-color: #37474f;
            /* Dark Blue Grey */
            --form-control-border-radius: 0.5rem;
            --btn-border-radius: 0.5rem;
            --card-border-radius: 0.75rem;
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease-in-out;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #f0f4c3, #e0f7fa);
            /* Light Yellow to Light Cyan */
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            border-radius: var(--card-border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
            padding: 2rem;
        }

        .login-header {
            text-align: center;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #eee;
        }

        .login-header h2 {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .login-form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #ced4da;
            border-radius: var(--form-control-border-radius);
            font-size: 1rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(77, 182, 172, 0.25);
        }

        .input-group {
            display: flex;
            align-items: center;
        }

        .input-group-text {
            background-color: #f8f9fa;
            color: var(--secondary-color);
            padding: 0.75rem 1rem;
            border: 1px solid #ced4da;
            border-right: none;
            border-radius: var(--form-control-border-radius) 0 0 var(--form-control-border-radius);
        }

        .input-group-text i {
            margin-right: 0.5rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: #fff;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: var(--btn-border-radius);
            cursor: pointer;
            font-size: 1rem;
            transition: var(--transition);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .login-footer {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--secondary-color);
        }

        .login-footer a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            <h2><i class="fas fa-clinic-medical"></i> Masuk Klinik</h2>
        </div>
        <form class="login-form" action="/login" method="POST">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" id="email" name="email" class="form-control" placeholder="nama@email.com"
                        required>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" id="password" name="password" class="form-control"
                        placeholder="Masukkan password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Masuk</button>
            <div class="login-footer">
                Belum punya akun? <a href="/register">Daftar</a>
            </div>
        </form>
    </div>
</body>

</html>