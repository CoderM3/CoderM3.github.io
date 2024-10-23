<?php
require 'koneksi.php';

if (isset($_POST['upload_photo'])) {
    $id_pelanggan = $_POST['id_produk'];

    if ($_FILES['foto_produk']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['foto_prduk']['tmp_name'];
        
        $imageFileType = strtolower(pathinfo($_FILES['foto_produk']['nama_produk'], PATHINFO_EXTENSION));
        
        $new_file_name = date('Ymd_His') . '.' . $imageFileType;

        $file_destination = 'uploads/' . $new_file_name;

        if (move_uploaded_file($file_tmp, $file_destination)) {
            $query = "UPDATE produk SET foto_produk='$new_file_name' WHERE id_produk=$id_produk";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "
                    <script>
                        alert('Profile photo updated successfully!');
                        document.location.href = 'index.php';
                    </script>";
            } else {
                echo "
                    <script>
                        alert('Failed to update profile photo in the database.');
                        document.location.href = 'index.php';
                    </script>";
            }
        } else {
            echo "
                <script>
                    alert('Failed to move uploaded file.');
                    document.location.href = 'index.php';
                </script>";
        }
    } else {
        echo "
            <script>
                alert('Error uploading file.');
                document.location.href = 'index.php';
            </script>";
    }
}
?>