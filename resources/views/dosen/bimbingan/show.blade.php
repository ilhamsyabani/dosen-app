@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">

        @include('components.alert')
        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa Bimbingan</h1>
                <p class="mb-4">Berikut adalah daftar mahasiswa bimbingan Anda yang terdaftar di sistem.</p>
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
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5><strong>Informasi bimbingan</strong></h5>
                        <div>
                            <a href="{{ route('bimbingan.edit', $bimbingan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('bimbingan.destroy', $bimbingan->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Nama Mahasiswa </strong></p>
                                <p><strong>NIM </strong></p>
                                <p><strong>Jenjang </strong></p>
                                <p><strong>Prodi </strong></p>
                                <p><strong>Tahun Ajaran </strong></p>
                                <p><strong>Sebagai</strong></p>
                                <p><strong>Frekuensi</strong></p>
                            </div>
                            <div class="col-md-8">
                                <p><strong>:</strong> {{ $bimbingan->nama_mahasiswa }}</p>
                                <p><strong>:</strong> {{ $bimbingan->nim }}</p>
                                <p><strong>:</strong> {{ $bimbingan->jenjang }}</p>
                                <p><strong>:</strong> {{ $bimbingan->prodi }}</p>
                                <p><strong>:</strong> {{ $bimbingan->tahun_ajaran }}</p>
                                <p><strong>:</strong> {{ $bimbingan->peran }}</p>
                                <p><strong>:</strong> {{ $bimbingan->frekuiensi }}</p>
                            </div>
                        </div>
                        <hr>
                        <h5 class="py-2">Dokumen Bimbingan</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Buku bimbingan :</strong></p>
                                @if ($bimbingan->buku_bimbingan)
                                    <a href="{{ asset('storage/' . $bimbingan->buku_bimbingan) }}" class="btn btn-link btn-sm p-0">Lihat buku bimbingan</a>
                                @else
                                    <span class="text-muted">Belum diunggah</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <p><strong>SK Pembimbing :</strong></p>
                                @if ($bimbingan->sk_pembimbing)
                                    <a href="{{ asset('storage/' . $bimbingan->sk_pembimbing) }}" class="btn btn-link btn-sm p-0">Lihat sk Pembimbing</a>
                                @else
                                    <span class="text-muted">Belum diunggah</span>
                                @endif
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
