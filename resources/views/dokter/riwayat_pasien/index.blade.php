@extends('layout.app')

@section('title','Riwayat Pasien')

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
                <h1 class="m-0">Riwayat Pasien</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dokter/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Riwayat Pasien</li>
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
                        <h3 class="card-title">Daftar Riwayat Pasien</h3>
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
                                    <th>Nama Pasien</th>
                                    <th>Alamat</th>
                                    <th>Nomor KTP</th>
                                    <th>Nomor HP</th>
                                    <th>Nomor RM</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pasiens as $pasien)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$pasien->nama}}</td>
                                    <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $pasien->alamat }}">
                                        {{ $pasien->alamat }}
                                    </td>
                                    <td>{{$pasien->no_ktp}}</td>
                                    <td>{{$pasien->no_hp}}</td>
                                    <td>{{$pasien->no_rm}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#riwayatModal{{ $pasien->id }}">
                                            Detail Riwayat Periksa
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data pasien</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        @foreach ($pasiens as $pasien)
                        <!-- Modal -->
                        <div class="modal fade" id="riwayatModal{{ $pasien->id }}" tabindex="-1" role="dialog" aria-labelledby="riwayatModalLabel{{ $pasien->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Riwayat {{ $pasien->nama }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @php
                                        $riwayats = $pasien->daftar_poli_pasien->whereNotNull('periksa')->sortByDesc('periksa.tgl_periksa');
                                        @endphp

                                        @if ($riwayats->isEmpty())
                                        <p class="text-center">Tidak ada data riwayat pasien</p>
                                        @else
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead class="thead-regular">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal Periksa</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Nama Dokter</th>
                                                        <th>Keluhan</th>
                                                        <th>Catatan</th>
                                                        <th>Obat</th>
                                                        <th>Biaya Periksa</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($riwayats as $i => $daftar)
                                                    <tr>
                                                        <td>{{ $i + 1 }}</td>
                                                        @php $periksa = $daftar->periksa->first(); @endphp
                                                        @if ($periksa)
                                                        <td>{{ $periksa->tgl_periksa }}</td>
                                                        <td>{{ $pasien->nama }}</td>
                                                        <td>{{ $daftar->jadwal->dokter->nama }}</td>
                                                        <td>{{ $daftar->keluhan }}</td>
                                                        <td>{{ $periksa->catatan }}</td>
                                                        <td>{{ $periksa->detail_periksa_periksa->map(fn($detail) => $detail->obat->nama_obat)->implode(', ') ?: '-' }}</td>
                                                        <td>Rp{{ number_format($periksa->biaya_periksa, 0, ',', '.') }}</td>
                                                    </tr>
                                                    @else
                                                    <td colspan="10" class="text-center text-muted">Belum diperiksa</td>
                                                    @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="mt4">
                            {{ $pasiens->links() }}
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