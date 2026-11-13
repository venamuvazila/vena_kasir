<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password' AND jabatan ='administrator'");
    $data = mysqli_fetch_array($query);

    if ($data) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['jabatan'] = $data['jabatan'];
        $_SESSION['nama'] = $data['nama'];
        header("Location: home.php");
    } else {
        echo "Username / Password Admin Salah";
    }
}
?>

<html>

<head>
    <title>Login Administrator</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login-box">
        <h2>LOGIN ADMINISTRATOR</h2>
        <form method="POST">
            Username <br>
            <input type="text" name="username"><br>
            Password <br>
            <input type="password" name="password"><br>
            <input type="submit" name="login" value="Login Admin">
        </form>
        <p><a href="index.php">Kembali</a></p>
    </div>
</body>

</html>