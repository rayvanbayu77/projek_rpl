<?php

session_start();

include("config.php");

$id_pernyataan = $_GET["id"];

$conn->query("DELETE FROM pernyataan WHERE id_pernyataan = $id_pernyataan") or die(mysqli_error($conn));

echo "<script>alert('Pernyataan berhasil dihapus'); document.location.href = 'indexAdmin.php';</script>" ;

?>