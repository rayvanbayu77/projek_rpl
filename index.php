<?php

session_start();

include 'config.php'; //untuk cek ke koneksi database

if (empty($_SESSION['login']))
	header("Location: login.php"); //untuk cek status login user, apabila belum maka akan diarahkan ke laman login
?> 


<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>RuangBicara</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/pricing/">
    <link href='https://fonts.googleapis.com/css?family=Figtree' rel='stylesheet'>
    <link href="css/main.css" rel="stylesheet" >
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" >
    
  </head>
  <body>

    <header class="topnav">
    <img src="css/LogoFix-sm.png" alt="">
      <nav class="">
      <a type="submit" class="btn-out" href="logout.php">Log Out</a>
      <a type="submit" class="btn-main" href="pertanyaan.php">Tanyakan</a>
      <a href="pengaturan.php?id=<?= $_SESSION['id']?>" type="submit" class="btn-main" >Pengaturan</a>
      </nav>
  </header>

   <main class="container">
     <div class="row">
        <div class="greets">
          <p>Selamat Datang,
          <?php

          include 'class.php';

          $objek = new pengguna();
          $objek->user();

          ?>!
          </p>
     </div>
     <div class="">
       <div class="announce">
          <?php
             $query = "SELECT * FROM pernyataan";
             $result = mysqli_query($conn, $query);
             while(
               $row = mysqli_fetch_assoc($result)) :?>

          <div style="background-color:rgb(252, 252, 252);border-top: 4px solid #f7418f;border-radius: 3px;box-shadow: 1px 3px 5px 1px rgba(0, 0, 0, 0.1); width: 1320px;">
            <p style="margin-left: 10px;margin-top: 10px;">
            <b>Pemberitahuan !</b><br>
            <b>Admin</b> |
            <?= $row['waktu_pernyataan'] ?><br>
            <?= $row['isi_pernyataan'] ?><br>
            <br>
            </div>
            <hr>
        </p>
        <?php endwhile; ?>
       </div>
     </div>
          <?php
             $query = "SELECT * FROM pertanyaan ORDER BY id_prtyn DESC"; //mengambil data pertanyaan dari database dari urutan paling baru
             $result = mysqli_query($conn, $query);
             while(
               $row = mysqli_fetch_assoc($result)) :?>
          <div class="qst-list">
          <p>
          <b><?= $row['username_prtyn'] ?></b> |
          <?= $row['waktu_prtyn'] ?><br>
          <b>Kategori : </b><?= $row['kategori'] ?><br>
          <?= $row['isi_prtyn'] ?><br>
          <a class="btn-resp" href="jawaban.php?id=<?= $row['id_prtyn']; ?>">Diskusi</a>  
          <?php
          if ($_SESSION['id'] == $row['id_user']) //fitur hapus hanya dapat dihapus oleh pembuat pertanyaan
          {?>
          <a class="btn-del" href="hapus.php?id=<?= $row['id_prtyn']; ?>">Hapus</a>
          <?php }?>
          </div>
        </p>
        <hr>
        <?php endwhile; ?>
   </main>
  </body>
</html>
