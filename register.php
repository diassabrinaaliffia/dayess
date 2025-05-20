<?php
include "koneksi.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $username = str_replace(' ', '_', strtolower($nama)) . rand(10, 100);

    mysqli_query($koneksi, "INSERT INTO user VALUES('', '$nama', '$email', '$username', '$password')");
    $_SESSION['username_baru'] = $username;
    header("Location: index.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar - Konter</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div>
    <h4>Daftar Akun Baru</h4>
    <form method="post">
      <input type="text" name="nama" placeholder="Nama" required><br><br>
      <input type="email" name="email" placeholder="Email" required><br><br>
      <input type="password" name="password" placeholder="Password" required><br><br>
      <button type="submit">Mendaftar Sekarang</button>
    </form>
  </div>
</body>
</html>
