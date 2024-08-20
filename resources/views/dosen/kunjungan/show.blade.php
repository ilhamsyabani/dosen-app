@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Kunjungan Imiah</h1>
                <p class="mb-4">Berikut adalah daftar kunjungan ilmiah Anda yang terdaftar di sistem.</p>
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
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5><strong>Informasi Kunjungan Ilmiah</strong></h5>
                        <div>
                            <a href="{{ route('kunjungan.edit', $kunjungan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('kunjungan.destroy', $kunjungan->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-5">
                                        <p><strong>Tanggal Kegiatan </strong></p>
                                        <p><strong>Jenjang </strong></p>
                                        <p><strong>Univeritas </strong></p>
                                        <p><strong>Prodi</strong></p>
                                        <p><strong>Matakuliah</strong></p>
                                    </div>
                                    <div class="col-md-7">
                                        <p><strong>:</strong> {{ $kunjungan->tanggal }}</p>
                                        <p><strong>:</strong> {{ $kunjungan->jenjang }}</p>
                                        <p><strong>:</strong> {{ $kunjungan->universitas }}</p>
                                        <p><strong>:</strong> {{ $kunjungan->prodi }}</p>
                                        <p><strong>:</strong> {{ $kunjungan->matkul }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="py-2">Dokumen Kunjungan Ilmiah</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="p-0"><strong class="d-block">Dokumen Undangan:</strong>
                                    @if ($kunjungan->undangan)
                                        <a href="{{ asset('storage/' . $kunjungan->undangan) }}"
                                            class="btn btn-link btn-sm p-0">Lihat Undangan</a>
                                    @else
                                        <span class="text-muted">Belum Undangan</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="p-0"><strong class="d-block">Dokumen Surat Tugas:</strong>
                                    @if ($kunjungan->surat_tugas)
                                        <a href="{{ asset('storage/' . $kunjungan->surat_tugas) }}"
                                            class="btn btn-link btn-sm p-0">Lihat Surat Tugas</a>
                                    @else
                                        <span class="text-muted">Belum Surat Tugas</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="p-0"><strong class="d-block">Dokumen Artikel Ilmiah :</strong>
                                    @if ($kunjungan->ia)
                                        <a href="{{ asset('storage/' . $kunjungan->ia) }}"
                                            class="btn btn-link btn-sm p-0">Lihat Artikel Ilmiah</a>
                                    @else
                                        <span class="text-muted">Belum Artikel Ilmiah</span>
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
