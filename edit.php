<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data transaksi berdasarkan id
    $sql = "SELECT * FROM transaksi WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tanggal = $_POST['tanggal'];
        $deskripsi = $_POST['deskripsi'];
        $jumlah = $_POST['jumlah'];
        $tipe = $_POST['tipe'];

        $sql = "UPDATE transaksi SET tanggal = '$tanggal', deskripsi = '$deskripsi', 
                jumlah = '$jumlah', tipe = '$tipe' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>Edit Transaksi</h1>
        <form action="" method="POST">
            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" value="<?= $row['tanggal']; ?>" required>

            <label for="deskripsi">Deskripsi:</label>
            <input type="text" id="deskripsi" name="deskripsi" value="<?= $row['deskripsi']; ?>" required>

            <label for="jumlah">Jumlah:</label>
            <input type="number" id="jumlah" name="jumlah" value="<?= $row['jumlah']; ?>" required>

            <label for="tipe">Tipe:</label>
            <select id="tipe" name="tipe" required>
                <option value="pemasukan" <?= $row['tipe'] == 'pemasukan' ? 'selected' : ''; ?>>Pemasukan</option>
                <option value="pengeluaran" <?= $row['tipe'] == 'pengeluaran' ? 'selected' : ''; ?>>Pengeluaran</option>
            </select>

            <button type="submit">Update Transaksi</button>
        </form>
    </div>

</body>
</html>
