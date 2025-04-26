<?php 

session_start();

include 'config.php';

if (empty($_SESSION['login']))
	header("Location: login.php");

if ($_SESSION['username'] != "Admin")
  header("Location: index.php");

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

    

    <!-- Custom styles for this template -->
    <link href="css/pricing.css" rel="stylesheet">
  </head>
  <body>

    <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white  border-bottom shadow-sm">
    <a style="color: black; text-decoration: none;" class="h5 my-0 me-md-auto fw-normal" >iVEls</a>
      <nav class="my-2 my-md-0 me-md-3">
      <a class="w-5 h-5 btn btn-sm btn-primary" type="submit" href="indexAdmin.php">Home</a>
      <a class="w-5 h-5 btn btn-sm btn-danger" type="submit" href="logout.php">Log Out</a>
      </nav>
  </header>

   <main class="container">
   
     <div class="row">
       <div class="col-lg-12">
       <?php
        $id_prtyn = $_GET['id'];
        global $conn;
        $sql = $conn->query("SELECT * FROM pertanyaan WHERE id_prtyn = $id_prtyn") or die(mysqli_error($conn));
        $data = $sql->fetch_assoc();
       ?>
       <b><?= $data['username_prtyn'] ?></b> |
          <?= $data['waktu_prtyn'] ?><br>
          <?= $data['isi_prtyn'] ?>
       <div class="row">
        <div class="col-lg-12">
          <label for="isi_pertanyaan" name="isi_pertanyaan" id="isi_pertanyaan"></label>
        </div>
       </div>
       <br><hr>
       </div>
     </div>
     <div class="row">
        <div class="colo-lg-12">
        <form class="form" method="POST" action="">
          <input type="hidden" name="username_jwbn" value="<?php echo $_SESSION['username']; ?> " readonly>
          <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?> " readonly>
          <b>Tulis Jawabanmu</b>
            <div class="mb-3">
            <textarea name="isi_jwbn" placeholder="Ketikannya tolong diperhatikan yaaa" class="form-control" value="<?php echo $isi_jwbn; ?>" required></textarea>
            </div>
            <div class="mb-3">
              <input type="submit" class="btn btn-primary float-end" value="Jawab" name="submit_jwbn">
            </div>
          </form>
        </div>
     </div>
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
          <a href="hapus_jawaban_admin.php?id=<?= $row['id_jwbn']; ?>">Hapus</a>
        </p>
        <hr>
        <?php endwhile; ?>
   </main>
  </body>
</html>
