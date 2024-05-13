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
	$password = md5($_POST['password']);
	$email =$_POST['email'];

	$sql = $conn->query("UPDATE users SET password = '$password', email = '$email' WHERE id = $id") or die(mysqli_error($conn));
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
    <title>iVEls</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/pricing/">
    <link href="css/pricing.css" rel="stylesheet" >
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" >

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <link href="css/pricing.css" rel="stylesheet">
  </head>
  <body>

  <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white  border-bottom shadow-sm">
  <a style="color: black; text-decoration: none;" class="h5 my-0 me-md-auto fw-normal" href="about.php">iVEls</a>
      <nav class="my-2 my-md-0 me-md-3">
      <a class="w-5 h-5 btn btn-sm btn-primary" type="submit" href="index.php">Home</a>
        <a class="w-5 h-5 btn btn-sm btn-danger" type="submit" href="logout.php">Log Out</a>
      </nav>
  </header>


   <main class="container">
     <div class="row">
        
        <div class="colo-lg-12">
          <h4>Edit Profile</h4>
          <hr>
          
          <form action="" method="POST" >
            
            <br>
            <p class="h5 my-0 me-md-auto fw-normal">Password</p>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Masukkan password baru" name="password" value="">
            </div>
            <br>
            <p class="h5 my-0 me-md-auto fw-normal">Email</p>
            <div class="input-group">
                <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $editSql['email']?>">
            </div>
            <br>
        <br>
            <div class="mb-3">
              <button type="submit" class="btn btn-primary float-start" name="submit_edit">Simpan</button>
            </div>
          </form>
        </div>
    </div>
   </main>
  </body>
</html>
