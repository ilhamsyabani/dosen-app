# CLAUDE.md — Aplikasi Manajemen Data Dosen

Dokumen ini adalah panduan konteks untuk AI dalam memahami dan mengembangkan project ini.

---

## Gambaran Umum

**Nama Aplikasi:** Sistem Informasi Data Dosen (SIDATA Dosen)

**Tujuan:** Aplikasi berbasis web untuk manajemen data akademik dosen di lingkungan perguruan tinggi Indonesia. Mengelola profil dosen, kegiatan pengajaran, penelitian, pengabdian masyarakat, publikasi, dan pencapaian profesional.

**Bahasa antarmuka:** Indonesia

**Development server:** Laravel Herd (`dosen.test` secara lokal)

---

## Tech Stack

| Komponen | Teknologi | Versi |
|----------|-----------|-------|
| Framework | Laravel | 11.x |
| PHP | PHP | >= 8.2 |
| Database | SQLite (dev) / MySQL (prod) | - |
| Frontend CSS | Bootstrap + SB Admin Theme | 5.2.3 / 7.0.7 |
| Build tool | Vite + Sass | 5.0 / 1.56.1 |
| Auth tambahan | Laravel Socialite (Google OAuth) | 5.x |
| PHP binary (Herd) | `/Users/kertas/Library/Application Support/Herd/bin/php84` | 8.4 |

**Menjalankan Artisan:**
```bash
"/Users/kertas/Library/Application Support/Herd/bin/php84" artisan <command>
```

**Menjalankan Composer:**
```bash
"/Users/kertas/Library/Application Support/Herd/bin/composer" <command>
```

---

## Struktur Direktori Penting

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── DosenLoginController.php     # Login dosen email+password
│   │   ├── SocialiteController.php      # Google OAuth + logout admin
│   │   ├── HomeController.php           # Dashboard admin
│   │   ├── UserController.php           # CRUD user admin (policy-protected)
│   │   ├── DosenController.php          # CRUD dosen (panel admin, policy-protected)
│   │   ├── FakultasController.php       # CRUD fakultas (policy-protected)
│   │   ├── DepartemenController.php     # CRUD departemen (policy-protected)
│   │   ├── SkimController.php           # CRUD skim penelitian
│   │   └── Dosen/
│   │       └── DosenDashboardController.php  # Dashboard dosen
│   │   # 25+ controller lainnya untuk modul dosen (BimbinganController, dll.)
│   └── Middleware/
│       ├── RedirectIfNotAdmin.php       # Guard 'web' check
│       └── RedirectIfNotDosen.php       # Guard 'dosen' check (tidak dipakai di route utama)
├── Models/
│   ├── User.php        # Admin user (3 role: admin, Admin Fakultas, Admin Departemen)
│   ├── Dosen.php       # Dosen/lecturer (auth guard 'dosen', UUID primary key)
│   ├── Fakultas.php    # Entitas Fakultas
│   ├── Departemen.php  # Entitas Departemen/Prodi
│   └── Skim.php        # Skim penelitian/pengabdian
│   # + 25+ model lainnya untuk data akademik dosen
└── Policies/
    ├── UserPolicy.php       # Otorisasi manajemen user
    ├── DosenPolicy.php      # Otorisasi manajemen dosen
    ├── FakultasPolicy.php   # Otorisasi manajemen fakultas
    └── DepartemenPolicy.php # Otorisasi manajemen departemen
```

---

## Sistem Autentikasi

Aplikasi menggunakan **dua guard terpisah**:

### Guard `web` — Admin
- Model: `App\Models\User`
- Login: `POST /login` (email + password)
- Logout: `POST /logout` → `SocialiteController@logout`
- Dashboard: `GET /admin/home`

### Guard `dosen` — Dosen/Lecturer
- Model: `App\Models\Dosen`
- Login cara 1: `GET/POST /dosen/login` (email + password — **fallback**)
- Login cara 2: `GET /google/redirect` → Google OAuth → `GET /google/callback` (cara utama)
- Logout: `POST /dosen/logout` → `DosenLoginController@logout`
- Dashboard: `GET /dashboard`

**Penting:** Ketika `auth:dosen` gagal, aplikasi redirect ke `/dosen/login` (dikonfigurasi di `bootstrap/app.php` via exception handler).

---

## Sistem Otorisasi — 3 Tingkat Admin

Konstanta role ada di `App\Models\User`:

```php
User::ROLE_SUPER_ADMIN      // 'admin'
User::ROLE_ADMIN_FAKULTAS   // 'Admin Fakultas'
User::ROLE_ADMIN_DEPARTEMEN // 'Admin Departemen'
```

Helper methods pada model `User`:
- `$user->isSuperAdmin()`
- `$user->isAdminFakultas()`
- `$user->isAdminDepartemen()`

### Matriks Izin

| Aksi | Super Admin | Admin Fakultas | Admin Departemen |
|------|:-----------:|:--------------:|:----------------:|
| Kelola Fakultas (CRUD) | ✅ | Lihat saja | Lihat saja |
| Kelola Departemen (CRUD) | ✅ | CRUD di fakultasnya | Lihat saja |
| Kelola Dosen (CRUD) | ✅ | CRUD di fakultasnya | Lihat + Edit di prodinya |
| Kelola User (CRUD) | ✅ | Create/Edit Admin Departemen di fakultasnya | ❌ |
| Kelola Skim | ✅ | ✅ | ✅ |

**Implementasi:** Policies di `app/Policies/`. Di controller admin menggunakan `$this->authorize()`. Scoping query (filter berdasarkan fakultas/departemen) dilakukan langsung di method `index()` masing-masing controller.

---

## Database Schema

### Tabel Inti

```
users               — Admin aplikasi (3 role)
  id, name, email, role, fakultas_id, departemen_id, password, nip

