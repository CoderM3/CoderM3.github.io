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
        <form action="index.php" method="POST" id="login-user">
            <label for="mail"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>
            
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
