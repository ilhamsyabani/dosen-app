@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Penelitian Ilmiah</h1>
                <p class="mb-4">Berikut adalah daftar penelitian ilmiah Anda yang terdaftar di sistem.</p>
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
                        <h5><strong>Informasi Penelitian Ilmiah</strong></h5>
                        <div>
                            <a href="{{ route('penelitian.edit', $penelitian->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('penelitian.destroy', $penelitian->id) }}" method="POST"
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
                                    <div class="col-md-4">
                                        <p><strong>Judul </strong></p>
                                        <p><strong>Hibah </strong></p>
                                        <p><strong>SKIM</strong></p>
                                        <p><strong>Tahun Usulan </strong></p>
                                        <p><strong>Tahun Kegiatan </strong></p>
                                        <p><strong>Tahun Pelaksanaan</strong></p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><strong>:</strong> {{ $penelitian->judul }}</p>
                                        <p><strong>:</strong> {{ $penelitian->hibah }}</p>
                                        <p><strong>:</strong> {{ $penelitian->skim->nama }}</p>
                                        <p><strong>:</strong> {{ $penelitian->tahun_usulan }}</p>
                                        <p><strong>:</strong> {{ $penelitian->tahun_kegiatan }}</p>
                                        <p><strong>:</strong> {{ $penelitian->tahun_pelaksanaan }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p><strong>Lama Kegiatan</strong></p>
                                        <p><strong>Dana Dikti </strong></p>
                                        <p><strong>Dana PT</strong></p>
                                        <p><strong>Dana Institusi Lain </strong></p>
                                        <p><strong>NO SK </strong></p>
                                        <p><strong>Penerapan dalam Masyarakat</strong></p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><strong>:</strong> {{ $penelitian->lama_kegiatan }} Hari</p>
                                        <p><strong>:</strong> Rp.{{ $penelitian->dana_dikti }}</p>
                                        <p><strong>:</strong> Rp.{{ $penelitian->dana_pt }}</p>
                                        <p><strong>:</strong> Rp.{{ $penelitian->dana_institusi_lain }}</p>
                                        <p><strong>:</strong> {{ $penelitian->no_sk }}</p>
                                        <p><strong>:</strong> {{ $penelitian->digunakan_di_masyarakat }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Agota Dalam Penelitian</h5>
                        <p>Peran Dalam Penelitian : {{ $penelitian->posisi }}</p>
                        <div class="row">
                            <div class="px-4 col-sm-6">
                                <p>Anggota Dosen </p>
                                @if ($penelitian->tim_peneliti)
                                    <ul class="p-0" style="list-style: none;">
                                        @foreach ($penelitian->tim_peneliti as $anggota)
                                            <li class="py-1 font-weight-bold"> {{ $anggota }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>Tidak Ada Anggota</p>
                                @endif
                            </div>
                            <div class="px-4 col-sm-6">
                                <p>Anggota Mahasiswa </p>
                                @if ($penelitian->mahasiswa)
                                    <ul class="p-0" style="list-style: none;">
                                        @foreach ($penelitian->mahasiswa as $anggota)
                                            <li class="py-1 font-weight-bold"> {{ $anggota }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>Tidak Ada Anggota</p>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <h5 class="py-2">Dokumen penelitian</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="p-0"><strong class="d-block">laporan penelitian :</strong>
                                    @if ($penelitian->laporan)
                                        <a href="{{ asset('storage/' . $penelitian->laporan) }}"
                                            class="btn btn-link btn-sm p-0">Lihat laporan penelitian</a>
                                    @else
                                        <span class="text-muted">Belum diunggah</span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-4">
                                <p class="p-0"><strong class="d-block">Kontrak Penelitian :</strong>
                                    @if ($penelitian->kontrak_penelitian)
                                        <a href="{{ asset('storage/' . $penelitian->kontrak_penelitian) }}"
                                            class="btn btn-link btn-sm p-0">Lihat Kontrak Penelitian</a>
                                    @else
                                        <span class="text-muted">Belum diunggah</span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-4">
                                <p class="p-0"><strong class="d-block">SK penelitian :</strong>
                                    @if ($penelitian->sk_penugasan)
                                        <a href="{{ asset('storage/' . $penelitian->sk_penugasan) }}"
                                            class="btn btn-link btn-sm p-0">Lihat SK Penelitian</a>
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
