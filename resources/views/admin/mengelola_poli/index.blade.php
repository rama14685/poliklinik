@extends('layout.app')

@section('title','Poli')

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
        <h1 class="m-0">Poli</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Poli</li>
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
            <h3 class="card-title">Daftar Poli</h3>
            <a href="/admin/mengelola_poli/create" class="btn btn-sm btn-info ml-2">Tambah Poli</a>
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
                  <th>Nama Poli</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($polis as $poli)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$poli->nama_poli}}</td>
                  <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $poli->keterangan }}">
                    {{ $poli->keterangan }}
                  </td>
                  <td>
                    <div class="row">
                      <a href="/admin/mengelola_poli/{{ $poli->id }}/edit" class="btn btn-warning">Edit</a>
                      <form action="/admin/mengelola_poli/{{ $poli->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data poli {{ $poli->nama_poli }}?')" class="btn btn-danger ml-2">Delete</button>
                      </form>
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="4" class="text-center">Tidak ada data poli</td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <div class="mt4">
              {{ $polis->links() }}
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