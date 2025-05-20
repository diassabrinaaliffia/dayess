<?php
session_start();
include "koneksi.php";

$error = "";

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
  $d = mysqli_fetch_array($data);

  if ($d) {
    if (password_verify($password, $d['password'])) {
      $_SESSION['username'] = $username;
      header("Location: dashboard.php");
      exit;
    } else {
      $error = "Password salah, silakan coba lagi.";
    }
  } else {
    $error = "Username tidak ditemukan.";
  }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Konter</title>
</head>
<body>

  <h4>Silakan Login</h4>

  <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

  <form method="post">
    <p>
      <input type="text" name="username" placeholder="Username" required>
    </p>
    <p>
      <input type="password" name="password" placeholder="Password" required>
    </p>
    <p>
      <button type="submit">Login</button>
    </p>
  </form>

</body>
</html>
