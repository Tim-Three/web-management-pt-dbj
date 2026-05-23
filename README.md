# 🏢 Sistem Manajemen Personalia & Keuangan
### PT Dipuro Berkah Jaya

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white"/>
  <img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white"/>
  <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white"/>
  <img src="https://img.shields.io/badge/Status-Serah_Terima-green?style=for-the-badge"/>
</p>

---

## 📌 Tentang Proyek

Sistem berbasis web untuk membantu PT Dipuro Berkah Jaya mengelola **absensi, cuti, penggajian, dan laporan keuangan** secara terintegrasi. Sistem ini memiliki dua role pengguna yaitu **Admin** dan **Karyawan** dengan dashboard dan fitur yang berbeda.

---

## ✨ Fitur Utama

### 👤 Karyawan
- Absen masuk & pulang secara digital
- Sistem deteksi otomatis **hadir / telat** berdasarkan jam shift
- Absensi diblokir saat hari libur (Sabtu & Minggu)
- Pengajuan cuti online dengan form alasan
- Lihat riwayat absensi & cuti beserta statusnya

### 🛡️ Admin
- Dashboard ringkasan kehadiran harian
- Kelola data karyawan (CRUD) beserta foto & shift kerja
- Approve / tolak pengajuan cuti karyawan
- Input & kelola penggajian bulanan per karyawan
- Analisis keuangan perusahaan dengan grafik 6 bulan terakhir
- Perhitungan keuntungan otomatis

---

## 🛠️ Tech Stack

| Bagian | Teknologi |
|--------|-----------|
| Backend Framework | Laravel 12 |
| Bahasa Pemrograman | PHP 8.2 |
| Frontend Styling | Tailwind CSS v3 |
| Template Engine | Laravel Blade |
| Database | MySQL |
| Authentication | Laravel Breeze |
| Grafik | Chart.js 4.4.0 |
| Version Control | Git & GitHub |

---

## ⚙️ Instalasi

### Persyaratan
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL

### Langkah-Langkah

```bash
# 1. Clone repository
git clone https://github.com/Tim-Three/web-management-pt-dbj.git
cd web-management-pt-dbj

# 2. Install dependencies PHP
composer install

# 3. Install dependencies JavaScript
npm install

# 4. Copy file environment
cp .env.example .env

# 5. Generate app key
php artisan key:generate
```

### Konfigurasi Database

Buka file `.env` dan sesuaikan:

```env
APP_NAME="Manajemen P&K PT DBJ"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=manajemen_pkdbj
DB_USERNAME=root
DB_PASSWORD=
```

```bash
# 6. Jalankan migration
php artisan migrate

# 7. Isi data awal
php artisan db:seed

# 8. Build asset CSS/JS
npm run build

# 9. Jalankan server
php artisan serve
```

Buka browser dan akses `http://127.0.0.1:8000`

---

## 🔑 Akun Default

| Role | Email | Password |
|------|-------|----------|
| Admin | adminfakhri01@gmail.com | password |
| Karyawan | afsarfakhri01@gmail.com | password |

> ⚠️ **Penting:** Segera ganti password setelah pertama kali login di lingkungan production.

---

## 🗄️ Skema Database

### Tabel `users`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | BIGINT UNSIGNED | Primary key |
| name | VARCHAR(255) | Nama lengkap |
| email | VARCHAR(255) | Email unik untuk login |
| password | VARCHAR(255) | Password terenkripsi bcrypt |
| role | VARCHAR(255) | `admin` atau `karyawan` |
| nip | VARCHAR(255) | Nomor Induk Pegawai (nullable) |
| posisi | VARCHAR(255) | Jabatan (nullable) |
| shift | ENUM | `pagi` (08:00–14:00) / `malam` (14:00–20:00) |
| no_telp | VARCHAR(255) | Nomor telepon (nullable) |
| domisili | VARCHAR(255) | Alamat domisili (nullable) |
| foto | VARCHAR(255) | Path foto profil (nullable) |
| created_at | TIMESTAMP | — |
| updated_at | TIMESTAMP | — |

### Tabel `absensis`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | BIGINT UNSIGNED | Primary key |
| user_id | BIGINT UNSIGNED | FK → users.id |
| tanggal | DATE | Tanggal absensi |
| jam_masuk | TIME | Jam absen masuk |
| jam_pulang | TIME | Jam absen pulang |
| status | ENUM | `hadir` / `telat` / `izin` / `alpha` |
| created_at | TIMESTAMP | — |
| updated_at | TIMESTAMP | — |

