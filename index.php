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
      <a href="pengaturan.php?id=<?= $_SESSION['id']?>" class="w-5 h-5 btn btn-sm btn-primary" type="submit" >Pengaturan</a>
      <a class="w-5 h-5 btn btn-sm btn-primary" type="submit" href="pertanyaan.php">Tanyakan</a>
      <a class="w-5 h-5 btn btn-sm btn-danger" type="submit" href="logout.php">Log Out</a>
      </nav>
  </header>

   <main class="container">
     <div class="row">
        <div class="colo-lg-12">
          <h4>Selamat Datang,
          <?php echo $_SESSION['username']; ?></a>!
          </h4>
          <div class="mb-3">
        </div>
     </div>
     <hr style="margin:10px">
     <div class="row">
       <div class="col-lg-12">
          <?php
             $query = "SELECT * FROM pernyataan";
             $result = mysqli_query($conn, $query);
             while(
               $row = mysqli_fetch_assoc($result)) :?>

          <div style="background-color: #e7f3fe;border-top: 4px solid #2196F3;">
            <p style="margin-left: 10px;">
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
     <div class="row">
       <div class="col-lg-12">
          <?php
             $query = "SELECT * FROM pertanyaan ORDER BY id_prtyn DESC"; //mengambil data pertanyaan dari database dari urutan paling baru
             $result = mysqli_query($conn, $query);
             while(
               $row = mysqli_fetch_assoc($result)) :?>
          
          <p>
          <b><?= $row['username_prtyn'] ?></b> |
          <?= $row['waktu_prtyn'] ?><br>
          <b>Kategori : </b><?= $row['kategori'] ?><br>
          <?= $row['isi_prtyn'] ?><br>
          <a href="jawaban.php?id=<?= $row['id_prtyn']; ?>">Diskusi</a>  
          <?php
          if ($_SESSION['id'] == $row['id_user']) //fitur hapus hanya dapat dihapus oleh pembuat pertanyaan
          {?>
          | <a href="hapus.php?id=<?= $row['id_prtyn']; ?>">Hapus</a>
          <?php }?>
          <hr>
        </p>
        <?php endwhile; ?>
       </div>
     </div>
   </main>
  </body>
</html>
