<?php 
 
include 'config.php'; // Cek koneksi ke config.php
 
error_reporting(0);
 
session_start(); 
 


if (isset($_SESSION['login'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = true;
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['password'] = md5($row['$password']);
        $_SESSION['email'] = $row['email'];
        header("Location: index.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }

    if ($_SESSION['username']=='Admin'){
        header("Location: indexAdmin.php");
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
 
    <title>Login iVEls</title>
</head>
<body>
    <div role="alert">
        <?php echo $_SESSION['error']?>
    </div>
 
    <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white  border-bottom shadow-sm">
        <p class="h5 my-0 me-md-auto fw-normal">iVEls</p>
    </header>

    <div class="container">
        <form action="" method="POST" class="login-email">
        <div class="row">
            <div class="colo-lg-12">
            <h4>Login</h4>
                <div class="mb-3">
                </div>
            </div>
        </div>
        <hr style="margin:10px">
            <div class="input-group mb-2">
                <input type="email" class="form-control-sm" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group mb-2">
                <input type="password" class="form-control-sm" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn btn-primary float-start">Login</button>
            </div>
            <p>Anda belum punya akun? <a href="register.php">Register</a></p>
        </form>
    </div>
</body>
</html>