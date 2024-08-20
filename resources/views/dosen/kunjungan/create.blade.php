@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Kunjungan Imiah</h1>
                <p class="mb-4">Berikut adalah daftar kunjungan ilmiah Anda yang terdaftar di sistem.</p>
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
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Informasi Kujungan Ilmiah</h6>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('kunjungan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-4 focused">
                                <label class="form-control-label" for="tanggal">Tanggal Kegiatan</label>
                                <input type="date" id="tanggal" class="form-control" name="tanggal"
                                    placeholder="Tanggal Lahir" value="{{ old('tanggal') }}" required>
                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="jenjang">Jenjang</label>
                                <select class="form-control @error('jenjang') is-invalid @enderror" id="jenjang"
                                    name="jenjang">
                                    <option value="S1" {{ old('jenjang') == 'S1' ? 'selected' : '' }}>S1</option>
                                    <option value="S2" {{ old('jenjang') == 'S2' ? 'selected' : '' }}>S2</option>
                                    <option value="S3" {{ old('jenjang') == 'S3' ? 'selected' : '' }}>S3</option>
                                    <option value="Vokasi" {{ old('jenjang') == 'Vokasi' ? 'selected' : '' }}>Vokasi
                                    </option>
                                </select>
                                @error('jenjang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="universitas">Universitas</label>
                                <input type="text" class="form-control @error('universitas') is-invalid @enderror"
                                    id="universitas" name="universitas" value="{{ old('universitas') }}">
                                @error('universitas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="prodi">Prodi</label>
                                <input type="text" class="form-control @error('prodi') is-invalid @enderror"
                                    id="prodi" name="prodi" value="{{ old('prodi') }}">
                                @error('prodi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="matkul">Mata kuliah</label>
                                <input type="text" class="form-control @error('matkul') is-invalid @enderror"
                                    id="matkul" name="matkul" value="{{ old('matkul') }}">
                                @error('matkul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            @include('components.input-file', [
                                'label' => 'Upload File Undangan',
                                'name' => 'undangan',
                            ])

                            @include('components.input-file', [
                                'label' => 'Upload File Surat Tugas',
                                'name' => 'surat_tugas',
                            ])

                            @include('components.input-file', [
                                'label' => 'Upload File IA',
                                'name' => 'ia',
                            ])

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
