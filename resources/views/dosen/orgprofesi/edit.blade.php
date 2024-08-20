@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data profesi Jurnal</h1>
                <p class="mb-4">Berikut adalah daftar profesi Jurnal Anda yang terdaftar di sistem.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 order-lg-2">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Pengguna</h5>
                        <p class="card-text">Nama: {{ Auth::user()->name }}</p>
                        <p class="card-text">NIP: {{ Auth::user()->nip }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 order-lg-1">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data pengurus organisasi sasi</h6>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profesi.update', $profesi) }}/" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <h6 class="heading-small text-muted mb-4">Perbarui informasi profesi</h6>


                            <div class="pl-lg-4">


                                <div class="form-group mb-4">
                                    <label for="tingkat">Tingkat</label>
                                    <input type="text" class="form-control @error('tingkat') is-invalid @enderror"
                                        id="tingkat" name="tingkat" value="{{ old('tingkat', $profesi->tingkat) }}">
                                    @error('tingkat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="jabatan">jabatanan</label>
                                    <select class="form-control @error('jabatan') is-invalid @enderror" id="jabatan"
                                        name="jabatan">
                                        <option value="Pengurus"
                                            {{ old('jabatan', $profesi->jabatan) == 'Pengurus' ? 'selected' : '' }}>Pengurus
                                        </option>
                                        <option value="Anggota"
                                            {{ old('jabatan', $profesi->jabatan) == 'Anggota' ? 'selected' : '' }}>Anggota
                                        </option>
                                        <option value="Anggota atas permintaan"
                                            {{ old('jabatan', $profesi->jabatan) == 'Anggota atas permintaan' ? 'selected' : '' }}>
                                            Anggota atas permintaan</option>
                                    </select>
                                    @error('jabatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="nama_org">Nama Organisasi</label>
                                    <input type="text" class="form-control @error('nama_org') is-invalid @enderror"
                                        id="nama_org" name="nama_org" value="{{ old('nama_org', $profesi->nama_org) }}">
                                    @error('nama_org')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4 focused">
                                    <label for="tgl_mulai">Tanggal Mulai </label>
                                    <input type="date" id="tgl_mulai" class="form-control" name="tgl_mulai"
                                        placeholder="tgl_mulai Lahir" value="{{ old('tgl_mulai', $profesi->tgl_mulai) }}"
                                        required>
                                    @error('tgl_mulai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4 focused">
                                    <label for="tgl_selesai">Tanggal Selesai </label>
                                    <input type="date" id="tgl_selesai" class="form-control" name="tgl_selesai"
                                        placeholder="tgl_selesai Lahir"
                                        value="{{ old('tgl_selesai', $profesi->tgl_selesai) }}" required>
                                    @error('tgl_selesai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                @include('components.input-file', [
                                    'label' => 'File KTA',
                                    'name' => 'kta',
                                    'file' => $profesi->kta,
                                ])

                                @include('components.input-file', [
                                    'label' => 'File Surat Tugas',
                                    'name' => 'sk',
                                    'file' => $profesi->sk,
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
