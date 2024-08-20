@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa pengabdian</h1>
                <p class="mb-4">Berikut adalah daftar pengabdian Anda yang terdaftar di sistem.</p>
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
                        <h6 class="m-0 font-weight-bold text-primary">Informasi Pengabdian</h6>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('pengabdian.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-4">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul"
                                    class="form-control @error('judul') is-invalid @enderror" id="judul"
                                    value="{{ old('judul') }}">
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="hibah">Hibah</label>
                                <select class="form-control @error('hibah') is-invalid @enderror" id="hibah"
                                    name="hibah">
                                    <option value="PT" {{ old('hibah') == 'PT' ? 'selected' : '' }}>PT</option>
                                    <option value="Dikti" {{ old('hibah') == 'Dikti' ? 'selected' : '' }}>Dikti</option>
                                    <option value="Institusi Lain" {{ old('hibah') == 'Institusi Lain' ? 'selected' : '' }}>
                                        Institusi Lain</option>
                                </select>
                                @error('hibah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="skim_id">SKIM</label>
                                <select class="form-control @error('skim_id') is-invalid @enderror" id="skim_id"
                                    name="skim_id">
                                    @foreach ($skims as $skim)
                                        <option value="{{ $skim->id }}"
                                            {{ old('skim_id') == $skim->id ? 'selected' : '' }}>{{ $skim->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('skim_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="row">
                                <div class="form-group mb-4 col-md-4">
                                    <label for="tahun_usulan">Tahun Usulan</label>
                                    <select class="form-control @error('tahun_usulan') is-invalid @enderror"
                                        id="tahun_usulan" name="tahun_usulan">
                                        @foreach (range(date('Y'), 2000) as $year)
                                            <option value="{{ $year }}"
                                                {{ old('tahun_usulan') == $year ? 'selected' : '' }}>{{ $year }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tahun_usulan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4 col-md-4">
                                    <label for="tahun_kegiatan">Tahun Kegiatan</label>
                                    <select class="form-control @error('tahun_kegiatan') is-invalid @enderror"
                                        id="tahun_kegiatan" name="tahun_kegiatan">
                                        @foreach (range(date('Y') + 5, 2000) as $year)
                                            <option value="{{ $year }}"
                                                {{ old('tahun_kegiatan') == $year ? 'selected' : '' }}>{{ $year }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tahun_kegiatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4 col-md-4">
                                    <label for="tahun_pelaksanaan">Tahun Pelaksanaan</label>
                                    <select class="form-control @error('tahun_pelaksanaan') is-invalid @enderror"
                                        id="tahun_pelaksanaan" name="tahun_pelaksanaan">
                                        @foreach (range(date('Y') + 5, 2000) as $year)
                                            <option value="{{ $year }}"
                                                {{ old('tahun_pelaksanaan') == $year ? 'selected' : '' }}>
                                                {{ $year }}</option>
                                        @endforeach
                                    </select>
                                    @error('tahun_pelaksanaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group mb-4">
                                <label for="lama_kegiatan">Lama Kegiatan</label>
                                <input type="number" name="lama_kegiatan"
                                    class="form-control @error('lama_kegiatan') is-invalid @enderror" id="lama_kegiatan"
                                    value="{{ old('lama_kegiatan') }}">
                                @error('lama_kegiatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            @include('components.input-currency', [
                                'label' => 'Dana Dikti',
                                'name' => 'dana_dikti',
                                'value' => old('dana_dikti'),
                                'class' => '',
                                'attributes' => '',
                            ])

                            @include('components.input-currency', [
                                'label' => 'Dana PT',
                                'name' => 'dana_pt',
                                'value' => old('dana_pt'),
                                'class' => '',
                                'attributes' => '',
                            ])

                            @include('components.input-currency', [
                                'label' => 'Dana Institusi Lain',
                                'name' => 'dana_institusi_lain',
                                'value' => old('dana_institusi_lain'),
                                'class' => '',
                                'attributes' => '',
                            ])

                            <div class="form-group mb-4">
                                <label for="posisi">posisi</label>
                                <select class="form-control @error('posisi') is-invalid @enderror" id="posisi"
                                    name="posisi">
                                    <option value='Ketua Tim' {{ old('posisi') == 'Ketua Tim' ? 'selected' : '' }}>Ketua
                                        Tim</option>
                                    <option value='Anggota' {{ old('posisi') == 'Anggota' ? 'selected' : '' }}>Anggota
                                    </option>
                                </select>
                                @error('posisi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="tim_peneliti">Tim Peneliti</label>
                                <div id="research-team-inputs">
                                    <div class="input-group mb-2">
                                        <input type="text" name="tim_peneliti[]"
                                            class="form-control @error('tim_peneliti') is-invalid @enderror"
                                            id="tim_peneliti" placeholder="Nama Tim Peneliti">
                                        <div class="input-group-append">
                                            <button class="btn btn-success add-member" type="button">Tambah</button>
                                        </div>
                                    </div>
                                </div>
                                @error('tim_peneliti')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <ul id="research-team-list" class="list-group">

                                </ul>
                            </div>

                            <div class="form-group mb-4">
                                <label for="mahasiswa">Mahasiswa</label>
                                <div id="student-inputs">
                                    <div class="input-group mb-2">
                                        <input type="text" name="mahasiswa[]"
                                            class="form-control @error('mahasiswa') is-invalid @enderror" id="mahasiswa"
                                            placeholder="Nama Mahasiswa">
                                        <div class="input-group-append">
                                            <button class="btn btn-success add-student" type="button">Tambah</button>
                                        </div>
                                    </div>
                                </div>
                                @error('mahasiswa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <ul id="student-list" class="list-group">
                                    <!-- Mahasiswa akan ditampilkan di sini -->
                                </ul>
                            </div>

                            <div class="form-group mb-4">
                                <label for="no_sk">No SK</label>
                                <input type="text" name="no_sk"
                                    class="form-control @error('no_sk') is-invalid @enderror" id="no_sk"
                                    value="{{ old('no_sk') }}">
                                @error('no_sk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="custom-control custom-checkbox my-4">
                                <input type="checkbox" class="custom-control-input" name="berbasis_riset"
                                    id="berbasis_riset" {{ old('berbasis_riset') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="berbasis_riset">Berbasis Riset</label>
                                @error('berbasis_riset')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="custom-control custom-checkbox my-4">
                                <input type="checkbox" class="custom-control-input" name="digunakan_di_masyarakat"
                                    id="digunakan_di_masyarakat" {{ old('digunakan_di_masyarakat') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="digunakan_di_masyarakat">Digunakan di
                                    Masyarakat</label>
                                @error('digunakan_di_masyarakat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            @include('components.input-file', [
                                'label' => 'File SK',
                                'name' => 'sk',
                            ])

                            @include('components.input-file', [
                                'label' => 'File Laporan',
                                'name' => 'laporan',
                            ])

                            @include('components.input-file', [
                                'label' => 'File Sertifikat',
                                'name' => 'sertifikat',
                            ])

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fungsi untuk menambah tim peneliti
            document.querySelector('.add-member').addEventListener('click', function() {
                let inputGroup = document.createElement('div');
                inputGroup.className = 'input-group mb-2';
                inputGroup.innerHTML = `
                <input type="text" name="tim_peneliti[]" class="form-control" placeholder="Nama Tim Peneliti">
                <div class="input-group-append">
                    <button class="btn btn-danger remove-member" type="button">Hapus</button>
                </div>
            `;
                document.getElementById('research-team-inputs').appendChild(inputGroup);

                // Hapus tim peneliti
                inputGroup.querySelector('.remove-member').addEventListener('click', function() {
                    inputGroup.remove();
                });
            });

            // Fungsi untuk menambah mahasiswa
            document.querySelector('.add-student').addEventListener('click', function() {
                let inputGroup = document.createElement('div');
                inputGroup.className = 'input-group mb-2';
                inputGroup.innerHTML = `
                <input type="text" name="mahasiswa[]" class="form-control" placeholder="Nama Mahasiswa" value="{{ old('mahasiswa') }}">
                <div class="input-group-append">
                    <button class="btn btn-danger remove-student" type="button">Hapus</button>
                </div>
            `;
                document.getElementById('student-inputs').appendChild(inputGroup);

                // Hapus mahasiswa
                inputGroup.querySelector('.remove-student').addEventListener('click', function() {
                    inputGroup.remove();
                });
            });

            // Simpan form dan tampilkan data
            document.getElementById('research-form').addEventListener('submit', function(e) {
                e.preventDefault();

                // Tampilkan tim peneliti
                let teamList = document.getElementById('research-team-list');
                teamList.innerHTML = '';
                let teamMembers = document.querySelectorAll('input[name="tim_peneliti[]"]');
                teamMembers.forEach(function(member) {
                    if (member.value.trim() !== '') {
                        let listItem = document.createElement('li');
                        listItem.className = 'list-group-item';
                        listItem.textContent = member.value;
                        teamList.appendChild(listItem);
                    }
                });

                // Tampilkan mahasiswa
                let studentList = document.getElementById('student-list');
                studentList.innerHTML = '';
                let students = document.querySelectorAll('input[name="mahasiswa[]"]');
                students.forEach(function(student) {
                    if (student.value.trim() !== '') {
                        let listItem = document.createElement('li');
                        listItem.className = 'list-group-item';
                        listItem.textContent = student.value;
                        studentList.appendChild(listItem);
                    }
                });
            });
        });
    </script>
    <script>
        function updateFileLabel(input) {
            const fileName = input.files[0].name;
            const label = input.nextElementSibling;
            label.textContent = fileName;
            label.classList.add('file-selected');
        }
    </script>

    <style>
        .file-selected {
            color: green;
            font-weight: bold;
        }
    </style>
@endsection
