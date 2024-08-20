@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Buku</h1>
                <p class="mb-4">Berikut adalah daftar buku Anda yang terdaftar di sistem.</p>
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
                        <h5><strong>Informasi buku</strong></h5>
                        <div>
                            <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <p><strong>Jenis </strong></p>
                                        <p><strong>Judul </strong></p>
                                        <p><strong>Penulis </strong></p>
                                        <p><strong>Penulis Ke</strong></p>
                                        <p><strong>Posisi </strong></p>
                                    </div>
                                    <div class="col-md-7">
                                        <p><strong>:</strong> {{ $buku->jenis }}</p>
                                        <p><strong>:</strong> {{ $buku->judul }}</p>
                                        <p><strong>:</strong> {{ $buku->penulis }}</p>
                                        <p><strong>:</strong> {{ $buku->penulis_ke }}</p>
                                        <p><strong>:</strong> {{ $buku->posisi }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <p><strong>Penerbit</strong></p>
                                        <p><strong>Tahun</strong></p>
                                        <p><strong>Kota</strong></p>
                                        <p><strong>ISBN </strong></p>
                                    </div>
                                    <div class="col-md-7">
                                        <p><strong>:</strong> {{ $buku->penerbit }}</p>
                                        <p><strong>:</strong> {{ $buku->tahun }}</p>
                                        <p><strong>:</strong> {{ $buku->kota }}</p>
                                        <p><strong>:</strong> {{ $buku->isbn }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
