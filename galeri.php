<?php
require "function.php";

$batik = tampil("SELECT batik.id_batik, pengrajin.nama_pengrajin, batik.nama_batik, batik.info_batik, batik.gambar_batik FROM batik,pengrajin WHERE pengrajin.id_pengrajin=batik.id_pengrajin order by id_batik desc");

// var_dump($batik);

//Cari Data
if (isset($_POST["Cari"])) {
    $batik = CariB($_POST["keyword"]);
}


session_start();

if (empty($_SESSION['username'])) {
    echo "<script>alert('Login terlebih dahulu');
        document.location.href = 'login.php'</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="all.css">
    <title>Pengrajin</title>
</head>

<body>
    <div class="navbar">
        <div class="logo">
            <a href="#">
                <p> Batik Jetis</p>
            </a>
        </div>
        <ul>
            <li><a href="reservasi.php">Reservasi</a></li>
            <li><a href="beranda.php">Home</a></li>
            <li><a href="artikel.php">Artikel</a></li>
            <li><a href="galeri.php">Galeri Batik</a></li>
            <li><a href="pengrajin.php">Pengrajin</a></li>
            <li><a href="#">About</a></li>
            <li><a href="cek-logout.php">Logout</a></li>
        </ul>
    </div>
    <h1> Tabel Batik</h1>
    <form action="" method="post" hidden>
        <input type="text" name="keyword" autocomplete="off" autofocus size="50">
        <button type="submit" name="Cari">Cari</button>
    </form><br>
    <a href="tambah-data-batik.php" class="tambah-data">Tambah Data</a>
    <table border="1" cellspacing="0" cellpading="3" class="pengrajin-table">
        <tr>
            <th>No</th>
            <th>Nama Pengrajin</th>
            <th>Nama Batik</th>
            <th>Info Batik</th>
            <th>Gambar Batik</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($batik as $btk):
            $id = $btk["id_batik"];
            ?>
            <tr>
                <td>
                    <?= $no++; ?>
                </td>
                <td>
                    <?= $btk["nama_pengrajin"]; ?>
                </td>
                <td>
                    <?= $btk["nama_batik"]; ?>
                </td>
                <td>
                    <?= $btk["info_batik"]; ?>
                </td>
                <td><img src="img/<?= $btk["gambar_batik"]; ?>" alt="gambar" width="100"></td>
                <td>
                    <a href="delete_batik.php?deleteid_batik=<?= $id ?>"
                        onclick="return confirm('Apakah data ingin di hapus?')" class="delete-data">Hapus</a> |
                    <a href="ubah-data-batik.php?ubahid_batik=<?= $id ?>" class="update-data">Ubah</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>