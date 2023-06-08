<?php
$server = "localhost";
$user = "root";
$pass = "";
$nama_db = "batik_jetis";

$conn = mysqli_connect($server, $user, $pass, $nama_db) or die(mysqli_error($conn));

function tampil($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($data = mysqli_fetch_assoc($result)) {
        $rows[] = $data;
    }

    return $rows;

}

function tambahDataP($data)
{
    global $conn;
    $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
    $alamat = $data["alamat"];
    $telp = $data["telp"];

    mysqli_query($conn, "INSERT INTO pengrajin VALUES ('','$nama','$alamat','$telp')");

    return mysqli_affected_rows($conn);
}

function tambahDataA($data)
{
    global $conn;
    $admin = $data["admin"];
    $judul = $data["judul"];
    $isi = $data["isi"];
    $sumber = $data["sumber"];
    $gambar = uploadgambar();
    if (!$gambar) {
        return false;
    }

    mysqli_query($conn, "INSERT INTO artikel VALUES ('','$admin','$judul','$isi','$sumber', '$gambar')");

    return mysqli_affected_rows($conn);
}

//function upload gambar batik
function uploadgambar()
{
    $namafile = $_FILES["gambar"]["name"];
    $ukuranfile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpname = $_FILES["gambar"]["tmp_name"];

    if ($error === 4) {
        echo "<script>
            alert('File Belum Di upload !!');
        </script>";
        return false;
    }

    $ekstensivalid = ["jpeg", "jpg", "png"];
    $ekstensifile = explode(".", $namafile);
    $ekstensifile = strtolower(end($ekstensifile));

    if (!in_array($ekstensifile, $ekstensivalid)) {
        echo "<script>
            alert('Ekstensi File tidak valid');
        </script>";
        return false;
    }

    if ($ukuranfile > 5000000) {
        echo "<script>
            alert('Ukuran File terlalu besar');
        </script>";
        return false;
    }

    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensifile;


    move_uploaded_file($tmpname, "img/" . $namafilebaru);

    return $namafilebaru;
}

function tambahDataB($data)
{
    global $conn;
    $pengrajin = $data["pengrajin"];
    $batik = $data["batik"];
    $info = $data["info"];
    $gambar = uploadgambar();
    if (!$gambar) {
        return false;
    }

    mysqli_query($conn, "INSERT INTO batik VALUES ('','$pengrajin','$batik','$info', '$gambar')");

    return mysqli_affected_rows($conn);
}
function tambahDataR($data)
{
    global $conn;
    // Mendapatkan data dari form
    $nama = $data["nama"];
    $email = $data["email"];
    $telp = $data["telp"];
    $jumlah = $data["jumlah_pengunjung"];
    $tanggal = $data["tanggal_kunjungan"];
    $waktu = $data["waktu_kunjungan"];

    // Memulai transaksi
    $conn->autocommit(false);

    try {
        // Query untuk memasukkan data ke tabel "user"
        $queryUser = "INSERT INTO user (nama_user, email, no_telp) VALUES (?, ?, ?)";
        $stmtUser = $conn->prepare($queryUser);
        $stmtUser->bind_param('sss', $nama, $email, $telp);
        $stmtUser->execute();

        // Mendapatkan id_user yang baru saja di-generate
        $id_user = $conn->insert_id;

        // Query untuk memasukkan data ke tabel "reservasi"
        $queryReservasi = "INSERT INTO reservasi (id_user, jumlah_pengunjung, tanggal_kunjungan, waktu_kunjungan) VALUES (?, ?, ?, ?)";
        $stmtReservasi = $conn->prepare($queryReservasi);
        $stmtReservasi->bind_param('iiss', $id_user, $jumlah, $tanggal, $waktu);
        $stmtReservasi->execute();

        $conn->commit();

        return true; // Data berhasil ditambahkan
    } catch (PDOException $e) {
        // Rollback transaksi jika terjadi error
        $conn->rollback();
        echo "Error: " . $e->getMessage();
        return false; // Gagal menambahkan data
    }
}

