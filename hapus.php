<?php

session_start();

include("config.php");

$id_prtyn = $_GET["id"];

$conn->query("DELETE FROM pertanyaan WHERE id_prtyn = $id_prtyn") or die(mysqli_error($conn));

echo "<script>alert('Pertanyaan berhasil dihapus'); document.location.href = 'index.php';</script>" ;

?>