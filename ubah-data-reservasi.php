<?php
require 'function.php';

$id = $_GET["ubahid_reservasi"];
$query = tampil("SELECT reservasi.*, user.nama_user, user.email, user.no_telp FROM reservasi INNER JOIN user ON reservasi.id_user = user.id_user WHERE reservasi.id_reservasi = '$id'")[0];

if (isset($_POST["ubah"])) {
    if (ubahDataR($_POST, $id) > 0) {
        echo "Ubah data berhasil";
        echo '<script>window.location="reservasi.php"</script>';
    } else {
        echo '<script>alert("Gagal mengubah")</script>';
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Reservasi</title>
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
        <h1>Reservasi</h1>
        <form action="" method="post">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" autocomplete="off" placeholder="Masukkan Nama ..."
                value="<?= $query["nama_user"] ?>" required><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" autocomplete="off" placeholder="Masukkan Email ..."
                value="<?= $query["email"] ?>" required><br>
            <label for="telp">No Telp:</label>
            <input type="text" name="telp" id="telp" autocomplete="off" placeholder="Masukkan No Telp ..."
                value="<?= $query["no_telp"] ?>" required><br>
            <label for="jumlah_pengunjung">Jumlah Pengunjung:</label>
            <select id="jumlah_pengunjung" name="jumlah_pengunjung" required>
                <?php
                for ($i = 0; $i <= 10; $i++) {
                    if ($i == $query['jumlah_pengunjung']) {
                        echo "<option value='$i' selected>$i</option>";
                    } else {
                        echo "<option value='$i'>$i</option>";
                    }
                }
                ?>
            </select><br><br>
            <label for="tanggal_kunjungan">Tanggal Kunjungan:</label>
            <input type="date" id="tanggal_kunjungan" name="tanggal_kunjungan"
                value="<?= $query["tanggal_kunjungan"] ?>" required><br><br>
            <label for="waktu_kunjungan">Waktu Kunjungan:</label>
            <input type="time" id="waktu_kunjungan" name="waktu_kunjungan" value="<?= $query["waktu_kunjungan"] ?>"
                required><br><br>
            <button type="submit" name="ubah">Ubah Data</button>
        </form>
        <a href="reservasi.php">Kembali ke Reservasi</a>
    </div>
</body>

</html>