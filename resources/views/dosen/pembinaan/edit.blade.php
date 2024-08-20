@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa Binaan</h1>
                <p class="mb-4">Berikut adalah daftar mahasiswa binaan Anda yang terdaftar di sistem.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 order-lg-2">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Pengguna</h5>
                        <p class="card-text">Nama: {{ Auth::user()->name }}</p>
                        <p class="card-text">NIP: {{ Auth::user()->nip }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 order-lg-1">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Pembinaan</h6>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('pembinaan.update', $pembinaan) }}/" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <h6 class="heading-small text-muted mb-4">Perbarui informasi pembinaan</h6>


                            <div class="pl-lg-4">

                                <div class="form-group mb-4">
                                    <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                    <input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror"
                                        id="nama_mahasiswa" name="nama_mahasiswa"
                                        value="{{ old('nama_mahasiswa', $pembinaan->nama_mahasiswa) }}">
                                    @error('nama_mahasiswa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="tahun_ajaran">Tahun Ajaran</label>
                                    <select class="form-control @error('tahun_ajaran') is-invalid @enderror"
                                        id="tahun_ajaran" name="tahun_ajaran">
                                        @foreach (range(date('Y'), 2000) as $year)
                                            <option value="{{ $year }}"
                                                {{ old('tahun_ajaran', $pembinaan->tahun_ajaran) == $year ? 'selected' : '' }}>
                                                {{ $year }}</option>
                                        @endforeach
                                    </select>
                                    @error('tahun_ajaran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="jenjang">Jenjang</label>
                                    <select class="form-control @error('jenjang') is-invalid @enderror" id="jenjang"
                                        name="jenjang">
                                        <option value="S1"
                                            {{ old('jenjang', $pembinaan->jenjang) == 'S1' ? 'selected' : '' }}>S1</option>
                                        <option value="S2"
                                            {{ old('jenjang', $pembinaan->jenjang) == 'S2' ? 'selected' : '' }}>S2</option>
                                        <option value="SCo-Promotor"
                                            {{ old('jenjang', $pembinaan->jenjang) == 'S3' ? 'selected' : '' }}>S3</option>
                                        <option value="Vokasi"
                                            {{ old('jenjang', $pembinaan->jenjang) == 'Vokasi' ? 'selected' : '' }}>Vokasi
                                        </option>
                                    </select>
                                    @error('jenjang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                @include('components.input-select', [
                                    'label' => 'Program Studi',
                                    'name' => 'prodi',
                                    'value' => old('prodi', $pembinaan->prodi),
                                    'placeholder' => 'Pilih Program Studi',
                                    'options' => $departemens,
                                ])

                                <div class="form-group mb-4">
                                    <label for="nama_program">Nama Program</label>
                                    <input type="text" class="form-control @error('nama_program') is-invalid @enderror"
                                        id="nama_program" name="nama_program"
                                        value="{{ old('nama_program', $pembinaan->nama_program) }}">
                                    @error('nama_program')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="jenis_program">Jenis Program</label>
                                    <input type="text" class="form-control @error('jenis_program') is-invalid @enderror"
                                        id="jenis_program" name="jenis_program"
                                        value="{{ old('jenis_program', $pembinaan->jenis_program) }}">
                                    @error('jenis_program')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="tingkat">tingkat</label>
                                    <select class="form-control @error('tingkat') is-invalid @enderror" id="tingkat"
                                        name="tingkat">
                                        <option value="Lokal"
                                            {{ old('tingkat', $pembinaan->tingkat) == 'Lokal' ? 'selected' : '' }}>Lokal
                                        </option>
                                        <option value="Regional"
                                            {{ old('tingkat', $pembinaan->tingkat) == 'Regional' ? 'selected' : '' }}>
                                            Regional</option>
                                        <option value="Nasional"
                                            {{ old('tingkat', $pembinaan->tingkat) == 'Nasional' ? 'selected' : '' }}>
                                            Nasional</option>
                                        <option value="Internasional"
                                            {{ old('tingkat', $pembinaan->tingkat) == 'Internasional' ? 'selected' : '' }}>
                                            Internasional</option>
                                    </select>
                                    @error('tingkat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                @include('components.input-file', [
                                    'label' => 'Upload File Sertifikat',
                                    'name' => 'sertifikat',
                                    'file' => $pembinaan->sertifikat
                                ])
    
                                @include('components.input-file', [
                                    'label' => 'Upload File SK Pembinaan',
                                    'name' => 'sk_pembinaan',
                                    'file' => $pembinaan->sk_pembinaan,
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
