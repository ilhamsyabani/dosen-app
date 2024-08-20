@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data pengurus organisasi profesi</h1>
                <p class="mb-4">Berikut adalah daftar pengurus organisasi profesi Anda yang terdaftar di sistem.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 order-lg-2">
                <div class="card  mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Pengguna</h5>
                        <p class="card-text">Nama: {{ Auth::user()->nama }}</p>
                        <p class="card-text">NIP: {{ Auth::user()->nip }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 order-lg-1">
                <div class="card  mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">pengurus organisasi profesi</h6>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('profesi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-4">
                                <label for="tingkat">Tingkat</label>
                                <input type="text" class="form-control @error('tingkat') is-invalid @enderror"
                                    id="tingkat" name="tingkat" value="{{ old('tingkat') }}">
                                @error('tingkat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="jabatan">jabatanan</label>
                                <select class="form-control @error('jabatan') is-invalid @enderror" id="jabatan"
                                    name="jabatan">
                                    <option value="Pengurus" {{ old('jabatan') == 'Pengurus' ? 'selected' : '' }}>Pengurus
                                    </option>
                                    <option value="Anggota" {{ old('jabatan') == 'Anggota' ? 'selected' : '' }}>Anggota
                                    </option>
                                    <option value="Anggota atas permintaan"
                                        {{ old('jabatan') == 'Anggota atas permintaan' ? 'selected' : '' }}>Anggota atas
                                        permintaan</option>
                                </select>
                                @error('jabatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="nama_org">Nama Organisasi</label>
                                <input type="text" class="form-control @error('nama_org') is-invalid @enderror"
                                    id="nama_org" name="nama_org" value="{{ old('nama_org') }}">
                                @error('nama_org')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4 focused">
                                <label for="tgl_mulai">Tanggal Mulai </label>
                                <input type="date" id="tgl_mulai" class="form-control" name="tgl_mulai"
                                    placeholder="tgl_mulai Lahir" value="{{ old('tgl_mulai') }}" required>
                                @error('tgl_mulai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4 focused">
                                <label for="tgl_selesai">Tanggal Selesai </label>
                                <input type="date" id="tgl_selesai" class="form-control" name="tgl_selesai"
                                    placeholder="tgl_selesai Lahir" value="{{ old('tgl_selesai') }}" required>
                                @error('tgl_selesai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                              @include('components.input-file',[
                                'label' => 'File KTA',
                                'name' => 'kta',
                              ])

                              @include('components.input-file',[
                                'label' => 'File Surat Tugas',
                                'name' => 'sk',
                              ])

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
