<?php
require "function.php";

if (isset($_POST["tambah"])) {
    if (tambahDataB($_POST) > 0) {
        echo "<script>
                alert('data berhasil di tambahkan');
                window.location='galeri.php';
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
    <title>Tambah Data Batik</title>
    <link rel="stylesheet" href="tambah-data.css">
</head>

<body>
    <div class="container">
        <h1>Tambah Data Batik</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="pengrajin">Id Pengrajin / Nama Pengrajin : </label>
            <select name="pengrajin" id="">
                <?php
                $sql = "SELECT * FROM pengrajin where 1";
                $result = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($result)): ?>
                    <option value="<?php echo $data['id_pengrajin'] ?>"><?php echo $data['nama_pengrajin'] ?></option>
                <?php endwhile; ?>
            </select><br>
            <label for="batik">Nama Batik : </label>
            <input type="text" name="batik" id="batik" autocomplete="off" placeholder="Masukan Nama Batik ..."
                required><br>
            <label for="info">Info Batik : </label>
            <textarea name="info" id="info" autocomplete="off" placeholder="Masukan info ..." required></textarea><br>
            <label for="gambar">Upload Gambar : </label>?id_pengrajin?
            <input type="file" name="gambar" id="gambar"><br>
            <button type="submit" name="tambah"> Tambah Data</button>
        </form>
        <a href="galeri.php">Kembali ke Halaman Galeri</a>
    </div>
</body>

</html>