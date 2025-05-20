<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>XI RPL 1 · Perpus</title>
</head>
<body>

<?php if (isset($_SESSION['username_baru'])): ?>
  <p style="color: green;">
    Username Anda adalah: <strong><?= $_SESSION['username_baru'] ?></strong><br>
    Silakan login menggunakan username ini.
  </p>
  <?php unset($_SESSION['username_baru']); ?>
<?php endif; ?>

<h1>Selamat Datang</h1>
<p>Dimana saja dan kapan saja bisa membaca buku</p>

<p>
  <a href="login.php">Login</a> | 
  <a href="register.php">Sign Up</a>
</p>

<hr>
<p style="text-align: center;">&copy; 2024 XI RPL 1. All Rights Reserved.</p>

</body>
</html>
