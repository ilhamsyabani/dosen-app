@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <!-- Page Heading -->
        @include('components.alert')

        <h1 class="h3 pt-4 mb-4 text-gray-800">{{ __('Profile') }}</h1>
        
        <div class="row">
            <div class="col-lg-4 order-lg-2">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Pengguna</h5>
                        <p class="card-text">Nama: {{ Auth::user()->nama }}</p>
                        <p class="card-text">Email: {{ Auth::user()->email }}</p>
                        <a href="#" class="btn btn-primary">Ubah Password</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 order-lg-1">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 fw-bold text-primary">Personal Data</h6>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('detail.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">Perbarui informasi pengguna</h6>

                            <div class="pl-lg-4">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Nama <span class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        placeholder="Name" value="{{ old('name', Auth::user()->nama) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label" for="tempat_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                                        <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir"
                                            placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}" required>
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label" for="tanggal_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                                        <input type="date" id="tanggal_lahir" class="form-control"
                                            name="tanggal_lahir" placeholder="Tanggal Lahir"
                                            value="{{ old('tanggal_lahir') }}" required>
                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="alamat">Alamat <span class="text-danger">*</span></label>
                                    <textarea id="alamat" class="form-control" name="alamat" placeholder="Alamat" required>{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="phone">Nomor Telepon <span class="text-danger">*</span></label>
                                    <input type="text" id="phone" class="form-control" name="phone"
                                        placeholder="Nomor Telepon" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="sinta_id">Sinta ID</label>
                                    <input type="text" id="sinta_id" class="form-control" name="sinta_id"
                                        placeholder="Sinta ID" value="{{ old('sinta_id') }}">
                                    @error('sinta_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="scopus_id">Scopus ID</label>
                                    <input type="text" id="scopus_id" class="form-control" name="scopus_id"
                                        placeholder="Scopus ID" value="{{ old('scopus_id') }}">
                                    @error('scopus_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="orchid_id">Orchid ID</label>
                                    <input type="text" id="orchid_id" class="form-control" name="orchid_id"
                                        placeholder="Orchid ID" value="{{ old('orchid_id') }}">
                                    @error('orchid_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Button -->
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
