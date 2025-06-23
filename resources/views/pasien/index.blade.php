@extends('layout.app')

@section('title', 'Dashboard Pasien - KliNiku')

{{-- Menyisipkan CSS kustom ke dalam layout utama --}}
@push('css')
    <style>
        /* Kustomisasi Warna KliNiku */
        :root {
            --primary-blue: #00509E;
            --accent-orange: #FF7A59;
        }

        /* Mengganti warna default small-box */
        .small-box.bg-kliniku-blue {
            background-color: var(--primary-blue) !important;
            color: #fff !important;
        }
        .small-box.bg-kliniku-orange {
            background-color: var(--accent-orange) !important;
            color: #fff !important;
        }
        .small-box .icon>i {
            color: rgba(255, 255, 255, 0.3);
            font-size: 70px;
        }

        /* Kartu jadwal kunjungan yang didesain ulang */
        .card-appointment {
            border-left: 5px solid var(--primary-blue);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        .card-appointment .card-body {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }
        .appointment-icon {
            font-size: 4rem;
            color: var(--primary-blue);
            opacity: 0.2;
        }
        .appointment-details h5 {
            font-weight: 700;
            color: var(--primary-blue);
        }
        .appointment-details p {
            margin-bottom: 5px;
            color: #6c757d;
        }
        .appointment-details p i {
            margin-right: 8px;
            width: 15px;
        }
        
        /* Kartu Selamat Datang */
        .card-welcome {
            background: linear-gradient(135deg, var(--primary-blue), #007bff);
            color: white;
        }
        .card-welcome h4 {
            font-weight: 700;
        }
    </style>
@endpush


@section('nav-item')
{{-- Ini adalah menu sidebar Anda, sudah bagus dan relevan --}}
<li class="nav-item">
    <a href="/pasien/dashboard" class="nav-link active"> {{-- Tambahkan class active di sini --}}
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item">
    <a href="/pasien/daftar_poli" class="nav-link">
        <i class="nav-icon fas fa-hospital"></i>
        <p>Daftar Poli</p>
    </a>
</li>
<li class="nav-item">
    <a href="/pasien/riwayat" class="nav-link">
        <i class="nav-icon fas fa-history"></i>
        <p>Riwayat Periksa</p>
    </a>
</li>
@endsection


@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- Ganti dengan nama user yang login --}}
                <h1 class="m-0">Dashboard KliNiku</h1>
            </div><div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard Pasien</li>
                </ol>
            </div></div></div></div>
<section class="content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="card card-welcome">
                    <div class="card-body">
                        <h4>Selamat Datang Kembali, <strong>{{$user->nama}}</strong></h4>
                        <p class="mb-0">Semoga Anda sehat selalu. Gunakan dashboard ini untuk mengelola jadwal dan riwayat kesehatan Anda.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="small-box bg-kliniku-blue">
                    <div class="inner">
                        {{-- Ganti dengan data nomor antrian jika ada --}}
                        <h3>A-05</h3> 
                        <p>Nomor Antrian Anda Hari Ini</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-clock"></i>
                    </div>
                    <a href="/pasien/daftar_poli" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="small-box bg-kliniku-orange">
                    <div class="inner">
                        {{-- Ganti dengan jumlah jadwal --}}
                        <h3>1</h3>
                        <p>Jadwal Kunjungan Mendatang</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <a href="#" class="small-box-footer">Lihat Semua Jadwal <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        {{-- Ganti dengan jumlah riwayat --}}
                        <h3>12</h3>
                        <p>Total Riwayat Pemeriksaan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-notes-medical"></i>
                    </div>
                    <a href="#card-header" class="small-box-footer">Lihat Riwayat <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            </div>
        <div class="row">
            <section class="col-lg-12">
                
                <div class="card card-appointment">
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold">
                            <i class="fas fa-calendar-check mr-2"></i>
                            Jadwal Kunjungan Berikutnya
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="appointment-info">
                           <div class="appointment-details">
                                <h5>Poli Gigi</h5>
                                <p><i class="fas fa-user-md"></i> drg. Anisa Rahma, Sp.KG</p>
                                <p><i class="fas fa-calendar-day"></i> Selasa, 24 Juni 2025</p>
                                <p><i class="fas fa-clock"></i> 10:00 - 11:00 WIB</p>
                           </div>
                        </div>
                        <div class="appointment-icon">
                            <i class="fas fa-tooth"></i>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-history mr-2"></i>
                            Riwayat Kunjungan Terakhir
                        </h3>
                         <div class="card-tools">
                            <a href="/pasien/riwayat" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Poli</th>
                                        <th>Dokter</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Contoh data, ganti dengan data dari database --}}
                                    <tr>
                                        <td>15 Mei 2025</td>
                                        <td>Poli Umum</td>
                                        <td>dr. Budi Santoso</td>
                                        <td><span class="badge badge-success">Selesai</span></td>
                                        <td><a href="#" class="btn btn-xs btn-info">Lihat Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>02 April 2025</td>
                                        <td>Poli Anak</td>
                                        <td>dr. Citra Dewi, Sp.A</td>
                                        <td><span class="badge badge-success">Selesai</span></td>
                                        <td><a href="#" class="btn btn-xs btn-info">Lihat Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>10 Maret 2025</td>
                                        <td>Poli Gigi</td>
                                        <td>drg. Anisa Rahma, Sp.KG</td>
                                        <td><span class="badge badge-success">Selesai</span></td>
                                        <td><a href="#" class="btn btn-xs btn-info">Lihat Detail</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </section>
        </div>
        </div></section>
@endsection