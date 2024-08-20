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
                        <h6 class="m-0 font-weight-bold text-primary">Data penghargaan</h6>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('penghargaan.update', $penghargaan) }}/" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <h6 class="heading-small text-muted mb-4">Perbarui informasi penghargaan</h6>


                            <div class="pl-lg-4">
                                <div class="form-group mb-4">
                                    <label for="tingkat">Tingkat</label>
                                    <select class="form-control @error('tingkat') is-invalid @enderror" id="tingkat"
                                        name="tingkat">
                                        <option value="Sekolah"
                                            {{ old('tingkat', $penghargaan->tingkat) == 'Sekolah' ? 'selected' : '' }}>
                                            Sekolah</option>
                                        <option value="Kecamatan"
                                            {{ old('tingkat', $penghargaan->tingkat) == 'Kecamatan' ? 'selected' : '' }}>
                                            Kecamatan</option>
                                        <option value="Kab/Kota"
                                            {{ old('tingkat', $penghargaan->tingkat) == 'Kab/Kota' ? 'selected' : '' }}>
                                            Kab/Kota</option>
                                        <option value="Provinsi"
                                            {{ old('tingkat', $penghargaan->tingkat) == 'Provinsi' ? 'selected' : '' }}>
                                            Provinsi</option>
                                        <option value="Nasional"
                                            {{ old('tingkat', $penghargaan->tingkat) == 'Nasional' ? 'selected' : '' }}>
                                            Nasional</option>
                                        <option value="Internasional"
                                            {{ old('tingkat', $penghargaan->tingkat) == 'Internasional' ? 'selected' : '' }}>
                                            Internasional</option>
                                    </select>
                                    @error('tingkat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="nama">Nama Penghargaan</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" value="{{ old('nama', $penghargaan->nama) }}">
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="tahun">Tahun</label>
                                    <input type="number" class="form-control @error('tahun') is-invalid @enderror"
                                        id="tahun" name="tahun" value="{{ old('tahun', $penghargaan->tahun) }}">
                                    @error('tahun')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="instansi">Instansi Pemberi</label>
                                    <input type="text" class="form-control @error('instansi') is-invalid @enderror"
                                        id="instansi" name="instansi"
                                        value="{{ old('instansi', $penghargaan->instansi) }}">
                                    @error('instansi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                @include('components.input-file', [
                                    'label' => 'File Sertifikat',
                                    'name' => 'sertifikat',
                                ])

                                <!-- Button -->
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
