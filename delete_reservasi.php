<?php
include 'function.php';

if (isset($_GET['deleteid_reservasi'])) {
    $id = $_GET['deleteid_reservasi'];

    // Mulai transaksi
    // $conn->begin_transaction();


    // Dapatkan id_user yang akan dihapus
    $sql2 = "SELECT * FROM reservasi WHERE id_reservasi = $id";
    $result2 = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_assoc($result2);
    $idUser = $row['id_user'];


    // Hapus data dari tabel reservasi
    $sql1 = "DELETE FROM reservasi WHERE id_reservasi = $id";
    $result1 = mysqli_query($conn, $sql1);



    // Hapus data dari tabel user berdasarkan id_user
    $sql3 = "DELETE FROM user WHERE id_user = $idUser";
    $result3 = mysqli_query($conn, $sql3);





    // Commit transaksi jika kedua operasi berhasil
    if ($result1 && $result3) {
        // $conn->commit();
        header('location: reservasi.php');
    } else {
        // $conn->rollback();
        die(mysqli_error($conn));
    }
    // catch (Exception $e) {
    // // Rollback transaksi jika terjadi error
    // $conn->rollback();
    // die(mysqli_error($conn));
    // }
}

?>