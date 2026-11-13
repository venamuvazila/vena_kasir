<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
include "koneksi.php";
?>

<html>

<head>
    <title>APLIKASI KASIR SEPHORA</title>
</head>

<body>
    <h2>Selamat Datang, <?php echo $_SESSION['nama']; ?></h2>
    <p>Jabatan : <?php echo $_SESSION['jabatan']; ?></p>

    <a href="barang.php">Data Barang</a> |
    <a href="pembelian.php">Pembelian</a> |
    <a href="laporan.php">Laporan</a> |
    <?php if ($_SESSION['jabatan'] == "administrator") { ?>
        <a href="register.php">Registrasi</a> |
    <?php } ?>
    <a href="logout.php">Logout</a>

    <br><br>
    <?php
    $barang = mysqli_query($koneksi, "SELECT * FROM barang");
    echo "Jumlah Barang : " . mysqli_num_rows($barang);
    ?>
</body>

</html>