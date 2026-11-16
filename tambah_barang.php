<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $produkid = $_POST['produkid'];
    $namaproduk = $_POST['namaproduk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    mysqli_query($koneksi, "INSERT INTO produk VALUES ('$produkid', '$namaproduk', '$harga', '$stok')");
    header("Location: barang.php");
}
?>
<link rel="stylesheet" href="style.css">
<h2>Tambah Barang</h2>
<form method="POST">
    Kode : <input type="text" name="produkid"><br><br>
    Nama : <input type="text" name="namaproduk"><br><br>
    Harga : <input type="number" name="harga"><br><br>
    Stok : <input type="number" name="stok"><br><br>
    <input type="submit" name="simpan" value="Simpan">
</form>