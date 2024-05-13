<?php

session_start();

include("config.php");

$id = $_GET["id"];

$conn->query("DELETE FROM users WHERE id = $id") or die(mysqli_error($conn));

echo "<script>alert('Pengguna berhasil dihapus'); document.location.href = 'users.php';</script>" ;

?>