@extends('layouts.app')

@section('main-content')
<!-- Page Heading -->
@include('components.alert')

<div class="row justify-content-between items-center ">
    <!-- Page Heading -->
    <div class="col-md-6">
        <h1 class="h3 mb-2 text-gray-800">Data penunjang</h1>
        <p class="mb-4">Berikut adalah daftar penunjang Anda yang terdaftar di sistem.</p>
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
            <div class="card mb-4">
                <div class="card-header align-middle">
                    <div class="row py-2">
                        <div class="col-md-8">
                            <h5 class=""><strong>Informasi penunjang</strong></h5>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ route('penunjang.edit', $penunjang->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('penunjang.destroy', $penunjang->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-5">
                                    <p><strong>Kepanitiaan/Badan</strong></p>
                                    <p><strong>Tingkat</strong></p>
                                    <p><strong>Nama Kepanitiaan/Badan</strong></p>
                                    <p><strong>Instansi</strong></p>
                                    <p><strong>No SK</strong></p>
                                    <p><strong>Tanggal Mulai</strong></p>
                                    <p><strong>Tanggal Selesai</strong></p>
                                </div>
                                <div class="col-md-7">
                                    <p><strong>:</strong> {{ $penunjang->kepanitiaan }}</p>
                                    <p><strong>:</strong> {{ $penunjang->tingkat}}</p>
                                    <p><strong>:</strong> {{ $penunjang->nama }}</p>
                                    <p><strong>:</strong> {{ $penunjang->instansi }}</p>
                                    <p><strong>:</strong> {{ $penunjang->no_sk }}</p>
                                    <p><strong>:</strong> {{ $penunjang->tgl_mulai}}</p>
                                    <p><strong>:</strong> {{ $penunjang->tgl_selesai }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h5 class="py-2">Dokumen penunjang</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="p-0"><strong class="d-block">Surat Tugas penunjang :</strong>
                                @if ($penunjang->surat_tugas)
                                <a href="{{ asset('storage/'.$penunjang->surat_tugas) }}" class="btn btn-link btn-sm p-0">Lihat Surat Tugas</a>
                                @else
                                <span class="text-muted">Belum diunggah</span>
                                @endif
                            </p>
                        </div>

                        <div class="col-md-4">
                            <p class="p-0"><strong class="d-block">SK :</strong>
                                @if ($penunjang->sk)
                                <a href="{{ asset('storage/'.$penunjang->sk) }}" class="btn btn-link btn-sm p-0">Lihat SK</a>
                                @else
                                <span class="text-muted">Belum diunggah</span>
                                @endif
                            </p>
                        </div>

                        <div class="col-md-4">
                            <p class="p-0"><strong class="d-block">Sertifikat :</strong>
                                @if ($penunjang->sertifikat)
                                <a href="{{ asset('storage/'.$penunjang->sertifikat) }}" class="btn btn-link btn-sm p-0">Lihat Sertifikat</a>
                                @else
                                <span class="text-muted">Belum diunggah</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
