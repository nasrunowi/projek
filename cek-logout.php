<?php
include "function.php";
// logout.php

// Lakukan semua tindakan yang diperlukan untuk logout, seperti menghapus sesi atau menghapus token akses

// Contoh: Hapus sesi
session_start();

unset($_SESSION['id_admin']);
unset($_SESSION['username']);
unset($_SESSION['pw']);

session_destroy();

// Redirect pengguna ke halaman login atau halaman beranda setelah logout
echo "<script>alert('Logout successfully');
document.location.href = 'login.php'</script>";
?>