### Tabel `cutis`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | BIGINT UNSIGNED | Primary key |
| user_id | BIGINT UNSIGNED | FK → users.id |
| tanggal_pengajuan | DATE | Tanggal karyawan mengajukan |
| dari | DATE | Tanggal mulai cuti |
| sampai | DATE | Tanggal selesai cuti |
| alasan | TEXT | Alasan cuti |
| status | ENUM | `pending` / `disetujui` / `ditolak` |
| created_at | TIMESTAMP | — |
| updated_at | TIMESTAMP | — |

### Tabel `penggajians`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | BIGINT UNSIGNED | Primary key |
| user_id | BIGINT UNSIGNED | FK → users.id |
| bulan | VARCHAR(255) | Format: `YYYY-MM` |
| gaji_pokok | DECIMAL(15,2) | Gaji pokok |
| tunjangan | DECIMAL(15,2) | Tunjangan tambahan |
| potongan | DECIMAL(15,2) | Potongan gaji |
| total_gaji | DECIMAL(15,2) | Gaji pokok + tunjangan - potongan |
| status | ENUM | `belum_dibayar` / `sudah_dibayar` |
| created_at | TIMESTAMP | — |
| updated_at | TIMESTAMP | — |

### Tabel `keuangans`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | BIGINT UNSIGNED | Primary key |
| bulan | VARCHAR(255) | Format: `YYYY-MM` |
| total_pendapatan | DECIMAL(15,2) | Total pendapatan perusahaan |
| total_pengeluaran | DECIMAL(15,2) | Total pengeluaran perusahaan |
| total_gaji | DECIMAL(15,2) | Total gaji semua karyawan |
| keuntungan | DECIMAL(15,2) | Pendapatan - Pengeluaran - Gaji |
| catatan | TEXT | Catatan tambahan (nullable) |
| created_at | TIMESTAMP | — |
| updated_at | TIMESTAMP | — |

### Relasi Antar Tabel

```
users ──── hasMany ──→ absensis
users ──── hasMany ──→ cutis
users ──── hasMany ──→ penggajians
keuangans  (independen)
```

---

## 📁 Struktur File Penting

```
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   │   └── AuthenticatedSessionController.php  ← Login & redirect role
│   │   │   ├── Admin/
│   │   │   │   ├── BerandaController.php               ← Dashboard admin
│   │   │   │   ├── KaryawanController.php              ← CRUD karyawan
│   │   │   │   ├── CutiController.php                  ← Approve/tolak cuti
│   │   │   │   ├── KeuanganController.php              ← Analisis keuangan
│   │   │   │   └── PenggajianController.php            ← Kelola penggajian
│   │   │   └── Karyawan/
│   │   │       ├── BerandaController.php               ← Dashboard karyawan
│   │   │       ├── AbsensiController.php               ← Logic absensi
│   │   │       └── CutiController.php                  ← Pengajuan cuti
│   │   └── Middleware/
│   │       ├── AdminMiddleware.php                     ← Blokir non-admin
│   │       └── KaryawanMiddleware.php                  ← Pastikan sudah login
│   └── Models/
│       ├── User.php                                    ← Relasi + method shift
│       ├── Absensi.php
│       ├── Cuti.php
│       ├── Penggajian.php
│       └── Keuangan.php
├── database/
│   ├── migrations/                                     ← Struktur tabel
│   └── seeders/
│       └── UserSeeder.php                              ← Data akun default
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php                           ← Layout utama (sidebar & topbar)
│       ├── auth/
│       │   └── login.blade.php                         ← Halaman login
│       ├── bantuan.blade.php                           ← Halaman bantuan
│       ├── karyawan/
│       │   ├── beranda.blade.php                       ← Dashboard karyawan
│       │   ├── riwayat-absen.blade.php
│       │   └── riwayat-cuti.blade.php
│       └── admin/
│           ├── beranda.blade.php                       ← Dashboard admin
│           ├── karyawan/
│           │   ├── index.blade.php                     ← Daftar karyawan
│           │   └── edit.blade.php                      ← Form edit karyawan
│           ├── cuti/
│           │   └── index.blade.php                     ← Kelola cuti
│           ├── keuangan/
│           │   └── index.blade.php                     ← Analisis keuangan
│           └── penggajian/
│               └── index.blade.php                     ← Kelola penggajian
└── routes/
    └── web.php                                         ← Semua definisi URL
```

