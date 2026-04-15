<?php
// Koneksi PDO
$host = "localhost";
$db   = "db_bunga";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Koneksi berhasil\n\n";
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// =====================
// TAMPILKAN DATA
// =====================
echo "=== DATA BUNGA ===\n";

$stmt = $pdo->query("SELECT * FROM bunga");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($data) {
    foreach ($data as $row) {
        echo "ID: {$row['id']} | Nama: {$row['nama_bunga']} | Harga: {$row['harga']}\n";
    }
} else {
    echo "Data kosong\n";
}

echo "\n";

// =====================
// UPDATE DATA (CLI)
// =====================
echo "=== UPDATE DATA ===\n";

// input dari CLI
echo "Masukkan ID yang ingin diupdate: ";
$id = trim(fgets(STDIN));

echo "Masukkan nama bunga baru: ";
$nama = trim(fgets(STDIN));

echo "Masukkan harga baru: ";
$harga = trim(fgets(STDIN));

// query update
$sql = "UPDATE bunga SET nama_bunga = ?, harga = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nama, $harga, $id]);

if ($stmt->rowCount() > 0) {
    echo "\nData berhasil diupdate!\n";
} else {
    echo "\nData tidak ditemukan / tidak ada perubahan!\n";
}

// =====================
// TAMPILKAN DATA LAGI
// =====================
echo "\n=== DATA SETELAH UPDATE ===\n";

$stmt = $pdo->query("SELECT * FROM bunga");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($data as $row) {
    echo "ID: {$row['id']} | Nama: {$row['nama_bunga']} | Harga: {$row['harga']}\n";
}
?>