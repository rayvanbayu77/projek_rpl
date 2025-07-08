<?php 
 
include 'config.php';

 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['login'])) {
    header("Location: login.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username, email, password)
                    VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!'); document.location.href = 'login.php';</script>" ;
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Email Sudah Terdaftar.')</script>";
        }
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/pricing/">
    <link href='https://fonts.googleapis.com/css?family=Figtree' rel='stylesheet'>
    <link href="css/auth.css" rel="stylesheet" >
    <title>Register RuangBicara</title>
</head>
<body>
    
    <div class="register-box">
        <form action="" method="POST">
        <div class="register-header">
            <img src="css/LogoFix.png" alt="">
            </div>
        <h4 style="color: #f7418f" class="register-title"><a class="register-title-unactive" href="login.php">Masuk</a> Daftar</h4>
        <hr class="lining">
            <div class="input-field">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-field">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-field">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-field">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="submit">Daftar</button>
            </div>
        </form>
    </div>
    </body>
</html>