---

## 🔐 Sistem Autentikasi & Role

Menggunakan **Laravel Breeze**. Setelah login, sistem mengecek kolom `role` di tabel `users` dan mengarahkan ke dashboard yang sesuai.

```
User login
    ↓
Cek kolom role di tabel users
    ↓
role = "admin"    → /admin/beranda
role = "karyawan" → /karyawan/beranda
```

Proteksi URL diatur lewat middleware di `routes/web.php`:
- `/admin/*` → hanya bisa diakses role `admin`
- `/karyawan/*` → hanya bisa diakses user yang sudah login

---

## ⏰ Sistem Shift Kerja

| Shift | Jam Masuk | Jam Selesai | Batas Telat |
|-------|-----------|-------------|-------------|
| ☀️ Pagi | 08:00 | 14:00 | 08:00 |
| 🌙 Malam | 14:00 | 20:00 | 14:00 |

Method terkait shift ada di `app/Models/User.php`:

```php
getJamMulaiShift()   // Mengembalikan jam mulai shift
getJamSelesaiShift() // Mengembalikan jam selesai shift
isWaktuShift()       // Cek apakah sekarang sudah waktunya shift
```

---

## 🚀 Panduan Pengembangan Selanjutnya

### Workflow Git

```bash
# Sebelum mulai coding
git pull origin main

# Setelah git pull, selalu jalankan ini
php artisan migrate
npm run build

# Setelah selesai coding
git add .
git commit -m "deskripsi perubahan"
git push origin main
```

### Menambah Fitur Baru

**1. Tambah tabel/kolom baru → buat migration**
```bash
php artisan make:migration nama_migration
php artisan migrate
```
> ⚠️ Jangan edit migration yang sudah ada, selalu buat migration baru.

**2. Tambah logic baru → buat controller**
```bash
php artisan make:controller NamaController
```
Daftarkan route-nya di `routes/web.php` dengan middleware yang sesuai.

**3. Tambah model baru**
```bash
php artisan make:model NamaModel
```
Definisikan `$fillable` dan relasi dengan lengkap.

**4. Jika ada bug atau tampilan tidak sesuai**
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
composer dump-autoload
npm run build
```

---

## 📋 Fitur yang Direkomendasikan untuk Update Selanjutnya

| Prioritas | Fitur | Keterangan |
|-----------|-------|------------|
| 🔴 Tinggi | Export PDF / Excel | Rekap absensi & penggajian bulanan |
| 🔴 Tinggi | Slip gaji digital | Karyawan download slip gaji sendiri |
| 🟡 Sedang | Notifikasi real-time | Admin dapat notif saat ada pengajuan cuti |
| 🟡 Sedang | Halaman profil | Karyawan edit foto & data pribadi sendiri |
| 🟡 Sedang | Kuota cuti | Jatah cuti per tahun + tracking sisa cuti |
| 🟡 Sedang | Rekap absensi bulanan | Persentase kehadiran per karyawan |
| 🟢 Rendah | Pengumuman | Admin broadcast pengumuman ke semua karyawan |
| 🟢 Rendah | Log aktivitas | Riwayat perubahan data untuk audit |

---

## ⚡ Perintah Berguna

```bash
# Jalankan server development
php artisan serve

# Jalankan migration
php artisan migrate

# Reset database & isi ulang data awal (hati-hati di production!)
php artisan migrate:fresh --seed

# Build asset untuk production
npm run build

# Mode development dengan auto-reload
npm run dev

# Buat storage link (untuk foto profil)
php artisan storage:link

# Clear semua cache
php artisan cache:clear && php artisan config:clear && php artisan route:clear && php artisan view:clear
```

---

## ⚠️ Hal Penting

- **Jangan commit file `.env`** ke GitHub karena berisi kredensial database
- **Selalu jalankan** `php artisan migrate` setelah `git pull` jika ada migration baru
- **Selalu jalankan** `npm run build` setelah mengubah file CSS/JS
- File `.env` tidak ikut di-push, gunakan `.env.example` sebagai template untuk anggota tim baru
- Kolom `password` sudah otomatis di-hash oleh Laravel, **jangan hash manual**

---

<p align="center">
  Dibuat dengan ❤️ oleh Tim Three
</p>