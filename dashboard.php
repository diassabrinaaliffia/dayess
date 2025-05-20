<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM buku WHERE id = $id";
    mysqli_query($koneksi, $query);
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
</head>
<body>

<h2>Selamat datang di Dashboard</h2>
<p>
  <a href="index.php">Home</a> |
  <a href="create.php">Tambah Data</a> |
  <a href="index.php">Logout</a>
</p>

<hr>

<h3>Data Buku</h3>

<?php
include 'koneksi.php';
$result = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY id DESC");

if (mysqli_num_rows($result) > 0):
  while ($row = mysqli_fetch_assoc($result)):
?>

  <div style="margin-bottom: 20px;">
    <p><strong>Judul:</strong> <?= htmlspecialchars($row['judul']) ?></p>
    <p><strong>Tahun:</strong> <?= $row['tahun'] ?></p>
    <p><strong>Penerbit:</strong> <?= $row['penerbit'] ?></p>
    <p><strong>Isi:</strong> <?= $row['isi'] ?></p>
    <p>
      <a href="edit.php?id=<?= $row['id']; ?>">Ubah</a> |
      <a href="dashboard.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
    </p>
    <hr>
  </div>

<?php
  endwhile;
else:
  echo "<p>Tidak ada data.</p>";
endif;
?>

</body>
</html>
