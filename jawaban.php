<?php 

session_start();

include 'config.php';

if (empty($_SESSION['login']))
	header("Location: login.php");


  if (isset($_POST['submit_jwbn'])) {
    $isi_jwbn = $_POST['isi_jwbn'];
    $username_jwbn = $_POST['username_jwbn'];
    $user_id = $_POST['user_id'];
    $id_prtyn = $_GET['id'];

    $sql = "SELECT * FROM jawaban INNER JOIN pertanyaan
            ON jawaban.id_prtyn = pertanyaan.id_prtyn WHERE isi_jwbn = '$isi_jwbn'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO jawaban (isi_jwbn, username_jwbn, user_id, id_prtyn)
        VALUES ('$isi_jwbn', '$username_jwbn', '$user_id', $id_prtyn)";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $isi_jwbn = "";
            $username_jwbn = "";
            $user_id = "";
        } else {
                echo "<script>alert('Terjadi kesalahan.')</script>";
        }
    }
}

?>

<!doctype html>
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
        <a class="btn-main" type="submit" href="index.php">Home</a>
      </nav>
  </header>

  <body>
   <main class="container">
       <?php
        $id_prtyn = $_GET['id'];
        global $conn;
        $sql = $conn->query(query: "SELECT * FROM pertanyaan WHERE id_prtyn = $id_prtyn") or die(mysqli_error($conn));
        $data = $sql->fetch_assoc();
       ?>
       <br>
       <b style="padding-top: 20px;"><?= $data['username_prtyn'] ?></b> |
          <?= $data['waktu_prtyn'] ?><br>
          <b>Kategori : </b><?= $data['kategori'] ?><br>
          <?= $data['isi_prtyn'] ?>
          
          <label for="isi_pertanyaan" name="isi_pertanyaan" id="isi_pertanyaan"></label>
       <br><hr>

        <form class="form" method="POST" action="">
          <input type="hidden" name="username_jwbn" value="<?php echo $_SESSION['username']; ?> " readonly>
          <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?> " readonly>
          <b>Tulis Jawabanmu</b>
            <div class="mb-3">
              <textarea name="isi_jwbn" placeholder="Ketikannya tolong diperhatikan yaaa" class="form-control" value="<?php echo $isi_jwbn; ?>" minlength="5" required></textarea>
            </div>
            <div class="mb-3">
              <button type="submit" class="btn-main" name="submit_jwbn">Jawab</button>
            </div>
          </form>
     <br><br>
     <hr>
        <b>Riwayat Jawaban</b>
        <p>
        <?php
             $query = "SELECT * FROM jawaban WHERE id_prtyn = " . $data['id_prtyn'] . " ORDER BY id_jwbn DESC "; 
             $res = mysqli_query($conn, $query);
             while(
               $row = mysqli_fetch_assoc($res)) :?>
               
          <b>
          <?= $row['username_jwbn'] ?></b> |
          <?= $row['waktu_jwbn'] ?><br>
          <?= $row['isi_jwbn'] ?><br>
          <?php
          if ($_SESSION['id'] == $row['user_id'])
          {?>
          <a class="btn-del" href="hapus_jawaban.php?id=<?= $row['id_jwbn']; ?>">Hapus</a>
          <?php }?>
          
        </p>
        <br>
        <hr>
        <?php endwhile; ?>
   </main>
  </body>
</html>
