<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM produk WHERE ProdukID='$id'");
$row = mysqli_fetch_array($data);


if (isset($_POST['update'])) {
    $produkid = $_POST['ProdukID'];
    $namaproduk = $_POST['NamaProduk'];
    $harga = $_POST['Harga'];
    $stok = $_POST['Stok'];

    mysqli_query($koneksi, "UPDATE produk SET ProdukID='$produkid', NamaProduk='$namaproduk', Harga='$harga', Stok='$stok' WHERE ProdukID='$id'");
    header("Location: barang.php");
}
?>
<link rel="stylesheet" href="style.css">
<h2>Edit Barang</h2>
<form method="POST">
    Kode : <input type="text" name="ProdukID" value="<?php echo $row['ProdukID']; ?>"><br><br>
    Nama : <input type="text" name="NamaProduk" value="<?php echo $row['NamaProduk']; ?>"><br><br>
    Harga : <input type="number" name="Harga" value="<?php echo $row['Harga']; ?>"><br><br>
    Stok : <input type="number" name="Stok" value="<?php echo $row['Stok']; ?>"><br><br>
    <input type="submit" name="update" value="Update">
</form>