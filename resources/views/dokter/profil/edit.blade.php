@extends('layout.app')

@section('title', 'Profil')

@section('nav-item')
<li class="nav-item">
    <a href="/dokter/dashboard" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item">
    <a href="/dokter/jadwal_periksa" class="nav-link">
        <i class="nav-icon fas fa-solid fa-calendar"></i>
        <p>Jadwal Periksa</p>
    </a>
</li>
<li class="nav-item">
    <a href="/dokter/memeriksa" class="nav-link">
        <i class="nav-icon fas fa-solid fa-stethoscope"></i>
        <p>Memeriksa Pasien</p>
    </a>
</li>
<li class="nav-item">
    <a href="/dokter/riwayat_pasien" class="nav-link">
        <i class="nav-icon fas fa-solid fa-book-medical"></i>
        <p>Riwayat Pasien</p>
    </a>
</li>
<li class="nav-item">
    <a href="/dokter/profil" class="nav-link">
        <i class="nav-icon fas fa-solid fa-hospital-user"></i>
        <p>Profil</p>
    </a>
</li>
@endsection

@push('css')
<style>
    /* Kustomisasi Warna dan Gaya untuk KliNiku */
    :root {
        --primary-blue: #00509E;
        --accent-orange: #FF7A59;
    }
    .profile-user-img {
        width: 128px;
        height: 128px;
        object-fit: cover;
    }
    .btn-kliniku-primary {
        background-color: var(--primary-blue);
        border-color: var(--primary-blue);
        color: white;
        font-weight: 600;
    }
    .btn-kliniku-primary:hover {
        background-color: #003d7a;
        border-color: #003d7a;
        color: white;
    }
    .card-primary.card-outline {
        border-top: 3px solid var(--primary-blue);
    }
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        background-color: var(--primary-blue);
        color: white;
    }
    .list-group-item i {
        width: 20px;
        text-align: center;
        margin-right: 8px;
        color: #6c757d;
    }
    .form-group label {
        font-weight: 600 !important;
    }
</style>
@endpush

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profil Saya</h1>
            </div><div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dokter/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Profil Dokter</li>
                </ol>
            </div></div></div></div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg"
                                 alt="Foto profil dokter">
                        </div>
                        <h3 class="profile-username text-center"><strong>{{ $dokter->nama ?? 'Nama Dokter' }}</strong></h3>
                        <p class="text-muted text-center">{{$user->role}}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <i class="fas fa-envelope"></i> <b>{{$user->nama}}</b> <a class="float-right">{{ $user->email ?? 'email@kliniku.com' }}</a>
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-phone"></i> <b>Telepon</b> <a class="float-right">{{ $dokter->no_hp ?? 'Belum diisi' }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#edit_profil" data-toggle="tab">Edit Profil</a></li>
                            <li class="nav-item"><a class="nav-link" href="#ubah_password" data-toggle="tab">Ubah Password</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="edit_profil">
                                <form class="form-horizontal" method="post" action="/dokter/profil">
                                     @csrf
                                     @method('put')
                                     
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap dengan Gelar" value="{{ old('nama', $dokter->nama) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                           <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat Tempat Tinggal">{{ old('alamat', $dokter->alamat) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_hp" class="col-sm-3 col-form-label">Nomor HP</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP Aktif" value="{{ old('no_hp', $dokter->no_hp) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-3 col-sm-9">
                                            <button type="submit" class="btn btn-kliniku-primary">Simpan Perubahan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="ubah_password">
                                <form class="form-horizontal" method="post" action="/dokter/profil/password">
                                    @csrf
                                    @method('put')

                                    <div class="form-group row">
                                        <label for="current_password" class="col-sm-4 col-form-label">Password Lama</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Password Lama" required>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label for="password" class="col-sm-4 col-form-label">Password Baru</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password Baru" required>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label for="password_confirmation" class="col-sm-4 col-form-label">Konfirmasi Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password Baru" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-4 col-sm-8">
                                            <button type="submit" class="btn btn-kliniku-primary">Ubah Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection