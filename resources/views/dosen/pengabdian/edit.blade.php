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
                        <h6 class="m-0 font-weight-bold text-primary">Data Pengabdian</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pengabdian.update', $pengabdian) }}/" autocomplete="off" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h6 class="heading-small text-muted mb-4">Perbarui informasi pengabdian</h6>

                            <div class="form-group mb-4">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul"
                                    class="form-control @error('judul') is-invalid @enderror" placeholder="judul"
                                    value="{{ old('judul', $pengabdian->judul) }}" required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="hibah">Hibah</label>
                                <select class="form-control @error('hibah') is-invalid @enderror" id="hibah"
                                    name="hibah">
                                    <option value="PT" {{ old('hibah', $pengabdian->hibah) == 'PT' ? 'selected' : '' }}>
                                        PT</option>
                                    <option value="Dikti"
                                        {{ old('hibah', $pengabdian->hibah) == 'Dikti' ? 'selected' : '' }}>Dikti</option>
                                    <option value="Institusi Lain"
                                        {{ old('hibah', $pengabdian->hibah) == 'Institusi Lain' ? 'selected' : '' }}>
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
                                            {{ old('skim_id', $pengabdian->skim_id) == $skim->id ? 'selected' : '' }}>
                                            {{ $skim->nama }}</option>
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
                                                {{ old('tahun_usulan', $pengabdian->tahun_usulan) == $year ? 'selected' : '' }}>
                                                {{ $year }}</option>
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
                                                {{ old('tahun_kegiatan', $pengabdian->tahun_kegiatan) == $year ? 'selected' : '' }}>
                                                {{ $year }}</option>
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
                                                {{ old('tahun_pelaksanaan', $pengabdian->tahun_pelaksanaan) == $year ? 'selected' : '' }}>
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
                                    value="{{ old('lama_kegiatan', $pengabdian->lama_kegiatan) }}">
                                @error('lama_kegiatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            @include('components.input-currency', [
                                'label' => 'Dana Dikti',
                                'name' => 'dana_dikti',
                                'value' => old('dana_dikti', $pengabdian->dana_dikti),
                                'class' => '',
                                'attributes' => '',
                            ])

                            @include('components.input-currency', [
                                'label' => 'Dana PT',
                                'name' => 'dana_pt',
                                'value' => old('dana_pt', $pengabdian->dana_pt),
                                'class' => '',
                                'attributes' => '',
                            ])

                            @include('components.input-currency', [
                                'label' => 'Dana Institusi Lain',
                                'name' => 'dana_institusi_lain',
                                'value' => old('dana_institusi_lain', $pengabdian->dana_institusi_lain),
                                'class' => '',
                                'attributes' => '',
                            ])

                            <div class="form-group mb-4">
                                <label for="posisi">Posisi</label>
                                <select class="form-control @error('posisi') is-invalid @enderror" id="posisi"
                                    name="posisi">
                                    <option value="Ketua TIM"
                                        {{ old('posisi', $pengabdian->posisi) == 'Ketua TIM' ? 'selected' : '' }}>Ketua TIM
                                    </option>
                                    <option value="Anggota"
                                        {{ old('posisi', $pengabdian->posisi) == 'Anggota' ? 'selected' : '' }}>Anggota
                                    </option>
                                </select>
                                @error('posisi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group mb-4">
                                <label for="tim_peneliti">Tim Peneliti</label>
                                <div id="research-team-inputs">
                                    @if (is_array($pengabdian->tim_peneliti))
                                        @foreach ($pengabdian->tim_peneliti as $index => $nama)
                                            <div class="input-group mb-2">
                                                <input type="text" name="tim_peneliti[]"
                                                    class="form-control @error('tim_peneliti.' . $index) is-invalid @enderror"
                                                    id="tim_peneliti_{{ $index }}" value="{{ $nama }}"
                                                    placeholder="Nama Tim Peneliti">
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger remove-member"
                                                        type="button">Hapus</button>
                                                </div>
                                                @error('tim_peneliti.' . $index)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="input-group mb-2">
                                    <button class="btn btn-success add-member" type="button">Tambah</button>
                                </div>
                                @error('tim_peneliti')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="mahasiswa">Mahasiswa</label>
                                <div id="student-inputs">
                                    @if (is_array($pengabdian->mahasiswa))
                                        @foreach ($pengabdian->mahasiswa as $index => $nama)
                                            <div class="input-group mb-2">
                                                <input type="text" name="mahasiswa[]"
                                                    class="form-control @error('mahasiswa.' . $index) is-invalid @enderror"
                                                    id="mahasiswa_{{ $index }}" value="{{ $nama }}"
                                                    placeholder="Nama Mahasiswa">
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger remove-student"
                                                        type="button">Hapus</button>
                                                </div>
                                                @error('mahasiswa.' . $index)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="input-group mb-2">
                                    <button class="btn btn-success add-student" type="button">Tambah</button>
                                </div>
                                @error('mahasiswa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group mb-4">
                                <label for="no_sk">No SK</label>
                                <input type="text" name="no_sk"
                                    class="form-control @error('no_sk') is-invalid @enderror" id="no_sk"
                                    value="{{ old('no_sk', $pengabdian->no_sk) }}">
                                @error('no_sk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="custom-control custom-checkbox my-4">
                                <input type="hidden" name="berbasis_riset" value="0">
                                <input type="checkbox" class="custom-control-input" name="berbasis_riset"
                                    id="berbasis_riset" value="1"
                                    {{ old('berbasis_riset', $pengabdian->berbasis_riset) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="berbasis_riset">Berbasis Riset</label>
                                @error('berbasis_riset')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="custom-control custom-checkbox my-4">
                                <input type="hidden" name="digunakan_di_masyarakat" value="0">
                                <input type="checkbox" class="custom-control-input" name="digunakan_di_masyarakat"
                                    id="digunakan_di_masyarakat" value="1"
                                    {{ old('digunakan_di_masyarakat', $pengabdian->digunakan_di_masyarakat) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="digunakan_di_masyarakat">Digunakan di
                                    Masyarakat</label>
                                @error('digunakan_di_masyarakat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            @include('components.input-file', [
                                'label' => 'File SK',
                                'name' => 'sk',
                                'file' => $pengabdian->sk,
                            ])

                            @include('components.input-file', [
                                'label' => 'File Laporan',
                                'name' => 'laporan',
                                'file' => $pengabdian->laporan,
                            ])

                            @include('components.input-file', [
                                'label' => 'File Sertifikat',
                                'name' => 'sertifikat',
                                'file' => $pengabdian->sertifikat,
                            ])

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const addMemberButton = document.querySelector('.add-member');
                const addStudentButton = document.querySelector('.add-student');
                const researchTeamInputs = document.getElementById('research-team-inputs');
                const studentInputs = document.getElementById('student-inputs');

                function createInputGroup(type) {
                    const newInputGroup = document.createElement('div');
                    newInputGroup.classList.add('input-group', 'mb-2');

                    const newInput = document.createElement('input');
                    newInput.type = 'text';
                    newInput.name = `${type}[]`;
                    newInput.classList.add('form-control');
                    newInput.placeholder = `Nama ${type === 'tim_peneliti' ? 'Tim Peneliti' : 'Mahasiswa'}`;

                    const newInputGroupAppend = document.createElement('div');
                    newInputGroupAppend.classList.add('input-group-append');

                    const newRemoveButton = document.createElement('button');
                    newRemoveButton.type = 'button';
                    newRemoveButton.classList.add('btn', 'btn-danger', type === 'tim_peneliti' ? 'remove-member' :
                        'remove-student');
                    newRemoveButton.textContent = 'Hapus';

                    newInputGroupAppend.appendChild(newRemoveButton);
                    newInputGroup.appendChild(newInput);
                    newInputGroup.appendChild(newInputGroupAppend);

                    return newInputGroup;
                }

                addMemberButton.addEventListener('click', function() {
                    const newInputGroup = createInputGroup('tim_peneliti');
                    researchTeamInputs.appendChild(newInputGroup);

                    newInputGroup.querySelector('.remove-member').addEventListener('click', function() {
                        researchTeamInputs.removeChild(newInputGroup);
                    });
                });

                addStudentButton.addEventListener('click', function() {
                    const newInputGroup = createInputGroup('mahasiswa');
                    studentInputs.appendChild(newInputGroup);

                    newInputGroup.querySelector('.remove-student').addEventListener('click', function() {
                        studentInputs.removeChild(newInputGroup);
                    });
                });

                researchTeamInputs.addEventListener('click', function(event) {
                    if (event.target && event.target.classList.contains('remove-member')) {
                        const inputGroup = event.target.closest('.input-group');
                        researchTeamInputs.removeChild(inputGroup);
                    }
                });

                studentInputs.addEventListener('click', function(event) {
                    if (event.target && event.target.classList.contains('remove-student')) {
                        const inputGroup = event.target.closest('.input-group');
                        studentInputs.removeChild(inputGroup);
                    }
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
