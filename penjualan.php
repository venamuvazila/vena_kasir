<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $namaproduk = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $tanggalpenjualan = date("Y-m-d");

    $cek = mysqli_query($koneksi, "SELECT * FROM produk WHERE NamaProduk='$namaproduk'");
    $b = mysqli_fetch_array($cek);

    $harga = $b['Harga'];
    $stok_lama = $b['Stok'];
    $totalharga = $harga * $jumlah;

    mysqli_query($koneksi, "INSERT INTO penjualan (TanggalPenjualan, TotalHarga) VALUES ('$tanggalpenjualan', '$totalharga')");

    $penjualanid_terbaru = mysqli_insert_id($koneksi);

    mysqli_query($koneksi, "INSERT INTO detail (PenjualanID, ProdukID, JumlahProduk, Subtotal) VALUES ('$penjualanid_terbaru', '" . $b['ProdukID'] . "', '$jumlah', '$totalharga')");

    $stok_baru = $stok_lama - $jumlah;
    mysqli_query($koneksi, "UPDATE produk SET Stok='$stok_baru' WHERE NamaProduk='$namaproduk'");

    echo "Transaksi berhasil, total : Rp " . $totalharga;
}
?>
<link rel="stylesheet" href="style.css">
<h2>Pembelian</h2>
<a href="home.php">Kembali</a><br><br>

<form method="POST">
    Pilih Barang :
    <select name="nama_barang">
        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM produk");
        while ($row = mysqli_fetch_array($data)) {
            echo "<option value='" . $row['NamaProduk'] . "'>" . $row['NamaProduk'] . " - Rp " . $row['Harga'] . " (Stok : " . $row['Stok'] . ")</option>";
        }
        ?>
    </select><br><br>
    Jumlah : <input type="number" name="jumlah" required><br><br>
    <input type="submit" name="simpan" value="Beli">
</form>