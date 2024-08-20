@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        @include('components.alert')

        <div class="row justify-content-between align-items-center mt-4">
            <!-- Page Heading -->
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Data Buku</h1>
                <p class="mb-4">Berikut adalah daftar buku Anda yang terdaftar di sistem.</p>
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
                        <h6 class="m-0 font-weight-bold text-primary">Data Buku yang pernah ditulis</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('buku.update', $buku) }}/" autocomplete="off" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h6 class="heading-small text-muted mb-4">Perbarui informasi buku</h6>



                            <div class="form-group mb-4">
                                <label for="jenis">Jenis Buku</label>
                                <select class="form-control @error('jenis') is-invalid @enderror" id="jenis"
                                    name="jenis">
                                    <option value="Monograf"
                                        {{ old('jenis', $buku->jenis) == 'Monograf' ? 'selected' : '' }}>Monograf</option>
                                    <option value="Referensi"
                                        {{ old('jenis', $buku->jenis) == 'Referensi' ? 'selected' : '' }}>Referensi</option>
                                    <option value="Book Chapter Nasional/Internasional"
                                        {{ old('jenis', $buku->jenis) == 'Book Chapter Nasional/Internasional' ? 'selected' : '' }}>
                                        Book Chapter Nasional/Internasional</option>
                                    <option value="Menyadur ber ISBN"
                                        {{ old('jenis', $buku->jenis) == 'Menyadur ber ISBN' ? 'selected' : '' }}>Menyadur
                                        ber ISBN</option>
                                    <option value="Menyunting/mengedit ber ISBN"
                                        {{ old('jenis', $buku->jenis) == 'Menyunting/mengedit ber ISBN' ? 'selected' : '' }}>
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
                                    value="{{ old('penulis', $buku->penulis) }}">
                                @error('penulis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="penulis_ke">Penulis Ke </label>
                                <input type="number" name="penulis_ke"
                                    class="form-control @error('penulis_ke') is-invalid @enderror" id="penulis_ke"
                                    value="{{ old('penulis_ke', $buku->penulis_ke) }}">
                                @error('penulis_ke')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="posisi">Posisi </label>
                                <select class="form-control @error('posisi') is-invalid @enderror" id="posisi"
                                    name="posisi">
                                    <option value="Author" {{ old('posisi', $buku->posisi) == 'Author' ? 'selected' : '' }}>
                                        Author</option>
                                    <option value="Coauthor"
                                        {{ old('posisi', $buku->posisi) == 'Coauthor' ? 'selected' : '' }}>Coauthor</option>
                                </select>
                                @error('posisi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul"
                                    class="form-control @error('judul') is-invalid @enderror" placeholder="judul"
                                    value="{{ old('judul', $buku->judul) }}" required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="tahun">Tahun</label>
                                <input type="number" name="tahun"
                                    class="form-control @error('tahun') is-invalid @enderror" id="tahun"
                                    value="{{ old('tahun', $buku->tahun) }}">
                                @error('tahun')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="penerbit">Penerbit</label>
                                <input type="text" name="penerbit"
                                    class="form-control @error('penerbit') is-invalid @enderror" id="penerbit"
                                    value="{{ old('penerbit', $buku->penerbit) }}">
                                @error('penerbit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="kota">Kota</label>
                                <input type="text" name="kota"
                                    class="form-control @error('kota') is-invalid @enderror" id="kota"
                                    value="{{ old('kota', $buku->kota) }}">
                                @error('kota')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="isbn">isbn</label>
                                <input type="text" name="isbn"
                                    class="form-control @error('isbn') is-invalid @enderror" id="isbn"
                                    value="{{ old('isbn', $buku->isbn) }}">
                                @error('isbn')
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
