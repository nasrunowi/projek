<?php

include 'function.php';
if (isset($_GET['deleteid_pengrajin'])) {   
    $id = $_GET['deleteid_pengrajin'];
    $sql = "delete from `pengrajin` where id_pengrajin= $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:pengrajin.php');
    } else {
        die(mysqli_error($conn));
    }
}

?>