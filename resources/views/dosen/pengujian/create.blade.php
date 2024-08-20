@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Pengujian Mahasiswa</h1>
                <p class="mb-4">Berikut adalah daftar mahasiswa ujian dengan Anda yang terdaftar di sistem.</p>
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
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Kompetensi</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pengujian.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @include('components.input-date', [
                                'label' => 'Tanggal Pengujian',
                                'name' => 'tanggal',
                                'value' => old('tanggal'),
                            ])

                            @include('components.input-text', [
                                'label' => 'Nama Mahasiswa',
                                'name' => 'nama_mahasiswa',
                                'value' => old('nama_mahasiswa'),
                                'placeholder' => 'Joko',
                            ])

                            @include('components.input-text', [
                                'label' => 'No Induk Mahasiswa',
                                'name' => 'nim',
                                'value' => old('nim'),
                                'placeholder' => '14102984922',
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

                            @include('components.input-select', [
                                'label' => 'Program Studi',
                                'name' => 'prodi',
                                'value' => old('prodi'),
                                'placeholder' => 'Pilih Prodi',
                                'options' => $departemens,
                            ])

                            @include('components.input-select', [
                                'label' => 'Sebagai',
                                'name' => 'sebagai',
                                'value' => old('sebagai'),
                                'placeholder' => 'Pilih Sebagai',
                                'options' => [
                                    'Ketua Penguji' => 'Ketua Penguji',
                                    'Penguji Utama' => 'Penguji Utama',
                                    'Sekertaris Penguji' => 'Sekertaris Penguji',
                                    'Penguji 1' => 'Penguji 1',
                                    'Penguji 2' => 'Penguji 2',
                                    'Promotor' => 'Promotor',
                                    'Co-Promotor' => 'Co-Promotor',
                                ],
                            ])

                            @include('components.input-file', [
                                'label' => 'Upload File Undangan',
                                'name' => 'undangan',
                            ])

                            @include('components.input-file', [
                                'label' => 'Upload File Lembar Pengesahan',
                                'name' => 'lembar_pengesahan',
                            ])

                            @include('components.input-file', [
                                'label' => 'Upload File SK Pengujian',
                                'name' => 'sk_pengujian',
                            ])

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
