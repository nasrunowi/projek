<?php
include 'function.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="login">
            <h1>Login</h1>
            <form action="cek-login.php" method="post">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Masukan Username...." autocomplete="off" required>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Masukan Password..." autocomplete="off" required>
                <button type="submit" name="btn-login">Login</button>
            </form>
        </div>
    </div>
</body>

</html> 