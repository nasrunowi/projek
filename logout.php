<?php
include 'function.php';

// if (isset($_POST["btn-login"])) {
//     $username = $_POST["username"];
//     $password = $_POST["password"];

//     $login = tampil("SELECT * FROM tabel_admin WHERE username = '$username' and pw = '$password'");
//     if ($login) {
//         echo "<script>alert('Selamat datang $username');
//             document.location.href = 'beranda.php'</script>";
//     } else {
//         echo "<script>alert('Login gagal, periksa username dan password anda');
//             document.location.href = 'login.php' </script>";
//     }
// }
// else{
//     echo "<script>alert('Username tidak teradaftar');
//         document.location.href = 'login.php'</script>";
// }

//var_dump($login);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class=logout>
            <h1>Form Logout</h1>

            <form action="cek-logout.php" method="post">
                <input type="submit" value="Logout" class="logout">
            </form>
        </div>
    </div>
</body>
</html>