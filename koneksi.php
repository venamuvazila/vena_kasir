<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "vena_kasir";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Mohon Maaf Koneksi Gagal : " . mysqli_connect_error());
}