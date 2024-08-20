@extends('layouts.admin')

@section('title', 'Departemen')

@section('content')
    <div class="container-fluid p-4">

        @include('components.alert')

        <!-- Page Heading -->
        <div class="row justify-content-between align-items-center mb-2 mt-4">
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data departemen</h1>
                <p class="mb-4">Berikut adalah daftar data departemen yang terdaftar di sistem.</p>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form class="departemen-form" action="{{ route('departemen.update', $departeman ) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="inputFakultas_id" class="form-label">Fakultas</label>
                            <select class="form-select @error('fakultas_id') is-invalid @enderror" id="inputFakultas_id"
                                name="fakultas_id">
                                @foreach ($fakultas as $data)
                                    <option value="{{ $data->id }}"
                                        {{ old('fakultas_id', $departeman->fakultas_id) == $data->id ? 'selected' : '' }}>
                                        {{ $data->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('fakultas_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="inputKode" class="form-label">Kode</label>
                            <input type="text" class="form-control @error('kode') is-invalid @enderror" id="inputkode"
                                name="kode" value="{{ old('kode', $departeman->kode) }}" placeholder="TP">
                            @error('kode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputName" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="inputNama"
                                name="nama" value="{{ old('nama', $departeman->nama) }}" placeholder="Nama">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputdeskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="inputdeskripsi" name="deskripsi"
                                placeholder="Deskripsi tentang depertemen">{{ old('deskripsi', $departeman->deskripsi) }}</textarea>
                            @error('deskripsi')
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
