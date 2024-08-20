@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between items-center ">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Haki </h1>
                <p class="mb-4">Berikut adalah daftar haki yang terdaftar di sistem.</p>
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
                    <div class="card-header align-middle">
                        <div class="row py-2">
                            <div class="col-md-8">
                                <h5 class=""><strong>Informasi Haki</strong></h5>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="{{ route('haki.edit', $haki->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('haki.destroy', $haki->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p><strong>Jenis </strong></p>
                                        <p><strong>Tingkat </strong></p>
                                        <p><strong>Produk </strong></p>
                                        <p><strong>Judul </strong></p>
                                        <p><strong>Tanggal Terbit </strong></p>
                                        <p><strong>Url</strong></p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><strong>:</strong> {{ $haki->jenis }}</p>
                                        <p><strong>:</strong> {{ $haki->tingkat }}</p>
                                        <p><strong>:</strong> {{ $haki->produk }}</p>
                                        <p><strong>:</strong> {{ $haki->judul }}</p>
                                        <p><strong>:</strong> {{ $haki->tanggal_terbit }}</p>
                                        <p><strong>:</strong> {{ $haki->url }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                        <hr>
                        <h5 class="py-2">Dokumen haki</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="p-0"><strong class="d-block">Sertifikat haki :</strong>
                                    @if ($haki->sertifikat)
                                        <a href="{{ asset('storage/' . $haki->sertifikat) }}"
                                            class="btn btn-link btn-sm p-0">Lihat sertifikat haki</a>
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
