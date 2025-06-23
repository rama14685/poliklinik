<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi - Klinik Sehat</title>

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <style>
    /* ============================================
      Custom Styles for Professional Health Theme
      ============================================
    */

    /* Mendefinisikan palet warna untuk kemudahan kustomisasi */
    :root {
      --primary-green: #20c997; /* Hijau mint segar */
      --primary-blue: #3498db; /* Biru profesional */
      --accent-red: #e74c3c;    /* Merah untuk aksen penting */
      --dark-text: #343a40;   /* Teks utama */
      --light-text: #6c757d;  /* Teks sekunder/placeholder */
      --bg-light: #f8f9fa;   /* Latar belakang sangat muda */
      --white: #ffffff;
      --border-color: #dee2e6;
    }

    body {
      font-family: 'Nunito', sans-serif;
      background: linear-gradient(135deg, #e0f7fa, #f1f8e9); /* Gradasi halus biru muda ke hijau muda */
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 20px;
    }

    /* Wrapper utama untuk layout dua kolom */
    .main-wrapper {
      display: flex;
      width: 100%;
      max-width: 1100px;
      background-color: var(--white);
      border-radius: 16px;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    /* Panel Kiri: Informasi & Branding */
    .info-panel {
      background-color: var(--primary-green);
      color: var(--white);
      padding: 50px 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      text-align: center;
    }

    .info-panel .icon {
      font-size: 80px;
      margin-bottom: 20px;
      opacity: 0.8;
    }

    .info-panel h1 {
      font-weight: 800;
      font-size: 2.5rem;
    }

    .info-panel p {
      font-weight: 400;
      font-size: 1.1rem;
      opacity: 0.9;
    }

    /* Panel Kanan: Formulir */
    .form-panel {
      padding: 40px 50px;
      width: 100%;
    }
    
    .register-box {
        width: 100%;
    }

    .card {
      border: none;
      box-shadow: none;
      background-color: transparent;
    }
    
    /* Header pada kartu formulir */
    .form-header {
      text-align: center;
      margin-bottom: 30px;
    }
    .form-header .logo-icon {
      font-size: 36px;
      color: var(--accent-red);
      margin-bottom: 10px;
    }
    .form-header h2 {
      font-weight: 700;
      color: var(--dark-text);
      font-size: 1.8rem;
    }
    .login-box-msg {
      color: var(--light-text);
      margin-bottom: 25px;
    }

    /* Styling untuk input */
    .form-group label {
      font-weight: 600;
      color: var(--dark-text);
      margin-bottom: 8px;
      font-size: 0.9rem;
    }

    .form-control {
      background-color: #f1f5f9; /* Abu-abu sangat muda */
      border: 1px solid transparent;
      border-radius: 8px;
      padding: 12px 15px;
      height: auto;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      background-color: var(--white);
      border-color: var(--primary-green);
      box-shadow: 0 0 0 3px rgba(32, 201, 151, 0.2);
    }
    
    .input-group-text {
        background-color: transparent;
        border: none;
        color: var(--light-text);
    }
    
    /* Tombol utama */
    .btn-primary {
      background-color: var(--primary-green);
      border-color: var(--primary-green);
      font-weight: 700;
      font-size: 1rem;
      border-radius: 8px;
      padding: 12px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #17a2b8; /* Sedikit lebih gelap saat disentuh */
      border-color: #17a2b8;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    /* Link untuk login */
    .login-link a {
      color: var(--primary-blue);
      font-weight: 600;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .login-link a:hover {
      color: var(--accent-red);
      text-decoration: underline;
    }
    
    /* Responsivitas: Pada layar kecil, sembunyikan panel kiri */
    @media (max-width: 992px) {
        .info-panel {
            display: none;
        }
        .form-panel {
            padding: 30px;
        }
        .main-wrapper {
            flex-direction: column;
        }
    }

  </style>
</head>

<body>
  
  <div class="main-wrapper">
    <div class="col-lg-6 info-panel">
        <div class="icon">
            <i class="fas fa-hospital-user"></i>
        </div>
        <h1>Klinik Sehat</h1>
        <p>Platform pendaftaran pasien yang cepat, aman, dan terpercaya. Bergabunglah dengan kami untuk mendapatkan layanan kesehatan terbaik.</p>
    </div>

    <div class="col-lg-6 col-md-12 form-panel">
        <div class="register-box">
          <div class="card">
            <div class="card-body">
              
              <div class="form-header">
                <div class="logo-icon"><i class="fas fa-plus-circle"></i></div>
                <h2>Buat Akun Baru</h2>
                <p class="login-box-msg">Silakan isi data diri Anda dengan benar.</p>
              </div>

              <form action="/register" method="post">
                @csrf

                <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" required>
                    <div class="input-group-append">
                      <div class="input-group-text"><span class="fas fa-user"></span></div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                    <div class="input-group-append">
                      <div class="input-group-text"><span class="fas fa-map-marker-alt"></span></div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="no_ktp">Nomor KTP</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="Masukkan Nomor KTP" required>
                    <div class="input-group-append">
                      <div class="input-group-text"><span class="fas fa-id-card"></span></div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="no_hp">Nomor HP</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor HP" required>
                    <div class="input-group-append">
                      <div class="input-group-text"><span class="fas fa-phone"></span></div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-group">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                      <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                      </div>
                    </div>
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Buat Password Anda" required>
                    <div class="input-group-append">
                      <div class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Daftar Sekarang</button>
                  </div>
                </div>
              </form>
              <p class="mt-4 text-center login-link">
                <a href="/login">Sudah punya akun? <b>Login di sini</b></a>
              </p>
            </div>
            </div></div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>