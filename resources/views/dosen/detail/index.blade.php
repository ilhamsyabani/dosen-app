@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="h3 mt-4 mb-4 text-gray-800">{{ __('Profile') }}</h1>
        @include('components.alert')
        <div class="row">
            <div class="col-lg-4 order-lg-2">
                <div class="card text-center mb-4">
                    <div class="card-profile-image mt-4">
                        <div class="avatar rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto"
                            style="width: 100px; height: 100px; font-size: 60px;">
                            {{ Auth::user()->nama[0] }}
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-bold">{{ Auth::user()->nama }}</h5>
                        <p>Administrator</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 order-lg-1">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Personal Data</h6>
                    </div>
                    <div class="card-body">
                        @if ($detail)
                            @foreach ([
            'Nama Lengkap' => Auth::guard('dosen')->user()->nama,
            'Email' => Auth::guard('dosen')->user()->email,
            'No telepon' => $detail->phone,
            'Tempat kelahiran' => $detail->tempat_lahir,
            'Tanggal dilahirkan' => $detail->tanggal_lahir,
            'Alamat' => $detail->alamat,
            'Sinta ID' => $detail->sinta_id,
            'Scopus ID' => $detail->scopus_id,
            'Orchid ID' => $detail->orchid_id,
        ] as $label => $value)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{ $label }}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $value }}</p>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                            <div class="mt-4">
                                <a href="{{ route('detail.edit', $detail->id) }}" class="btn btn-primary">Perbarui data
                                    pribadi</a>
                            </div>
                        @else
                            <p>Detail dosen tidak ditemukan.</p>
                            <div class="mt-4">
                                <a href="{{ route('detail.create') }}" class="btn btn-primary">Tambah data pribadi</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
