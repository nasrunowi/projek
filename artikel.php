<?php
require "function.php";

$artikel = tampil("SELECT artikel.id_artikel, tabel_admin.username, artikel.judul_artikel, artikel.isi_artikel, artikel.sumber_artikel, artikel.gambar_artikel FROM artikel INNER JOIN tabel_admin ON tabel_admin.id_admin = artikel.id_admin ORDER BY artikel.id_artikel DESC
");

// var_dump($mahasiswa);

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
    <title>Artikel</title>
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
    <h1> Tabel Artikel</h1>
    <form action="" method="post" hidden>
        <input type="text" name="keyword" autocomplete="off" autofocus size="50">
        <button type="submit" name="Cari">Cari</button>
    </form><br>
    <a href="tambah-data-artikel.php" class="tambah-data">Tambah Data</a>
    <table border="1" cellspacing="0" cellpading="3" class="pengrajin-table">
        <tr>
            <th>No</th>
            <th>Oleh</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Sumber</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($artikel as $artkl):
            $id = $artkl["id_artikel"];
            ?>
            <tr>
                <td>
                    <?= $no++; ?>
                </td>
                <td>
                    <?= $artkl["username"]; ?>
                </td>
                <td>
                    <?= $artkl["judul_artikel"]; ?>
                </td>
                <td>
                    <?= $artkl["isi_artikel"]; ?>
                </td>
                <td>
                    <?= $artkl["sumber_artikel"]; ?>
                </td>
                <td><img src="img/<?= $artkl["gambar_artikel"]; ?>" alt="gambar" width="100"></td>
                <td>
                    <a href="delete_artikel.php?deleteid_artikel=<?= $id ?>"
                        onclick="return confirm('Apakah data ingin di hapus?')" class="delete-data">Hapus</a> |
                    <a href="ubah-data-artikel.php?ubahid_artikel=<?= $id ?>" class="update-data">Ubah</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>