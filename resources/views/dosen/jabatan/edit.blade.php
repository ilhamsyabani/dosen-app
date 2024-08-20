@extends('layouts.app')

@section('content')
<!-- Page Heading -->
<div class="container-fluid px-4">
<h1 class="h3 mb-4 mt-4 text-gray-800">{{ __('Profile') }}</h1>

@include('components.alert')

<div class="row">
    <div class="col-lg-4 order-lg-2">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h5 class="card-title">Informasi Pengguna</h5>
                <p class="card-text">Nama: {{ Auth::user()->name }}</p>
                <p class="card-text">NIP: {{ Auth::user()->nip }}</p>
            </div>
        </div>
    </div>

    <div class="col-lg-8 order-lg-1">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data jabatan</h6>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('jabatan.update', $jabatan) }}/" autocomplete="off">
                    @csrf
                    @method('PUT')

                    <h6 class="heading-small text-muted mb-4">Perbarui informasi jabatan</h6>
   
                    <div class="form-group mb-4 focused">
                        <label class="form-control-label" for="nidn_nuptk">NIDN/NUPTK<span class="small text-danger">*</span></label>
                        <input type="text" id="nidn_nuptk" class="form-control" name="nidn_nuptk" placeholder="......." value="{{ old('nidn_nuptk', $jabatan->nidn_nuptk) }}" required>
                        @error('nidn_nuptk')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="pl-lg-4">
                        <div class="form-group mb-4">
                            <label class="form-control-label" for="jabatan_fungsional">Jabatan Fungsional<span class="small text-danger">*</span></label>
                            <select class="form-control @error('jabatan_fungsional') is-invalid @enderror" aria-label="Default select example" name="jabatan_fungsional" id="jabatan_fungsional">
                                <option value="Tenaga Pengajar" {{ old('jabatan_fungsional', $jabatan->jabatan_fungsional) == 'Tenaga Pengajar' ? 'selected' : '' }}>Tenaga Pengajar</option>
                                <option value="Asisten Ahli" {{ old('jabatan_fungsional', $jabatan->jabatan_fungsional) == 'Asisten Ahli' ? 'selected' : '' }}>Asisten Ahli</option>
                                <option value="Lektor 200" {{ old('jabatan_fungsional', $jabatan->jabatan_fungsional) == 'Lektor 200' ? 'selected' : '' }}>Lektor 200</option>
                                <option value="Lektor 300" {{ old('jabatan_fungsional', $jabatan->jabatan_fungsional) == 'Lektor 300' ? 'selected' : '' }}>Lektor 300</option>
                                <option value="LK 400" {{ old('jabatan_fungsional', $jabatan->jabatan_fungsional) == 'LK 400' ? 'selected' : '' }}>LK 400</option>
                                <option value="LK 550" {{ old('jabatan_fungsional', $jabatan->jabatan_fungsional) == 'LK 550' ? 'selected' : '' }}>LK 550</option>
                                <option value="LK 700" {{ old('jabatan_fungsional', $jabatan->jabatan_fungsional) == 'LK 700' ? 'selected' : '' }}>LK 700</option>
                                <option value="GB 850" {{ old('jabatan_fungsional', $jabatan->jabatan_fungsional) == 'GB 850' ? 'selected' : '' }}>GB 850</option>
                                <option value="GB 1050" {{ old('jabatan_fungsional', $jabatan->jabatan_fungsional) == 'GB 1050' ? 'selected' : '' }}>GB 1050</option>
                            </select>
                            @error('jabatan_fungsional')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4 focused">
                            <label class="form-control-label" for="jabatan_struktural">Jabatan Struktural<span class="small text-danger">*</span></label>
                            <input type="text" id="jabatan_struktural" class="form-control" name="jabatan_struktural" placeholder="......." value="{{ old('jabatan_struktural', $jabatan->jabatan_struktural) }}" required>
                            @error('jabatan_struktural')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4 focused">
                            <label class="form-control-label" for="pangkat">Pangkat<span class="small text-danger">*</span></label>
                            <select class="form-control @error('pangkat') is-invalid @enderror" aria-label="Default select example" name="pangkat" id="pangkat">
                                <option value="Penata Muda Tk 1/IIIb" {{ old('pangkat', $jabatan->pangkat) == 'Penata Muda Tk 1/IIIb' ? 'selected' : '' }}>Penata Muda Tk 1/IIIb</option>
                                <option value="Penata/IIIc" {{ old('pangkat', $jabatan->pangkat) == 'Penata/IIIc' ? 'selected' : '' }}>Penata/IIIc</option>
                                <option value="Penata Tk 1/IIId" {{ old('pangkat', $jabatan->pangkat) == 'Penata Tk 1/IIId' ? 'selected' : '' }}>Penata Tk 1/IIId</option>
                                <option value="Pembina/ Iva" {{ old('pangkat', $jabatan->pangkat) == 'Pembina/ Iva' ? 'selected' : '' }}>Pembina/ Iva</option>
                                <option value="Pembina Tk 1/Ivb" {{ old('pangkat', $jabatan->pangkat) == 'Pembina Tk 1/Ivb' ? 'selected' : '' }}>Pembina Tk 1/Ivb</option>
                                <option value="Pembina Utama Muda Ivc" {{ old('pangkat', $jabatan->pangkat) == 'Pembina Utama Muda Ivc' ? 'selected' : '' }}>Pembina Utama Muda Ivc</option>
                                <option value="Pembina Utama Madya" {{ old('pangkat', $jabatan->pangkat) == 'Pembina Utama Madya' ? 'selected' : '' }}>Pembina Utama Madya</option>
                                <option value="Ivd" {{ old('pangkat', $jabatan->pangkat) == 'Ivd' ? 'selected' : '' }}>Ivd</option>
                                <option value="Pembina Utama IV e" {{ old('pangkat', $jabatan->pangkat) == 'Pembina Utama IV e' ? 'selected' : '' }}>Pembina Utama IV e</option>
                            </select>
                            @error('pangkat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <div class="form-group mb-4 focused">
                            <label class="form-control-label" for="status_kepegawaian">Status Kepegawaian<span class="small text-danger">*</span></label>
                            <select class="form-control @error('status_kepegawaian') is-invalid @enderror" aria-label="Default select example" name="status_kepegawaian" id="status_kepegawaian">
                                <option value="PNS" {{ old('status_kepegawaian', $jabatan->status_kepegawaian) == 'PNS' ? 'selected' : '' }}>PNS</option>
                                <option value="PPPK" {{ old('status_kepegawaian', $jabatan->status_kepegawaian) == 'PPPK' ? 'selected' : '' }}>PPPK</option>
                                <option value="PTNBH" {{ old('status_kepegawaian', $jabatan->status_kepegawaian) == 'PTNBH' ? 'selected' : '' }}>PTNBH</option>
                                <option value="NIDK" {{ old('status_kepegawaian', $jabatan->status_kepegawaian) == 'NIDK' ? 'selected' : '' }}>NIDK</option>
                            </select>
                            @error('status_kepegawaian')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4 focused">
                            <label class="form-control-label" for="status_aktif">Status<span class="small text-danger">*</span></label>
                            <select class="form-control @error('status_aktif') is-invalid @enderror" aria-label="Default select example" name="status_aktif" id="status_aktif">
                                <option value="aktif" {{ old('status_aktif', $jabatan->status_aktif) == 'aktif' ? 'selected' : '' }}>aktif</option>
                                <option value="Tugas Belajar Mandiri" {{ old('status_aktif', $jabatan->status_aktif) == 'Tugas Belajar Mandiri' ? 'selected' : '' }}>Tugas Belajar Mandiri</option>
                                <option value="Beasiswa" {{ old('status_aktif', $jabatan->status_aktif) == 'Beasiswa' ? 'selected' : '' }}>Beasiswa</option>
                            </select>
                            @error('status_aktif')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Button -->
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
