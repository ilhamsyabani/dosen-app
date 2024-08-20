@extends('layouts.admin')

@section('title', 'Tambah Admin')

@section('content')
    <div class="container-fluid p-4">

        @include('components.alert')

        <!-- Page Heading -->
        <div class="row justify-content-between align-items-center mb-2 mt-4">
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data dosen</h1>
                <p class="mb-4">Berikut adalah daftar data dosen yang terdaftar di sistem.</p>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form class="dosen-form" action="{{ route('dosen.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="inputName" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="inputNama"
                                name="nama" value="{{ old('nama') }}" placeholder="Nama">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail"
                                name="email" value="{{ old('email') }}" placeholder="Alamat Email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="mb-3">
                            <label for="inputNIP" class="form-label">NIP</label>
                            <input type="text" class="form-control @error('nip') is-invalid @enderror" id="inputNIP"
                                name="nip" value="{{ old('nip') }}" placeholder="NIP">
                            @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputProdi" class="form-label">Prodi</label>
                            <select class="form-select @error('departemen_id') is-invalid @enderror" id="inputdepartemen_id" name="departemen_id">
                                <option value="">Pilih Prodi</option>
                                @foreach ($departemens as $departemen)
                                    <option value="{{ $departemen->id }}" {{ old('departemen_id') == $departemen->id ? 'selected' : '' }}>
                                        {{ $departemen->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('departemen_id')
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
