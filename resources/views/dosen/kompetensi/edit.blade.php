@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="h3 mb-4 mt-4 text-gray-800">{{ __('Profile') }}</h1>
        @include('components.alert')

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
                        <h6 class="m-0 font-weight-bold text-primary">Data Kompetensi</h6>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('kompetensi.update', $kompetensi) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <h6 class="heading-small text-muted mb-4">Tambah data kompetensi</h6>

                            <div class="mb-3">
                                <label for="nama_kompetensi" class="form-label">Jenis<span
                                        class="small text-danger">*</span></label>
                                <select class="form-select @error('nama_kompetensi') is-invalid @enderror"
                                    aria-label="Default select example" name="nama_kompetensi" id="nama_kompetensi">
                                    <option value="Profesi"
                                        {{ old('nama_kompetensi', $kompetensi->nama_kompetensi) == 'Profesi' ? 'selected' : '' }}>
                                        Profesi
                                    </option>
                                    <option value="Kompetensi"
                                        {{ old('nama_kompetensi', $kompetensi->nama_kompetensi) == 'Kompetensi' ? 'selected' : '' }}>
                                        Kompetensi
                                    </option>
                                </select>
                                @error('nama_kompetensi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="no_sertifikat" class="form-label">Nomor Sertifikat</label>
                                <input type="text"
                                    class="form-control @error('no_sertifikat') is-invalid @enderror"
                                    id="no_sertifikat" name="no_sertifikat"
                                    value="{{ old('no_sertifikat', $kompetensi->no_sertifikat) }}">
                                @error('no_sertifikat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tahun_sertifikat" class="form-label">Tahun Sertifikat</label>
                                <input type="text"
                                    class="form-control @error('tahun_sertifikat') is-invalid @enderror"
                                    id="tahun_sertifikat" name="tahun_sertifikat"
                                    value="{{ old('tahun_sertifikat', $kompetensi->tahun_sertifikat) }}"
                                    maxlength="4">
                                @error('tahun_sertifikat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="institusi_sertifikat" class="form-label">Institusi Sertifikat</label>
                                <input type="text"
                                    class="form-control @error('institusi_sertifikat') is-invalid @enderror"
                                    id="institusi_sertifikat" name="institusi_sertifikat"
                                    value="{{ old('institusi_sertifikat', $kompetensi->institusi_sertifikat) }}">
                                @error('institusi_sertifikat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="bidang_kompetensi" class="form-label">Bidang Kompetensi</label>
                                <input type="text"
                                    class="form-control @error('bidang_kompetensi') is-invalid @enderror"
                                    id="bidang_kompetensi" name="bidang_kompetensi"
                                    value="{{ old('bidang_kompetensi', $kompetensi->bidang_kompetensi) }}">
                                @error('bidang_kompetensi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jam_pelajaran" class="form-label">Jam Pelajaran</label>
                                <input type="text"
                                    class="form-control @error('jam_pelajaran') is-invalid @enderror"
                                    id="jam_pelajaran" name="jam_pelajaran"
                                    value="{{ old('jam_pelajaran', $kompetensi->jam_pelajaran) }}">
                                @error('jam_pelajaran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jenis_diklat" class="form-label">Jenis Diklat</label>
                                <input type="text"
                                    class="form-control @error('jenis_diklat') is-invalid @enderror"
                                    id="jenis_diklat" name="jenis_diklat"
                                    value="{{ old('jenis_diklat', $kompetensi->jenis_diklat) }}">
                                @error('jenis_diklat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="mb-3 col-sm-6">
                                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                    <input type="date"
                                        class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                        id="tanggal_mulai" name="tanggal_mulai"
                                        value="{{ old('tanggal_mulai', $kompetensi->tanggal_mulai) }}">
                                    @error('tanggal_mulai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                                    <input type="date"
                                        class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                        id="tanggal_selesai" name="tanggal_selesai"
                                        value="{{ old('tanggal_selesai', $kompetensi->tanggal_selesai) }}">
                                    @error('tanggal_selesai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan">{{ old('keterangan', $kompetensi->keterangan) }}</textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="sk_penugasan" class="form-label">Upload file SK Penugasan</label>
                                <input type="file"
                                    class="form-control @error('sk_penugasan') is-invalid @enderror"
                                    id="sk_penugasan" name="sk_penugasan">
                                @if ($kompetensi->sk_penugasan)
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . $kompetensi->sk_penugasan) }}" target="_blank" class="btn btn-outline-primary">Lihat SK Penugasan</a>
                                    </div>
                                @else
                                    <small class="text-muted">Belum ada file yang diupload.</small>
                                @endif
                                @error('sk_penugasan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="sertifikat" class="form-label">Upload file sertifikat</label>
                                <input type="file"
                                    class="form-control @error('sertifikat') is-invalid @enderror"
                                    id="sertifikat" name="sertifikat">
                                @if ($kompetensi->sertifikat)
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . $kompetensi->sertifikat) }}" target="_blank" class="btn btn-outline-primary">Lihat Sertifikat</a>
                                    </div>
                                @else
                                    <small class="text-muted">Belum ada file yang diupload.</small>
                                @endif
                                @error('sertifikat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            

                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
