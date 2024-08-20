@extends('layouts.admin')

@section('title', 'Fakultas')

@section('content')
    <div class="container-fluid p-4">

        @include('components.alert')

        <!-- Page Heading -->
        <div class="row justify-content-between align-items-center mb-2 mt-4">
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data fakultas</h1>
                <p class="mb-4">Berikut adalah daftar data fakultas yang terdaftar di sistem.</p>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form class="fakultas-form" action="{{ route('fakultas.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="inputKode" class="form-label">Kode</label>
                            <input type="text" class="form-control @error('kode') is-invalid @enderror" id="inputkode"
                                name="kode" value="{{ old('kode') }}" placeholder="FIP">
                            @error('kode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputName" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="inputNama"
                                name="nama" value="{{ old('nama') }}" placeholder="Nama">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputdeskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="inputdeskripsi" name="deskripsi"
                                placeholder="Deskripsi tentang fakultas">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
