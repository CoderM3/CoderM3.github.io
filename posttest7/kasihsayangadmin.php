<?php
require 'koneksi.php';

if (isset($_POST['tambah'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $foto_produk= $_POST['foto_produk'];

    if (empty($nama_produk) || empty($harga)) {
        echo "
            <script>
                alert('Invalid input! Product name and price are required.');
                document.location.href = 'insert_product.php'; // Redirect to the same insert page
            </script>";
        exit;
    }

    $query = "INSERT INTO produk (nama_produk, harga, kategori, foto_produk) 
              VALUES ('$nama_produk', '$harga', '$kategori', $foto_produk)";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "
            <script>
                alert('Product added successfully!');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "
            <script>
                alert('Failed to add product!');
                document.location.href = 'kasihsayangadmin.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit.css" />
    <title>Insert Product</title>
</head>
<body>
    <div class="container">
        <a href="product_list.php">
            <button class="back">
                <p>Back</p>
            </button>
        </a>
    </div>

    <div class="logon">
    <form action="uploadfotoproduk.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_produk" value="<?php echo $produk['id_produk']; ?>">

        <label for="foto_produk" class="phototext">Upload Product Picture:</label>
        <input type="file" name="foto_produk" id="foto_produk" accept="uploads/*" required>

        <div class="input-field">
            <label for="nama_produk" class="label-field">Product Name</label>
            <input type="text" name="nama_produk" id="nama_produk" required>
        </div>

        <div class="input-field">
            <label for="harga" class="label-field">Price</label>
            <input type="number" name="harga" id="harga" required>
        </div>

        <div class="input-field">
            <label for="kategori" class="label-field">Category</label>
            <select name="kategori" id="kategori" required>
                <option value="">--Select a Category--</option>
                <option value="Engine Parts">Engine Parts</option>
                <option value="Exhaust System">Exhaust System</option>
                <option value="Cooling">Cooling</option>
                <option value="Intake">Intake</option>
                <option value="Fuel System">Fuel System</option>
                <option value="Oil">Oil</option>
                <option value="Electronics">Electronics</option>
                <option value="Suspension">Suspension</option>
                <option value="Forced Induction">Forced Induction</option>
            </select>
        </div>

        <input type="submit" value="Tambah" name="tambah" class="button">
    </form>

    <?php if (!empty($produk['foto_produk'])): ?>
        <div class="delete-photo">
            <p>Current Product Picture:</p>
            <img src="http://localhost/posttest6/uploads/<?php echo htmlspecialchars($produk['foto_produk']); ?>" alt="Product Picture" width="150" height="150">
            <form action="deletekasihsayangadmin.php" method="post">
                <input type="hidden" name="id_produk" value="<?php echo $produk['id_produk']; ?>">
                <input type="hidden" name="current_photo" value="<?php echo htmlspecialchars($produk['foto_produk']); ?>">
                <input type="submit" name="delete_photo" value="Delete Photo" class="button" onclick="return confirm('Are you sure you want to delete this photo?');">
            </form>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
