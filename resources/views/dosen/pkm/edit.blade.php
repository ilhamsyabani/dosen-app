@extends('layouts.app')


@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data PKM Insidental</h1>
                <p class="mb-4">Berikut adalah daftar PKM Insidental Anda yang terdaftar di sistem.</p>
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
                        <h6 class="m-0 font-weight-bold text-primary">Data PKM Insidental</h6>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('pkm.update', $pkm) }}/" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <h6 class="heading-small text-muted mb-4">Perbarui informasi pkm</h6>


                            <div class="pl-lg-4">


                                <div class="form-group mb-4">
                                    <label for="nama">Nama PKM</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" value="{{ old('nama', $pkm->nama) }}">
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="tingkat">Tingkatan Program</label>
                                    <select class="form-control @error('tingkat') is-invalid @enderror" id="tingkat"
                                        name="tingkat">
                                        <option value="Lokal"
                                            {{ old('tingkat', $pkm->tingkat) == 'Lokal' ? 'selected' : '' }}>Lokal</option>
                                        <option value="Regional"
                                            {{ old('tingkat', $pkm->tingkat) == 'Regional' ? 'selected' : '' }}>Regional
                                        </option>
                                        <option value="Nasional"
                                            {{ old('tingkat', $pkm->tingkat) == 'Nasional' ? 'selected' : '' }}>Nasional
                                        </option>
                                        <option value="Internasional"
                                            {{ old('tingkat', $pkm->tingkat) == 'Internasional' ? 'selected' : '' }}>
                                            Internasional</option>
                                    </select>
                                    @error('tingkat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="kategori_pembicara">Kategori Pembicaraan</label>
                                    <select class="form-control @error('kategori_pembicara') is-invalid @enderror"
                                        id="kategori_pembicara" name="kategori_pembicara">
                                        <option value="Keynote/pembicara kunci"
                                            {{ old('kategori_pembicara', $pkm->kategori_pembicara) == 'Keynote/pembicara kunci' ? 'selected' : '' }}>
                                            Keynote/pembicara kunci</option>
                                        <option value="Pembicara pada pertemuan ilmiah"
                                            {{ old('kategori_pembicara', $pkm->kategori_pembicara) == 'Pembicara pada pertemuan ilmiah' ? 'selected' : '' }}>
                                            Pembicara pada pertemuan ilmiah</option>
                                        <option value="Pembicara/Narasumber Pelatihan atau penyuluhan atau ceramah"
                                            {{ old('kategori_pembicara', $pkm->kategori_pembicara) == 'Pembicara/Narasumber Pelatihan atau penyuluhan atau ceramah' ? 'selected' : '' }}>
                                            Pembicara/Narasumber Pelatihan atau penyuluhan atau ceramah</option>
                                    </select>
                                    @error('kategori_pembicara')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="penyelenggara">Penyelenggara</label>
                                    <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror"
                                        id="penyelenggara" name="penyelenggara"
                                        value="{{ old('penyelenggara', $pkm->penyelenggara) }}">
                                    @error('penyelenggara')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4 focused">
                                    <label for="tanggal">Tanggal </label>
                                    <input type="date" id="tanggal" class="form-control" name="tanggal"
                                        placeholder="Tanggal Lahir" value="{{ old('tanggal', $pkm->tanggal) }}" required>
                                    @error('tanggal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="honorarium">Honorarium</label>
                                    <input type="text" class="form-control @error('honorarium') is-invalid @enderror"
                                        id="honorarium" name="honorarium"
                                        value="{{ old('honorarium', $pkm->honorarium) }}">
                                    @error('honorarium')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="no_sk">No SK</label>
                                    <input type="text" class="form-control @error('no_sk') is-invalid @enderror"
                                        id="no_sk" name="no_sk" value="{{ old('no_sk', $pkm->no_sk) }}">
                                    @error('no_sk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                @include('components.input-file', [
                                    'label' => 'File Surat Tugas',
                                    'name' => 'surat_tugas',
                                    'file' => $pkm->surat_tugas,
                                ])
                                @include('components.input-file', [
                                    'label' => 'File Laporan',
                                    'name' => 'laporan',
                                    'file' => $pkm->laporan,
                                ])
                                @include('components.input-file', [
                                    'label' => 'File Materi',
                                    'name' => 'materi',
                                    'file' => $pkm->materi,
                                ])
                                @include('components.input-file', [
                                    'label' => 'File Sertifikat',
                                    'name' => 'sertifikat',
                                    'file' => $pkm->sertifikat,
                                ])
                                @include('components.input-file', [
                                    'label' => 'File IA',
                                    'name' => 'ia',
                                    'file' => $pkm->ia,
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
