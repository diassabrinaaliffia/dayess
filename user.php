<?php
session_start();
include 'koneksi.php';

// Proses hapus jika ada ID di URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    mysqli_query($koneksi, "DELETE FROM user WHERE id = $id");
    header("Location: user.php");
    exit;
}

// Ambil semua data user
$users = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data User</title>
</head>
<body>

<h2>Data User</h2>
<p><a href="dashboard.php">Kembali ke Dashboard</a> | <a href="index.php">Logout</a></p>
<hr>

<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Username</th>
    <th>Email</th>
    <th>Aksi</th>
  </tr>
  <?php $no = 1; while($user = mysqli_fetch_assoc($users)): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= htmlspecialchars($user['username']) ?></td>
      <td><?= htmlspecialchars($user['email']) ?></td>
      <td>
        <a href="edit_user.php?id=<?= $user['id'] ?>">Edit</a> |
        <a href="user.php?id=<?= $user['id'] ?>" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

</body>
</html>
