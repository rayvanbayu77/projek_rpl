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
    <link href="css/pricing.css" rel="stylesheet" >
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" >
 
    <title>Register iVEls</title>
</head>
<body>

<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white  border-bottom shadow-sm">
        <p class="h5 my-0 me-md-auto fw-normal">iVEls</p>
    </header>

    <div class="container">
        <form action="" method="POST" class="login-email">
        <div class="row">
            <div class="colo-lg-12">
            <h4>Register</h4>
                <div class="mb-3">
                </div>
            </div>
        </div>
        <hr style="margin: 10px;">
            <div class="input-group mb-2">
                <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group mb-2">
                <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group mb-2">
                <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group mb-2">
                <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn btn-primary float-start">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="login.php">Login </a></p>
        </form>
    </div>
</body>
</html>