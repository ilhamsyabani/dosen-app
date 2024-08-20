@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data penghargaan</h1>
                <p class="mb-4">Berikut adalah daftar penghargaan Anda yang terdaftar di sistem.</p>
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
                        <h6 class="m-0 font-weight-bold text-primary">penghargaan</h6>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('penghargaan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-4">
                                <label for="tingkat">Tingkat</label>
                                <select class="form-control @error('tingkat') is-invalid @enderror" id="tingkat"
                                    name="tingkat">
                                    <option value="Sekolah" {{ old('tingkat') == 'Sekolah' ? 'selected' : '' }}>Sekolah
                                    </option>
                                    <option value="Kecamatan" {{ old('tingkat') == 'Kecamatan' ? 'selected' : '' }}>
                                        Kecamatan</option>
                                    <option value="Kab/Kota" {{ old('tingkat') == 'Kab/Kota' ? 'selected' : '' }}>Kab/Kota
                                    </option>
                                    <option value="Provinsi" {{ old('tingkat') == 'Provinsi' ? 'selected' : '' }}>Provinsi
                                    </option>
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
                                <label for="nama">Nama Penghargaan</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="tahun">Tahun</label>
                                <input type="number" class="form-control @error('tahun') is-invalid @enderror"
                                    id="tahun" name="tahun" value="{{ old('tahun') }}">
                                @error('tahun')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="instansi">Instansi Pemberi</label>
                                <input type="text" class="form-control @error('instansi') is-invalid @enderror"
                                    id="instansi" name="instansi" value="{{ old('instansi') }}">
                                @error('instansi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            @include('components.input-file', [
                                'label' => 'Sertifikat',
                                'name' => 'sertifikat',
                            ])



                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
