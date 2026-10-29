# Sistem Manajemen Tugas Kampus

Aplikasi CRUD sederhana (PHP + MySQL + Bootstrap 5) untuk mencatat tugas kuliah, deadline, dan status pengerjaan.

## Struktur File

| File | Fungsi |
|------|--------|
| `schema.sql` | Skema database & data contoh |
| `config.php` | Koneksi database (PDO) |
| `header.php` / `footer.php` | Layout modular (navbar, CSS, JS) |
| `index.php` | Read: daftar tugas |
| `tambah.php` | Create: tambah tugas |
| `edit.php` | Update: ubah tugas |
| `hapus.php` | Delete: hapus tugas |

## Cara Setup

1. Install **XAMPP** (atau Laragon), lalu jalankan **Apache** dan **MySQL**.
2. Salin seluruh file proyek ke folder `htdocs/tugas-kampus/`.
3. Buka `http://localhost/phpmyadmin`, pilih tab **Import**, lalu import file `schema.sql`.
4. Sesuaikan `config.php` jika user/password MySQL berbeda (default: `root`, tanpa password).
5. Buka `http://localhost/tugas-kampus/` di browser.

## Alur Git Tim

- Anggota 1: `schema.sql`, `config.php`
- Anggota 2: `index.php`, `tambah.php`
- Anggota 3: `edit.php`, `hapus.php`
- Anggota 4: `header.php`, `footer.php`, `README.md`
