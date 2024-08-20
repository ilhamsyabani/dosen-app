@extends('layouts.app')


@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Haki</h1>
                <p class="mb-4">Berikut adalah daftar haki Anda yang terdaftar di sistem.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 order-lg-2">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Pengguna</h5>
                        <p class="card-text">Nama: {{ Auth::user()->nama }}</p>
                        <p class="card-text">NIP: {{ Auth::user()->nip }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 order-lg-1">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Informasi Haki</h6>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('haki.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="jenis">jenis</label>
                                <select class="form-control @error('jenis') is-invalid @enderror" id="jenis"
                                    name="jenis">
                                    <option value="Haki" {{ old('jenis') == 'Haki' ? 'selected' : '' }}>Haki</option>
                                    <option value="Paten" {{ old('jenis') == 'Paten' ? 'selected' : '' }}>Paten</option>
                                </select>
                                @error('jenis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="tingkat">tingkat</label>
                                <select class="form-control @error('tingkat') is-invalid @enderror" id="tingkat"
                                    name="tingkat">
                                    <option value="Nasional" {{ old('tingkat') == 'Nasional' ? 'selected' : '' }}>Nasional
                                    </option>
                                    <option value="Internasional" {{ old('tingkat') == 'Internasional' ? 'selected' : '' }}>
                                        Internasional</option>
                                </select>
                                @error('tingkat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="produk">Produk</label>
                                <select class="form-control @error('produk') is-invalid @enderror" id="produk"
                                    name="produk">
                                    <option value="Modul" {{ old('produk') == 'Modul' ? 'selected' : '' }}>Modul</option>
                                    <option value="Buku" {{ old('produk') == 'Buku' ? 'selected' : '' }}>Buku</option>
                                    <option value="Buku Panduan" {{ old('produk') == 'Buku Panduan' ? 'selected' : '' }}>
                                        Buku Panduan</option>
                                    <option value="Program Komputer"
                                        {{ old('produk') == 'Program Komputer' ? 'selected' : '' }}>Program Komputer
                                    </option>
                                    <option value="Basis Data" {{ old('produk') == 'Basis Data' ? 'selected' : '' }}>Basis
                                        Data</option>
                                    <option value="Video" {{ old('produk') == 'Video' ? 'selected' : '' }}>Video</option>
                                    <option value="Poster" {{ old('produk') == 'Poster' ? 'selected' : '' }}>Poster
                                    </option>
                                    <option value="Film" {{ old('produk') == 'Film' ? 'selected' : '' }}>Film</option>
                                    <option value="Lagu" {{ old('produk') == 'Lagu' ? 'selected' : '' }}>Lagu</option>
                                    <option value="Bunga Rampai" {{ old('produk') == 'Bunga Rampai' ? 'selected' : '' }}>
                                        Bunga Rampai</option>
                                    <option value="Rancangan dan Karya Seni Monumental"
                                        {{ old('produk') == 'Rancangan dan Karya Seni Monumental' ? 'selected' : '' }}>
                                        Rancangan dan Karya Seni Monumental</option>
                                    <option value="Rancangan dan Karya Seni Rupa"
                                        {{ old('produk') == 'Rancangan dan Karya Seni Rupa' ? 'selected' : '' }}>Rancangan
                                        dan Karya Seni Rupa</option>
                                    <option value="Rancangan dan Karya Seni Kriya"
                                        {{ old('produk') == 'Rancangan dan Karya Seni Kriya' ? 'selected' : '' }}>Rancangan
                                        dan Karya Seni Kriya</option>
                                    <option value="Rancangan dan Karya Seni Pertunjukkan"
                                        {{ old('produk') == 'Rancangan dan Karya Seni Pertunjukkan' ? 'selected' : '' }}>
                                        Rancangan dan Karya Seni Pertunjukkan</option>
                                </select>
                                @error('produk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group mb-4">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul"
                                    class="form-control @error('judul') is-invalid @enderror" id="judul"
                                    value="{{ old('judul') }}">
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="url">Url</label>
                                <input type="text" name="url" class="form-control @error('url') is-invalid @enderror"
                                    id="url" value="{{ old('url') }}">
                                @error('url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4 focused">
                                <label for="tanggal_terbit">Tanggal Terbit</label>
                                <input type="date" id="tanggal_terbit" class="form-control" name="tanggal_terbit"
                                    placeholder="tanggal_terbit Lahir" value="{{ old('tanggal_terbit') }}" required>
                                @error('tanggal_terbit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            @include('components.input-file', [
                                'label' => 'File sertifikat haki/paten',
                                'name' => 'sertifikat',
                            ])

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateFileLabel(input) {
            const fileName = input.files[0].name;
            const label = input.nextElementSibling;
            label.textContent = fileName;
            label.classList.add('file-selected');
        }
    </script>

    <style>
        .file-selected {
            color: green;
            font-weight: bold;
        }
    </style>
@endsection
