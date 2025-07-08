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

    // Cek apakah pertanyaan sudah pernah dibuat
    $sql = "SELECT * FROM pertanyaan WHERE isi_prtyn='$isi_prtyn'";
    $result = mysqli_query($conn, $sql);

    if (!$result->num_rows > 0) {
        // Handle upload gambar opsional
        $gambar = null;

        if (!empty($_FILES['gambar']['name'])) {
            $gambar_folder = 'uploads/';
            if (!is_dir($gambar_folder)) {
                mkdir($gambar_folder, 0777, true);
            }

            $gambar_name = uniqid() . "_" . basename($_FILES['gambar']['name']);
            $gambar_path = $gambar_folder . $gambar_name;

            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar_path)) {
                $gambar = $gambar_name;
            }
        }

        // Simpan pertanyaan ke database dengan atau tanpa gambar
        $sql_insert = "INSERT INTO pertanyaan (isi_prtyn, username_prtyn, id_user, kategori, gambar)
            VALUES ('$isi_prtyn', '$username_prtyn', '$id_user', '$kategori', " . ($gambar ? "'$gambar'" : "NULL") . ")";

        $result_insert = mysqli_query($conn, $sql_insert);

        if ($result_insert) {
            // Reset input
            $isi_prtyn = "";
            $username_prtyn = "";
            $id_user = "";
            $kategori = "";
            echo "<script>alert('Pertanyaan berhasil dibuat'); document.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan saat menyimpan.')</script>";
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
        <form method="post" action="" enctype="multipart/form-data">
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

            <div class="mb-3">
              <label for="gambar" class="form-label fw-bold">Unggah Gambar <span class="text-muted">(opsional)</span>:</label>
              <input class="form-control" type="file" id="gambar" name="gambar" accept="image/*">
            <img id="preview-gambar" src="#" alt="Preview" style="display:none; max-height: 200px; margin-top: 10px;">
            </div>
          </form>
   </div>
  </body>
</html>