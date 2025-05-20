<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tambah Data</title>
</head>
<body>

<h3>Tambah Data Baru</h3>

<form action="" method="POST">
  <?php
    include 'koneksi.php';
    function input($data) {
      return htmlspecialchars(stripslashes(trim($data)));
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $judul       = input($_POST['judul']);
      $tahun       = input($_POST['tahun']);
      $penerbit    = input($_POST['penerbit']);
      $isi         = input($_POST['isi']);

      $sql = "INSERT INTO buku (judul, tahun, penerbit, isi) VALUES 
              ('$judul', '$tahun', '$penerbit', '$isi')";
      if (mysqli_query($koneksi, $sql)) header("Location: dashboard.php");
      else echo "<p>Data Gagal Disimpan.</p>";
    }
  ?>

  <p>
    <label>Judul</label><br>
    <input type="text" name="judul" placeholder="Input judul">
  </p>

  <p>
    <label>Tahun Terbit</label><br>
    <textarea name="tahun" placeholder="Input Tahun Terbit"></textarea>
  </p>

  <p>
    <label>Penerbit</label><br>
    <input type="text" name="penerbit" placeholder="Input penerbit">
  </p>

  <p>
    <label>Isi</label><br>
    <input type="text" name="isi" placeholder="Input isi">
  </p>

  <p>
    <button type="submit">Tambah</button>
    <a href="dashboard.php">Batal</a>
  </p>
</form>

</body>
</html>
