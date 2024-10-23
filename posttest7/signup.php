<?php
require 'koneksi.php';

if (isset($_POST['tambah'])) {
    $email = $_POST['email'];
    $username = $_POST['nama_pelanggan'];
    $pass = $_POST['pass'];

    $cekEmailQuery = "SELECT * FROM pelanggan WHERE email = '$email' OR nama_pelanggan = '$username'";
    $cekEmailResult = mysqli_query($conn, $cekEmailQuery);

    if (mysqli_num_rows($cekEmailResult) > 0) {
        echo "
            <script>
                alert('Email atau Nama sudah diambil!');
                document.location.href = 'signup.php';
            </script>";
    } else {
        $query = "INSERT INTO pelanggan VALUES ('','$email', '$username', '$pass', '', '', '')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "
                <script>
                    alert('Selamat datang!');
                    document.location.href = 'login.php';
                </script>";
        } else {
            echo "
                <script>
                    alert('Signup gagal!');
                    document.location.href = 'signup.php';
                </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Kanit">
    <link rel="stylesheet"  href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>

<?php require("navbarlogin.php"); ?>

    <div class="logon">
        <form action="" method="POST" id="login-user">
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>
            
            <label for="nama_pelanggan"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="nama_pelanggan" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pass" required>
            
            <button type="submit" name="tambah">Sign Up</button>
        </form>
        <a href="login.php">Back to Login</a>
    </div>
</body>
</html>