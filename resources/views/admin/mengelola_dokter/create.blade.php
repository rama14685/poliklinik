@extends('layout.app')

@section('title','Tambah Dokter')

@section('nav-item')
<li class="nav-item">
  <a href="/admin/dashboard" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>Dashboard</p>
  </a>
</li>
<li class="nav-item">
  <a href="/admin/mengelola_dokter" class="nav-link">
    <i class="nav-icon fas fa-solid fa-hospital-user"></i>
    <p>Dokter</p>
  </a>
</li>
<li class="nav-item">
  <a href="/admin/mengelola_pasien" class="nav-link">
    <i class="nav-icon fas fa-solid fa-bed"></i>
    <p>Pasien</p>
  </a>
</li>
<li class="nav-item">
  <a href="/admin/mengelola_poli" class="nav-link">
    <i class="nav-icon fas fa-solid fa-hospital"></i>
    <p>Poli</p>
  </a>
</li>
<li class="nav-item">
  <a href="/admin/obat" class="nav-link">
    <i class="nav-icon fas fa-solid fa-capsules"></i>
    <p>Obat</p>
  </a>
</li>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dokter</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
          <li class="breadcrumb-item"><a href="/admin/mengelola_dokter">Dokter</a></li>
          <li class="breadcrumb-item active">Tambah Dokter</li>
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
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form Tambah Dokter</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="/admin/mengelola_dokter">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="nama">Nama Dokter</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Dokter">
              </div>
              <div class="form-group">
                <label for="kemasan">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Dokter">
              </div>
              <div class="form-group">
                <label for="harga">Nomor HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor HP Dokter">
              </div>
              <div class="form-group">
                <label for="id_poli">Poli</label>
                <select class="form-control" id="id_poli" name="id_poli">
                  <option value="">-- Pilih Poli --</option>
                  @foreach($polis as $poli)
                  <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Dokter">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Dokter">
              </div>
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