<?php

include 'function.php';
if (isset($_GET['deleteid_batik'])) {   
    $id = $_GET['deleteid_batik'];
    $sql = "delete from `batik` where id_batik= $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:galeri.php');
    } else {
        die(mysqli_error($conn));
    }
}

?>