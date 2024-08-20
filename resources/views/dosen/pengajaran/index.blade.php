@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    @include('components.alert')

    <div class="row justify-content-between align-items-center mt-4">
        <!-- Page Heading -->
        <div class="col-md-6">
            <h1 class="h3 mb-2 text-gray-800">Data Mata Kuliah</h1>
            <p class="mb-4">Berikut adalah daftar data mata kuliah Anda yang terdaftar di sistem.</p>
        </div>

        <!-- Tombol Tambah Mata Kuliah -->
        <div class="col-md-6 text-end">
            <a href="{{ route('pengajaran.create') }}" class="btn btn-primary">Tambah Mata Kuliah</a>
        </div>
    </div>

    <!-- Filter dan Pencarian -->
    <div class="row mb-4">
        <div class="col-md-6">
            <form method="GET" action="{{ route('pengajaran.index') }}">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama mata kuliah" value="{{ request('search') }}">
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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Mata Kuliah</h6>
        </div>
        <div class="card-body">
            @if($pengajarans && $pengajarans->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Mata Kuliah</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>SKS</th>
                            <th>Jenjang</th>
                            <th>Prodi</th>
                            <th>Bentuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengajarans as $pengajaran)
                        <tr>
                            <td>{{ $pengajaran->nama_matkul }}</td>
                            <td>{{ $pengajaran->tahun_ajaran }}</td>
                            <td>{{ $pengajaran->semester }}</td>
                            <td>{{ $pengajaran->sks }}</td>
                            <td>{{ $pengajaran->jenjang }}</td>
                            <td>{{ $pengajaran->prodi }}</td>
                            <td>{{ $pengajaran->bentuk }}</td>
                            <td>
                                <a href="{{ route('pengajaran.edit', $pengajaran->id) }}" class="btn btn-warning btn-sm">Perbarui</a>
                                <a href="{{ route('pengajaran.show', $pengajaran->id) }}" class="btn btn-success btn-sm">Detail</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-url="{{ route('pengajaran.destroy', $pengajaran->id) }}">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p>Belum ada data mata kuliah.</p>
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
