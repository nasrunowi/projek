<?php
require "function.php";



$sql = ("SELECT artikel.id_artikel, tabel_admin.username, artikel.judul_artikel, artikel.isi_artikel, artikel.sumber_artikel, artikel.gambar_artikel FROM artikel INNER JOIN tabel_admin ON tabel_admin.id_admin = artikel.id_admin ORDER BY artikel.id_artikel DESC
 LIMIT 3");
$result = $conn->query($sql);
$artikel = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $artikel[] = $row;
    }
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="all.css">
    <title>Home</title>
    <script>
        function pindaHalamanReservasi() {
            window.location.href = "tambah-data-reservasi.php";
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
        <nav>
            <ul>
                <li><a href="reservasi.php">Reservasi</a></li>
                <li><a href="beranda.php">Home</a></li>
                <li><a href="artikel.php">Artikel</a></li>
                <li><a href="galeri.php">Galeri Batik</a></li>
                <li><a href="pengrajin.php">Pengrajin</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li hidden><a href="cek-logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
    <div class="home">
        <div class="image">
            <img src="Membatik_indonesia-removebg-preview.png" alt="Gambar" width="600">
        </div>
        <div class="header">
            <h1>Batik Jetis <span>Sidoarjo</span></h1>
        </div>
        <div class="content-header">
            <p>Batik adalah salah satu ciri yang khas setiap daerah namun di setiap daerah memiliki berbagai macam-macam
                batik yang menarik dan bermacammacam motif di salah satu kota di Sidoarjo (Yuniartirt al., 2018).
                Kabupaten Sidoarjo terletak di sebelah selatan kota Surabaya, terkenal dengan kerupuk udang, terasi,
                petis dan ikan bandengnya. Sejak terjadinya bencana luapan lumpur Lapindo, masyarakat Indonesia bahkan
                dunia kini tidak merasa asing dengan Kabupaten Sidoarjo. Seperti daerah pesisir lainnya, sebagian
                masyarakat Sidoarjo juga merupakan pengerajin batik tulis (Dave, 2014).</p>
        </div>
    </div>
    <div class="box-reservasi">
        <h1>Reservasi Kunjungan</h1>
        <p>Kunjungi museum sekarang juga untuk mendapatkan pengalaman lebih</p>
        <button onclick="pindaHalamanReservasi()" class="button-reservasi">Reservasi Kunjungan</button>
    </div>
    <div class="artikel-beranda">
        <h1>Artikel</h1>
        <img src="mm.png" alt="gambar mega mendung">
        <a href="#">Lihat lebih banyak</a><br>
    </div>
    <div class="row">
        <?php foreach ($artikel as $a) { ?>
            <div class="col-sm-4">
                <div class="card">
                    <img src="img/<?= $a['gambar_artikel']; ?>" class="card-img-top" alt="Card Image">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $a['judul_artikel']; ?>
                        </h5>
                        <p class="card-text">
                            <?php echo $a['isi_artikel']; ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <br><br><br><br>
    <footer>
        <div class="container">
            <div class="footer-menu">
                <ul>
                <li><a href="beranda.php">Home</a></li>
                <li><a href="artikel.php">Artikel</a></li>
                <li><a href="galeri.php">Galeri Batik</a></li>
                <li><a href="pengrajin.php">Pengrajin</a></li>
                <li><a href="#">About</a></li>
                </ul>
            </div>
            <div class="footer-copyright">
                <p>&copy; 2023 Batik Jetis</p>
            </div>
        </div>
    </footer>
</body>

</html>