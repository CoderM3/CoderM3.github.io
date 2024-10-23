<?php
require "koneksi.php";

if (isset($_POST['tambah'])) { 
    // Handle file upload
    if (isset($_FILES['foto_produk']) && $_FILES['foto_produk']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['foto_produk']['tmp_name'];
        $fileName = $_FILES['foto_produk']['name'];
        $destination = 'uploads/' . $fileName;
        move_uploaded_file($fileTmpPath, $destination);
    }
    
    // Handle product data
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    
    // Insert product data and image into the database
    $query = "INSERT INTO produk (nama_produk, harga, kategori, foto_produk) VALUES ('$nama_produk', '$harga', '$kategori', '$fileName')";
    mysqli_query($conn, $query);
    
    // Redirect or display success message
    echo "Product added successfully!";
}
?>