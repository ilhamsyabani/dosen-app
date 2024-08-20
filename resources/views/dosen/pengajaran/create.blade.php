@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between items-center mt-4 ">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Matakuliah</h1>
                <p class="mb-4">Berikut adalah daftar data matakuliah Anda yang terdaftar di sistem.</p>
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
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Kompetensi</h6>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('pengajaran.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label class="form-label" for="nama_matkul">Nama Mata Kuliah</label>
                                <input type="text" class="form-control @error('nama_matkul') is-invalid @enderror"
                                    id="nama_matkul" name="nama_matkul" value="{{ old('nama_matkul') }}">
                                @error('nama_matkul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label" for="tahun_ajaran">Tahun Ajaran</label>
                                <select class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran"
                                    name="tahun_ajaran">
                                    @foreach (range(date('Y'), 2020) as $year)
                                        <option value="{{ $year }}"
                                            {{ old('tahun_ajaran') == $year ? 'selected' : '' }}>{{ $year }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tahun_ajaran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label" for="semester">Semester</label>
                                <select class="form-control @error('semester') is-invalid @enderror" id="semester"
                                    name="semester">
                                    <option value="Ganjil" {{ old('semester') == 'Ganjil' ? 'selected' : '' }}>Ganjil
                                    </option>
                                    <option value="Genap" {{ old('semester') == 'Genap' ? 'selected' : '' }}>Genap
                                    </option>
                                </select>
                                @error('semester')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label" for="sks">SKS</label>
                                <select class="form-control @error('sks') is-invalid @enderror" id="sks"
                                    name="sks">
                                    <option value="2" {{ old('sks') == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old('sks') == '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ old('sks') == '4' ? 'selected' : '' }}>4</option>
                                </select>
                                @error('sks')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label" for="jenjang">Jenjang</label>
                                <select class="form-control @error('jenjang') is-invalid @enderror" id="jenjang"
                                    name="jenjang">
                                    <option value="S1" {{ old('jenjang') == 'S1' ? 'selected' : '' }}>S1</option>
                                    <option value="S2" {{ old('jenjang') == 'S2' ? 'selected' : '' }}>S2</option>
                                    <option value="S3" {{ old('jenjang') == 'S3' ? 'selected' : '' }}>S3</option>
                                    <option value="Vokasi" {{ old('jenjang') == 'Vokasi' ? 'selected' : '' }}>Vokasi
                                    </option>
                                </select>
                                @error('jenjang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label" for="prodi">Prodi</label>
                                <input type="text" class="form-control @error('prodi') is-invalid @enderror"
                                    id="prodi" name="prodi" value="{{ old('prodi') }}">
                                @error('prodi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label" for="bentuk">Bentuk</label>
                                <select class="form-control @error('bentuk') is-invalid @enderror" id="bentuk"
                                    name="bentuk">
                                    <option value="Tim" {{ old('bentuk') == 'Tim' ? 'selected' : '' }}>Tim</option>
                                    <option value="Individu" {{ old('bentuk') == 'Individu' ? 'selected' : '' }}>Individu
                                    </option>
                                </select>
                                @error('bentuk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label class="form-label" for="rpp">Upload File RPP</label>
                                <input type="file" class="form-control @error('rpp') is-invalid @enderror" id="rpp"
                                    name="rpp">
                                @error('rpp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label class="form-label" for="presensi">Upload File Presensi</label>
                                <input type="file" class="form-control @error('presensi') is-invalid @enderror"
                                    id="presensi" name="presensi">
                                @error('presensi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label class="form-label" for="daftar_nilai">Upload File Daftar Nilai</label>
                                <input type="file" class="form-control @error('daftar_nilai') is-invalid @enderror"
                                    id="daftar_nilai" name="daftar_nilai">
                                @error('daftar_nilai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label class="form-label" for="sk_mengajar">Upload File SK Mengajar</label>
                                <input type="file" class="form-control @error('sk_mengajar') is-invalid @enderror"
                                    id="sk_mengajar" name="sk_mengajar">
                                @error('sk_mengajar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
