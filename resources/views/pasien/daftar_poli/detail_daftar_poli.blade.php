@extends('layout.app')

@section('title','Detail Daftar Poli')

@section('nav-item')
<li class="nav-item">
    <a href="/pasien/dashboard" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item">
    <a href="/pasien/daftar_poli" class="nav-link">
        <i class="nav-icon fas fa-solid fa-hospital"></i>
        <p>Poli</p>
    </a>
</li>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Daftar Poli</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/pasien/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/pasien/daftar_poli">Daftar Poli</a></li>
                    <li class="breadcrumb-item active">Detail Daftar Poli</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Detail</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama Poli</th>
                                <td>{{ $daftar_poli->jadwal->dokter->poli->nama_poli ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Nama Dokter</th>
                                <td>{{ $daftar_poli->jadwal->dokter->nama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Hari</th>
                                <td>{{ $daftar_poli->jadwal->hari ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Mulai</th>
                                <td>{{ $daftar_poli->jadwal->jam_mulai ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Selesai</th>
                                <td>{{ $daftar_poli->jadwal->jam_selesai ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Antrian</th>
                                <td>
                                    <span class="badge badge-success p-2">{{ $daftar_poli->no_antrian }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Keluhan</th>
                                <td>{{ $daftar_poli->keluhan }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer text-right">
                        <a href="/pasien/daftar_poli" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection