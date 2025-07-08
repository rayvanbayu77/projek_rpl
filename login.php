<?php 
 
include 'config.php';
 
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/pricing/">
    <link href='https://fonts.googleapis.com/css?family=Figtree' rel='stylesheet'>
    <link href="css/auth.css" rel="stylesheet" >
    <title>Login RuangBicara</title>
</head>
<body>
    
    <div role="alert">
        <?php echo $_SESSION['error']?>
    </div>

    <div class="register-box">
        <form action="" method="POST">
        <div class="register-header">
            <img src="css/LogoFix.png" alt="">
            </div>
            <h4 style="color: #f7418f" class="register-title">Masuk <a  class="register-title-unactive" href="register.php">Register</a></h4>
            <hr class="lining">
            <div class="input-field">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-field">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <div><button name="submit" class="submit">Masuk</button>
                </div>
            </div>
        </form>
    </div>
    </body>
</html>