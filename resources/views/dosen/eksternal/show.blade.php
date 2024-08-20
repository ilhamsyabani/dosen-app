@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Pengajaran Luar Kampus</h1>
                <p class="mb-4">Berikut adalah daftar pengajaran luar kampus Anda yang terdaftar di sistem.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 order-lg-2">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Pengguna</h5>
                        <p class="card-text">Nama: {{ Auth::user()->nama }}</p>
                        <p class="card-text">NIP: {{ Auth::user()->nip }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 order-lg-1">
                <div class="card shadow mb-4">

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5><strong>Informasi Pengajaran Luar Kampus</strong></h5>
                        <div>
                            <a href="{{ route('eksternal.edit', $eksternal->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('eksternal.destroy', $eksternal->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-5">
                                        <p><strong>Tanggal Kegiatan</strong></p>
                                        <p><strong>Jenjang</strong></p>
                                        <p><strong>Universitas</strong></p>
                                        <p><strong>Fakultas</strong></p>
                                        <p><strong>Prodi</strong></p>
                                        <p><strong>Matakuliah</strong></p>
                                        <p><strong>SKS</strong></p>
                                    </div>
                                    <div class="col-md-7">
                                        <p><strong>:</strong> {{ $eksternal->tanggal }}</p>
                                        <p><strong>:</strong> {{ $eksternal->jenjang }}</p>
                                        <p><strong>:</strong> {{ $eksternal->universitas }}</p>
                                        <p><strong>:</strong> {{ $eksternal->fakultas }}</p>
                                        <p><strong>:</strong> {{ $eksternal->prodi }}</p>
                                        <p><strong>:</strong> {{ $eksternal->matakuliah }}</p>
                                        <p><strong>:</strong> {{ $eksternal->sks }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="py-2">Dokumen Pengajaran Luar Kampus</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="p-0"><strong class="d-block">Dokumen SK Mengajar :</strong>
                                    @if ($eksternal->sk_mengajar)
                                        <a href="{{ asset('storage/' . $eksternal->sk_mengajar) }}"
                                            class="btn btn-link btn-sm p-0">Lihat SK Mengajar</a>
                                    @else
                                        <span class="text-muted">Belum ada SK Mengajar</span>
                                    @endif
                                </p>
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
            var button = $(event.relatedTarget);
            var url = button.data('url');
            var modal = $(this);
            modal.find('#deleteForm').attr('action', url);
        });
    </script>
@endsection
