@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="h3 mb-4 mt-4 text-gray-800">{{ __('Profile') }}</h1>

        @include('components.alert')

        <div class="row">
            <div class="col-lg-12 order-lg-1">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <div class="row align-middle">
                            <div class="col-sm-6">
                                <h6 class="m-0 fw-bold text-primary">Kompetensi dan Sertifikasi</h6>
                            </div>
                            <div class="col-sm-6 text-end">
                                <a href="{{ route('kompetensi.create') }}" class="btn btn-primary">Tambah data Sertifikasi</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($kompetensis)
                            @foreach ($kompetensis as $kompetensi)
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <div class="card text-white bg-primary mb-3">
                                            <div class="card-header d-flex align-items-center">
                                                <i class="fas fa-certificate fa-2x me-3"></i>
                                                <h5 class="mb-0">Kompetensi Utama</h5>
                                            </div>
                                            <div class="card-body">
                                                <h2 class="card-title">{{ $kompetensi->nama_kompetensi }}</h2>
                                                <p class="card-text">
                                                    No Sertifikat:<br> <span
                                                        style="font-size: 28px; font-weight: 600;">{{ $kompetensi->no_sertifikat ?? 'N/A' }}</span><br>
                                                </p>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <span class="fw-bold">{{ $kompetensi->tahun_sertifikat ?? 'N/A' }}</span> 
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <span class="fw-bold">{{ $kompetensi->institusi_sertifikat ?? 'N/A' }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer d-flex justify-content-between">
                                                <a href="{{ route('kompetensi.edit', $kompetensi->id) }}"
                                                    class="btn btn-light btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                <form action="{{ route('kompetensi.destroy', $kompetensi->id) }}"
                                                    method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i
                                                            class="fas fa-trash-alt"></i> Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card mb-3">
                                            <div class="card-header d-flex align-items-center">
                                                <i class="fas fa-info-circle fa-2x me-3"></i>
                                                <h5 class="mb-0">Detail Kompetensi</h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">
                                                    <span class="fw-bold">Bidang Kompetensi:</span>
                                                    {{ $kompetensi->bidang_kompetensi ?? 'N/A' }}<br>
                                                    <span class="fw-bold">Jam Pelajaran:</span>
                                                    {{ $kompetensi->jam_pelajaran ?? 'N/A' }}<br>
                                                    <span class="fw-bold">Jenis Diklat:</span>
                                                    {{ $kompetensi->jenis_diklat ?? 'N/A' }}<br>
                                                    <span class="fw-bold">Sk Penugasan:</span>
                                                    @if ($kompetensi->sk_penugasan)
                                                        <a href="{{ asset('storage/' . $kompetensi->sk_penugasan) }}"
                                                            class="btn btn-link">Lihat Dokumen</a>
                                                    @else
                                                        Tidak ada dokumen
                                                    @endif
                                                </p>
                                                <hr>
                                                <p class="card-text">
                                                    <span class="fw-bold">Tanggal Mulai:</span>
                                                    {{ $kompetensi->tanggal_mulai ?? 'N/A' }}<br>
                                                    <span class="fw-bold">Tanggal Selesai:</span>
                                                    {{ $kompetensi->tanggal_selesai ?? 'N/A' }}<br>
                                                    <span class="fw-bold">Keterangan:</span> {{ $kompetensi->keterangan ?? 'N/A' }}<br>
                                                    <span class="fw-bold">Sertifikat:</span>
                                                    @if ($kompetensi->sertifikat)
                                                        <a href="{{ asset('storage/' . $kompetensi->sertifikat) }}"
                                                            class="btn btn-link">Lihat Sertifikat</a>
                                                    @else
                                                        Tidak ada sertifikat
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Belum ada data kompetensi</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
