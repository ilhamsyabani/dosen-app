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
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5><strong>Informasi Pembimbingan</strong></h5>
                            <div>
                                <a href="{{ route('pembimbingan.edit', $pembimbingan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pembimbingan.destroy', $pembimbingan->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <p><strong>Kegiatan </strong></p>
                                            <p><strong>Nama Mahasiswa </strong></p>
                                            <p><strong>NIM </strong></p>
                                            <p><strong>Jenjang </strong></p>
                                            <p><strong>TA </strong></p>
                                            <p><strong>Jumalah Bimbingan</strong></p>
                                        </div>
                                        <div class="col-md-7">
                                            <p><strong>:</strong> {{ $pembimbingan->kegiatan }}</p>
                                            <p><strong>:</strong> {{ $pembimbingan->nama_mahasiswa }}</p>
                                            <p><strong>:</strong> {{ $pembimbingan->nim }}</p>
                                            <p><strong>:</strong> {{ $pembimbingan->jenjang }}</p>
                                            <p><strong>:</strong> {{ $pembimbingan->tahun_ajaran }}</p>
                                            <p><strong>:</strong> {{ $pembimbingan->banyaknya_bimbingan }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h5 class="py-2">Dokumen pembimbingan</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="p-0"><strong class="d-block">Bukti Bimbingan/SK pembimbingan :</strong>
                                        @if ($pembimbingan->bukti_bimbingan_sk)
                                            <a href="{{ asset('storage/' . $pembimbingan->bukti_bimbingan_sk) }}"
                                                class="btn btn-link btn-sm p-0">Lihat Buku pembimbingan</a>
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
    </div>
@endsection
