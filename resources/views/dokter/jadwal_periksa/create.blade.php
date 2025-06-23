@extends('layout.app')

@section('title', 'Tambah Jadwal Periksa')

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

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Jadwal Periksa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dokter/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/dokter/jadwal_periksa">Jadwal Periksa</a></li>
                    <li class="breadcrumb-item active">Tambah Jadwal Periksa</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Jadwal Periksa</h3>
            </div>

            <!-- form start -->
            <form method="post" action="/dokter/jadwal_periksa">
                @csrf
                <div class="card-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="hari">Hari</label>
                            <select class="form-control" id="hari" name="hari" required>
                                <option value="">-- Pilih Hari --</option>
                                @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
                                <option value="{{ $hari }}">{{ $hari }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jam_mulai">Jam Mulai</label>
                            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                        </div>

                        <div class="form-group">
                            <label for="jam_selesai">Jam Selesai</label>
                            <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer text-right">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary ml-2">Simpan</button>
                        </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection