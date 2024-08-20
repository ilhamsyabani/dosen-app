@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data pertemuan</h1>
                <p class="mb-4">Berikut adalah daftar pertemuan Anda yang terdaftar di sistem.</p>
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
                        <h6 class="m-0 font-weight-bold text-primary">Data pertemuan</h6>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('pertemuan.update', $pertemuan) }}/" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <h6 class="heading-small text-muted mb-4">Perbarui informasi pertemuan</h6>


                            <div class="pl-lg-4">

                                <div class="form-group mb-4">
                                    <label for="peran">Peran</label>
                                    <select class="form-control @error('peran') is-invalid @enderror" id="peran"
                                        name="peran">
                                        <option value="Presenter"
                                            {{ old('peran', $pertemuan->peran) == 'Presenter' ? 'selected' : '' }}>Presenter
                                        </option>
                                        <option value="Participant"
                                            {{ old('peran', $pertemuan->peran) == 'Participant' ? 'selected' : '' }}>
                                            Participant</option>
                                    </select>
                                    @error('peran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group mb-4">
                                    <label for="tingkat">Tingkat</label>
                                    <select class="form-control @error('tingkat') is-invalid @enderror" id="tingkat"
                                        name="tingkat">
                                        <option value="Nasional"
                                            {{ old('tingkat', $pertemuan->tingkat) == 'Nasional' ? 'selected' : '' }}>
                                            Nasional</option>
                                        <option value="Internasional"
                                            {{ old('tingkat', $pertemuan->tingkat) == 'Internasional' ? 'selected' : '' }}>
                                            Internasional</option>
                                    </select>
                                    @error('tingkat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group mb-4">
                                    <label for="nama_pertemuan">Nama Pertemuan</label>
                                    <input type="text" class="form-control @error('nama_pertemuan') is-invalid @enderror"
                                        id="nama_pertemuan" name="nama_pertemuan"
                                        value="{{ old('nama_pertemuan', $pertemuan->nama_pertemuan) }}">
                                    @error('nama_pertemuan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="instansi">Instansi</label>
                                    <input type="text" class="form-control @error('instansi') is-invalid @enderror"
                                        id="instansi" name="instansi"
                                        value="{{ old('instansi', $pertemuan->instansi) }}">
                                    @error('instansi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="no_sk">Nomor SK</label>
                                    <input type="text" class="form-control @error('no_sk') is-invalid @enderror"
                                        id="no_sk" name="no_sk" value="{{ old('no_sk', $pertemuan->no_sk) }}">
                                    @error('no_sk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4 focused">
                                    <label for="tgl_mulai">Tanggal Mulai </label>
                                    <input type="date" id="tgl_mulai" class="form-control" name="tgl_mulai"
                                        placeholder="tgl_mulai Lahir" value="{{ old('tgl_mulai', $pertemuan->tgl_mulai) }}"
                                        required>
                                    @error('tgl_mulai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4 focused">
                                    <label for="tgl_selesai">Tanggal Selesai </label>
                                    <input type="date" id="tgl_selesai" class="form-control" name="tgl_selesai"
                                        placeholder="tgl_selesai Lahir"
                                        value="{{ old('tgl_selesai', $pertemuan->tgl_selesai) }}" required>
                                    @error('tgl_selesai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                @include('components.input-file', [
                                    'label' => 'File Sertifikat',
                                    'name' => 'sertifikat',
                                    'file' => $pertemuan->sertifikat,
                                ])

                                @include('components.input-file', [
                                    'label' => 'File Surat Tugas',
                                    'name' => 'surat_tugas',
                                    'file' => $pertemuan->surat_tugas,
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
