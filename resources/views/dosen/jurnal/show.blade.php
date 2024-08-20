@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Jurnal</h1>
                <p class="mb-4">Berikut adalah daftar jurnal Anda yang terdaftar di sistem.</p>
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
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5><strong>Informasi jurnal</strong></h5>
                        <div>
                            <a href="{{ route('jurnal.edit', $jurnal->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('jurnal.destroy', $jurnal->id) }}" method="POST"
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
                                        <p><strong>Kategori </strong></p>
                                        <p><strong>Penulis</strong></p>
                                        <p><strong>Penulis Ke</strong></p>
                                        <p><strong>Posisi</strong></p>
                                        <p><strong>Judul </strong></p>
                                        <p><strong>Nama Jurnal</strong></p>
                                        <p><strong>Jenis Jurnal</strong></p>
                                        @if ($jurnal->kategori = 'Prosiding')
                                            <p><strong>Pelaksana</strong></p>
                                        @endif
                                    </div>
                                    <div class="col-md-7">
                                        <p><strong>:</strong> {{ $jurnal->kategori }}</p>
                                        <p><strong>:</strong> {{ $jurnal->penulis }}</p>
                                        <p><strong>:</strong> {{ $jurnal->penulis_ke }}</p>
                                        <p><strong>:</strong> {{ $jurnal->posisi }}</p>
                                        <p><strong>:</strong> {{ $jurnal->judul }}</p>
                                        <p><strong>:</strong> {{ $jurnal->nama_jurnal }}</p>
                                        <p><strong>:</strong> {{ $jurnal->jenis_jurnal }}</p>
                                        @if ($jurnal->kategori = 'Prosiding')
                                            <p><strong>{{ $jurnal->pelaksana }}</strong></p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <p><strong>Tanggal</strong></p>
                                        <p><strong>Volume </strong></p>
                                        <p><strong>Halaman</strong></p>
                                        <p><strong>Edisi </strong></p>
                                        <p><strong>Kategori Jurnal </strong></p>
                                        <p><strong>Status terindeks</strong></p>
                                        @if ($jurnal->terindeks = 'Terindeks')
                                            <p><strong>Sinta</strong></p>
                                        @else
                                            <p><strong>Sinta</strong></p>
                                        @endif
                                        <p><strong>ISSN</strong></p>

                                    </div>
                                    <div class="col-md-7">
                                        <p><strong>:</strong> {{ $jurnal->tanggal }} </p>
                                        <p><strong>:</strong> {{ $jurnal->volume }}</p>
                                        <p><strong>:</strong> {{ $jurnal->halaman }}</p>
                                        <p><strong>:</strong> {{ $jurnal->edisi }}</p>
                                        <p><strong>:</strong> {{ $jurnal->kategori_jurnal }}</p>
                                        <p><strong>:</strong> {{ $jurnal->terindeks }}</p>
                                        @if ($jurnal->terindeks = 'Terindeks')
                                            <p><strong>{{ $jurnal->sinta }}</strong></p>
                                        @else
                                            <p><strong>{{ $jurnal->q }}</strong></p>
                                        @endif
                                        <p><strong>{{ $jurnal->issn }}</strong></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="py-2">Dokumen jurnal</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>DOI/Url : </strong><a href="{{ $jurnal->doi_url }}">buka link</a></p>
                            </div>
                            <div class="col-md-6">
                                <p class=""><strong class="d-block">Artikel :</strong>
                                    @if ($jurnal->artikel)
                                        <a href="{{ asset('storage/' . $jurnal->artikel) }}"
                                            class="btn btn-link btn-sm p-0">Lihat Artikel</a>
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
