@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    @include('components.alert')

    <div class="row justify-content-between align-items-center mt-4">
        <!-- Page Heading -->
        <div class="col-md-6">
            <h1 class="h3 mb-2 text-gray-800">Data Penelitian Ilmiah</h1>
            <p class="mb-4">Berikut adalah daftar penelitian ilmiah Anda yang terdaftar di sistem.</p>
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
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Penelitian</h6>
                </div>
                <div class="card-body">

                    <form action="{{ route('penelitian.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" value="{{ old('judul') }}">
                            @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="hibah" class="form-label">Hibah</label>
                            <select class="form-select @error('hibah') is-invalid @enderror" id="hibah" name="hibah">
                                <option value="PT, Dikti, Institusi Lain" {{ old('hibah') == 'PT, Dikti, Institusi Lain' ? 'selected' : '' }}>PT, Dikti, Institusi Lain</option>
                                <option value="RG" {{ old('hibah') == 'RG' ? 'selected' : '' }}>RG</option>
                                <option value="Penelitian Dasar Unggulan PT" {{ old('hibah') == 'Penelitian Dasar Unggulan PT' ? 'selected' : '' }}>Penelitian Dasar Unggulan PT</option>
                                <!-- Pilihan lainnya -->
                            </select>
                            @error('hibah')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

            
                        @include('components.input-select', [
                            'label' => 'SKIM',
                            'name' => 'skim_id',
                            'value' => old('skim_id'),
                            'placeholder' => 'Pilih SKIM',
                            'options' => $skims
                        ])


                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="tahun_usulan" class="form-label">Tahun Usulan</label>
                                <select class="form-select @error('tahun_usulan') is-invalid @enderror" id="tahun_usulan" name="tahun_usulan">
                                    @foreach(range(date('Y'), 2000) as $year)
                                    <option value="{{ $year }}" {{ old('tahun_usulan') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endforeach
                                </select>
                                @error('tahun_usulan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="tahun_kegiatan" class="form-label">Tahun Kegiatan</label>
                                <select class="form-select @error('tahun_kegiatan') is-invalid @enderror" id="tahun_kegiatan" name="tahun_kegiatan">
                                    @foreach(range(date('Y') + 5, 2000) as $year)
                                    <option value="{{ $year }}" {{ old('tahun_kegiatan') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endforeach
                                </select>
                                @error('tahun_kegiatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="tahun_pelaksanaan" class="form-label">Tahun Pelaksanaan</label>
                                <select class="form-select @error('tahun_pelaksanaan') is-invalid @enderror" id="tahun_pelaksanaan" name="tahun_pelaksanaan">
                                    @foreach(range(date('Y') + 5, 2000) as $year)
                                    <option value="{{ $year }}" {{ old('tahun_pelaksanaan') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endforeach
                                </select>
                                @error('tahun_pelaksanaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="lama_kegiatan" class="form-label">Lama Kegiatan</label>
                            <input type="number" name="lama_kegiatan" class="form-control @error('lama_kegiatan') is-invalid @enderror" id="lama_kegiatan" value="{{ old('lama_kegiatan') }}">
                            @error('lama_kegiatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="dana_dikti" class="form-label">Dana Dikti</label>
                            <input type="text" name="dana_dikti" class="form-control @error('dana_dikti') is-invalid @enderror" id="dana_dikti" value="{{ old('dana_dikti') }}">
                            @error('dana_dikti')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="dana_pt" class="form-label">Dana PT</label>
                            <input type="text" name="dana_pt" class="form-control @error('dana_pt') is-invalid @enderror" id="dana_pt" value="{{ old('dana_pt') }}">
                            @error('dana_pt')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="dana_institusi_lain" class="form-label">Dana Institusi Lain</label>
                            <input type="text" name="dana_institusi_lain" class="form-control @error('dana_institusi_lain') is-invalid @enderror" id="dana_institusi_lain" value="{{ old('dana_institusi_lain') }}">
                            @error('dana_institusi_lain')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="posisi" class="form-label">Posisi</label>
                            <select class="form-select @error('posisi') is-invalid @enderror" id="posisi" name="posisi">
                                <option value="Ketua TIM" {{ old('posisi') == 'Ketua TIM' ? 'selected' : '' }}>Ketua TIM</option>
                                <option value="Anggota" {{ old('posisi') == 'Anggota' ? 'selected' : '' }}>Anggota</option>
                            </select>
                            @error('posisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tim_peneliti" class="form-label">Tim Peneliti</label>
                            <div id="research-team-inputs">
                                <div class="input-group mb-2">
                                    <input type="text" name="tim_peneliti[]" class="form-control @error('tim_peneliti') is-invalid @enderror" id="tim_peneliti" placeholder="Nama Ketua Tim" value="{{old('tim_peneliti[]')}}">
                                    <button class="btn btn-success add-member" type="button">Tambah</button>
                                </div>
                            </div>
                            @error('tim_peneliti')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="mahasiswa" class="form-label">Tim Mahasiswa</label>
                            <div id="research-mahasiswa-inputs">
                                <div class="input-group mb-2">
                                    <input type="text" name="mahasiswa[]" class="form-control @error('mahasiswa') is-invalid @enderror" id="mahasiswa" placeholder="Nama Mahasiswa">
                                    <button class="btn btn-success add-mahasiswa" type="button">Tambah</button>
                                </div>
                            </div>
                            @error('mahasiswa')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="no_sk" class="form-label">Nomor SK</label>
                            <input type="text" name="no_sk" class="form-control @error('no_sk') is-invalid @enderror" id="no_sk" value="{{ old('no_sk') }}">
                            @error('no_sk')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sk_penugasan" class="form-label">File SK Penugasan</label>
                            <input type="file" name="sk_penugasan" class="form-control @error('sk_penugasan') is-invalid @enderror" id="sk_penugasan">
                            @error('sk_penugasan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="laporan" class="form-label">File Laporan</label>
                            <input type="file" name="laporan" class="form-control @error('laporan') is-invalid @enderror" id="laporan">
                            @error('laporan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kontrak_penelitian" class="form-label">File Kotrak Penelitan</label>
                            <input type="file" name="kontrak_penelitian" class="form-control @error('kontrak_penelitian') is-invalid @enderror" id="kontrak_penelitian">
                            @error('kontrak_penelitian')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('.add-member').click(function () {
            $('#research-team-inputs').append('<div class="input-group mb-2"><input type="text" name="tim_peneliti[]" class="form-control" placeholder="Nama Anggota Tim" ><button class="btn btn-danger remove-member" type="button">Hapus</button></div>');
        });

        $(document).on('click', '.remove-member', function () {
            $(this).closest('.input-group').remove();
        });
    });
    $(document).ready(function () {
        $('.add-mahasiswa').click(function () {
            $('#research-mahasiswa-inputs').append('<div class="input-group mb-2"><input type="text" name="mahasiswa[]" class="form-control" placeholder="Nama Mahasiswa"><button class="btn btn-danger remove-mahasiswa" type="button">Hapus</button></div>');
        });

        $(document).on('click', '.remove-mahasiswa', function () {
            $(this).closest('.input-group').remove();
        });
    });
</script>
@endsection
