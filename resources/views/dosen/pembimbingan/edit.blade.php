@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data pembibingan Mahasiswa</h1>
                <p class="mb-4">Berikut adalah daftar pembimbingan mahasiswa Anda yang terdaftar di sistem.</p>
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
                        <h6 class="m-0 font-weight-bold text-primary">Data pembimbingan</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pembimbingan.update', $pembimbingan) }}/" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <h6 class="heading-small text-muted mb-4">Perbarui informasi pembimbingan</h6>


                            <div class="pl-lg-4">

                                <div class="form-group mb-4">
                                    <label for="kegiatan">Kegiatan</label>
                                    <select class="form-control @error('kegiatan') is-invalid @enderror" id="kegiatan"
                                        name="kegiatan">
                                        <option value="DPA"
                                            {{ old('kegiatan', $pembimbingan->kegiatan) == 'DPA' ? 'selected' : '' }}>DPA
                                        </option>
                                        <option value="KKN/PK"
                                            {{ old('kegiatan', $pembimbingan->kegiatan) == 'KKN/PK' ? 'selected' : '' }}>
                                            KKN/PK</option>
                                    </select>
                                    @error('kegiatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                    <input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror"
                                        id="nama_mahasiswa" name="nama_mahasiswa"
                                        value="{{ old('nama_mahasiswa', $pembimbingan->nama_mahasiswa) }}">
                                    @error('nama_mahasiswa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control @error('nim') is-invalid @enderror"
                                        id="nim" name="nim" value="{{ old('nim', $pembimbingan->nim) }}">
                                    @error('nim')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="tahun_ajaran">Tahun Ajaran</label>
                                    <select class="form-control @error('tahun_ajaran') is-invalid @enderror"
                                        id="tahun_ajaran" name="tahun_ajaran">
                                        @foreach (range(date('Y'), 2000) as $year)
                                            <option value="{{ $year }}"
                                                {{ old('tahun_ajaran', $pembimbingan->tahun_ajaran) == $year ? 'selected' : '' }}>
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
                                            {{ old('jenjang', $pembimbingan->jenjang) == 'S1' ? 'selected' : '' }}>S1
                                        </option>
                                        <option value="S2"
                                            {{ old('jenjang', $pembimbingan->jenjang) == 'S2' ? 'selected' : '' }}>S2
                                        </option>
                                        <option value="SCo-Promotor"
                                            {{ old('jenjang', $pembimbingan->jenjang) == 'S3' ? 'selected' : '' }}>S3
                                        </option>
                                        <option value="Vokasi"
                                            {{ old('jenjang', $pembimbingan->jenjang) == 'Vokasi' ? 'selected' : '' }}>
                                            Vokasi</option>
                                    </select>
                                    @error('jenjang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="banyaknya_bimbingan">Jumalah Bimbingan</label>
                                    <input type="text"
                                        class="form-control @error('banyaknya_bimbingan') is-invalid @enderror"
                                        id="banyaknya_bimbingan" name="banyaknya_bimbingan"
                                        value="{{ old('banyaknya_bimbingan', $pembimbingan->banyaknya_bimbingan) }}">
                                    @error('banyaknya_bimbingan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                @include('components.input-file', [
                                    'label' => 'Upload File Bukti Bimbingan/SK',
                                    'name' => 'bukti_bimbingan_sk',
                                    'file' => $pembimbingan->bukti_bimbingan_sk,
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
