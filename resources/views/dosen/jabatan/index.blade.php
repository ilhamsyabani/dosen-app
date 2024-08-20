@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="h3 mb-4 mt-4 text-gray-800">{{ __('Profile') }}</h1>
        @include('components.alert')

        <div class="row">
            <div class="col-lg-4 order-lg-2">
                <div class="card mb-4">
                    <div class="card-profile-image mt-4">
                        <div class="avatar rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto"
                            style="width: 100px; height: 100px; font-size: 60px;">
                            {{ Auth::user()->nama[0] }}
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="font-weight-bold">{{ Auth::user()->name }}</h5>
                        <p>Administrator</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 order-lg-1">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data jabatan</h6>
                    </div>
                    <div class="card-body">
                        @if ($jabatan)
                            @foreach ([
            'Nama Lengkap' => Auth::guard('dosen')->user()->nama,
            'NIP' => Auth::guard('dosen')->user()->nip,
            'NUPTK/NIDN' => $jabatan->nidn_nuptk,
            'Jabatan Fungsional' => $jabatan->jabatan_fungsional,
            'Jabatan Struktural' => $jabatan->jabatan_struktural,
            'Pangkat' => $jabatan->pangkat,
            'Status Kepegawaian' => $jabatan->status_kepegawaian,
            'Status Aktif' => $jabatan->status_aktif,
        ] as $label => $value)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{ $label }}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><span class="">{{ $value }}</span></p>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                            <div class="mt-4">
                                <a href="{{ route('jabatan.edit', $jabatan->id) }}" class="btn btn-primary">Perbarui
                                    jabatan</a>
                            </div>
                        @else
                            <p>Detail dosen tidak ditemukan.</p>
                            <div class="mt-4">
                                <a href="{{ route('jabatan.create') }}" class="btn btn-primary">Tambah data jabatan</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
