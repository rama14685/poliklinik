@extends('layout.app')

@section('title','Poli')

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
        <h1 class="m-0">Daftar Poli</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/pasien/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Daftar Poli</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form Daftar Poli</h3>
          </div>
          <form method="POST" action="/pasien/daftar_poli">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="no_rm">Nomor RM</label>
                <input type="text" class="form-control" id="no_rm" name="no_rm" readonly value="{{ auth()->user()->no_rm }}">
              </div>
              <div class="form-group">
                <label for="nama_poli">Pilih Poli</label>
                <select class="form-control" name="nama_poli" id="nama_poli" required>
                  <option selected disabled>Silahkan Pilih Poli</option>
                  @forelse ($polis as $poli)
                  <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                  @empty
                  <option>Poli belum ada</option>
                  @endforelse
                </select>
              </div>
              <div class="form-group">
                <label for="id_jadwal">Pilih Jadwal</label>
                <select class="form-control" name="id_jadwal" id="id_jadwal" required>
                  <option selected disabled>Silahkan Pilih Jadwal</option>
                </select>
              </div>
              <div class="form-group">
                <label for="keluhan">Keluhan</label>
                <input type="text" class="form-control" id="keluhan" name="keluhan" placeholder="Masukkan keluhan Anda" required>
              </div>
            </div>
            <div class="card-footer text-right">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Riwayat Daftar Poli</h3>
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
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Poli</th>
                  <th>Dokter</th>
                  <th>Hari</th>
                  <th>Mulai</th>
                  <th>Selesai</th>
                  <th>Antrian</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($daftar_polis as $daftar_poli)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{ $daftar_poli->jadwal->dokter->poli->nama_poli}}</td>
                  <td>{{ $daftar_poli->jadwal->dokter->nama}}</td>
                  <td>{{$daftar_poli->jadwal->hari}}</td>
                  <td>{{$daftar_poli->jadwal->jam_mulai}}</td>
                  <td>{{$daftar_poli->jadwal->jam_selesai}}</td>
                  <td>{{$daftar_poli->no_antrian}}</td>
                  <td>
                    @php
                    $periksa = $daftar_poli->periksa->first();
                    @endphp
                    @if (is_null($periksa))
                    <span class="badge badge-warning">Belum Diperiksa</span>
                    @else
                    <span class="badge badge-success">Sudah Diperiksa</span>
                    @endif
                  </td>
                  <td>
                    @php
                    $periksa = $daftar_poli->periksa->first();
                    @endphp
                    @if (is_null($periksa))
                    <a href="{{ url('/pasien/daftar_poli/detail_daftar_poli/' . $daftar_poli->id) }}" class="btn btn-primary btn-sm">Detail</a>
                    @else
                    <a href="{{ url('/pasien/daftar_poli/riwayat_daftar_poli/' . $daftar_poli->id) }}" class="btn btn-success btn-sm">Riwayat</a>
                    @endif
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="9" class="text-center">Anda belum melakukan daftar poli</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#nama_poli').change(function() {
    let idPoli = $(this).val();
    $('#id_jadwal').html('<option selected disabled>Memuat...</option>');
    $.ajax({
      url: '/get-jadwal-by-poli',
      type: 'GET',
      data: {
        id_poli: idPoli
      },
      success: function(data) {
        let options = '<option selected disabled>Silahkan Pilih Jadwal</option>';
        data.forEach(jadwal => {
          options += `<option value="${jadwal.id}">${jadwal.hari} | ${jadwal.jam_mulai} - ${jadwal.jam_selesai} | ${jadwal.dokter.nama}</option>`;
        });
        $('#id_jadwal').html(options);
      }
    });
  });
</script>
@endsection