<?php
require 'koneksi.php';

if (isset($_POST['delete_photo'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $current_photo = $_POST['current_photo'];


    $file_path = 'uploads/' . $current_photo;
    if (file_exists($file_path)) {
        unlink($file_path);
    }

    $query = "UPDATE pelanggan SET foto=NULL WHERE id_pelanggan=$id_pelanggan";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "
            <script>
                alert('Profile photo deleted successfully!');
                document.location.href = 'edit.php?id_pelanggan=$id_pelanggan';
            </script>";
    } else {
        echo "
            <script>
                alert('Failed to update the database.');
                document.location.href = 'edit.php?id_pelanggan=$id_pelanggan';
            </script>";
    }
} else {
    echo "
        <script>
            alert('Invalid request.');
            document.location.href = 'userpage.php'; // Redirect to user page if accessed incorrectly
        </script>";
}
?>