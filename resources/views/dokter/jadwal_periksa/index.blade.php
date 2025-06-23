@extends('layout.app')

@section('title','Jadwal Periksa')

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
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Jadwal Periksa</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/dokter/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Jadwal Periksa</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Daftar Jadwal Periksa</h3>
            <a href="/dokter/jadwal_periksa/create" class="btn btn-sm btn-info ml-2">Tambah Jadwal Periksa</a>
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Dokter</th>
                  <th>Hari</th>
                  <th>Jadwal Mulai</th>
                  <th>Jadwal Selesai</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($jadwal_periksas as $jadwal_periksa)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$jadwal_periksa->dokter->nama}}</td>
                  <td>{{$jadwal_periksa->hari}}</td>
                  <td>{{$jadwal_periksa->jam_mulai}}</td>
                  <td>{{$jadwal_periksa->jam_selesai}}</td>
                  <td>
                    @if ($jadwal_periksa->status == 'aktif')
                    <span class="badge badge-success">Aktif</span>
                    @else
                    <span class="badge badge-danger">Tidak Aktif</span>
                    @endif
                  <td>
                    <div class="row">
                      <a href="/dokter/jadwal_periksa/{{ $jadwal_periksa->id }}/edit" class="btn btn-warning">Edit</a>
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="7" class="text-center">Tidak ada jadwal periska</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection