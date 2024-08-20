@extends('layouts.admin')

@section('content')
    <div class="container-fluid p-4">

        @include('components.alert')
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card text-center mb-4">
                    <div class="card-body">
                        <h6>Total Fakultas</h6>
                        <span class="" style="font-size:40px">{{ '8' }}</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-center mb-4">
                    <div class="card-body">
                        <h6>Total Departemen</h6>
                        <span class="" style="font-size:40px">{{ '24' }}</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-center mb-4">
                    <div class="card-body">
                        <h6>Total Admin</h6>
                        <span class="" style="font-size:40px">{{ '31' }}</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-center mb-4">
                    <div class="card-body">
                        <h6>Total Dosen</h6>
                        <span class="" style="font-size:40px">{{ '269' }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        </div>
    </div>
@endsection
