@extends('layout.app')

@section('title', 'Memeriksa')

@section('nav-item')
<li class="nav-item">
    <a href="/dokter/dashboard" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item">
    <a href="/dokter/memeriksa" class="nav-link active">
        <i class="nav-icon fas fa-stethoscope"></i>
        <p>Memeriksa</p>
    </a>
</li>
<li class="nav-item">
    <a href="/dokter/obat" class="nav-link">
        <i class="nav-icon fas fa-capsules"></i>
        <p>Obat</p>
    </a>
</li>
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Memeriksa Pasien</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dokter/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/dokter/memeriksa">Memeriksa</a></li>
                    <li class="breadcrumb-item active">Memeriksa Pasien</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Memeriksa Pasien</h3>
            </div>

            <!-- form start -->
            <form method="POST" action="/dokter/memeriksa">
                            @csrf
                            <!-- Tambahkan input hidden untuk menyimpan id_periksa -->
                            <input type="hidden" name="id_periksa" value="{{ $periksa->id }}">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_pasien">Nama Pasien</label>
                                    <input type="text" class="form-control" id="nama_pasien" name="nama"
                                        value="{{ $periksa->pasien->nama }}" placeholder="Masukkan Nama" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tgl">Tanggal</label>
                                    <input type="date" class="form-control" id="tgl" name="tgl_periksa"
                                        placeholder="Masukkan Tanggal" required>
                                </div>
                                <div class="form-group">
                                    <label for="catatan">Catatan</label>
                                    <input type="text" class="form-control" id="catatan" name="catatan"
                                        placeholder="Berikan Catatan" required>
                                </div>
                                <div class="form-group">
                                    <label>Obat</label>
                                    <div class="d-flex">
                                        <select class="custom-select form-control" id="obat-select">
                                            <option selected>Pilih Obat</option>
                                            @foreach($obats as $obat)
                                                <option value="{{ $obat->id }}" data-harga="{{ $obat->harga }}">
                                                    {{ $obat->nama_obat }} - {{ $obat->kemasan }} -
                                                    Rp {{ number_format($obat->harga, 0, ',', '.') }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button type="button" id="clear-all-obats" class="btn btn-outline-danger ml-2"
                                            style="display: block;">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>

                                    <div class="selected-obats mt-3" id="selected-obats-container" style="display: block;">
                                        <ul class="list-group" id="selected-obats-list">
                                            @if(isset($selected_obats) && !empty($selected_obats))
                                                @foreach($obats as $obat)
                                                    @if(in_array($obat->id, $selected_obats))
                                                        <li class="list-group-item d-flex justify-content-between align-items-center"
                                                            data-id="{{ $obat->id }}" data-harga="{{ $obat->harga }}">
                                                            {{ $obat->nama_obat }} - {{ $obat->kemasan }} - Rp
                                                            {{ number_format($obat->harga, 0, ',', '.') }}
                                                            <button type="button" class="btn btn-sm btn-danger remove-obat">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                            <input type="hidden" name="obat[]" value="{{ $obat->id }}">
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="biaya">Biaya Periksa dan Obat</label>
                                    <input type="text" class="form-control" id="biaya" readonly>
                                    <input type="hidden" name="biaya_periksa" id="biaya_hidden" value="150000">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
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

@section('scripts')
    <script>
        $(function () {
            const obatSelect = document.getElementById('obat-select');
            const selectedObatsList = document.getElementById('selected-obats-list');
            const selectedObatsContainer = document.getElementById('selected-obats-container');
            const clearAllBtn = document.getElementById('clear-all-obats');
            const biayaInput = document.getElementById('biaya');

            // Set default biaya to 150000
            const defaultBiaya = 150000;
            biayaInput.value = defaultBiaya;

            // Set untuk menyimpan ID obat yang sudah dipilih
            const selectedObats = new Set();

            // Object to store obat prices
            const obatPrices = {};

            // Populate obatPrices with available obat data
            document.querySelectorAll('#obat-select option').forEach(option => {
                if (option.value !== 'Pilih Obat') {
                    // Get price from data-harga attribute if available
                    const harga = option.getAttribute('data-harga');
                    if (harga) {
                        obatPrices[option.value] = parseInt(harga);
                    } else {
                        // Extract price from option text (format: "nama_obat - kemasan - Rp xxx.xxx")
                        const priceText = option.text.split('Rp ')[1];
                        if (priceText) {
                            // Convert formatted price (e.g., "150.000") to number (150000)
                            const price = parseInt(priceText.replace(/\./g, ''));
                            obatPrices[option.value] = price;
                        }
                    }
                }
            });

            // Calculate total biaya based on selected obat
            function calculateTotalBiaya() {
                let total = defaultBiaya;

                selectedObatsList.querySelectorAll('li').forEach(item => {
                    const obatId = item.dataset.id;
                    if (obatId && obatPrices[obatId]) {
                        total += obatPrices[obatId];
                    }
                });

                const formatted = 'Rp ' + total.toLocaleString('id-ID');
                biayaInput.value = formatted;
                document.getElementById('biaya_hidden').value = total;
            }

            // Inisialisasi obat yang sudah terpilih sebelumnya
            document.querySelectorAll('#selected-obats-list li').forEach(item => {
                selectedObats.add(item.dataset.id);
            });

            // Calculate initial total based on pre-selected obat
            calculateTotalBiaya();

            // Tambahkan obat ketika dipilih dari dropdown
            obatSelect.addEventListener('change', function () {
                const option = this.options[this.selectedIndex];
                const obatId = option.value;
                const obatText = option.text;

                if (obatId && !selectedObats.has(obatId) && obatId !== 'Pilih Obat') {
                    // Buat elemen list item baru
                    const li = document.createElement('li');
                    li.className = 'list-group-item d-flex justify-content-between align-items-center';
                    li.dataset.id = obatId;

                    // Tambahkan data-harga jika tersedia di option
                    const harga = option.getAttribute('data-harga');
                    if (harga) {
                        li.dataset.harga = harga;
                    }

                    // Isi list item
                    li.innerHTML =
                        `${obatText}<button type="button" class="btn btn-sm btn-danger remove-obat"> <i class="fas fa-times"></i></button> <input type="hidden" name="obat[]" value="${obatId}">`;

                    // Tambahkan handler untuk tombol hapus
                    const removeBtn = li.querySelector('.remove-obat');
                    removeBtn.addEventListener('click', function () {
                        li.remove();
                        selectedObats.delete(obatId);

                        // Sembunyikan container jika tidak ada obat yang dipilih
                        if (selectedObatsList.children.length === 0) {
                            selectedObatsContainer.style.display = 'none';
                        }

                        // Recalculate total biaya after removing obat
                        calculateTotalBiaya();
                    });

                    // Tampilkan container dan tambahkan item
                    selectedObatsContainer.style.display = 'block';
                    selectedObatsList.appendChild(li);

                    // Tambahkan ke set obat yang dipilih
                    selectedObats.add(obatId);

                    // Recalculate total biaya after adding obat
                    calculateTotalBiaya();
                }

                // Reset dropdown ke placeholder
                this.selectedIndex = 0;
            });

            // Handler untuk tombol hapus pada item yang sudah ada
            document.querySelectorAll('.remove-obat').forEach(btn => {
                btn.addEventListener('click', function () {
                    const li = this.closest('li');
                    const obatId = li.dataset.id;

                    li.remove();
                    selectedObats.delete(obatId);

                    // Sembunyikan container jika tidak ada obat yang dipilih
                    if (selectedObatsList.children.length === 0) {
                        selectedObatsContainer.style.display = 'none';
                    }

                    // Recalculate total biaya after removing obat
                    calculateTotalBiaya();
                });
            });

            // Hapus semua obat yang dipilih
            clearAllBtn.addEventListener('click', function () {
                selectedObatsList.innerHTML = '';
                selectedObats.clear();
                selectedObatsContainer.style.display = 'none';

                // Reset biaya to default after clearing all obat
                biayaInput.value = defaultBiaya;
            });

            // Sembunyikan container jika tidak ada obat yang dipilih
            if (selectedObatsList.children.length === 0) {
                selectedObatsContainer.style.display = 'none';
            }
        });
    </script>
@endsection