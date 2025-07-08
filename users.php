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
    <title>RuangBicara</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/pricing/">
    <link href='https://fonts.googleapis.com/css?family=Figtree' rel='stylesheet'>
    <link href="css/main.css" rel="stylesheet" >
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" >
  </head>

  <header class="topnav">
    <img src="css/LogoFix-sm.png" alt="">
      <nav class="">
        <a class="btn-out" type="submit" href="logout.php">Log Out</a>
        <a class="btn-main" type="submit" href="indexAdmin.php">Home</a>
      </nav>
  </header>

  <body>
   <div class="container">
          <p class="greets">Daftar Pengguna :</p>
          <div class="mb-3">
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
   </div>
  </body>
</html>
