<?php
session_start();
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['nama_pelanggan'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM pelanggan WHERE nama_pelanggan = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($row['pass'] == $pass) {
            $_SESSION['user_id'] = $row['id_pelanggan'];
            $_SESSION['nama_pelanggan'] = $row['nama_pelanggan'];

            echo "
                <script>
                    alert('Login successful!');
                    document.location.href = 'userpage.php';
                </script>";
        } else {
            echo "
                <script>
                    alert('Invalid password!');
                    document.location.href = 'login.php';
                </script>";
        }
    } else {
        echo "
            <script>
                alert('Username not found!');
                document.location.href = 'login.php';
            </script>";
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
    <title>Login</title>
</head>
<body>

    <?php require("navbarlogin.php"); ?>

    <div class="logon">
        <form action="login.php" method="POST" id="login-user">
            <label for="nama_pelanggan"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="nama_pelanggan" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pass" required>
            
            <button type="submit">Login</button>
        </form>
            <a href="signup.php">Sign up</a>
    </div>
</body>
</html>
