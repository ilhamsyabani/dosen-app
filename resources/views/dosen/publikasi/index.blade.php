@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between items-center mt-4 ">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data publikasi </h1>
                <p class="mb-4">Berikut adalah daftar publikasi yang terdaftar di sistem.</p>
            </div>

            <!-- Tombol Tambah Dosen -->
            <div class="col-md-6 text-end">
                <a href="{{ route('publikasi.create') }}" class="btn btn-primary">Tambah publikasi</a>
            </div>
        </div>

        <!-- Card Publikasi -->
        <div class="card mb-4">
            <div class="card-header d-flex items-center justify-between w-full">
                <h6 class="m-0 font-weight-bold text-primary">Daftar publikasi</h6>
            </div>
            <div class="card-body">
                @if ($publikasis && $publikasis->count() > 0)
                    <div class="table-responsive">
                        <h6>Pameran/Pagelaran/Media</h6>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kegiatan</th>
                                    <th>Judul</th>
                                    <th>Tingkat</th>
                                    <th>Tanggal</th>
                                    <th>Media</th>
                                    <th>Penyelengaara</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($publikasis as $publikasi)
                                    <tr>
                                        <td>{{ $publikasi->tipe }}</td>
                                        <td>{{ $publikasi->judul }}</td>
                                        <td>{{ $publikasi->tingkat }}</td>
                                        <td>{{ $publikasi->tanggal }}</td>
                                        <td>{{ $publikasi->media_masa }}</td>
                                        <td>{{ $publikasi->penyelengaara }}</td>
                                        <td>
                                            <a href="{{ route('publikasi.edit', $publikasi->id) }}"
                                                class="btn btn-warning btn-sm">Perbarui</a>
                                            <form action="{{ route('publikasi.destroy', $publikasi->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Belum ada data publikasi.</p>
                @endif
            </div>
        </div>
        <!-- Card Buku -->
        <div class="card mb-4">
            <div class="card-header d-flex items-center justify-between w-full">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Buku yang ditulis</h6>
            </div>
            <div class="card-body">
                @if ($bukus && $bukus->count() > 0)
                    <div class="table-responsive">
                        <h6>Buku</h6>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kegiatan</th>
                                    <th>Judul</th>
                                    <th>Tingkat</th>
                                    <th>Tanggal</th>
                                    <th>Media</th>
                                    <th>Penyelengaara</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bukus as $buku)
                                    <tr>
                                        <td>{{ $buku->isbn }}</td>
                                        <td>{{ $buku->judul }}</td>
                                        <td>{{ $buku->penulis }}</td>
                                        <td>{{ $buku->penerbit }}</td>
                                        <td>{{ $buku->tahun }}</td>
                                        <td>{{ $buku->kota }}</td>
                                        <td>
                                            <a href="{{ route('buku.edit', $buku->id) }}"
                                                class="btn btn-warning btn-sm">Perbarui</a>
                                            <a href="{{ route('buku.show', $buku->id) }}"
                                                class="btn btn-success btn-sm">Detail</a>
                                            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Belum ada data buku.</p>
                @endif
            </div>
        </div>
        <!-- Card Buku -->
        <div class="card mb-4">
            <div class="card-header d-flex items-center justify-between w-full">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Jurnal yang ditulis</h6>
            </div>
            <div class="card-body">
                @if ($jurnals && $jurnals->count() > 0)
                    <div class="table-responsive">
                        <h6>Jurnal</h6>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Nama Jurnal</th>
                                    <th>Volume</th>
                                    <th>Edisi</th>
                                    <th>DOI/Url</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jurnals as $jurnal)
                                    <tr>
                                        <td>{{ $jurnal->judul }}</td>
                                        <td>{{ $jurnal->penulis }}</td>
                                        <td>{{ $jurnal->nama_jurnal }}</td>
                                        <td>{{ $jurnal->volume }}</td>
                                        <td>{{ $jurnal->edisi }}</td>
                                        <td>{{ $jurnal->doi_url }}</td>
                                        <td>
                                            <a href="{{ route('jurnal.edit', $jurnal->id) }}"
                                                class="btn btn-warning btn-sm">Perbarui</a>
                                            <a href="{{ route('jurnal.show', $jurnal->id) }}"
                                                class="btn btn-success btn-sm">Detail</a>
                                            <form action="{{ route('jurnal.destroy', $jurnal->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Belum ada data jurnal.</p>
                @endif
            </div>
        </div>
    </div>

    @include('components.modal-delete')

    <script>
        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var url = button.data('url')
            var modal = $(this)
            modal.find('#deleteForm').attr('action', url)
        })
    </script>

@endsection
