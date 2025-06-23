@extends('layout.app')

@section('title','Dashboard Dokter')

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
                {{-- Mengambil nama dokter yang login dari sistem autentikasi Laravel --}}
                <h1 class="m-0">Selamat Bertugas, <strong>dr. {{$user->nama}}</strong></h1>
            </div><div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dokter/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard Dokter</li>
                </ol>
            </div></div></div></div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box" style="background-color: #00509E; color: white;">
                    <div class="inner">
                        {{-- Ganti dengan data dinamis jumlah jadwal hari ini --}}
                        <h3>15</h3>
                        <p>Total Jadwal Hari Ini</p>
                    </div>
                    <div class="icon"><i class="fas fa-calendar-day" style="color: rgba(255,255,255,0.3);"></i></div>
                    <a href="/dokter/jadwal_periksa" class="small-box-footer">Lihat Jadwal Lengkap <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box" style="background-color: #FF7A59; color: white;">
                    <div class="inner">
                        {{-- Ganti dengan data dinamis jumlah pasien menunggu --}}
                        <h3>8</h3>
                        <p>Pasien Menunggu</p>
                    </div>
                    <div class="icon"><i class="fas fa-user-clock" style="color: rgba(255,255,255,0.3);"></i></div>
                    <a href="/dokter/memeriksa" class="small-box-footer">Lihat Antrian <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        {{-- Ganti dengan data dinamis jumlah pemeriksaan selesai hari ini --}}
                        <h3>7</h3>
                        <p>Pemeriksaan Selesai</p>
                    </div>
                    <div class="icon"><i class="fas fa-check-circle" style="color: rgba(255,255,255,0.3);"></i></div>
                    <a href="/dokter/riwayat_pasien" class="small-box-footer">Lihat Riwayat <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>Profil</h3>
                        <p>Kelola Informasi Anda</p>
                    </div>
                    <div class="icon"><i class="fas fa-id-card" style="color: rgba(255,255,255,0.3);"></i></div>
                    <a href="/dokter/profil" class="small-box-footer">Edit Profil <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            </div>
        <div class="row">
            <section class="col-lg-7 connectedSortable">
                <div class="card" style="border-top: 4px solid #00509E;">
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold">
                            <i class="fas fa-clipboard-list mr-2"></i>
                            Antrian Pasien untuk Diperiksa
                        </h3>
                    </div>
                    <div class="card-body p-0">
                         <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">Antrian</th>
                                        <th>Nama Pasien</th>
                                        <th>Keluhan Awal</th>
                                        <th style="width: 20%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Contoh data, ganti dengan data dari backend --}}
                                    <tr>
                                        <td><span class="badge badge-primary font-weight-bold p-2">A-01</span></td>
                                        <td>Budi Setiawan</td>
                                        <td>Demam dan batuk</td>
                                        {{-- Tombol ini mengarah ke halaman pemeriksaan --}}
                                        <td><a href="/dokter/memeriksa/1" class="btn btn-sm" style="background-color: #FF7A59; color: white;"><i class="fas fa-play-circle mr-1"></i> Mulai Periksa</a></td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge badge-primary font-weight-bold p-2">A-02</span></td>
                                        <td>Siti Aminah</td>
                                        <td>Sakit kepala</td>
                                        <td><a href="/dokter/memeriksa/2" class="btn btn-sm" style="background-color: #FF7A59; color: white;"><i class="fas fa-play-circle mr-1"></i> Mulai Periksa</a></td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge badge-secondary font-weight-bold p-2">A-03</span></td>
                                        <td>Ahmad Susanto</td>
                                        <td>Kontrol rutin</td>
                                        <td><a href="/dokter/memeriksa/3" class="btn btn-sm disabled" style="background-color: #6c757d; color: white;" aria-disabled="true"><i class="fas fa-hourglass-start mr-1"></i> Menunggu</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="col-lg-5 connectedSortable">
                <div class="card" style="border-top: 4px solid #6c757d;">
                     <div class="card-header">
                        <h3 class="card-title font-weight-bold">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            Ringkasan Jadwal Hari Ini
                        </h3>
                    </div>
                    <div class="card-body p-0">
                         <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div><i class="fas fa-clock text-primary mr-2"></i> <strong>10:00</strong> - Budi Setiawan</div>
                                <span class="badge badge-success">Selesai</span>
                            </li>
                             <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div><i class="fas fa-clock text-primary mr-2"></i> <strong>10:15</strong> - Siti Aminah</div>
                                <span class="badge badge-warning">Berikutnya</span>
                            </li>
                             <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div><i class="fas fa-clock text-muted mr-2"></i> <strong>10:30</strong> - Ahmad Susanto</div>
                                <span class="badge badge-secondary">Menunggu</span>
                            </li>
                             <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div><i class="fas fa-clock text-muted mr-2"></i> <strong>10:45</strong> - Dewi Lestari</div>
                                <span class="badge badge-secondary">Menunggu</span>
                            </li>
                        </ul>
                    </div>
                     <div class="card-footer text-center">
                        <a href="/dokter/jadwal_periksa">Lihat Jadwal Lengkap</a>
                    </div>
                </div>
            </section>
        </div>
        </div></section>
@endsection