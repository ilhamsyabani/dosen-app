@extends('layouts.admin')

@section('title', 'Tambah Admin')

@section('content')
    <div class="container-fluid p-4">

        @include('components.alert')

        <!-- Page Heading -->
        <div class="row justify-content-between align-items-center mb-2 mt-4">
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data user</h1>
                <p class="mb-4">Berikut adalah daftar data user yang terdaftar di sistem.</p>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form class="user-form" action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="inputName" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName"
                                name="name" value="{{ old('name') }}" placeholder="Nama">
                            @error('name')
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
                            <label for="inputPassword" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="inputPassword" name="password" value="{{ old('password') }}" placeholder="Password"
                                    autocomplete="off">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="inputNIP" class="form-label">NIP</label>
                            <input type="text" class="form-control @error('nip') is-invalid @enderror" id="inputNIP"
                                name="nip" value="{{ old('nip') }}" placeholder="NIP">
                            @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if (Auth::user()->role == 'admin')
                            <div class="mb-3">
                                <label for="inputRole" class="form-label">Sebagai</label>
                                <select class="form-select @error('role') is-invalid @enderror" id="inputrole"
                                    name="role" onchange="toggleRoleFields()">
                                    <option value="">Pilih Peran</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>admin</option>
                                    <option value="Admin Fakultas" {{ old('role') == 'Admin Fakultas' ? 'selected' : '' }}>
                                        Admin Fakultas</option>
                                    <option value="Admin Departemen"
                                        {{ old('role') == 'Admin Departemen' ? 'selected' : '' }}>Admin Departemen</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @else
                            <input type="hidden" value="Admin Departemen" id="inputrole"
                            name="role" onchange="toggleRoleFields()">
                        @endif


                        <div class="mb-3" id="departemen_field" style="display: none;">
                            <label for="inputDepartemen" class="form-label">Departemen</label>
                            <select class="form-select @error('departemen_id') is-invalid @enderror" id="inputDepartemen_id"
                                name="departemen_id">
                                <option value="">Pilih departemen</option>
                                @foreach ($departemens as $departemen)
                                    <option value="{{ $departemen->id }}"
                                        {{ old('departemen_id') == $departemen->id ? 'selected' : '' }}>
                                        {{ $departemen->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('departemen_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3" id="fakultas_field" style="display: none;">
                            <label for="inputfakultas" class="form-label">Fakultas</label>
                            <select class="form-select @error('fakultas_id') is-invalid @enderror" id="inputfakultas_id"
                                name="fakultas_id">
                                <option value="">Pilih fakultas</option>
                                @foreach ($fakultases as $fakultas)
                                    <option value="{{ $fakultas->id }}"
                                        {{ old('fakultas_id') == $fakultas->id ? 'selected' : '' }}>
                                        {{ $fakultas->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('fakultas_id')
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

    <script>
        document.getElementById('togglePassword').addEventListener('click', function(e) {
            const passwordInput = document.getElementById('inputPassword');
            const icon = e.currentTarget.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        function toggleRoleFields() {
            const role = document.getElementById('inputrole').value;
            const fakultas = document.getElementById('fakultas_field');
            const departemen = document.getElementById('departemen_field');

            if (role === 'Admin Fakultas') {
                fakultas.style.display = 'block';
                departemen.style.display = 'none';
            } else if (role === 'Admin Departemen') {
                departemen.style.display = 'block';
                fakultas.style.display = 'none';
            } else {
                fakultas.style.display = 'none';
                departemen.style.display = 'none';
            }
        }

        // Call toggleFields() on page load to set the correct state
        document.addEventListener('DOMContentLoaded', function() {
            toggleRoleFields();
        });
    </script>
@endsection
