<?php
require "function.php";

if (isset($_POST["tambah"])) {
    if (tambahDataA($_POST) > 0) {
        echo "<script>
                alert('data berhasil di tambahkan');
                window.location='artikel.php';
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
    <title>Tambah Data Artikel</title>
    <link rel="stylesheet" href="tambah-data.css">
</head>

<body>
    <div class="container">
        <h1>Tambah Data Artikel</h1>
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
            <input type="text" name="judul" id="judul" autocomplete="off" placeholder="Masukkan Nama Judul" required>

            <label for="isi">Isi Artikel:</label>
            <textarea name="isi" id="isi" placeholder="Masukkan Isi Artikel" required></textarea>

            <label for="sumber">Sumber Artikel:</label>
            <input type="url" name="sumber" id="sumber" autocomplete="off" placeholder="Masukkan Sumber" required>

            <label for="gambar">Upload Gambar:</label>
            <input type="file" name="gambar" id="gambar" required>

            <button type="submit" name="tambah">Tambah Data</button>
        </form>
        <a href="artikel.php">Kembali ke Halaman Artikel</a>
    </div>
</body>

</html>