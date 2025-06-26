@extends('layout.app')

@section('title','Dashboard Admin')

@section('nav-item')
<li class="nav-item">
  <a href="/admin/dashboard" class="nav-link active"> {{-- Diberi class active --}}
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>Dashboard</p>
  </a>
</li>
<li class="nav-item">
  <a href="/admin/mengelola_dokter" class="nav-link">
    <i class="nav-icon fas fa-user-doctor"></i>
    <p>Dokter</p>
  </a>
</li>
<li class="nav-item">
  <a href="/admin/mengelola_pasien" class="nav-link">
    <i class="nav-icon fas fa-bed"></i>
    <p>Pasien</p>
  </a>
</li>
<li class="nav-item">
  <a href="/admin/mengelola_poli" class="nav-link">
    <i class="nav-icon fas fa-hospital"></i>
    <p>Poli</p>
  </a>
</li>
<li class="nav-item">
  <a href="/admin/obat" class="nav-link">
    <i class="nav-icon fas fa-capsules"></i>
    <p>Obat</p>
  </a>
</li>
@endsection

@push('css')
<style>
    /* Kustomisasi Warna dan Gaya untuk KliNiku Admin */
    :root {
        --primary-blue: #00509E;
        --accent-orange: #FF7A59;
        --dark-blue: #111B29;
        --light-grey: #f8f9fa;
    }

    .small-box {
        border-radius: .5rem;
        box-shadow: 0 0 1px rgba(0,0,0,.125),0 1px 3px rgba(0,0,0,.2);
    }
    .small-box h3 {
        font-weight: 800;
    }
    .small-box .icon>i.fa, .small-box .icon>i.fas {
        color: rgba(0,0,0,.15);
        font-size: 60px;
        top: 20px;
    }
    .card {
        border-radius: .5rem;
    }
    .card-primary.card-outline {
        border-top: 3px solid var(--primary-blue);
    }
    .btn-kliniku {
        background-color: var(--primary-blue);
        color: white;
        font-weight: 600;
    }
    .btn-kliniku:hover {
        background-color: #003d7a;
        color: white;
    }
    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active {
        background-color: var(--accent-orange);
    }
</style>
@endpush


@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard Administrator</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        {{-- DIUBAH MENJADI DINAMIS --}}
                        <h3>{{ $jumlahDokter }}</h3>
                        <p>Total Dokter</p>
                    </div>
                    <div class="icon"><i class="fas fa-user-doctor"></i></div>
                    <a href="/admin/mengelola_dokter" class="small-box-footer">Kelola Dokter <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        {{-- DIUBAH MENJADI DINAMIS --}}
                        <h3>{{ $jumlahPasien }}</h3>
                        <p>Total Pasien</p>
                    </div>
                    <div class="icon"><i class="fas fa-users"></i></div>
                    <a href="/admin/mengelola_pasien" class="small-box-footer">Kelola Pasien <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        {{-- DIUBAH MENJADI DINAMIS --}}
                        <h3>{{ $jumlahObat }}</h3>
                        <p>Jenis Obat Terdaftar</p>
                    </div>
                    <div class="icon"><i class="fas fa-pills"></i></div>
                    <a href="/admin/obat" class="small-box-footer">Kelola Obat <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        {{-- DIUBAH MENJADI DINAMIS --}}
                        <h3>{{ $jumlahPoli }}</h3>
                        <p>Total Poli</p>
                    </div>
                    <div class="icon"><i class="fas fa-hospital"></i></div>
                    <a href="/admin/mengelola_poli" class="small-box-footer">Kelola Poli <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <section class="col-lg-7">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-bar mr-1"></i>
                            Jumlah Pasien per Poli
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="pasienPerPoliChart" style="min-height: 250px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </section>
            <section class="col-lg-5">
                 <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Stok Obat Kritis</strong></h3>
                         <div class="card-tools">
                            <a href="/admin/obat" class="btn btn-sm btn-outline-primary">Kelola Stok</a>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- Logic untuk stok obat kritis perlu dibuat di controller --}}
                        <div class="progress-group">
                            Paracetamol 500mg
                            <span class="float-right"><b>24</b>/200</span>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-danger" style="width: 12%"></div>
                            </div>
                        </div>
                        <div class="progress-group">
                            Amoxicillin 500mg
                            <span class="float-right"><b>80</b>/400</span>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-warning" style="width: 20%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
@endsection

@push('scripts')
{{-- Pastikan Anda sudah memuat library Chart.js di layout utama Anda --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Mengambil data dari controller yang di-encode sebagai JSON
  const chartLabels = @json($chartLabels);
  const chartData = @json($chartData);

  const pasienPerPoliData = {
    labels: chartLabels,
    datasets: [{
      label: 'Jumlah Pasien',
      backgroundColor: 'rgba(0, 80, 158, 0.9)',
      borderColor: 'rgba(0, 80, 158, 1)',
      data: chartData
    }]
  };

  const barChartCanvas = $('#pasienPerPoliChart').get(0).getContext('2d');
  const barChartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    datasetFill: false,
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,
          callback: function(value) {if (Number.isInteger(value)) {return value;}}
        }
      }]
    }
  };

  new Chart(barChartCanvas, {
    type: 'bar',
    data: pasienPerPoliData,
    options: barChartOptions
  });
</script>
@endpush