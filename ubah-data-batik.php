<?php
require 'function.php';

$id = $_GET["ubahid_batik"];
$query = tampil("SELECT * FROM batik WHERE id_batik ='$id'")[0];
//var_dump($query)

if (isset($_POST["ubah"])) {
    if (ubahDataB($_POST, $id) > 0) {
        echo "<script>
                alert('Data berhasil di ubah');
                window.location='galeri.php';
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
    <title>Ubah Data Batik</title>
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
            top: 60%;
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
        <h1>Ubah Data Batik</h1>
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

            <label for="batik">Nama Batik:</label>
            <input type="text" name="batik" id="batik" autocomplete="off" placeholder="Masukkan Nama Batik"
                value="<?= $query["nama_batik"]; ?>" required><br>

            <label for="info">Info Batik:</label>
            <textarea name="info" id="info" placeholder="Masukkan info ..."
                required><?= $query["info_batik"]; ?></textarea><br>

            <label for="gambar">Upload Gambar:</label>
            <br>
            <img src="img/<?= $query["gambar_batik"] ?>" alt="Gambar" width="200"><br>
            <input type="file" name="gambar" id="gambar"><br>
            <input type="hidden" name="gambarlama" value="<?= $query["gambar_batik"]; ?>">

            <button type="submit" name="ubah">Ubah Data</button>
        </form>
        <a href="galeri.php">Kembali ke Halaman Galeri</a>
    </div>
</body>

</html>