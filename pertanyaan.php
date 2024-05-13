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
    <link href="styles/pricing.css" rel="stylesheet">
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
        <form class="form" method="post" action="">
          <h4>Tulis Pertanyaan</h4><hr>
          <div class="mb-3">
          <input type="hidden" name="username_prtyn" value="<?php echo $_SESSION['username']; ?> " readonly>
          <input type="hidden" name="id_user" value="<?php echo $_SESSION['id']; ?> " readonly>
            </div>
          <b> Tuliskan Pertanyaanmu Disini : </b>
            <div class="mb-3"><br>
              <textarea class="form-control" placeholder="Ketikannya tolong diperhatikan yaaa" name="isi_prtyn" value="<?php echo $isi_prtyn; ?>" required></textarea>
            </div>
            <input type="radio" name="kategori" value="Python">Python <br>
            <input type="radio" name="kategori" value="PHP">PHP <br>
            <input type="radio" name="kategori" value="Java">Java <br>
            <input type="radio" name="kategori" value="Java">C++ <br>
            <input type="radio" name="kategori" value="Java">MySQL <br>
            <input type="radio" name="kategori" value="Java">Other <br><br>
            <div class="mb-3">
            <button name="submit_prtyn" class="w-20 btn btn-md btn-primary"  type="submit" >Buat Pertanyaan</button>
            </div>
            </form>
        </div>
     </div>
   </main>
  </body>
</html>
