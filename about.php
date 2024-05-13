<?php

session_start();

if (empty($_SESSION['login']))
	header("Location: login.php"); //cek status login user, jika belum akan diarahkan ke laman login

include "config.php"; 

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
          <h4>TENTANG KAMI</h4>
          <hr>
          <b><p>Latar Belakang : </p></b>
          <p> &emsp; &emsp; iVEls merupakan sebuah web-application yang dibuat sebagai platform yang menyediakan ruang bagi para programmer untuk memperoleh informasi seputar pemrogramman, terutama untuk bahasa pemrogramman Python, PHP, Java, C++, dan MySQL. Untuk bahasa pemrogramman yang belum tersedia akan menyusul di update yang akan datang.</p>
          <br>
          <b><p>Mengapa iVEls ? </p></b>
          <p> &emsp; &emsp; Kenapa iVEls? Karena iVEls merupakan referensi dari sebuah nama yang spesial bagi developer. Selain itu iVEls juga merupakan cara pengucapan dari pengondisian “if-else” yang merupakan sebuah perintah dasar pada pemrogramman.</p>
          <hr>
          
          <p>Contact : </p>
          <a href="instagram.com">Instagram</a>
          <a href="linkedin.com">Linkedin</a>
          <a href="youtube.com">YouTube</a>
      

        </div>
    </div>
   </main>
  </body>
</html>
