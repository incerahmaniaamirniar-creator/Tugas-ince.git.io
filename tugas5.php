<?php
// Koneksi PDO
$host = "localhost";
$db   = "db_bunga";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// =====================
// PROSES UPDATE
// =====================
$message = "";

if (isset($_POST['update'])) {
    $id    = $_POST['id'];
    $nama  = $_POST['nama_bunga'];
    $harga = $_POST['harga'];

    $sql = "UPDATE bunga SET nama_bunga = ?, harga = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nama, $harga, $id]);

    if ($stmt->rowCount() > 0) {
        $message = "Data berhasil diupdate!";
    } else {
        $message = "Data tidak ditemukan / tidak ada perubahan!";
    }
}

// =====================
// AMBIL DATA
// =====================
$stmt = $pdo->query("SELECT * FROM bunga");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Bunga</title>
</head>
<body>

<h2>🌸 Data Bunga</h2>

<?php if ($message): ?>
    <p><b><?= $message; ?></b></p>
<?php endif; ?>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nama Bunga</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($data as $row): ?>
    <tr>
        <form method="POST">
            <td><?= $row['id']; ?></td>
            <td>
                <input type="text" name="nama_bunga" value="<?= $row['nama_bunga']; ?>">
            </td>
            <td>
                <input type="number" name="harga" value="<?= $row['harga']; ?>">
            </td>
            <td>
                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                <button type="submit" name="update">Update</button>
            </td>
        </form>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>