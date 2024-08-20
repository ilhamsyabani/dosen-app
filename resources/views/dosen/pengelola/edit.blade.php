@extends('layouts.app')


@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between items-center mt-4 ">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Pengelola Jurnal</h1>
                <p class="mb-4">Berikut adalah daftar Pengelola Jurnal Anda yang terdaftar di sistem.</p>
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
                        <h6 class="m-0 font-weight-bold text-primary">Data Pengelola Jurnal</h6>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('pengelola.update', $pengelola) }}/" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <h6 class="heading-small text-muted mb-4">Perbarui informasi pengelola</h6>


                            <div class="pl-lg-4">


                                <div class="form-group mb-4">
                                    <label for="nama">Nama Jurnal</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" value="{{ old('nama', $pengelola->nama) }}">
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="instansi">Instansi Jurnal</label>
                                    <input type="text" class="form-control @error('instansi') is-invalid @enderror"
                                        id="instansi" name="instansi" value="{{ old('instansi', $pengelola->instansi) }}">
                                    @error('instansi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="peran">Peranan</label>
                                    <select class="form-control @error('peran') is-invalid @enderror" id="peran"
                                        name="peran">
                                        <option value="Editor"
                                            {{ old('peran', $pengelola->peran) == 'Editor' ? 'selected' : '' }}>Editor
                                        </option>
                                        <option value="Reviewer"
                                            {{ old('peran', $pengelola->peran) == 'Reviewer' ? 'selected' : '' }}>Reviewer
                                        </option>
                                        <option value="Chief"
                                            {{ old('peran', $pengelola->peran) == 'Chief' ? 'selected' : '' }}>Chief
                                        </option>
                                    </select>
                                    @error('peran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4 focused">
                                    <label for="tgl_mulai">Tanggal Mulai </label>
                                    <input type="date" id="tgl_mulai" class="form-control" name="tgl_mulai"
                                        placeholder="tgl_mulai Lahir" value="{{ old('tgl_mulai', $pengelola->tgl_mulai) }}"
                                        required>
                                    @error('tgl_mulai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4 focused">
                                    <label for="tgl_selesai">Tanggal Selesai </label>
                                    <input type="date" id="tgl_selesai" class="form-control" name="tgl_selesai"
                                        placeholder="tgl_selesai Lahir"
                                        value="{{ old('tgl_selesai', $pengelola->tgl_selesai) }}" required>
                                    @error('tgl_selesai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                @include('components.input-file', [
                                    'label' => 'File SK Pengelola',
                                    'name' => 'sk',
                                    'file' => $pengelola->sk,
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
