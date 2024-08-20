@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Matakuliah</h1>
                <p class="mb-4">Berikut adalah daftar data matakuliah Anda yang terdaftar di sistem.</p>
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
                        <h5><strong>Informasi pengajaran</strong></h5>
                        <div>
                            <a href="{{ route('pengajaran.edit', $pengajaran->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pengajaran.destroy', $pengajaran->id) }}" method="POST" style="display:inline-block;">
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
                                <p><strong>Semester </strong></p>
                                <p><strong>SKS </strong></p>
                                <p><strong>Jenjang </strong></p>
                                <p><strong>Prodi </strong></p>
                                <p><strong>Pengampu </strong></p>
                            </div>
                            <div class="col-md-8">
                                <p><strong>:</strong> {{ $pengajaran->tahun_ajaran }}</p>
                                <p><strong>:</strong> {{ $pengajaran->semester }}</p>
                                <p><strong>:</strong> {{ $pengajaran->sks }}</p>
                                <p><strong>:</strong> {{ $pengajaran->jenjang }}</p>
                                <p><strong>:</strong> {{ $pengajaran->prodi }}</p>
                                <p><strong>:</strong> {{ $pengajaran->bentuk }}</p>
                            </div>
                        </div>
                        <hr>
                        <h5 class="py-2">Dokumen Pengajaran</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <p><strong>RPP Matakuliah :</strong></p>
                                @if ( $pengajaran->rpp)
                                    <a href="{{ asset('storage/' .  $pengajaran->rpp) }}" class="btn btn-link btn-sm p-0">Lihat RPP</a>
                                @else
                                    <span class="text-muted">Belum diunggah</span>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <p><strong>Presensi :</strong></p>
                                @if ($pengajaran->presensi)
                                    <a href="{{ asset('storage/' . $pengajaran->presensi) }}" class="btn btn-link btn-sm p-0">Lihat Presensi</a>
                                @else
                                    <span class="text-muted">Belum diunggah</span>
                                @endif
                            </div>
                         
                            <div class="col-md-3">
                                <p><strong>Presensi :</strong></p>
                                @if ($pengajaran->daftar_nilai)
                                    <a href="{{ asset('storage/' . $pengajaran->daftar_nilai) }}" class="btn btn-link btn-sm p-0">Lihat Daftar nilai</a>
                                @else
                                    <span class="text-muted">Belum diunggah</span>
                                @endif
                            </div>
                         
                            <div class="col-md-3">
                                <p><strong>SK Mengajar :</strong></p>
                                @if ($pengajaran->sk_mengajar)
                                    <a href="{{ asset('storage/' . $pengajaran->sk_mengajar) }}" class="btn btn-link btn-sm p-0">Lihat SK Mengajar</a>
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
