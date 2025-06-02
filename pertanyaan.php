<?php 

session_start();

include 'config.php';

if (empty($_SESSION['login']))
	header("Location: login.php");

if (isset($_POST['submit_prtyn'])) {
    $isi_prtyn = $_POST['isi_prtyn'];
    $username_prtyn = $_POST['username_prtyn'];
    $id_user = $_POST['id_user'];
    $kategori = $_POST['kategori'];

    $sql = "SELECT * FROM pertanyaan WHERE isi_prtyn='$isi_prtyn'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO pertanyaan (isi_prtyn, username_prtyn, id_user, kategori)
        VALUES ('$isi_prtyn', '$username_prtyn', '$id_user', '$kategori')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $isi_prtyn = "";
            $username_prtyn = "";
            $id_user = "";
            $kategori = "";
            echo "<script>alert('Pertanyaan berhasil dibuat'); document.location.href = 'index.php';</script>" ;
           
        } else {
                echo "<script>alert('Terjadi kesalahan.')</script>";
        }
    }
}

//tanda '@' line 67 buat exception bug error undevined variable, php gaje

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
   <div class="container">
        <form method="post" action="">
          <p class="greets">Tulis Pertanyaan</p><hr>
          <input type="hidden" name="username_prtyn" value="<?php echo $_SESSION['username']; ?> " readonly>
          <input type="hidden" name="id_user" value="<?php echo $_SESSION['id']; ?> " readonly>
          <b> Tuliskan Pertanyaanmu Disini : </b>
            <div class="mb-3">
            <textarea name="isi_prtyn" placeholder="Ketikannya tolong diperhatikan yaaa" class="form-control" value="<?php echo $isi_prtyn; ?>" required> </textarea>
            </div>

            <b>Kategori Pertanyaan :</b><br>
            <input type="radio" name="kategori" value="Musik">Musik <br>
            <input type="radio" name="kategori" value="Film">Film <br>
            <input type="radio" name="kategori" value="Fashion">Fashion <br>
            <input type="radio" name="kategori" value="Pembelajaran">Pembelajaran <br>
            <input type="radio" name="kategori" value="Travel">Travel <br>
            <input type="radio" name="kategori" value="Lainnya">Lainnya <br><br>
            <div class="mb-3">
            <button name="submit_prtyn" class="btn-resp" type="submit" >Buat Pertanyaan</button>
            </div>
          </form>
   </div>
  </body>
</html>