dosens              — Data dosen (UUID primary key)
  id (uuid), nama, nip, email, departemen_id, password (nullable)

fakultas            — Entitas fakultas
  id, kode, nama, deskripsi

departemens         — Entitas departemen/prodi
  id, kode, nama, deskripsi, fakultas_id

skims               — Skim penelitian/pengabdian
  id, nama
```

### Tabel Data Akademik Dosen (semua punya kolom `dosen_id`)

| Tabel | Deskripsi |
|-------|-----------|
| `details` | Data profil detail dosen |
| `jabatans` | Jabatan akademik |
| `studis` | Riwayat pendidikan |
| `kompetensis` | Kompetensi/keahlian |
| `pengajarans` | Kegiatan mengajar |
| `bimbingans` | Bimbingan mahasiswa |
| `pengujians` | Kegiatan pengujian |
| `bahans` | Bahan ajar |
| `pembinaans` | Kegiatan pembinaan |
| `pembimbingans` | Kegiatan pembimbingan |
| `kunjungans` | Kunjungan akademik |
| `eksternals` | Kegiatan eksternal |
| `penelitians` | Penelitian (ada JSON: tim_peneliti) |
| `jurnals` | Publikasi jurnal |
| `publikasis` | Publikasi/prosiding |
| `bukus` | Buku/book chapter |
| `hakis` | HaKI / paten |
| `pengabdians` | Pengabdian masyarakat (ada JSON: mahasiswa) |
| `pkms` | Program PKM |
| `pengelolas` | Peran pengelola |
| `profesis` | Sertifikasi profesi |
| `penghargaans` | Penghargaan |
| `penunjangs` | Kegiatan penunjang |
| `delegasis` | Delegasi/penugasan |
| `pertemuans` | Seminar/pertemuan |

**Catatan penting tipe kolom:**
- `dosens.id` menggunakan `ulid` (CHAR 26), bukan UUID. Semua child table pakai `foreignUlid('dosen_id')`.
- Kolom tahun di `penelitians` dan `pengabdians` menggunakan `unsignedSmallInteger` (bukan `year()` yang MySQL-specific).
- Kolom pilihan (posisi, jenis, dll.) di `jurnals`, `bukus`, `hakis`, `pembimbingans` menggunakan `string` biasa (bukan `enum`) agar kompatibel lintas database. Nilai valid didokumentasikan sebagai komentar di migration.
- Kolom `password` di tabel `dosens` bersifat nullable. Dosen yang hanya login via Google tidak perlu password.

---

## Struktur Route

### Admin Routes (`/admin/*`, middleware `auth`)
```
GET  /admin/home              → HomeController@index (dashboard)
GET  /admin/user              → UserController (resource)
GET  /admin/dosen             → DosenController (resource)
GET  /admin/fakultas          → FakultasController (resource)
GET  /admin/departemen        → DepartemenController (resource)
GET  /admin/skim              → SkimController (resource)
```

### Dosen Routes (`/dashboard/*`, middleware `auth:dosen`)
```
GET  /dashboard               → DosenDashboardController@index
GET  /dashboard/detail        → DetailController (resource)
GET  /dashboard/jabatan       → JabatanController (resource)
GET  /dashboard/studi         → StudiController (resource)
GET  /dashboard/kompetensi    → KompetensiController (resource)
GET  /dashboard/pengajaran    → PengajaranController (resource)
GET  /dashboard/bimbingan     → BimbinganController (resource)
GET  /dashboard/pengujian     → PengujianController (resource)
GET  /dashboard/bahan         → BahanController (resource)
GET  /dashboard/pembinaan     → PembinaanController (resource)
GET  /dashboard/pembimbingan  → PembimbinganController (resource)
GET  /dashboard/kunjungan     → KunjunganController (resource)
GET  /dashboard/eksternal     → EksternalController (resource)
GET  /dashboard/penelitian    → PenelitianController (resource)
GET  /dashboard/jurnal        → JurnalController (resource)
GET  /dashboard/publikasi     → PublikasiController (resource)
GET  /dashboard/buku          → BukuController (resource)
GET  /dashboard/haki          → HakiController (resource)
GET  /dashboard/pengabdian    → PengabdianController (resource)
GET  /dashboard/pkm           → PkmController (resource)
GET  /dashboard/pengelola     → PengelolaController (resource)
GET  /dashboard/profesi       → ProfesiController (resource)
GET  /dashboard/penghargaan   → PenghargaanController (resource)
GET  /dashboard/penunjang     → PenunjangController (resource)
GET  /dashboard/delegasi      → DelegasiController (resource)
GET  /dashboard/pertemuan     → PertemuanController (resource)
```

### Auth Routes
```
GET  /dosen/login      → DosenLoginController@showLoginForm (guest:dosen)
POST /dosen/login      → DosenLoginController@login (guest:dosen)
POST /dosen/logout     → DosenLoginController@logout (auth:dosen)
GET  /google/redirect  → SocialiteController@redirect (guest)
GET  /google/callback  → SocialiteController@callback (guest)
POST /logout           → SocialiteController@logout (auth — untuk admin)
```

---

## Konvensi Kode

### Controllers
- Controller admin berada di `app/Http/Controllers/` langsung.
- Controller dosen (untuk fitur di dashboard dosen) juga di `app/Http/Controllers/` langsung, **kecuali** `DosenDashboardController` yang ada di subdirektori `Dosen/`.
- Semua controller admin menggunakan `$this->authorize()` dari Policy sebelum eksekusi.
- Pagination default: 10 item per halaman.
- Pattern query: search + sort + paginate → append params ke pagination links.

### Models
- `Dosen` menggunakan UUID (via `HasUlids` trait) sebagai primary key.
- `User` menggunakan auto-increment integer sebagai primary key.
- Model dengan `$guarded = []`: `Departemen`, `Fakultas`, dll.
- Model dengan `$fillable`: `User`, `Dosen`, dll.
- Cast `password => 'hashed'` ada di `User` dan `Dosen`.

### Views
- Layout admin: `layouts/admin.blade.php`
- Layout dosen: `layouts/app.blade.php`
- Layout guest/login: `layouts/guest.blade.php`
- Komponen reusable: `resources/views/components/` (alert, input-text, input-file, dll.)
- View admin: `resources/views/admin/{modul}/`
- View dosen: `resources/views/dosen/{modul}/`

### Pola File Upload
Controller yang menangani file (Penelitian, Pengabdian) menggunakan `Storage` facade, membersihkan file lama saat update, dan menghapus file saat record dihapus.

---

## Hal yang Perlu Diperhatikan

### Bug yang Diketahui (belum diperbaiki)
1. **`PenelitianController` baris 59:** Typo nama field `sk_penugasa` → seharusnya `sk_penugasan`
2. **`PenelitianController` baris 157:** Redirect salah `outbound.index` → seharusnya `penelitian.index`

### Batasan Saat Ini
- Tidak ada API layer (tidak ada `/api` routes).
- Tidak ada fitur export/cetak laporan PDF.
- Email notification belum dikonfigurasi (driver `log`).
- Tidak ada unit/feature tests.
- `Register` route ada tapi tidak digunakan secara aktif.

### Hal yang Sudah Diterapkan
- Laravel Policies untuk otorisasi granular per role admin.
- Dosen login fallback via email+password di `/dosen/login`.
- Auto-redirect `auth:dosen` ke `/dosen/login` via exception handler di `bootstrap/app.php`.
- Scoping query di controller berdasarkan role (Admin Fakultas hanya lihat data fakultasnya, dst.).

---

## Alur Pengembangan Fitur Baru

### Menambah modul baru untuk dosen
1. Buat migration: `php artisan make:migration create_{nama}s_table`
2. Buat model: `php artisan make:model {Nama}`
3. Buat controller: `php artisan make:controller {Nama}Controller --resource`
4. Tambahkan relationship di `app/Models/Dosen.php`
5. Daftarkan route resource di `routes/web.php` dalam grup `auth:dosen`/`dashboard`
6. Buat views di `resources/views/dosen/{nama}/` (index, create, edit, show)

### Menambah modul baru untuk admin
1-3. Sama seperti di atas.
4. Buat Policy: `php artisan make:policy {Nama}Policy --model={Nama}`
5. Tambahkan `$this->authorize()` di setiap method controller.
6. Daftarkan route resource di `routes/web.php` dalam grup `admin`/`auth`.
7. Buat views di `resources/views/admin/{nama}/`.

---

## Informasi Tambahan

- **Google OAuth:** Dosen login dengan Google. Email harus sudah terdaftar di tabel `dosens`. Jika email tidak ada, login ditolak dengan pesan error.
- **Password dosen:** Kolom `password` nullable. Admin bisa set password dari form edit/create dosen di panel admin. Dosen yang hanya pakai Google tidak perlu password.
- **Session:** Driver database. Tabel `sessions` sudah ada di migration awal.
- **Bahasa campuran:** Kode menggunakan campuran Indonesia dan Inggris untuk nama variabel/method. Ini adalah pola yang sudah ada — ikuti saja saat menambah kode baru.
