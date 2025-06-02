<?php 

session_start();

include 'config.php';

if (empty($_SESSION['login']))
	header("Location: login.php");

  if ($_SESSION['username'] != "Admin")
  header("Location: index.php");

if (isset($_POST['submit_pernyataan'])) {
    $isi_prtyn = $_POST['isi_pernyataan'];

    $sql = "SELECT * FROM pernyataan WHERE isi_pernyataan='$isi_pernyataan'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO pernyataan (isi_pernyataan)
        VALUES ('$isi_prtyn')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $isi_prtyn = "";
            if ($_SESSION['username'] == "Admin"){
            header("Location: indexAdmin.php");
            }
          else {
            header("Location: index.php");
          }
          echo "<script>alert('Pernyataan berhasil dibuat'); document.location.href = 'indexAdmin.php';</script>" ;
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
    <link href='https://fonts.googleapis.com/css?family=Figtree' rel='stylesheet'>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/pricing/">
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
      </nav>

  </header>
  <body>
   <div class="container">
        <form class="form" method="post" action="">
        <p class="greets">Tulis Pertanyaan</p>
          <p>Buat pernyataan, kabarkan berita penting untuk pengguna membacanya</p><hr>
          <div class="mb-3">
          <input type="hidden" value="Admin" readonly>
            </div>
          <b> Tuliskan Pernyataan Disini : </b>
            <div class="mb-3"><br>
              <textarea class="form-control" placeholder="Tulis hal penting saja yaaa" name="isi_pernyataan" value="<?php echo $isi_pernyataan; ?>" required></textarea>
            </div>
            <div class="mb-3">
            <button name="submit_pernyataan" class="btn-resp"  type="submit" >Buat Pernyataan</button>
            </div>
            </form>
        </div>
  </body>
</html>
