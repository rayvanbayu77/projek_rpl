<?php

session_start();

include 'config.php'; //untuk cek ke koneksi database

if (empty($_SESSION['login']))
	header("Location: login.php"); //untuk cek status login user, apabila belum maka akan diarahkan ke laman login

    if ($_SESSION['username'] != "Admin")
  header("Location: index.php");
?> 

<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
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
    <a style="color: black; text-decoration: none;" class="h5 my-0 me-md-auto fw-normal">iVEls</a>
      <nav class="my-2 my-md-0 me-md-3">
      <a class="w-5 h-5 btn btn-sm btn-primary" type="submit" href="indexAdmin.php">Home</a>
      <a class="w-5 h-5 btn btn-sm btn-danger" type="submit" href="logout.php">Log Out</a>
      </nav>
  </header>

   <main class="container">
     <div class="row">
        <div class="colo-lg-12">
          <h4>Daftar Pengguna : </a>
          </h4>
          <div class="mb-3">
        </div>
     </div>
     <hr style="margin:10px">
     <div class="row">
       <div class="col-lg-12">
         <p>
          <?php
             $query = "SELECT * FROM users ORDER BY id ASC";
             $result = mysqli_query($conn, $query);
             while(
               $row = mysqli_fetch_assoc($result)) :?>
               
               <table style="width:100%">
                <style>table, tr, th, td {
                    border: 1px solid black;
                    border-radius: 2px;
                    }
                </style>
                <tr>
                    <th style="width:40%">Username</th>
                    <th style="width:40%">Email</th>
                    <th style="width:20%">Opsi</th>
                </tr>
                <tr>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><a href="hapus_user.php?id=<?= $row['id']; ?>">Hapus</a></td>
                </tr>
               </table>
        </p>
        <?php endwhile; ?>
       </div>
     </div>
   </main>
  </body>
</html>
