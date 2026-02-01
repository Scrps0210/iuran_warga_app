# Dokumentasi Aplikasi Iuran Warga

Aplikasi ini digunakan untuk mengelola data warga dan pembayaran iuran bulanan warga di lingkungan RT/RW.

## Fitur Utama

- **Manajemen Warga**: Menambah, mengedit, menghapus, dan melihat data warga (NIK, Nama, Alamat, Status).
- **Manajemen Iuran**: 
  - Mencatat dan memantau status iuran bulanan.
  - Pencarian warga berdasarkan Nama atau NIK.
  - Filter data berdasarkan Bulan, Tahun, dan Status Pembayaran.
  - Validasi duplikasi: Mencegah input iuran ganda untuk warga yang sama di bulan dan tahun yang sama.
- **Dashboard**: 
  - Statistik ringkasan (Total Warga, Warga Aktif, Total Pendapatan Lunas, Total Tunggakan).
  - Grafik pendapatan bulanan pada tahun berjalan.

## Struktur Database

### Tabel `warga`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| `id` | BigInt | Primary Key |
| `nama` | String | Nama lengkap warga |
| `nik` | String | Nomor Induk Kependudukan (Unique) |
| `alamat` | Text | Alamat tempat tinggal |
| `no_hp` | String | Nomor telepon aktif |
| `jenis_kelamin` | Enum | L (Laki-laki) / P (Perempuan) |
| `status` | Enum | aktif / tidak_aktif |

### Tabel `iuran`
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| `id` | BigInt | Primary Key |
| `warga_id` | ForeignId | Relasi ke tabel warga |
| `bulan` | Integer | Bulan iuran (1-12) |
| `tahun` | Integer | Tahun iuran |
| `jumlah` | Decimal | Nominal iuran |
| `tanggal_bayar` | Date | Tanggal pembayaran dilakukan |
| `status` | Enum | lunas / belum_lunas |
| `keterangan` | Text | Catatan tambahan |

## Cara Instalasi & Menjalankan

### Persiapan Cepat (Quick Start)
Anda dapat menggunakan script yang sudah disediakan di `composer.json`:

1. **Setup Project**:
   ```bash
   composer run setup
   ```
   *Script ini akan melakukan composer install, copy .env, generate key, migrasi database, npm install, dan build.*

2. **Jalankan Project**:
   ```bash
   composer run dev
   ```
   *Script ini akan menjalankan server Laravel, queue listener, log viewer (pail), dan Vite secara bersamaan.*

### Instalasi Manual

1. **Clone repositori** atau copy folder project ke `htdocs`.

## Teknologi yang Digunakan

- **Framework**: [Laravel 12+](https://laravel.com)
- **UI Template**: [TailAdmin](https://tailadmin.com/) (Tailwind CSS 4)
- **Tooling**: Vite, Concurrently (via `composer run dev`)
- **Database**: MySQL
