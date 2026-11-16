<?php
session_start();
if ($_SESSION['jabatan'] != "administrator") {
    echo "Kamu bukan admin!";
    exit;
}
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];

    mysqli_query($koneksi, "INSERT INTO user VALUES (NULL, '$username', '$password', '$nama', '$jabatan')");
    echo "Berhasil daftar";
}
?>
<link rel="stylesheet" href="style.css">
<h2>Registrasi User Baru</h2>
<a href="home.php">Kembali</a><br><br>
<form method="POST">
    Nama : <input type="text" name="nama"><br><br>
    Username : <input type="text" name="username"><br><br>
    Password : <input type="password" name="password"><br><br>
    Jabatan :
    <select name="jabatan">
        <option value="petugas">Petugas</option>
        <option value="administrator">Administrator</option>
    </select><br><br>
    <input type="submit" name="simpan" value="Daftar">
</form>