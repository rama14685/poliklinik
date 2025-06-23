@extends('layout.app')

@section('title','Dokter')

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
          <li class="breadcrumb-item active">Dokter</li>
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
            <h3 class="card-title">Daftar Dokter</h3>
            <a href="/admin/mengelola_dokter/create" class="btn btn-sm btn-info ml-2">Tambah Dokter</a>
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
                  <th>Alamat</th>
                  <th>Nomor HP</th>
                  <th>Poli</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($dokters as $dokter)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$dokter->nama}}</td>
                  <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $dokter->alamat }}">
                    {{ $dokter->alamat }}
                  </td>

                  <td>{{$dokter->no_hp}}</td>
                  <td>{{$dokter->poli->nama_poli ?? '-'}}</td>
                  <td>
                    <div class="row">
                      <a href="/admin/mengelola_dokter/{{ $dokter->id }}/edit" class="btn btn-warning">Edit</a>
                      <form action="/admin/mengelola_dokter/{{ $dokter->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data dokter {{ $dokter->nama }}?')" class="btn btn-danger ml-2">Delete</button>
                      </form>
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="6" class="text-center">Tidak ada data dokter</td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <div class="mt4">
              {{ $dokters->links() }}
            </div>
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