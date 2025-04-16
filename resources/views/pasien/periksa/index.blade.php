@extends('layout.app')

@section('title','Periksa')

@section('nav-item')
<li class="nav-item">
                <a href="/pasien/periksa" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-hospital"></i>
                  <p>Periksa</p>
                </a>
              </li>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Periksa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/pasien/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Periksa</li>
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
                <h3 class="card-title">Form Periksa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="/pasien/periksa">
              @csrf
              <div class="card-body">
                  <div class="form-group">
                    <select class="form-control" name="id_dokter" id="id_dokter">
                        <option selected disabled>Silahkan Pilih Dokter</option>
                        @forelse ($dokters as $dokter)
                            <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                        @empty
                            <option>Dokter belum ada</option>
                        @endforelse
                    </select>
                </div>
              </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        </div>
        <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Riwayat Periksa</h3>

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
                      <th>Dokter</th>
                      <th>Tanggal</th>
                      <th>Biaya Periksa</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse ($periksas as $periksa)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$periksa->dokter->nama}}</td>
                      <td>
                        @if ($periksa->tgl_periksa)
                          {{ \Carbon\Carbon::parse($periksa->tgl_periksa)->translatedFormat('l, d F Y') }}
                        @else
                          N/A
                        @endif
                      </td>
                      <td>{{$periksa->biaya_periksa ? 'Rp ' .number_format($periksa->biaya_periksa, 0, ',', '.' ) : 'N/A'}}</td>
                      <td>
                      @if ($periksa->tgl_periksa)
                        <span class="badge badge-success">Sudah Diperiksa</span>
                      @else
                        <span class="badge badge-warning">Belum Diperiksa</span>
                      @endif
                    </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="5" class="text-center">Anda belum melakukan periksa</td>
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