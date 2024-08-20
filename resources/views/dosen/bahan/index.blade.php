
@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    @include('components.alert')

    <div class="row justify-content-between align-items-center mt-4">
        <!-- Page Heading -->
        <div class="col-md-6">
            <h1 class="h3 mb-2 text-gray-800">Data bahan ajar</h1>
            <p class="mb-4">Berikut adalah daftar bahan ajar yang Anda miliki yang terdaftar di sistem.</p>
        </div>

        <!-- Tombol Tambah Mata Kuliah -->
        <div class="col-md-6 text-end">
            <a href="{{ route('bahan.create') }}" class="btn btn-primary">Tambah Bahan Ajar</a>
        </div>
    </div>

    <!-- Filter dan Pencarian -->
    <div class="row mb-4">
        <div class="col-md-6">
            <form method="GET" action="{{ route('bahan.index') }}">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama bahan ajar" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-outline-primary">Cari</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 text-end">
            {{-- <form method="GET" action="{{ route('pengajaran.index') }}">
                <div class="input-group">
                    <label for="sortYear" class="me-2">Urutkan Berdasarkan Tahun:</label>
                    <select name="sortYear" id="sortYear" class="form-select" onchange="this.form.submit()">
                        <option value="">Pilih Tahun</option>
                        @foreach($years as $year)
                        <option value="{{ $year }}" {{ request('sortYear') == $year ? 'selected' : '' }}>{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
            </form> --}}
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Bahan Ajar</h6>
        </div>
        <div class="card-body">
            @if($bahans && $bahans->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ISBN</th>
                            <th>Jenjang</th>
                            <th>Penerbit</th>
                            <th>Penulis</th>
                            <th>Format</th>
                            <th>Tahun Ajaran</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bahans as $bahan)
                        <tr>
                            <td>{{ $bahan->isbn }}</td>
                            <td>{{ $bahan->jenjang }}</td>
                            <td>{{ $bahan->penerbit }}</td>
                            <td>{{ $bahan->penulis }}</td>
                            <td>{{ $bahan->format }}</td>
                            <td>{{ $bahan->tahun_ajaran}}</td>
                            <td>
                                <a href="{{ route('bahan.edit', $bahan->id) }}" class="btn btn-warning btn-sm">Perbarui</a>
                                <a href="{{ route('bahan.show', $bahan->id) }}" class="btn btn-success btn-sm">Detail</a>
                                <form action="{{ route('bahan.destroy', $bahan->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p>Belum ada data bahan ajar.</p>
            @endif
        </div>
    </div>
</div>
@include('components.modal-delete')

<script>
    document.getElementById('deleteModal').addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var url = button.getAttribute('data-url');
        var modal = document.getElementById('deleteForm');
        modal.setAttribute('action', url);
    });
</script>
@endsection
