-- schema.sql - Skema database Sistem Manajemen Tugas Kampus
 
CREATE DATABASE IF NOT EXISTS db_tugas
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_general_ci;
 
USE db_tugas;
 
-- Hapus tabel lama (aman dijalankan ulang, data contoh akan dibuat lagi)
DROP TABLE IF EXISTS tugas;
 
CREATE TABLE tugas (
    id        INT AUTO_INCREMENT PRIMARY KEY,
    matkul    VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    deadline  DATE NOT NULL,
    status    ENUM('Belum', 'Proses', 'Selesai') NOT NULL DEFAULT 'Belum'
);
 
-- Data contoh (untuk pengujian)
INSERT INTO tugas (matkul, deskripsi, deadline, status) VALUES
('Pengembangan Aplikasi Web', 'Modul 6 Git dan GitHub', '2026-11-07', 'Proses'),
('Basis Data', 'Latihan normalisasi', '2026-11-10', 'Belum');