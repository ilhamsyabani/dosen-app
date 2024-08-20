@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h1 class="h3 mb-4 text-gray-800">{{ __('Profile') }}</h1>

    @include('components.alert')

    <div class="row">
        <div class="col-lg-2 order-lg-2"></div>
        <div class="col-lg-10 order-lg-1">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h6 class="m-0 font-weight-bold text-primary">Riwayat Pendidikan</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($studis && $studis->count() > 0)
                        @foreach($studis as $studi)
                        <div class="border rounded p-3 mb-3">
                            <div class="row g-2">
                                <div class="col-md-4"><strong>Institusi</strong></div>
                                <div class="col-md-8">{{ $studi->institusi_pendidikan }}</div>
                                
                                <div class="col-md-4"><strong>Jenjang</strong></div>
                                <div class="col-md-8">{{ $studi->jenjang_pendidikan }}</div>
                        
                                <div class="col-md-4"><strong>Prodi</strong></div>
                                <div class="col-md-8">{{ $studi->bidang_studi }}</div>
                        
                                <div class="col-md-4"><strong>Tahun Masuk</strong></div>
                                <div class="col-md-8">{{ $studi->tahun_masuk }}</div>
                        
                                <div class="col-md-4"><strong>Tahun Lulus</strong></div>
                                <div class="col-md-8">{{ $studi->tahun_lulus }}</div>
                        
                                <div class="col-12 text-end">
                                    <button class="btn btn-sm btn-primary" onclick="toggleForm('editForm-{{ $studi->id }}')">Perbarui</button>
                                    <form action="{{ route('studi.destroy', $studi->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        

                            <!-- Form Edit -->
                            <div id="editForm-{{ $studi->id }}" class="edit-form mt-4 mb-4" style="display: none;">
                                <form action="{{ route('studi.update', $studi->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="institusi_pendidikan" class="form-label">Nama Kampus</label>
                                        <input type="text" class="form-control" id="institusi_pendidikan" name="institusi_pendidikan" value="{{ $studi->institusi_pendidikan }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenjang_pendidikan" class="form-label">Strata<span class="small text-danger">*</span></label>
                                        <select class="form-select @error('jenjang_pendidikan') is-invalid @enderror" name="jenjang_pendidikan" id="jenjang_pendidikan">
                                            <option value="S1" {{ $studi->jenjang_pendidikan == 'S1' ? 'selected' : '' }}>S1</option>
                                            <option value="S2" {{ $studi->jenjang_pendidikan == 'S2' ? 'selected' : '' }}>S2</option>
                                            <option value="S3" {{ $studi->jenjang_pendidikan == 'S3' ? 'selected' : '' }}>S3</option>
                                        </select>
                                        @error('jenjang_pendidikan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="bidang_studi" class="form-label">Prodi</label>
                                        <input type="text" class="form-control" id="bidang_studi" name="bidang_studi" value="{{ $studi->bidang_studi }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                                        <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" value="{{ $studi->tahun_masuk }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                                        <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus" value="{{ $studi->tahun_lulus }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nilai_akhir" class="form-label">IPK</label>
                                        <input type="text" class="form-control" id="nilai_akhir" name="nilai_akhir" value="{{ $studi->nilai_akhir }}">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                        <button type="button" class="btn btn-secondary" onclick="toggleForm('editForm-{{ $studi->id }}')">Batal</button>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    @else
                        <p>Studi dosen tidak ditemukan.</p>
                    @endif

                    <div class="text-end">
                        <button class="btn btn-success" onclick="toggleForm('createForm')">Tambah data Pendidikan</button>
                    </div>

                    <!-- Form Create -->
                    <div id="createForm" class="create-form mt-4" style="display: none;">
                        <form action="{{ route('studi.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="institusi_pendidikan" class="form-label">Nama Kampus</label>
                                <input type="text" class="form-control" id="institusi_pendidikan" name="institusi_pendidikan" value="{{ old('institusi_pendidikan') }}">
                            </div>
                            <div class="mb-3">
                                <label for="jenjang_pendidikan" class="form-label">Strata<span class="small text-danger">*</span></label>
                                <select class="form-select @error('jenjang_pendidikan') is-invalid @enderror" name="jenjang_pendidikan" id="jenjang_pendidikan">
                                    <option value="S1" {{ old('jenjang_pendidikan') == 'S1' ? 'selected' : '' }}>S1</option>
                                    <option value="S2" {{ old('jenjang_pendidikan') == 'S2' ? 'selected' : '' }}>S2</option>
                                    <option value="S3" {{ old('jenjang_pendidikan') == 'S3' ? 'selected' : '' }}>S3</option>
                                </select>
                                @error('jenjang_pendidikan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="bidang_studi" class="form-label">Prodi</label>
                                <input type="text" class="form-control" id="bidang_studi" name="bidang_studi" value="{{ old('bidang_studi') }}">
                            </div>
                            <div class="mb-3">
                                <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                                <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" value="{{ old('tahun_masuk') }}">
                            </div>
                            <div class="mb-3">
                                <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                                <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus" value="{{ old('tahun_lulus') }}">
                            </div>
                            <div class="mb-3">
                                <label for="nilai_akhir" class="form-label">IPK</label>
                                <input type="text" class="form-control" id="nilai_akhir" name="nilai_akhir" value="{{ old('nilai_akhir') }}">
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" onclick="toggleForm('createForm')">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleForm(formId) {
        const form = document.getElementById(formId);
        form.style.display = form.style.display === "none" ? "block" : "none";
    }
</script>
@endsection
