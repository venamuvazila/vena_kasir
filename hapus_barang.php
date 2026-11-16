<?php
include "koneksi.php";
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM produk WHERE ProdukID='$id'");
header("Location: barang.php");
