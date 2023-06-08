<?php
require 'function.php';

$id = $_GET["ubahid_pengrajin"];
$query = tampil("SELECT * FROM pengrajin WHERE id_pengrajin ='$id'")[0];
//var_dump($query)

if (isset($_POST["ubah"])) {
  if (ubahDataP($_POST, $id) > 0) {
    echo "Ubah data berhasil";
    echo '<script>window.location="pengrajin.php"</script>';
  } else {
    echo '<script>alert("Gagal mengubah")</script>';
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Pengrajin</title>
  <link rel="stylesheet" href="tambah-data.css">
</head>

<body>
  <div class="container">
    <h1>Ubah Data Pengrajin</h1>
    <form action="" method="post">
      <label for="nama">Nama:</label>
      <input type="text" name="nama" id="nama" autocomplete="off" placeholder="Masukkan Nama..."
        value="<?= $query["nama_pengrajin"]; ?>"><br>
      <label for="alamat">Alamat:</label>
      <input type="text" name="alamat" id="alamat" autocomplete="off" placeholder="Masukkan Alamat..."
        value="<?= $query["alamat_pengrajin"]; ?>"><br>
      <label for="telp">No Telp:</label>
      <input type="text" name="telp" id="telp" autocomplete="off" placeholder="Masukkan No Telp..."
        value="<?= $query["no_telp_pengrajin"]; ?>"><br>
      <button type="submit" name="ubah">Ubah Data</button>
    </form>
    <a href="pengrajin.php">Kembali ke Halaman Pengrajin</a>
  </div>
</body>

</html>