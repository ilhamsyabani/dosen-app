@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <!-- Page Heading -->
        <div class="row justify-content-between align-items-center mt-4">
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Bahan Ajar</h1>
                <p class="mb-4">Berikut adalah daftar bahan ajar Anda yang terdaftar di sistem.</p>
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

            <!-- Informasi bahan -->
            <div class="col-lg-8 order-lg-1">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5><strong>Informasi Bahan Ajar</strong></h5>
                        <div>
                            <a href="{{ route('bahan.edit', $bahan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('bahan.destroy', $bahan->id) }}" method="POST"
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
                            <div class="col-md-4">
                                <p><strong>Tahun Ajar</strong></p>
                                <p><strong>Jenjang</strong></p>
                                <p><strong>ISBN</strong></p>
                                <p><strong>Bulan/Tahun</strong></p>
                                <p><strong>Penerbit</strong></p>
                                <p><strong>Penulis</strong></p>
                                <p><strong>Format</strong></p>
                            </div>
                            <div class="col-md-8">
                                <p><strong>:</strong> {{ $bahan->tahun_ajaran }}</p>
                                <p><strong>:</strong> {{ $bahan->jenjang }}</p>
                                <p><strong>:</strong> {{ $bahan->isbn }}</p>
                                <p><strong>:</strong> {{ $bahan->bulan }}</p>
                                <p><strong>:</strong> {{ $bahan->penerbit }}</p>
                                <p><strong>:</strong> {{ $bahan->penulis }}</p>
                                <p><strong>:</strong> {{ $bahan->format }}</p>
                            </div>
                        </div>
                        <hr>
                        <h5 class="py-2">Dokumen bahan ajar</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Bahan Ajar :</strong>
                                    @if ($bahan->produk)
                                        <a href="{{ asset('storage/' . $bahan->produk) }}"
                                            class="btn btn-link btn-sm p-0">Lihat Undangan</a>
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
