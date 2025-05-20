<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = intval($_GET['id']);
$result = mysqli_query($koneksi, "SELECT * FROM buku WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}

if (isset($_POST['submit'])) {
  
    $link_gambar = htmlspecialchars($_POST['link_gambar']);  
    $judul = htmlspecialchars($_POST['judul']);
    $tahun = htmlspecialchars($_POST['tahun']);
    $penerbit = htmlspecialchars($_POST['penerbit']);
    $isi = htmlspecialchars($_POST['isi']);

    $update = "UPDATE buku SET  
        link_gambar='$link_gambar',
        judul='$judul', 
        tahun='$tahun', 
        penerbit='$penerbit', 
        isi='$isi' 
        WHERE id=$id";

    if (mysqli_query($koneksi, $update)) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Data</title>
</head>
<body>

<h2>Edit Data Handphone</h2>
<p>
  <a href="dashboard.php">Kembali ke Dashboard</a> |
  <a href="index.php">Logout</a>
</p>
<hr>

<form method="POST">
    <p>
    <label>link gambar:</label><br>
    <input type="text" name="link_gambar" value="<?= $data['link_gambar'] ?>">
  </p>
  <p>
    <label>Judul:</label><br>
    <input type="text" name="judul" value="<?= $data['judul'] ?>">
  </p>
  <p>
    <label>Tahun Terbit:</label><br>
    <input type="text" name="tahun" value="<?= $data['tahun'] ?>">
  </p>
  <p>
    <label>Penerbit:</label><br>
    <input type="text" name="penerbit" value="<?= $data['penerbit'] ?>">
  </p>
  <p>
    <label>Isi:</label><br>
    <input type="text" name="isi" value="<?= $data['isi'] ?>">
  </p>
  <p>
    <button type="submit" name="submit">Simpan</button>
    <a href="dashboard.php">Batal</a>
  </p>
</form>

</body>
</html>
