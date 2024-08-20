@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Jurnal</h1>
                <p class="mb-4">Berikut adalah daftar jurnal Anda yang terdaftar di sistem.</p>
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
                        <h6 class="m-0 font-weight-bold text-primary">Data Jurnal</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('jurnal.update', $jurnal) }}/" autocomplete="off" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h6 class="heading-small text-muted mb-4">Perbarui informasi jurnal/prosiding</h6>

                            <div class="form-group mb-4">
                                <label for="kategori">Kategori</label>
                                <select class="form-control @error('kategori') is-invalid @enderror" id="kategori"
                                    name="kategori" onchange="toggleKategoriFields()">
                                    <option value="jurnal"
                                        {{ old('kategori', $jurnal->kategori) == 'jurnal' ? 'selected' : '' }}>Jurnal
                                    </option>
                                    <option value="Prosiding"
                                        {{ old('kategori', $jurnal->kategori) == 'Prosiding' ? 'selected' : '' }}>Prosiding
                                    </option>
                                </select>
                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Penulis -->
                            <div class="form-group mb-4">
                                <label for="penulis">Penulis</label>
                                <input type="text" name="penulis"
                                    class="form-control @error('penulis') is-invalid @enderror" id="penulis"
                                    value="{{ old('penulis', $jurnal->penulis) }}">
                                @error('penulis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Penulis Ke -->
                            <div class="form-group mb-4">
                                <label for="penulis_ke">Penulis Ke-</label>
                                <input type="number" name="penulis_ke"
                                    class="form-control @error('penulis_ke') is-invalid @enderror" id="penulis_ke"
                                    value="{{ old('penulis_ke', $jurnal->penulis_ke) }}">
                                @error('penulis_ke')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Posisi -->
                            <div class="form-group mb-4" id="sinta_field" style="display: none;">
                                <label for="posisi">Posisi</label>
                                <select class="form-control @error('posisi') is-invalid @enderror" id="posisi"
                                    name="posisi">
                                    <option value="Author"
                                        {{ old('posisi', $jurnal->posisi) == 'Author' ? 'selected' : '' }}>Author</option>
                                    <option value="Co-Author"
                                        {{ old('posisi', $jurnal->posisi) == 'Co-Author' ? 'selected' : '' }}>Co-Author
                                    </option>
                                </select>
                                @error('posisi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Judul -->
                            <div class="form-group mb-4">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul"
                                    class="form-control @error('judul') is-invalid @enderror" id="judul"
                                    value="{{ old('judul', $jurnal->judul) }}">
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Nama Jurnal -->
                            <div class="form-group mb-4">
                                <label for="nama_jurnal">Nama Jurnal</label>
                                <input type="text" name="nama_jurnal"
                                    class="form-control @error('nama_jurnal') is-invalid @enderror" id="nama_jurnal"
                                    value="{{ old('nama_jurnal', $jurnal->nama_jurnal) }}">
                                @error('nama_jurnal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Jenis Jurnal -->
                            <div class="form-group mb-4">
                                <label for="jenis_jurnal">Jenis Jurnal</label>
                                <select class="form-control @error('jenis_jurnal') is-invalid @enderror" id="jenis_jurnal"
                                    name="jenis_jurnal">
                                    <option value="Penelitian"
                                        {{ old('jenis_jurnal', $jurnal->jenis_jurnal) == 'Penelitian' ? 'selected' : '' }}>
                                        Penelitian</option>
                                    <option value="Pengabdian"
                                        {{ old('jenis_jurnal', $jurnal->jenis_jurnal) == 'Pengabdian' ? 'selected' : '' }}>
                                        Pengabdian</option>
                                </select>
                                @error('jenis_jurnal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tanggal -->
                            <div class="form-group mb-4">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal"
                                    class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                    value="{{ old('tanggal', $jurnal->tanggal) }}">
                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Volume -->
                            <div class="form-group mb-4">
                                <label for="volume">Volume</label>
                                <input type="number" name="volume"
                                    class="form-control @error('volume') is-invalid @enderror" id="volume"
                                    value="{{ old('volume', $jurnal->volume) }}">
                                @error('volume')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Halaman -->
                            <div class="form-group mb-4">
                                <label for="halaman">Halaman</label>
                                <input type="text" name="halaman"
                                    class="form-control @error('halaman') is-invalid @enderror" id="halaman"
                                    value="{{ old('halaman', $jurnal->halaman) }}">
                                @error('halaman')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Edisi -->
                            <div class="form-group mb-4">
                                <label for="edisi">Edisi</label>
                                <input type="text" name="edisi"
                                    class="form-control @error('edisi') is-invalid @enderror" id="edisi"
                                    value="{{ old('edisi', $jurnal->edisi) }}">
                                @error('edisi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- DOI/URL -->
                            <div class="form-group mb-4">
                                <label for="doi_url">DOI/URL</label>
                                <input type="text" name="doi_url"
                                    class="form-control @error('doi_url') is-invalid @enderror" id="doi_url"
                                    value="{{ old('doi_url', $jurnal->doi_url) }}">
                                @error('doi_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Kategori Jurnal -->
                            <div class="form-group mb-4">
                                <label for="kategori_jurnal">Kategori Jurnal</label>
                                <select class="form-control @error('kategori_jurnal') is-invalid @enderror"
                                    id="kategori_jurnal" name="kategori_jurnal">
                                    <option value="Nasional"
                                        {{ old('kategori_jurnal', $jurnal->kategori_jurnal) == 'Nasional' ? 'selected' : '' }}>
                                        Nasional</option>
                                    <option value="Internasional"
                                        {{ old('kategori_jurnal', $jurnal->kategori_jurnal) == 'Internasional' ? 'selected' : '' }}>
                                        Internasional</option>
                                </select>
                                @error('kategori_jurnal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Terindeks -->
                            <div class="form-group mb-4">
                                <label for="terindeks">Terindeks</label>
                                <select class="form-control @error('terindeks') is-invalid @enderror" id="terindeks"
                                    name="terindeks" onchange="toggleIndeksFields()">
                                    <option value="Terindeks"
                                        {{ old('terindeks', $jurnal->terindeks) == 'Terindeks' ? 'selected' : '' }}>
                                        Terindeks</option>
                                    <option value="Tidak Terindeks"
                                        {{ old('terindeks', $jurnal->terindeks) == 'Tidak Terindeks' ? 'selected' : '' }}>
                                        Tidak Terindeks</option>
                                </select>
                                @error('terindeks')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sinta (Hanya jika Terindeks) -->
                            <div class="form-group mb-4" id="sinta_field" style="display: none;">
                                <label for="sinta">Sinta</label>
                                <select class="form-control @error('sinta') is-invalid @enderror" id="sinta"
                                    name="sinta">
                                    <option value="Sinta 1-2"
                                        {{ old('sinta', $jurnal->sinta) == 'Sinta 1-2' ? 'selected' : '' }}>Sinta 1-2
                                    </option>
                                    <option value="Sinta 3-4"
                                        {{ old('sinta', $jurnal->sinta) == 'Sinta 3-4' ? 'selected' : '' }}>Sinta 3-4
                                    </option>
                                    <option value="Sinta 5-6"
                                        {{ old('sinta', $jurnal->sinta) == 'Sinta 5-6' ? 'selected' : '' }}>Sinta 5-6
                                    </option>
                                </select>
                                @error('sinta')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Q (Hanya jika Tidak Terindeks) -->
                            <div class="form-group mb-4" id="q_field" style="display: none;">
                                <label for="q">Q</label>
                                <select class="form-control @error('q') is-invalid @enderror" id="q"
                                    name="q">
                                    <option value="Q1" {{ old('q', $jurnal->q) == 'Q1' ? 'selected' : '' }}>Q1</option>
                                    <option value="Q2" {{ old('q', $jurnal->q) == 'Q2' ? 'selected' : '' }}>Q2</option>
                                    <option value="Q3" {{ old('q', $jurnal->q) == 'Q3' ? 'selected' : '' }}>Q3</option>
                                    <option value="Q4" {{ old('q', $jurnal->q) == 'Q4' ? 'selected' : '' }}>Q4</option>
                                    <option value="Non-Q" {{ old('q', $jurnal->q) == 'Non-Q' ? 'selected' : '' }}>Non-Q
                                    </option>
                                </select>
                                @error('q')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- ISSN -->
                            <div class="form-group mb-4">
                                <label for="issn">ISSN</label>
                                <input type="text" name="issn"
                                    class="form-control @error('issn') is-invalid @enderror" id="issn"
                                    value="{{ old('issn', $jurnal->issn) }}">
                                @error('issn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Pelaksana -->
                            <div class="form-group mb-4" id="pelaksana_field" style="display: none;">
                                <label for="pelaksana">Pelaksana</label>
                                <input type="text" name="pelaksana"
                                    class="form-control @error('pelaksana') is-invalid @enderror" id="pelaksana"
                                    value="{{ old('pelaksana', $jurnal->pelaksana) }}">
                                @error('pelaksana')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            @include('components.input-file', [
                                'label' => 'File Artikel Ilmiah',
                                'name' => 'artikel',
                                'file' => $jurnal->artikel
                            ])
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleIndeksFields() {
            const terindeks = document.getElementById('terindeks').value;
            const sintaField = document.getElementById('sinta_field');
            const qField = document.getElementById('q_field');

            if (terindeks === 'Terindeks') {
                sintaField.style.display = 'block';
                qField.style.display = 'none';
            } else {
                sintaField.style.display = 'none';
                qField.style.display = 'block';
            }
        }


        function toggleKategoriFields() {
            const ketegori = document.getElementById('kategori').value;
            const pelaksana = document.getElementById('pelaksana_field')

            if (ketegori === 'Prosiding') {
                pelaksana.style.display = 'block';
            } else {
                pelaksana.style.display = 'none';
            }
        }


        // Call toggleFields() on page load to set the correct state
        document.addEventListener('DOMContentLoaded', function() {
            toggleIndeksFields();
            toggleKategoriFields();
        });
    </script>
@endsection
