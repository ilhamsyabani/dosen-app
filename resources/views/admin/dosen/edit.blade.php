@extends('layouts.admin')

@section('title', 'Perbarui Admin')

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
                    <form class="dosen-form" action="{{ route('dosen.update', $dosen) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="inputnama" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="inputnama"
                                name="nama" value="{{ old('nama', $dosen->nama) }}" placeholder="Nama">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail"
                                name="email" value="{{ old('email', $dosen->email) }}" placeholder="Alamat Email"
                                autocomplete="off">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="inputNIP" class="form-label">NIP</label>
                            <input type="text" class="form-control @error('nip') is-invalid @enderror" id="inputNIP"
                                name="nip" value="{{ old('nip', $dosen->nip) }}" placeholder="NIP">
                            @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputProdi" class="form-label">Prodi</label>
                            <select class="form-select @error('departemen_id') is-invalid @enderror" id="inputProdi"
                                name="departemen_id">
                                @foreach ($departemens as $departemen)
                                    <option value="{{ $departemen->id }}"
                                        {{ old('departemen_id', $dosen->departemen_id) == $departemen->id ? 'selected' : '' }}>
                                        {{ $departemen->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('departemen_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
