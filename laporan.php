<?php include "koneksi.php"; ?>
<link rel="stylesheet" href="style.css">
<h2>Laporan Penjualan</h2>
<a href="home.php">Kembali</a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <td>Kode</td>
        <td>Barang</td>
        <td>Jumlah</td>
        <td>Total</td>
        <td>Tanggal</td>
    </tr>

    <?php
    $data = mysqli_query($koneksi, "SELECT penjualan.PenjualanID, produk.NamaProduk, detail.JumlahProduk, detail.Subtotal, penjualan.TanggalPenjualan 
    FROM penjualan 
    JOIN detail ON penjualan.PenjualanID = detail.PenjualanID 
    JOIN produk ON detail.ProdukID = produk.ProdukID 
    ORDER BY penjualan.PenjualanID DESC");

    while ($row = mysqli_fetch_array($data)) {
    ?>
        <tr>
            <td><?php echo $row['PenjualanID']; ?></td>
            <td><?php echo $row['NamaProduk']; ?></td>
            <td><?php echo $row['JumlahProduk']; ?></td>
            <td>Rp <?php echo number_format($row['Subtotal'], 0, ',', '.'); ?></td>
            <td><?php echo $row['TanggalPenjualan']; ?></td>
        </tr>
    <?php } ?>
</table>