function ubahDataP($data, $id)
{
    global $conn;
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $telp = $data["telp"];

    mysqli_query($conn, " UPDATE pengrajin SET nama_pengrajin = '$nama', alamat_pengrajin = '$alamat', no_telp_pengrajin = '$telp' WHERE id_pengrajin = '$id'");

    return mysqli_affected_rows($conn);
}


function ubahDataB($data, $id)
{
    global $conn;
    $pengrajin = $data["pengrajin"];
    $batik = $data["batik"];
    $info = $data["info"];
    $gambarlama = $data["gambarlama"];

    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = uploadgambar();
        if (file_exists('img/' . $gambarlama)) {
            unlink('img/' . $gambarlama);
        }
    }

    mysqli_query($conn, " UPDATE batik SET id_pengrajin = '$pengrajin', nama_batik = '$batik', info_batik = '$info', gambar_batik = '$gambar' WHERE id_batik = '$id'");

    return mysqli_affected_rows($conn);

}
function ubahDataA($data, $id)
{
    global $conn; 
    $admin = $data["admin"];
    $judul = $data["judul"];
    $isi = $data["isi"];
    $sumber = $data["sumber"];
    $gambarlama = $data["gambarlama"];

    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = uploadgambar();
        if (file_exists('img/' . $gambarlama)) {
            unlink('img/' . $gambarlama);
        }
    }

    mysqli_query($conn, " UPDATE artikel SET id_admin = '$admin', judul_artikel = '$judul', isi_artikel = '$isi', sumber_artikel = '$sumber', gambar_artikel = '$gambar' WHERE id_artikel = '$id'");

    return mysqli_affected_rows($conn);

}
function ubahDataR($data, $id)
{
    global $conn;
    // Mendapatkan data dari form
    $nama = $data["nama"];
    $email = $data["email"];
    $telp = $data["telp"];
    $jumlah = $data["jumlah_pengunjung"];
    $tanggal = $data["tanggal_kunjungan"];
    $waktu = $data["waktu_kunjungan"];

    // Memulai transaksi
    mysqli_begin_transaction($conn);

    try {
        // Update data pada tabel "user"
        $queryUser = "UPDATE user SET nama_user = ?, email = ?, no_telp = ? WHERE id_user = (SELECT id_user FROM reservasi WHERE id_reservasi = ?)";
        $stmtUser = mysqli_prepare($conn, $queryUser);
        mysqli_stmt_bind_param($stmtUser, "sssi", $nama, $email, $telp, $id);
        mysqli_stmt_execute($stmtUser);

        // Update data pada tabel "reservasi"
        $queryReservasi = "UPDATE reservasi SET jumlah_pengunjung = ?, tanggal_kunjungan = ?, waktu_kunjungan = ? WHERE id_reservasi = ?";
        $stmtReservasi = mysqli_prepare($conn, $queryReservasi);
        mysqli_stmt_bind_param($stmtReservasi, "issi", $jumlah, $tanggal, $waktu, $id);
        mysqli_stmt_execute($stmtReservasi);

        // Commit transaksi jika berhasil
        mysqli_commit($conn);

        return true;
    } catch (Exception $e) {
        // Rollback transaksi jika terjadi error
        mysqli_rollback($conn);
        echo "Error: " . $e->getMessage();
        return false;
    }
}


function CariP($keyword)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM pengrajin where nama_pengrajin LIKE '%$keyword%' OR alamat_pengrajin like '%$keyword%'");

    return $query;

}

function CariB($keyword)
{
    global $conn;
    $query = mysqli_prepare($conn, "SELECT batik.id_batik, pengrajin.nama_pengrajin, batik.nama_batik, batik.info_batik, batik.gambar_batik FROM batik JOIN pengrajin ON pengrajin.id_pengrajin = batik.id_pengrajin WHERE nama_batik LIKE ? OR info_batik LIKE ?");

    $keyword = "%$keyword%"; // Menambahkan tanda persen pada kata kunci untuk pencarian yang lebih fleksibel

    mysqli_stmt_bind_param($query, "ss", $keyword, $keyword); // Mengikat parameter dengan tanda tanya pada query
    mysqli_stmt_execute($query);

    $result = mysqli_stmt_get_result($query);
    return $result;
}