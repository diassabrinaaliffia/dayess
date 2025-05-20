<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $hapus = mysqli_query($koneksi, "DELETE FROM buku WHERE id = $id");
    if ($hapus) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Gagal menghapus data!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
</head>
<body>

<nav>
  <div>
    <a href="#">ys</a>
    <div>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="create.php">Tambah Data</a></li>
        <li><a href="user.php">Edit User</a></li>
      </ul>
      <a href="index.php"><button>Logout</button></a>
    </div>
  </div>
</nav>

<div>
  <h3>Data Buku</h3>
  <?php
    $result = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY id DESC");

    if (mysqli_num_rows($result) > 0):
  ?>
  <div>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <div>
        <div>
          <img src="<?= htmlspecialchars($row['link_gambar']) ?>" alt="gambar" onerror="this.onerror=null;this.src='https://via.placeholder.com/300x200';">
          <div>
            <h5><?= htmlspecialchars($row['judul']) ?></h5>
            <p>
              <strong>Tahun:</strong> <?= htmlspecialchars($row['tahun']) ?><br>
              <strong>Penerbit:</strong> <?= htmlspecialchars($row['penerbit']) ?><br>
              <strong>Isi:</strong> <?= htmlspecialchars($row['isi']) ?>
            </p>
            <div>
              <a href="edit.php?id=<?= $row['id']; ?>">Ubah</a>
              <a href="dashboard.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
  <?php else: ?>
    <div>Tidak ada data.</div>
  <?php endif; ?>
</div>

</body>
</html>
