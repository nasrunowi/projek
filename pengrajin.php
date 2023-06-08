<?php
require "function.php";

$pengrajin = tampil("SELECT * FROM pengrajin order by id_pengrajin desc");

// var_dump($pengrajin);

//Cari Data
if (isset($_POST["Cari"])) {
    $pengrajin = CariP($_POST["keyword"]);
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
    <script>
        function confirmLogout() {
            return confirm('Apakah anda yakin ingin logout?');
        }
    </script>
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
            <li><a href="cek-logout.php" onclick="return confirmLogout()">Logout</a></li>
        </ul>
    </div>
    <h1> Tabel Pengrajin</h1>
    <form action="" method="post" hidden>
        <input type="text" name="keyword" autocomplete="off" autofocus size="50">
        <button type="submit" name="Cari">Cari</button>
    </form><br>
    <a href="tambah-pengrajin.php" class="tambah-data">Tambah Data</a>
    <table border="1" cellspacing="0" cellpadding="3" class="pengrajin-table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No telp</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($pengrajin as $pgrjn):
            $id = $pgrjn["id_pengrajin"];
            ?>
            <tr>
                <td>
                    <?= $no++; ?>
                </td>
                <td>
                    <?= $pgrjn["nama_pengrajin"]; ?>
                </td>
                <td>
                    <?= $pgrjn["alamat_pengrajin"]; ?>
                </td>
                <td>
                    <?= $pgrjn["no_telp_pengrajin"]; ?>
                </td>
                <td>
                    <a href="delete_pengrajin.php?deleteid_pengrajin=<?= $id ?>"
                        onclick="return confirm('Apakah data ingin di hapus?')" class="delete-data">Hapus</a> |
                    <a href="ubah-data-pengrajin.php?ubahid_pengrajin=<?= $id ?>" class="update-data">Ubah</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>