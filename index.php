<?php
include 'koneksi.php';

// Cek apakah ada query pencarian
$search = '';
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM transaksi WHERE deskripsi LIKE '%$search%' OR tanggal LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM transaksi";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akuntansi Keuangan</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Akuntansi Keuangan</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Daftar Transaksi</a></li>
                    <li><a href="create.php">Tambah Transaksi</a></li>
                    <a href="index.php?id=<?= $row['id']; ?>" class="btn-transaksi"></i> Daftar Transaksi</a>
                </ul>
            </nav>
        </header>
        <section class="content">
            <h2>Daftar Transaksi</h2>
            <form action="index.php" method="POST">
                <input type="text" name="search" value="<?= $search ?>" placeholder="Cari transaksi..." />
                <button type="submit"><i class="fas fa-search"></i> Cari</button>
            </form>
            <table>
                <tr>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Tipe</th>
                    <th>Aksi</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['tanggal']; ?></td>
                    <td><?= $row['deskripsi']; ?></td>
                    <td><?= $row['jumlah']; ?></td>
                    <td><?= ucfirst($row['tipe']); ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn-edit"><i class="fas fa-edit"></i> Edit</a>
                        <a href="delete.php?id=<?= $row['id']; ?>" class="btn-delete"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </section>
    </div>
    <footer>
        <p>&copy; 2023 Akuntansi Keuangan</p>
    </footer>
</body>
</html>