<?php
require 'koneksi.php';

if (isset($_POST['delete_photo'])) {
    $id_pelanggan = $_POST['id_produk'];
    $current_photo = $_POST['current_photo'];


    $file_path = 'uploads/' . $current_photo;
    if (file_exists($file_path)) {
        unlink($file_path);
    }

    $query = "UPDATE produk SET foto_produk=NULL WHERE id_produk=$id_produk";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "
            <script>
                alert('Profile photo deleted successfully!');
                document.location.href = 'index.php?id_produk=$id_produk';
            </script>";
    } else {
        echo "
            <script>
                alert('Failed to update the database.');
                document.location.href = 'kasihsayangadmin.php?id_produk=$id_produk';
            </script>";
    }
} else {
    echo "
        <script>
            alert('Invalid request.');
            document.location.href = 'kasihsayangadmin.php'; // Redirect to user page if accessed incorrectly
        </script>";
}
?>