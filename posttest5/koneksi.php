<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $db_name = "datapelanggan";

    $conn = mysqli_connect($server, $user, $password, $db_name);

    if(!$conn) {
        die("gagal terhubung ke database: " . mysqli_connect_error());
    }
?>