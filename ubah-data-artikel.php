<?php
require 'function.php';

$id = $_GET["ubahid_artikel"];
$query = tampil("SELECT * FROM artikel WHERE id_artikel ='$id'")[0];
//var_dump($query)

if (isset($_POST["ubah"])) {
  if (ubahDataA($_POST, $id) > 0) {
    echo "<script>
                alert('Data berhasil di ubah');
                window.location='artikel.php';
                </script>";
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
  <title>Ubah Data Artikel</title>
  <link rel="stylesheet" href="tambah-data.css">
  <style>
    .container-a {
      width: 100%;
      max-width: 600px;
      background: white;
      border-radius: 15px;
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
      position: absolute;
      left: 50%;
      top: 70%;
      transform: translate(-50%, -50%);
      padding: 20px;
    }

    .container-a::after {
      content: '';
      display: table;
      clear: both;
    }

    .container-a a {
      display: block;
      text-align: center;
      margin-top: 20px;
      text-decoration: none;
      color: #8998BF;
      font-size: 14px;
    }
  </style>
</head>

<body>
  <div class="container-a">
    <h1>Ubah Data Artikel</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <label for="admin">Id admin / Nama admin:</label>
      <select name="admin" id="">
        <?php
        $sql = "SELECT * FROM tabel_admin where 1";
        $result = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($result)): ?>
          <option value="<?php echo $data['id_admin'] ?>"><?php echo $data['username'] ?></option>
        <?php endwhile; ?>
      </select><br>
      <label for="judul">Nama Judul:</label>
      <input type="text" name="judul" id="judul" autocomplete="off" placeholder="Masukkan Nama Judul..."
        value="<?= $query["judul_artikel"]; ?>"><br>
      <label for="isi">Isi Artikel:</label>
      <textarea name="isi" id="isi" rows="6" placeholder="Masukkan isi..."><?= $query["isi_artikel"]; ?></textarea><br>
      <label for="sumber">Sumber Artikel:</label>
      <input type="text" name="sumber" id="sumber" autocomplete="off" placeholder="Masukkan sumber..."
        value="<?= $query["sumber_artikel"]; ?>"><br>
      <label for="gambar">Upload Gambar:</label><br>
      <img src="img/<?= $query["gambar_artikel"] ?>" alt="Gambar" width="100"><br>
      <input type="file" name="gambar" id="gambar"><br>
      <input type="hidden" name="gambarlama" value="<?= $query["gambar_artikel"]; ?>">
      <button type="submit" name="ubah">Ubah Data</button>
    </form>
    <a href="artikel.php">Kembali ke Halaman Artikel</a>
  </div>
</body>

</html>