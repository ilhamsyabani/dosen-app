@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <!-- Page Heading -->
        <div class="row justify-content-between align-items-center mt-4">
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Pengujian Mahasiswa</h1>
                <p class="mb-4">Berikut adalah daftar mahasiswa ujian dengan Anda yang terdaftar di sistem.</p>
            </div>
        </div>

        <div class="row">
            <!-- Informasi Pengguna -->
            <div class="col-lg-4 order-lg-2">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Pengguna</h5>
                        <p class="card-text">Nama: {{ Auth::user()->nama }}</p>
                        <p class="card-text">NIP: {{ Auth::user()->nip }}</p>
                    </div>
                </div>
            </div>

            <!-- Informasi Pengujian -->
            <div class="col-lg-8 order-lg-1">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5><strong>Informasi Pengujian</strong></h5>
                        <div>
                            <a href="{{ route('pengujian.edit', $pengujian->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pengujian.destroy', $pengujian->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Tanggal</strong></p>
                                <p><strong>Nama Mahasiswa</strong></p>
                                <p><strong>NIM</strong></p>
                                <p><strong>Jenjang</strong></p>
                                <p><strong>Prodi</strong></p>
                                <p><strong>Sebagai</strong></p>
                            </div>
                            <div class="col-md-8">
                                <p><strong>:</strong> {{ $pengujian->tanggal }}</p>
                                <p><strong>:</strong> {{ $pengujian->nama_mahasiswa }}</p>
                                <p><strong>:</strong> {{ $pengujian->nim }}</p>
                                <p><strong>:</strong> {{ $pengujian->jenjang }}</p>
                                <p><strong>:</strong> {{ $pengujian->prodi }}</p>
                                <p><strong>:</strong> {{ $pengujian->sebagai }}</p>
                            </div>
                        </div>
                        <hr>
                        <h5 class="py-2">Dokumen Pengujian</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Undangan Pengujian:</strong></p>
                                @if ($pengujian->undangan)
                                    <a href="{{ asset('storage/' . $pengujian->undangan) }}" class="btn btn-link btn-sm p-0">Lihat Undangan</a>
                                @else
                                    <span class="text-muted">Belum diunggah</span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><strong>Lembar Pengesahan:</strong></p>
                                @if ($pengujian->lembar_pengesahan)
                                    <a href="{{ asset('storage/' . $pengujian->lembar_pengesahan) }}" class="btn btn-link btn-sm p-0">Lihat Lembar Pengesahan</a>
                                @else
                                    <span class="text-muted">Belum diunggah</span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><strong>SK Pengujian:</strong></p>
                                @if ($pengujian->sk_pengujian)
                                    <a href="{{ asset('storage/' . $pengujian->sk_pengujian) }}" class="btn btn-link btn-sm p-0">Lihat SK Pengujian</a>
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
