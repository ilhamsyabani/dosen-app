@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 mt-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data bahan ajar</h1>
                <p class="mb-4">Berikut adalah daftar bahan ajar yang Anda miliki yang terdaftar di sistem.</p>
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
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Bahan Ajar</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('bahan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @include('components.input-year', [
                                'label' => 'Tahun Ajaran',
                                'name' => 'tahun_ajaran',
                                'value' => old('tahun_ajaran'),
                                'placeholder' => 'Pilih Tahun',
                            ])

                            @include('components.input-select', [
                                'label' => 'Jenjang',
                                'name' => 'jenjang',
                                'value' => old('jenjang'),
                                'placeholder' => 'Pilih Jenjang',
                                'options' => [
                                    'S1' => 'S1',
                                    'S2' => 'S2',
                                    'S3' => 'S3',
                                    'Vokasi' => 'Vokasi',
                                ],
                            ])

                            @include('components.input-text', [
                                'label' => 'ISBN',
                                'name' => 'isbn',
                                'value' => old('isbn'),
                            ])

                            @include('components.input-date', [
                                'label' => 'Bulan/Tahun',
                                'name' => 'bulan',
                                'value' => old('bulan', isset($data) ? $data->tanggal->format('Y-m') : ''),
                                'placeholder' => 'Pilih Bulan dan Tahun',
                                'date_format' => 'Y-m',
                            ])


                            @include('components.input-text', [
                                'label' => 'Penerbit',
                                'name' => 'penerbit',
                                'value' => old('penerbit'),
                            ])

                            @include('components.input-text', [
                                'label' => 'Penulis',
                                'name' => 'penulis',
                                'value' => old('penulis'),
                            ])

                            @include('components.input-select', [
                                'label' => 'Bahan Ajar',
                                'name' => 'format',
                                'value' => old('format'),
                                'placeholder' => 'Pilih Bentuk Bahan Ajar',
                                'options' => [
                                    'Modul' => 'Modul',
                                    'Buku Ajar (cetak/elektronik)' => 'Buku Ajar (cetak/elektronik)',
                                    'Buku pelajaran (SLTA kebawah)' => 'Buku pelajaran (SLTA kebawah)',
                                    'Lain lain' => 'Lain lain',
                                ],
                            ])

                            @include('components.input-file', [
                                'label' => 'Upload Dokumen Bahan Ajar',
                                'name' => 'produk',
                            ])

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
