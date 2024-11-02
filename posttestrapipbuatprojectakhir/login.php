<?php 

session_start();
require("koneksi.php");

$_SESSION['login'] = true; // Atau set sesuai dengan data login pengguna


if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username' ";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $hashed_password = $user['password'];

        if (password_verify($password, $hashed_password)) {
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            echo "<script>
            alert('Login Berhasil');
            document.location.href = 'index.php';
            </script>";

        } else {
            echo "<script>
            alern('Password Salah');
            document.location.href = 'login.php';
            </script>";
        }
    } else {
        echo "<script>
        alert('Username Tidak Ditemukan');
        document.location.href = 'login.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="style/login.css" >
</head>
<body> 
    <div class="login-container" >
        <div class="login-box">
            <h1>Selamat Datang Di 3Senar</h1>
            <h2>Silahkan login</h2>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email"  placeholder="name@gmail.com" required>
                <input type="password" name="password" placeholder="Password" required>
                <div class="sub-option">
                    <div class="remember-me">
                        <input type="checkbox" id="remember">
                        <label for="remember">Ingatkan Saya</label>
                    </div>
                    <div class="forgot">
                         <a href="#">Lupa Password?</a>
                    </div>
                </div>
                <button type="submit" >Login</button>
            </form>
            <p>Tidak punya akun? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>
</body>
</html>