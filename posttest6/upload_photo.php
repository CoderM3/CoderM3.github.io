<?php
require 'koneksi.php';

if (isset($_POST['upload_photo'])) {
    $id_pelanggan = $_POST['id_pelanggan'];

    if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['foto']['tmp_name'];
        
        $imageFileType = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
        
        $new_file_name = date('Ymd_His') . '.' . $imageFileType;

        $file_destination = 'uploads/' . $new_file_name;

        if (move_uploaded_file($file_tmp, $file_destination)) {
            $query = "UPDATE pelanggan SET foto='$new_file_name' WHERE id_pelanggan=$id_pelanggan";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "
                    <script>
                        alert('Profile photo updated successfully!');
                        document.location.href = 'edit.php?id_pelanggan=$id_pelanggan';
                    </script>";
            } else {
                echo "
                    <script>
                        alert('Failed to update profile photo in the database.');
                        document.location.href = 'edit.php?id_pelanggan=$id_pelanggan';
                    </script>";
            }
        } else {
            echo "
                <script>
                    alert('Failed to move uploaded file.');
                    document.location.href = 'edit.php?id_pelanggan=$id_pelanggan';
                </script>";
        }
    } else {
        echo "
            <script>
                alert('Error uploading file.');
                document.location.href = 'edit.php?id_pelanggan=$id_pelanggan';
            </script>";
    }
}
?>