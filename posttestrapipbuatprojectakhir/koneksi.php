<?php 
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'dbsenar';

    $conn = mysqli_connect($server, $username, $password, $db_name);
    
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    } 
?>