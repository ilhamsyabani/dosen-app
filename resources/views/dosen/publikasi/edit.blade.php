@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Publikasi Masa</h1>
                <p class="mb-4">Berikut adalah daftar publikasi Anda yang terdaftar di sistem.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 order-lg-2">
                <div class="card shadow mb-4">
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
                        <h6 class="m-0 font-weight-bold text-primary">Data Publikasi</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('publikasi.update', $publikasi) }}/" autocomplete="off" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h6 class="heading-small text-muted mb-4">Perbarui informasi Publikasi Media Masa atau Pameran
                            </h6>

                            <div class="form-group mb-4">
                                <label for="tipe">Tipe</label>
                                <select class="form-control @error('tipe') is-invalid @enderror" id="tipe"
                                    name="tipe" onchange="toggleFields()">
                                    <option value="Media Masa"
                                        {{ old('tipe', $publikasi->tipe) == 'Media Masa' ? 'selected' : '' }}>Media Masa
                                    </option>
                                    <option value="Pagelaran/Pameran"
                                        {{ old('tipe', $publikasi->tipe) == 'Pagelaran/Pameran' ? 'selected' : '' }}>
                                        Pagelaran/Pameran</option>
                                </select>
                                @error('tipe')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul"
                                    class="form-control @error('judul') is-invalid @enderror" placeholder="judul"
                                    value="{{ old('judul', $publikasi->judul) }}" required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="tingkat">Tingkat</label>
                                <select class="form-control @error('tingkat') is-invalid @enderror" id="tingkat"
                                    name="tingkat">
                                    <option value="Lokal"
                                        {{ old('tingkat', $publikasi->tingkat) == 'Lokal' ? 'selected' : '' }}>Lokal
                                    </option>
                                    <option value="Nasional"
                                        {{ old('tingkat', $publikasi->tingkat) == 'Nasional' ? 'selected' : '' }}>Nasional
                                    </option>
                                    <option value="Internasional"
                                        {{ old('tingkat', $publikasi->tingkat) == 'Internasional' ? 'selected' : '' }}>
                                        Internasional</option>
                                </select>
                                @error('tingkat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4 focused">
                                <label for="tanggal">Tanggal Kegiatan</label>
                                <input type="date" id="tanggal" class="form-control" name="tanggal"
                                    placeholder="Tanggal Lahir" value="{{ old('tanggal', $publikasi->tanggal) }}" required>
                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4" id="media_masa_field" style="display: none;">
                                <label for="media_masa">Media Masa</label>
                                <input type="text" name="media_masa"
                                    class="form-control @error('media_masa') is-invalid @enderror" id="media_masa"
                                    value="{{ old('media_masa', $publikasi->media_masa) }}">
                                @error('media_masa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4" id="penyelenggara_field" style="display: none;">
                                <label for="penyelengaara">Penyelengaara</label>
                                <input type="text" name="penyelengaara"
                                    class="form-control @error('penyelengaara') is-invalid @enderror" id="penyelengaara"
                                    value="{{ old('penyelengaara', $publikasi->penyelengaara) }}">
                                @error('penyelengaara')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
