@extends('layouts.app')


@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data PKM Insidental</h1>
                <p class="mb-4">Berikut adalah daftar PKM Insidental Anda yang terdaftar di sistem.</p>
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
                                <h5 class=""><strong>Informasi PKM Insidental</strong></h5>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="{{ route('pkm.edit', $pkm->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pkm.destroy', $pkm->id) }}" method="POST"
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
                                    <div class="col-md-5">
                                        <p><strong>Nama</strong></p>
                                        <p><strong>Tingkat </strong></p>
                                        <p><strong>Kategori Pembicara</strong></p>
                                        <p><strong>Tanggal </strong></p>
                                        <p><strong>Honorarium</strong></p>
                                        <p><strong>No SK</strong></p>
                                    </div>
                                    <div class="col-md-7">
                                        <p><strong>:</strong> {{ $pkm->nama }}</p>
                                        <p><strong>:</strong> {{ $pkm->tingkat }}</p>
                                        <p><strong>:</strong> {{ $pkm->kategori_pembicara }}</p>
                                        <p><strong>:</strong> {{ $pkm->tanggal }}</p>
                                        <p><strong>:</strong> {{ $pkm->honorarium }}</p>
                                        <p><strong>:</strong> {{ $pkm->no_sk }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="py-2">Dokumen PKM Insidental</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="p-0"><strong class="d-block">Surat Tugas pkm :</strong>
                                    @if ($pkm->surat_tugas)
                                        <a href="{{ asset('storage/' . $pkm->surat_tugas) }}"
                                            class="btn btn-link btn-sm p-0">Lihat Surat Tugas</a>
                                    @else
                                        <span class="text-muted">Belum diunggah</span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-4">
                                <p class="p-0"><strong class="d-block">Materi :</strong>
                                    @if ($pkm->materi)
                                        <a href="{{ asset('storage/' . $pkm->materi) }}"
                                            class="btn btn-link btn-sm p-0">Lihat Materi</a>
                                    @else
                                        <span class="text-muted">Belum diunggah</span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-4">
                                <p class="p-0"><strong class="d-block">Sertifikat :</strong>
                                    @if ($pkm->sertifikat)
                                        <a href="{{ asset('storage/' . $pkm->sertifikat) }}"
                                            class="btn btn-link btn-sm p-0">Lihat Sertifikat</a>
                                    @else
                                        <span class="text-muted">Belum diunggah</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="p-0"><strong class="d-block">IA :</strong>
                                    @if ($pkm->ia)
                                        <a href="{{ asset('storage/' . $pkm->ia) }}" class="btn btn-link btn-sm p-0">Lihat
                                            IA</a>
                                    @else
                                        <span class="text-muted">Belum diunggah</span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-4">
                                <p class="p-0"><strong class="d-block">Laporan :</strong>
                                    @if ($pkm->laporan)
                                        <a href="{{ asset('storage/' . $pkm->laporan) }}"
                                            class="btn btn-link btn-sm p-0">Lihat Laporan</a>
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
