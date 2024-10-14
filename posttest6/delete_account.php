<?php
session_start();
require "koneksi.php";

if (isset($_POST['delete_account']) && isset($_POST['id_pelanggan'])) {
    $id = $_POST['id_pelanggan'];

    $delete_sql = "DELETE FROM pelanggan WHERE id_pelanggan = '$id'";
    if (mysqli_query($conn, $delete_sql)) {
        session_unset();
        session_destroy();
        echo "<script>alert('Account deleted successfully. You have been logged out.'); document.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('Failed to delete account. Please try again.'); document.location.href = 'login.php';</script>";
    }
} 
?>