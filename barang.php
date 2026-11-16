<?php
session_start();
include "koneksi.php";
?>
<link rel="stylesheet" href="style.css">
<h2>Data Barang</h2>
<a href="tambah_barang.php">Tambah Barang</a> |
<a href="home.php">Kembali :</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <td>Kode</td>
        <td>Nama Barang</td>
        <td>Harga</td>
        <td>Stok</td>
        <td>Aksi</td>
    </tr>

    <?php
    $data = mysqli_query($koneksi, "SELECT * FROM produk");
    while ($row = mysqli_fetch_array($data)) {
    ?>
        <tr>
            <td><?php echo $row['ProdukID']; ?></td>
            <td><?php echo $row['NamaProduk']; ?></td>
            <td><?php echo $row['Harga']; ?></td>
            <td><?php echo $row['Stok']; ?></td>
            <td>
                <a href="edit_barang.php?id=<?php echo $row['ProdukID']; ?>">Edit</a> |
                <a href="hapus_barang.php?id=<?php echo $row['ProdukID']; ?>">Hapus</a>
            </td>
        </tr>
    <?php } ?>
</table>