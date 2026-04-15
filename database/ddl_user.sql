-- Membuat database
CREATE DATABASE db_bunga;

-- Menggunakan database
USE db_bunga;

-- Membuat tabel dengan 3 kolom
CREATE TABLE bunga (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_bunga VARCHAR(100),
    harga INT
);