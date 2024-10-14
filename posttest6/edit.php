<?php
require 'koneksi.php';

if (isset($_GET['id_pelanggan'])) {
    $id = $_GET['id_pelanggan'];
} else {
    echo "
        <script>
            alert('No user ID found!');
            document.location.href = 'userpage.php';
        </script>";
    exit;
}

$query = "SELECT * FROM pelanggan WHERE id_pelanggan = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $pelanggan = mysqli_fetch_assoc($result);
} else {
    echo "
        <script>
            alert('User not found!');
            document.location.href = 'userpage.php';
        </script>";
    exit;
}

if (isset($_POST['tambah'])) {
    $email = $_POST['email'];
    $username = $_POST['nama_pelanggan'];
    $pass = $_POST['pass'];
    $umur = $_POST['umur'];
    $nick = $_POST['nickname'];

    if (empty($email) || empty($username) || empty($pass)) {
        echo "
            <script>
                alert('Invalid input! All fields are required.');
                document.location.href = 'edit.php?id_pelanggan=$id'; // Redirect to the same edit page
            </script>";
        exit;
    }

    $query = "UPDATE pelanggan 
              SET email='$email', nama_pelanggan='$username', pass='$pass', umur='$umur', nickname='$nick' 
              WHERE id_pelanggan=$id";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "
            <script>
                alert('Successfully updated user data!');
                document.location.href = 'userpage.php'; // Redirect to user page after success
            </script>";
    } else {
        echo "
            <script>
                alert('Failed to update user data!');
                document.location.href = 'edit.php?id_pelanggan=$id'; // Stay on edit page in case of failure
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
    <title>Edit User</title>
</head>
<body>
        <div class="container">
            <a href="userpage.php">
                <button class="back">
                    <p>Back</p>
                </button>
            </a>
        </div>

        

            

        <div class="logon">
            <div class="profile-photo">
                <?php
                if (!empty($pelanggan['foto'])): ?>
                    <img src="http://localhost/posttest5/uploads/<?php echo htmlspecialchars($pelanggan['foto']); ?>" alt="Profile Picture" width="150" height="150">
                <?php endif; ?>
            </div>
            <form action="upload_photo.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan['id_pelanggan']; ?>">
                <label for="foto" class="phototext">Upload Profile Picture:</label>
                <input type="file" name="foto" id="foto" accept="uploads/*" required>
                <input type="submit" name="upload_photo" value="Upload Photo" class="button">
            </form>
            <form action="" method="post">

                <div class="input-field">
                    <label for="nama" class="label-field">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $pelanggan['email'] ?>" required>
                </div>
                <div class="input-field">
                    <label for="nim" class="label-field">Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" id="nama_pelanggan" value="<?php echo $pelanggan['nama_pelanggan'] ?>" required>
                </div>
                <div class="input-field">
                    <label for="nama" class="label-field">Password</label>
                    <input type="text" name="pass" id="pass" value="<?php echo $pelanggan['pass'] ?>" required>
                </div>
                <div class="input-field">
                    <label for="nim" class="label-field">Umur</label>
                    <input type="number" name="umur" id="umur" value="<?php echo $pelanggan['umur'] ?>" required>
                </div>
                <div class="input-field">
                    <label for="nama" class="label-field">Nickname</label>
                    <input type="text" name="nickname" id="nickname" value="<?php echo $pelanggan['nickname'] ?>" required>
                </div>
                <input type="submit" value="Tambah" name="tambah" class="button">
            </form>
        </div>
    </main>
</body>
</html>