<?php

session_start();

include("config.php");

$id_jwbn = $_GET["id"];

$conn->query("DELETE FROM jawaban WHERE id_jwbn = $id_jwbn") or die(mysqli_error($conn));


echo "<script>alert('Jawaban berhasil dihapus'); document.location.href = 'index.php';</script>" ;
?>