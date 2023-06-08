<?php
require "function.php";

if (isset($_POST["tambah"])) {
    if (tambahDataP($_POST) > 0) {
        echo "<script>
                alert('Data berhasil ditambahkan');
                window.location.href='pengrajin.php';
            </script>";
    } else {
        echo '<script>alert("Gagal menambahkan")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pengrajin</title>
    <link rel="stylesheet" href="tambah-data.css">
</head>

<body>
    <div class="container">
        <h1>Tambah Data Pengrajin</h1>
        <form action="" method="post">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" autocomplete="off" placeholder="Masukkan Nama ..." required><br>
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" autocomplete="off" placeholder="Masukkan Alamat ..." required><br>
            <label for="telp">No Telp:</label>
            <input type="text" name="telp" id="telp" autocomplete="off" placeholder="Masukkan No Telp ..." required>
            <br>
            <button type="submit" name="tambah">Tambah Data</button>
        </form>
        <a href="pengrajin.php">Kembali ke Halaman Pengrajin</a>
    </div>
</body>

</html>
