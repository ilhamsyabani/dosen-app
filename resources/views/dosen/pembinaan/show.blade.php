@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa Binaan</h1>
                <p class="mb-4">Berikut adalah daftar mahasiswa binaan Anda yang terdaftar di sistem.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 order-lg-2">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Pengguna</h5>
                        <p class="card-text">Nama: {{ Auth::user()->nama }}</p>
                        <p class="card-text">NIP: {{ Auth::user()->nip }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 order-lg-1">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5><strong>Informasi pembinaan</strong></h5>
                        <div>
                            <a href="{{ route('pembinaan.edit', $pembinaan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pembinaan.destroy', $pembinaan->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Tahun Ajaran </strong></p>
                                <p><strong>Nama Program </strong></p>
                                <p><strong>Jenis Program</strong></p>
                                <p><strong>Jenjang </strong></p>
                                <p><strong>Tingkat</strong></p>
                                <p><strong>Nama Mahasiswa </strong></p>
                            </div>
                            <div class="col-md-8">
                                <p><strong>:</strong> {{ $pembinaan->tahun_ajaran }}</p>
                                <p><strong>:</strong> {{ $pembinaan->nama_program }}</p>
                                <p><strong>:</strong> {{ $pembinaan->jenis_program }}</p>
                                <p><strong>:</strong> {{ $pembinaan->jenjang }}</p>
                                <p><strong>:</strong> {{ $pembinaan->tingkat }}</p>
                                <p><strong>:</strong> {{ $pembinaan->nama_mahasiswa }}</p>
                            </div>
                        </div>
                        <hr>
                        <h5 class="py-2">Dokumen pembinaan</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <p><strong>RPP Matakuliah :</strong></p>
                                @if ( $pembinaan->sk_pembinaan)
                                    <a href="{{ asset('storage/' .  $pembinaan->sk_pembinaan) }}" class="btn btn-link btn-sm p-0">Lihat SK Pembinaan</a>
                                @else
                                    <span class="text-muted">Belum diunggah</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
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
