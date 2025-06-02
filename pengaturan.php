<?php

session_start();

if (empty($_SESSION['login']))
	header("Location: login.php"); //cek status login user, jika belum akan diarahkan ke laman login

include "config.php"; 


$id = $_GET['id'];

global $conn;
$sql = $conn->query("SELECT * FROM users WHERE id = $id") or die(mysqli_error($conn));
$editSql = $sql->fetch_assoc();

if(isset($_POST['submit_edit'])) {
	$email =$_POST['email'];

	$sql = $conn->query("UPDATE users SET email = '$email' WHERE id = $id") or die(mysqli_error($conn));
	if($sql) {
		echo "
        <script>alert('Profile diupdate! Silahkan login kembali :)');
        document.location.href = 'logout.php';
        </script>";
	} else {
		echo "<script>alert('Terjadi kesalahan');
        document.location.href = 'index.php';
        </script>";
	}
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>RuangBicara</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/pricing/">
    <link href="css/main.css" rel="stylesheet" >
    <link href='https://fonts.googleapis.com/css?family=Figtree' rel='stylesheet'>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" >
  </head>

  <header class="topnav">
    <img src="css/LogoFix-sm.png" alt="">
      <nav class="">
        <a class="btn-out" type="submit" href="logout.php">Log Out</a>
        <a class="btn-main" type="submit" href="index.php">Home</a>
      </nav>
  </header>

  <body>
   <main class="container">
     <div class="row">
        
        <div class="greets">
          <p>Edit Profile</p>
          </div>
          <hr>
          <form action="" method="POST" >
            <p class="h5 my-0 me-md-auto fw-normal">Email</p>
            <div class="input-group">
                <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $editSql['email']?>">
            </div>
            <br>
            <div class="mb-3">
              <button type="submit" class="btn-resp" name="submit_edit">Simpan</button>
            </div>
          </form>
    </div>
   </main>
  </body>
</html>
