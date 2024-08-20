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
                        <h6 class="m-0 font-weight-bold text-primary">Data Penelitian</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('penelitian.update', $penelitian) }}/" autocomplete="off" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h6 class="heading-small text-muted mb-4">Perbarui informasi Penelitian</h6>

                            <div class="form-group mb-4">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul"
                                    class="form-control @error('judul') is-invalid @enderror" placeholder="judul"
                                    value="{{ old('judul', $penelitian->judul) }}" required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="hibah">Hibah</label>
                                <select class="form-control @error('hibah') is-invalid @enderror" id="hibah"
                                    name="hibah">
                                    <option value="PT, Dikti, Institusi Lain"
                                        {{ old('hibah', $penelitian->hibah) == 'PT, Dikti, Institusi Lain' ? 'selected' : '' }}>
                                        PT, Dikti, Institusi Lain</option>
                                    <option value="RG" {{ old('hibah', $penelitian->hibah) == 'RG' ? 'selected' : '' }}>
                                        RG</option>
                                    <option value="Penelitian Dasar Unggulan PT"
                                        {{ old('hibah', $penelitian->hibah) == 'Penelitian Dasar Unggulan PT' ? 'selected' : '' }}>
                                        Penelitian Dasar Unggulan PT</option>
                                    <option value="Penelitian Kersajama Internasional Wil Asia Tenggara"
                                        {{ old('hibah', $penelitian->hibah) == 'Penelitian Kersajama Internasional Wil Asia Tenggara' ? 'selected' : '' }}>
                                        Penelitian Kersajama Internasional Wil Asia Tenggara</option>
                                    <option value="Penelitian Kerjasama Internasional Wil Luar Asia Tenggara"
                                        {{ old('hibah', $penelitian->hibah) == 'Penelitian Kerjasama Internasional Wil Luar Asia Tenggara' ? 'selected' : '' }}>
                                        Penelitian Kerjasama Internasional Wil Luar Asia Tenggara</option>
                                    <option value="Penelitian Kolaborasi"
                                        {{ old('hibah', $penelitian->hibah) == 'Penelitian Kolaborasi' ? 'selected' : '' }}>
                                        Penelitian Kolaborasi</option>
                                    <option value="Penelitian Penugasan"
                                        {{ old('hibah', $penelitian->hibah) == 'Penelitian Penugasan' ? 'selected' : '' }}>
                                        Penelitian Penugasan</option>
                                    <option value="Penelitian Institusional"
                                        {{ old('hibah', $penelitian->hibah) == 'Penelitian Institusional' ? 'selected' : '' }}>
                                        Penelitian Institusional</option>
                                    <option value="Penelitian Pendidikan Karakter"
                                        {{ old('hibah', $penelitian->hibah) == 'Penelitian Pendidikan Karakter' ? 'selected' : '' }}>
                                        Penelitian Pendidikan Karakter</option>
                                    <option value="Riset dan Inovasi untuk Indonesia Maju"
                                        {{ old('hibah', $penelitian->hibah) == 'Riset dan Inovasi untuk Indonesia Maju' ? 'selected' : '' }}>
                                        Riset dan Inovasi untuk Indonesia Maju</option>
                                    <option value="Penelitian Hibah Bersaing"
                                        {{ old('hibah', $penelitian->hibah) == 'Penelitian Hibah Bersaing' ? 'selected' : '' }}>
                                        Penelitian Hibah Bersaing</option>
                                </select>
                                @error('hibah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            @include('components.input-select', [
                                'label' => 'SKIM',
                                'name' => 'skim_id',
                                'value' => old('skim_id', $penelitian->skim_id),
                                'placeholder' => 'Pilih SKIM',
                                'options' => $skims
                            ])


                            <div class="row">
                                <div class="form-group mb-4 col-md-4">
                                    <label for="tahun_usulan">Tahun Usulan</label>
                                    <select class="form-control @error('tahun_usulan') is-invalid @enderror"
                                        id="tahun_usulan" name="tahun_usulan">
                                        @foreach (range(date('Y'), 2000) as $year)
                                            <option value="{{ $year }}"
                                                {{ old('tahun_usulan', $penelitian->tahun_usulan) == $year ? 'selected' : '' }}>
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
                                                {{ old('tahun_kegiatan', $penelitian->tahun_kegiatan) == $year ? 'selected' : '' }}>
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
                                                {{ old('tahun_pelaksanaan', $penelitian->tahun_pelaksanaan) == $year ? 'selected' : '' }}>
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
                                    value="{{ old('lama_kegiatan', $penelitian->lama_kegiatan) }}">
                                @error('lama_kegiatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="dana_dikti">Dana Dikti</label>
                                <input type="text" name="dana_dikti"
                                    class="form-control @error('dana_dikti') is-invalid @enderror" id="dana_dikti"
                                    value="{{ old('dana_dikti', $penelitian->dana_dikti) }}">
                                @error('dana_dikti')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="dana_pt">Dana PT</label>
                                <input type="text" name="dana_pt"
                                    class="form-control @error('dana_pt') is-invalid @enderror" id="dana_pt"
                                    value="{{ old('dana_pt', $penelitian->dana_pt) }}">
                                @error('dana_pt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="dana_institusi_lain">Dana Institusi Lain</label>
                                <input type="text" name="dana_institusi_lain"
                                    class="form-control @error('dana_institusi_lain') is-invalid @enderror"
                                    id="dana_institusi_lain"
                                    value="{{ old('dana_institusi_lain', $penelitian->dana_institusi_lain) }}">
                                @error('dana_institusi_lain')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group mb-4">
                                <label for="posisi">Posisi</label>
                                <select class="form-control @error('posisi') is-invalid @enderror" id="posisi"
                                    name="posisi">
                                    <option value="Ketua TIM"
                                        {{ old('posisi', $penelitian->posisi) == 'Ketua TIM' ? 'selected' : '' }}>Ketua TIM
                                    </option>
                                    <option value="Anggota"
                                        {{ old('posisi', $penelitian->posisi) == 'Anggota' ? 'selected' : '' }}>Anggota
                                    </option>
                                </select>
                                @error('posisi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group mb-4">
                                <label for="tim_peneliti">Tim Peneliti</label>
                                <div id="research-team-inputs">
                                    @if (is_array($penelitian->tim_peneliti))
                                        @foreach ($penelitian->tim_peneliti as $index => $nama)
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
                                    @if (is_array($penelitian->mahasiswa))
                                        @foreach ($penelitian->mahasiswa as $index => $nama)
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
                                    value="{{ old('no_sk', $penelitian->no_sk) }}">
                                @error('no_sk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="custom-control custom-checkbox my-4">
                                <input type="hidden" name="digunakan_di_masyarakat" value="0">
                                <input type="checkbox" class="custom-control-input" name="digunakan_di_masyarakat"
                                    id="digunakan_di_masyarakat" value="1"
                                    {{ old('digunakan_di_masyarakat', $penelitian->digunakan_di_masyarakat) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="digunakan_di_masyarakat">Digunakan di
                                    Masyarakat</label>
                                @error('digunakan_di_masyarakat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            @include('components.input-file', [
                                'label' => 'File SK Penugasan',
                                'name' => 'sk_penugasan',
                                'file'=> $penelitian->sk_penugasan,
                            ])

                            @include('components.input-file', [
                                'label' => 'File Laporan',
                                'name' => 'laporan',
                                'file'=> $penelitian->laporan,
                            ])

                            @include('components.input-file', [
                                'label' => 'File Kontrak Penelitian',
                                'name' => 'kontrak_penelitian',
                                'file'=> $penelitian->kontrak_penelitian,
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
