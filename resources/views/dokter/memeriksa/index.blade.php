@extends('layout.app')

@section('title','Memeriksa')

@section('nav-item')
<li class="nav-item">
  <a href="/dokter/dashboard" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>Dashboard</p>
  </a>
</li>
<li class="nav-item">
  <a href="/dokter/memeriksa" class="nav-link">
    <i class="nav-icon fas fa-solid fa-stethoscope"></i>
    <p>Memeriksa</p>
  </a>
</li>
<li class="nav-item">
  <a href="/dokter/obat" class="nav-link">
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
            <h1 class="m-0">Memeriksa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dokter/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Memeriksa</li>
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
                <h3 class="card-title">Daftar Periksa Pasien</h3>

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
                      <th>Nama</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    @forelse ($memeriksas as $memeriksa)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$memeriksa->pasien->nama}}</td>
                      <td>
                      <div class="row">
                        @if (is_null($memeriksa->tgl_periksa))
                          <a href="/dokter/memeriksa/{{ $memeriksa->id }}/create" class="btn btn-primary">Periksa</a>
                        @else
                          <a href="/dokter/memeriksa/{{ $memeriksa->id }}/edit" class="btn btn-warning">Edit</a>
                        @endif
                      </div>
                    </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="5" class="text-center">Tidak ada pasien yang diperiksa</td>
                    </tr>
                    @endforelse
                    </tr>
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