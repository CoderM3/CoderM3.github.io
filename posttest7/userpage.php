<?php
session_start();
require "koneksi.php";

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $sql = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = '$user_id'");
    $pelanggan = mysqli_fetch_assoc($sql);

    if (!$pelanggan) {
        echo "
            <script>
                alert('User not found!');
                document.location.href = 'login.php';
            </script>";
        exit;
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
    <link rel="stylesheet"  href="userpage.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
</head>
<body>

<?php require("navbaruserpage.php"); ?>

<div class="main">
    <h2>IDENTITY</h2>
    <div class="card">
        <div class="card-body">

        <a href="edit.php?id_pelanggan=<?php echo $pelanggan['id_pelanggan']; ?>">
            <i class="fa fa-pen fa-xs edit"></i>
        </a>
            <table>
                <tbody>
                    <tr>
                        <td>Foto</td>
                        <td>:</td>
                        <td><img src="uploads/<?php echo $pelanggan['foto'] ?>" alr="<?php echo $pelanggan['foto'] ?>" width="80px" height="100px" style="display: block, margin:0 auto;"></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td><?php echo htmlspecialchars($pelanggan['nama_pelanggan']); ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo htmlspecialchars($pelanggan['email']); ?></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><?php echo htmlspecialchars($pelanggan['pass']); ?></td>
                    </tr>
                    <tr>
                        <td>Umur</td>
                        <td>:</td>
                        <td><?php echo htmlspecialchars($pelanggan['umur']); ?></td>
                    </tr>
                    <tr>
                        <td>Nickname</td>
                        <td>:</td>
                        <td><?php echo htmlspecialchars($pelanggan['nickname']); ?></td>
                    </tr>
                </tbody>
            </table>
            <!--tombol nuke akun -->
            <form action="delete_account.php" method="post" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                <input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan['id_pelanggan']; ?>">
                <input type="submit" name="delete_account" value="Delete Account" class="button delete">
            </form>
        </div>
        <a href="logot.php">
            <button class="logout">
            <p>Logout</p>
            </button>
        </a>
    </div>
</div>

<script src="scripts.js"></script>
</body>
</html>