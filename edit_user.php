<?php
session_start();
include 'koneksi.php';

if (!isset($_GET['id'])) exit(header("Location: user.php"));
$id = (int)$_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM user WHERE id = $id");
if (mysqli_num_rows($result) == 0) exit("User tidak ditemukan.");
$user = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama     = htmlspecialchars($_POST['nama']);
    $email    = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'];

    $update = mysqli_query($koneksi, "UPDATE user SET 
        nama='$nama', email='$email', username='$username', password='$password' WHERE id=$id");

    exit(header("Location: user.php"));
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit User</title>
</head>
<body>

<h3>Edit Data User</h3>
<a href="user.php">Kembali ke Halaman User</a>
<hr>

<form method="POST">
  <p>
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= htmlspecialchars($user['nama']) ?>" required>
  </p>
  <p>
    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
  </p>
  <p>
    <label>Username:</label><br>
    <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
  </p>
  <p>
    <label>Password (Kosongkan jika tidak ingin diubah):</label><br>
    <input type="text" name="password" placeholder="Isi untuk ganti password">
  </p>
  <p>
    <button type="submit">Simpan</button>
    <a href="user.php">Batal</a>
  </p>
</form>

</body>
</html>
