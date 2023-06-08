<?php
include "function.php";
session_start();

if (isset($_POST['btn-login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM tabel_admin where username = '$username' and pw = '$password' ";
    $result = mysqli_query($conn, $sql);
    $return = mysqli_fetch_array($result);

    if ($return) {
        $_SESSION['id_admin'] = $_POST['id_admin'];
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['pw'] = $_POST['pw'];

        echo "<script>alert('Selamat datang $username');
                document.location.href = 'beranda.php'</script>";
    } else {
        echo "<script>alert('Username tidak teradaftar');
            document.location.href = 'login.php'</script>";
    }

}


?>