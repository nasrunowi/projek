<?php
require "function.php";

$reservasi = tampil("SELECT reservasi.id_reservasi, user.nama_user, user.email, user.no_telp, reservasi.jumlah_pengunjung, DATE_FORMAT(reservasi.tanggal_kunjungan, '%Y-%m-%d') AS tanggal_kunjungan, DATE_FORMAT(reservasi.waktu_kunjungan, '%h:%i %p') AS waktu_kunjungan FROM reservasi,user WHERE reservasi.id_user=user.id_user ORDER BY id_reservasi DESC");

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
    <title>Reservasi</title>
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
    <h1> Reservasi Kunjungan</h1>
    <form action="" method="post" hidden>
        <input type="text" name="keyword" autocomplete="off" autofocus size="50">
        <button type="submit" name="Cari">Cari</button>
    </form><br>
    <a href="tambah-data-reservasi.php" class="tambah-data">Tambah Data</a>
    <table border="1" cellspacing="0" cellpadding="3" class="pengrajin-table">
        <tr>
            <th>No</th>
            <th>Nama Pemesan</th>
            <th>Email</th>
            <th>No telp</th>
            <th>Jumlah Pengunjung</th>
            <th>Tanggal Kunjungan</th>
            <th>Waktu Kunjungan</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($reservasi as $r):
            $id = $r["id_reservasi"];
            ?>
            <tr>
                <td>
                    <?= $no++; ?>
                </td>
                <td>
                    <?= $r["nama_user"]; ?>
                </td>
                <td>
                    <?= $r["email"]; ?>
                </td>
                <td>
                    <?= $r["no_telp"]; ?>
                </td>
                <td>
                    <?= $r["jumlah_pengunjung"]; ?>
                </td>
                <td>
                    <?= $r["tanggal_kunjungan"]; ?>
                </td>
                <td>
                    <?= $r["waktu_kunjungan"]; ?>
                </td>
                <td>
                    <a href="delete_reservasi.php?deleteid_reservasi=<?= $id ?>"
                        onclick="return confirm('Apakah data ingin di hapus?')" class="delete-data">Hapus</a> |
                    <a href="ubah-data-reservasi.php?ubahid_reservasi=<?= $id ?>" class="update-data">Ubah</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>