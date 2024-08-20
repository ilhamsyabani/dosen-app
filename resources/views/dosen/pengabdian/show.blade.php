@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa pengabdian</h1>
                <p class="mb-4">Berikut adalah daftar pengabdian Anda yang terdaftar di sistem.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 order-lg-2">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Pengguna</h5>
                        <p class="card-text">Nama: {{ Auth::user()->name }}</p>
                        <p class="card-text">NIP: {{ Auth::user()->nip }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 order-lg-1">
                <div class="card mb-4">

                    <div class="card-header align-middle">
                        <div class="row py-2">
                            <div class="col-md-8">
                                <h5 class=""><strong>Informasi pengabdian</strong></h5>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="{{ route('pengabdian.edit', $pengabdian->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('pengabdian.destroy', $pengabdian->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                            </div>
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
                                        <p><strong>:</strong> {{ $pengabdian->judul }}</p>
                                        <p><strong>:</strong> {{ $pengabdian->hibah }}</p>
                                        <p><strong>:</strong> {{ $pengabdian->skim->nama }}</p>
                                        <p><strong>:</strong> {{ $pengabdian->tahun_usulan }}</p>
                                        <p><strong>:</strong> {{ $pengabdian->tahun_kegiatan }}</p>
                                        <p><strong>:</strong> {{ $pengabdian->tahun_pelaksanaan }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <p><strong>Lama Kegiatan</strong></p>
                                        <p><strong>Dana Dikti </strong></p>
                                        <p><strong>Dana PT</strong></p>
                                        <p><strong>Dana Institusi Lain </strong></p>
                                        <p><strong>NO SK </strong></p>
                                        <p><strong>Berbasis riset</strong></p>
                                        <p><strong>Penerapan dalam Masyarakat</strong></p>
                                    </div>
                                    <div class="col-md-7">
                                        <p><strong>:</strong> {{ $pengabdian->lama_kegiatan }} Hari</p>
                                        <p><strong>:</strong> Rp.{{ $pengabdian->dana_dikti }}</p>
                                        <p><strong>:</strong> Rp.{{ $pengabdian->dana_pt }}</p>
                                        <p><strong>:</strong> Rp.{{ $pengabdian->dana_institusi_lain }}</p>
                                        <p><strong>:</strong> {{ $pengabdian->no_sk }}</p>
                                        <p><strong>:</strong> {{ $pengabdian->berbasis_riset ? 'Ya' : 'Tidak' }}</p>
                                        <p><strong>:</strong>
                                            {{ $pengabdian->digunakan_di_masyarakat ? 'Ya' : 'Tidak' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Agota Dalam pengabdian</h5>
                        <p>Peran Dalam pengabdian : {{ $pengabdian->posisi }}</p>
                        <div class="row">
                            <div class="px-4 col-sm-6">
                                <p>Anggota Dosen </p>
                                @if ($pengabdian->tim_peneliti)
                                    <ul class="p-0" style="list-style: none;">
                                        @foreach ($pengabdian->tim_peneliti as $anggota)
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
                                @if ($pengabdian->mahasiswa)
                                    <ul class="p-0" style="list-style: none;">
                                        @foreach ($pengabdian->mahasiswa as $anggota)
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
                        <h5 class="py-2">Dokumen pengabdian</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="p-0"><strong class="d-block">laporan pengabdian :</strong>
                                    @if ($pengabdian->laporan)
                                        <a href="{{ asset('storage/' . $pengabdian->laporan) }}"
                                            class="btn btn-link btn-sm p-0">Lihat laporan pengabdian</a>
                                    @else
                                        <span class="text-muted">Belum diunggah</span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-4">
                                <p class="p-0"><strong class="d-block">Sertifikat :</strong>
                                    @if ($pengabdian->sertifikat)
                                        <a href="{{ asset('storage/' . $pengabdian->sertifikat) }}"
                                            class="btn btn-link btn-sm p-0">Lihat sertifikat</a>
                                    @else
                                        <span class="text-muted">Belum diunggah</span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-4">
                                <p class="p-0"><strong class="d-block">SK :</strong>
                                    @if ($pengabdian->sk)
                                        <a href="{{ asset('storage/' . $pengabdian->sk) }}"
                                            class="btn btn-link btn-sm p-0">Lihat SK </a>
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
