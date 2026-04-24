@extends('layouts.admin')

@section('title', 'Detail Dosen')

@section('content')
<div class="container-fluid p-4">

    @include('components.alert')

    <div class="row justify-content-between align-items-center mb-4 mt-4">
        <div class="col-md-6">
            <h1 class="h3 mb-2 text-gray-800">Detail Dosen</h1>
            <p class="mb-4">Informasi lengkap data dosen.</p>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
            @can('update', $dosen)
                <a href="{{ route('dosen.edit', $dosen) }}" class="btn btn-primary">Edit</a>
            @endcan
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 200px">Nama</th>
                    <td>{{ $dosen->nama }}</td>
                </tr>
                <tr>
                    <th>NIP</th>
                    <td>{{ $dosen->nip }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $dosen->email }}</td>
                </tr>
                <tr>
                    <th>Departemen</th>
                    <td>{{ $dosen->departemen?->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Fakultas</th>
                    <td>{{ $dosen->departemen?->fakultas?->nama ?? '-' }}</td>
                </tr>
            </table>
        </div>
    </div>

</div>
@endsection
