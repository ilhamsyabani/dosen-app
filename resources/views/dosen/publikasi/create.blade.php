@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Pengujian Mahasiswa</h1>
                <p class="mb-4">Berikut adalah daftar mahasiswa ujian dengan Anda yang terdaftar di sistem.</p>
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
                        <h6 class="m-0 font-weight-bold text-primary">Informasi Punlikasi</h6>
                    </div>
                    <div class="card-body">

                        <div class="form-group mb-4">
                            <label for="publikasi">Bentuk publikasi</label>
                            <select class="form-control @error('publikasi') is-invalid @enderror" id="publikasi"
                                name="publikasi" onchange="toggleFields0()">
                                <option value="Jurnal/Prosiding"
                                    {{ old('publikasi') == 'Jurnal/Prosiding' ? 'selected' : '' }}>Jurnal/Prosiding</option>
                                <option value="Pameran/Publikasi Media Masa"
                                    {{ old('publikasi') == 'Pameran/Publikasi Media Masa' ? 'selected' : '' }}>
                                    Pameran/Publikasi Media Masa</option>
                                <option value="Buku" {{ old('publikasi') == 'Buku' ? 'selected' : '' }}>Buku</option>
                            </select>
                            @error('publikasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div id="form_publikasi" style="display: none;">
                            <form action="{{ route('publikasi.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="tipe">Tipe</label>
                                    <select class="form-control @error('tipe') is-invalid @enderror" id="tipe"
                                        name="tipe" onchange="toggleFields1()">
                                        <option value="Media Masa" {{ old('tipe') == 'Media Masa' ? 'selected' : '' }}>Media
                                            Masa</option>
                                        <option value="Pagelaran/Pameran"
                                            {{ old('tipe') == 'Pagelaran/Pameran' ? 'selected' : '' }}>Pagelaran/Pameran
                                        </option>
                                    </select>
                                    @error('tipe')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

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
                                    <label for="tingkat">Tingkat</label>
                                    <select class="form-control @error('tingkat') is-invalid @enderror" id="tingkat"
                                        name="tingkat">
                                        <option value="Lokal" {{ old('tingkat') == 'Lokal' ? 'selected' : '' }}>Lokal
                                        </option>
                                        <option value="Nasional" {{ old('tingkat') == 'Nasional' ? 'selected' : '' }}>
                                            Nasional</option>
                                        <option value="Internasional"
                                            {{ old('tingkat') == 'Internasional' ? 'selected' : '' }}>Internasional
                                        </option>
                                    </select>
                                    @error('tingkat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4 focused">
                                    <label for="tanggal">Tanggal Kegiatan</label>
                                    <input type="date" id="tanggal" class="form-control" name="tanggal"
                                        placeholder="Tanggal Lahir" value="{{ old('tanggal') }}" required>
                                    @error('tanggal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4" id="media_masa_field" style="display: none;">
                                    <label for="media_masa">Media Masa</label>
                                    <input type="text" name="media_masa"
                                        class="form-control @error('media_masa') is-invalid @enderror" id="media_masa"
                                        value="{{ old('media_masa') }}">
                                    @error('media_masa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4" id="penyelenggara_field" style="display: none;">
                                    <label for="penyelengaara">Penyelengaara</label>
                                    <input type="text" name="penyelengaara"
                                        class="form-control @error('penyelengaara') is-invalid @enderror" id="penyelengaara"
                                        value="{{ old('penyelengaara') }}">
                                    @error('penyelengaara')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>

                        <div id="form_buku" style="display: none;">

                            <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="jenis">Jenis Buku</label>
                                    <select class="form-control @error('jenis') is-invalid @enderror" id="jenis"
                                        name="jenis">
                                        <option value="Monograf" {{ old('jenis') == 'Monograf' ? 'selected' : '' }}>
                                            Monograf</option>
                                        <option value="Referensi" {{ old('jenis') == 'Referensi' ? 'selected' : '' }}>
                                            Referensi</option>
                                        <option value="Book Chapter Nasional/Internasional"
                                            {{ old('jenis') == 'Book Chapter Nasional/Internasional' ? 'selected' : '' }}>
                                            Book Chapter Nasional/Internasional</option>
                                        <option value="Menyadur ber ISBN"
                                            {{ old('jenis') == 'Menyadur ber ISBN' ? 'selected' : '' }}>Menyadur ber ISBN
                                        </option>
                                        <option value="Menyunting/mengedit ber ISBN"
                                            {{ old('jenis') == 'Menyunting/mengedit ber ISBN' ? 'selected' : '' }}>
                                            Menyunting/mengedit ber ISBN</option>
                                    </select>
                                    @error('jenis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="penulis">Penulis</label>
                                    <input type="text" name="penulis"
                                        class="form-control @error('penulis') is-invalid @enderror" id="penulis"
                                        value="{{ old('penulis') }}">
                                    @error('penulis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="penulis_ke">Penulis Ke </label>
                                    <input type="number" name="penulis_ke"
                                        class="form-control @error('penulis_ke') is-invalid @enderror" id="penulis_ke"
                                        value="{{ old('penulis_ke') }}">
                                    @error('penulis_ke')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="posisi">Posisi </label>
                                    <select class="form-control @error('posisi') is-invalid @enderror" id="posisi"
                                        name="posisi">
                                        <option value="Author" {{ old('posisi') == 'Author' ? 'selected' : '' }}>Author
                                        </option>
                                        <option value="Coauthor" {{ old('posisi') == 'Coauthor' ? 'selected' : '' }}>
                                            Coauthor</option>
                                    </select>
                                    @error('posisi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

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
                                    <label for="tahun">Tahun</label>
                                    <input type="number" name="tahun"
                                        class="form-control @error('tahun') is-invalid @enderror" id="tahun"
                                        value="{{ old('tahun') }}">
                                    @error('tahun')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="penerbit">Penerbit</label>
                                    <input type="text" name="penerbit"
                                        class="form-control @error('penerbit') is-invalid @enderror" id="penerbit"
                                        value="{{ old('penerbit') }}">
                                    @error('penerbit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="kota">Kota</label>
                                    <input type="text" name="kota"
                                        class="form-control @error('kota') is-invalid @enderror" id="kota"
                                        value="{{ old('kota') }}">
                                    @error('kota')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="isbn">isbn</label>
                                    <input type="text" name="isbn"
                                        class="form-control @error('isbn') is-invalid @enderror" id="isbn"
                                        value="{{ old('isbn') }}">
                                    @error('isbn')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>

                        <div id="form_jurnal" style="display: none;">
                            <form action="{{ route('jurnal.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- Kategori -->
                                <div class="form-group mb-4">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control @error('kategori') is-invalid @enderror" id="kategori"
                                        name="kategori" onchange="toggleKategoriFields()">
                                        <option value="jurnal" {{ old('kategori') == 'jurnal' ? 'selected' : '' }}>Jurnal
                                        </option>
                                        <option value="Prosiding" {{ old('kategori') == 'Prosiding' ? 'selected' : '' }}>
                                            Prosiding</option>
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
                                        value="{{ old('penulis') }}">
                                    @error('penulis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Penulis Ke -->
                                <div class="form-group mb-4">
                                    <label for="penulis_ke">Penulis Ke-</label>
                                    <input type="number" name="penulis_ke"
                                        class="form-control @error('penulis_ke') is-invalid @enderror" id="penulis_ke"
                                        value="{{ old('penulis_ke') }}">
                                    @error('penulis_ke')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Posisi -->
                                <div class="form-group mb-4" id="sinta_field" style="display: none;">
                                    <label for="posisi">Posisi</label>
                                    <select class="form-control @error('posisi') is-invalid @enderror" id="posisi"
                                        name="posisi">
                                        <option value="Author" {{ old('posisi') == 'Author' ? 'selected' : '' }}>Author
                                        </option>
                                        <option value="Co-Author" {{ old('posisi') == 'Co-Author' ? 'selected' : '' }}>
                                            Co-Author</option>
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
                                        value="{{ old('judul') }}">
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Nama Jurnal -->
                                <div class="form-group mb-4">
                                    <label for="nama_jurnal">Nama Jurnal</label>
                                    <input type="text" name="nama_jurnal"
                                        class="form-control @error('nama_jurnal') is-invalid @enderror" id="nama_jurnal"
                                        value="{{ old('nama_jurnal') }}">
                                    @error('nama_jurnal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Jenis Jurnal -->
                                <div class="form-group mb-4">
                                    <label for="jenis_jurnal">Jenis Jurnal</label>
                                    <select class="form-control @error('jenis_jurnal') is-invalid @enderror"
                                        id="jenis_jurnal" name="jenis_jurnal">
                                        <option value="Penelitian"
                                            {{ old('jenis_jurnal') == 'Penelitian' ? 'selected' : '' }}>Penelitian</option>
                                        <option value="Pengabdian"
                                            {{ old('jenis_jurnal') == 'Pengabdian' ? 'selected' : '' }}>Pengabdian</option>
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
                                        value="{{ old('tanggal') }}">
                                    @error('tanggal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Volume -->
                                <div class="form-group mb-4">
                                    <label for="volume">Volume</label>
                                    <input type="number" name="volume"
                                        class="form-control @error('volume') is-invalid @enderror" id="volume"
                                        value="{{ old('volume') }}">
                                    @error('volume')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Halaman -->
                                <div class="form-group mb-4">
                                    <label for="halaman">Halaman</label>
                                    <input type="text" name="halaman"
                                        class="form-control @error('halaman') is-invalid @enderror" id="halaman"
                                        value="{{ old('halaman') }}">
                                    @error('halaman')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Edisi -->
                                <div class="form-group mb-4">
                                    <label for="edisi">Edisi</label>
                                    <input type="text" name="edisi"
                                        class="form-control @error('edisi') is-invalid @enderror" id="edisi"
                                        value="{{ old('edisi') }}">
                                    @error('edisi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- DOI/URL -->
                                <div class="form-group mb-4">
                                    <label for="doi_url">DOI/URL</label>
                                    <input type="text" name="doi_url"
                                        class="form-control @error('doi_url') is-invalid @enderror" id="doi_url"
                                        value="{{ old('doi_url') }}">
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
                                            {{ old('kategori_jurnal') == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                                        <option value="Internasional"
                                            {{ old('kategori_jurnal') == 'Internasional' ? 'selected' : '' }}>Internasional
                                        </option>
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

                                        <option value="">Pilih status jurnal</option>
                                        <option value="Terindeks" {{ old('terindeks') == 'Terindeks' ? 'selected' : '' }}>
                                            Terindeks</option>
                                        <option value="Tidak Terindeks"
                                            {{ old('terindeks') == 'Tidak Terindeks' ? 'selected' : '' }}>Tidak Terindeks
                                        </option>
                                    </select>
                                    @error('terindeks')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            

                                <!-- Q (Hanya jika Tidak Terindeks) -->
                                <div class="form-group mb-4" id="q_field" style="display: none;">
                                    <label for="q">Q</label>
                                    <select class="form-control @error('q') is-invalid @enderror" id="q"
                                        name="q">
                                        <option value="Q1" {{ old('q') == 'Q1' ? 'selected' : '' }}>Q1</option>
                                        <option value="Q2" {{ old('q') == 'Q2' ? 'selected' : '' }}>Q2</option>
                                        <option value="Q3" {{ old('q') == 'Q3' ? 'selected' : '' }}>Q3</option>
                                        <option value="Q4" {{ old('q') == 'Q4' ? 'selected' : '' }}>Q4</option>
                                        <option value="Non-Q" {{ old('q') == 'Non-Q' ? 'selected' : '' }}>Non-Q</option>
                                    </select>
                                    @error('q')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4" id="s_field" style="display: none;">
                                    <label for="sinta">Sinta</label>
                                    <select class="form-control @error('sinta') is-invalid @enderror" id="sinta"
                                        name="sinta">
                                        <option value="Sinta 1-2" {{ old('sinta') == 'Sinta 1-2' ? 'selected' : '' }}>Sinta 1-2</option>
                                        <option value="Sinta 3-4" {{ old('sinta') == 'Sinta 3-4' ? 'selected' : '' }}>Sinta 3-4</option>
                                        <option value="Sinta 5-6" {{ old('sinta') == 'Sinta 5-6' ? 'selected' : '' }}>Sinta 5-6</option>
                        
                                    </select>
                                    @error('sinta')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- ISSN -->
                                <div class="form-group mb-4">
                                    <label for="issn">ISSN</label>
                                    <input type="text" name="issn"
                                        class="form-control @error('issn') is-invalid @enderror" id="issn"
                                        value="{{ old('issn') }}">
                                    @error('issn')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Pelaksana -->
                                <div class="form-group mb-4" id="pelaksana_field" style="display: none;">
                                    <label for="pelaksana">Pelaksana</label>
                                    <input type="text" name="pelaksana"
                                        class="form-control @error('pelaksana') is-invalid @enderror" id="pelaksana"
                                        value="{{ old('pelaksana') }}">
                                    @error('pelaksana')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Artikel -->
                                @include('components.input-file', [
                                    'label' => 'File Artikel Ilmiah',
                                    'name' => 'artikel',
                                ])

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleFields0() {
            const publikasi = document.getElementById('publikasi').value;
            const publikasiField = document.getElementById('form_publikasi');
            const bukuField = document.getElementById('form_buku');
            const jurnalField = document.getElementById('form_jurnal');

            if (publikasi === 'Jurnal/Prosiding') {
                publikasiField.style.display = 'none';
                bukuField.style.display = 'none';
                jurnalField.style.display = 'block';
            } else if (publikasi === 'Pameran/Publikasi Media Masa') {
                publikasiField.style.display = 'block';
                bukuField.style.display = 'none';
                jurnalField.style.display = 'none';
            } else if (publikasi === 'Buku') {
                publikasiField.style.display = 'none';
                bukuField.style.display = 'block';
                jurnalField.style.display = 'none';
            } else {
                publikasiField.style.display = 'none';
                bukuField.style.display = 'none';
                jurnalField.style.display = 'none';
            }
        }

        function toggleFields1() {
            const tipe = document.getElementById('tipe').value;
            const mediaMasaField = document.getElementById('media_masa_field');
            const penyelenggaraField = document.getElementById('penyelenggara_field');

            if (tipe === 'Media Masa') {
                mediaMasaField.style.display = 'block';
                penyelenggaraField.style.display = 'none';
            } else if (tipe === 'Pagelaran/Pameran') {
                mediaMasaField.style.display = 'none';
                penyelenggaraField.style.display = 'block';
            } else {
                mediaMasaField.style.display = 'none';
                penyelenggaraField.style.display = 'none';
            }
        }

        function toggleIndeksFields() {
            const terindeks = document.getElementById('terindeks').value;
            const sinta = document.getElementById('s_field');
            const qField = document.getElementById('q_field');

            sinta.style.display = (terindeks === 'Terindeks') ? 'block' : 'none';
            qField.style.display = (terindeks === 'Tidak Terindeks') ? 'block' : 'none';
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
            toggleFields0();
            toggleFields1();
            toggleIndeksFields();
            toggleKategoriFields();
        });
    </script>

@endsection
