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
    <a style="color: black; text-decoration: none;" class="h5 my-0 me-md-auto fw-normal">iVEls</a>
      <nav class="my-2 my-md-0 me-md-3">
        <a class="w-5 h-5 btn btn-sm btn-primary" type="submit" href="indexAdmin.php">Home</a>
        <a class="w-5 h-5 btn btn-sm btn-danger" type="submit" href="logout.php">Log Out</a>
      </nav>

  </header>
   <main class="container">
     <div class="row">
        <div class="colo-lg-12">
        <form class="form" method="post" action="">
          <h4>Tulis Pernyataan</h4>
          <p>Buat pernyataan, kabarkan berita penting untuk pengguna membacanya</p><hr>
          <div class="mb-3">
          <input type="hidden" value="Admin" readonly>
            </div>
          <b> Tuliskan Pernyataan Disini : </b>
            <div class="mb-3"><br>
              <textarea class="form-control" placeholder="Tulis hal penting saja yaaa" name="isi_pernyataan" value="<?php echo $isi_pernyataan; ?>" required></textarea>
            </div>
            <div class="mb-3">
            <button name="submit_pernyataan" class="w-20 btn btn-md btn-primary"  type="submit" >Buat Pertanyaan</button>
            </div>
            </form>
        </div>
     </div>
   </main>
  </body>
</html>
