@extends('layout.app')

@section('title','Obat')

@section('nav-item')
<li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-stethoscope"></i>
                  <p>Memeriksa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
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
            <h1 class="m-0">Obat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Obat</li>
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
                <h3 class="card-title">Form Tambah Obat</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_obat">Nama Obat</label>
                    <input type="text" class="form-control" id="nama_obat" placeholder="Masukkan Nama Obat">
                  </div>
                  <div class="form-group">
                    <label for="kemasan">Kemasan</label>
                    <input type="text" class="form-control" id="kemasan" placeholder="Masukkan Kemasan Obat">
                  </div>
                  <div class="form-group">
                    <label for="harga_obat">Obat</label>
                    <input type="number" class="form-control" id="harga_obat" placeholder="Masukkan Harga Obat">
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
                <h3 class="card-title">Daftar Obat</h3>

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
                      <th>Nama Obat</th>
                      <th>Kemasan</th>
                      <th>Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($obats as $obat)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$obat->nama_obat}}</td>
                      <td>{{$obat->kemasan}}</td>
                      <td>{{$obat->harga}}</td>
                      <td><span>Edit</span><span>Delete</span></td>
                    </tr>
                    @endforeach
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