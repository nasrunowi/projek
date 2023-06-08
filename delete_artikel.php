<?php

include 'function.php';
if (isset($_GET['deleteid_artikel'])) {   
    $id = $_GET['deleteid_artikel'];
    $sql = "DELETE FROM `artikel` where id_artikel= $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:artikel.php');
    } else {
        die(mysqli_error($conn));
    }
}

?>