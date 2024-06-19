<?php 
include "../conn/conn.php";
$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM acara WHERE id_acara='$id'");
mysqli_query($conn,"DELETE FROM foto_acara WHERE id_acara='$id'");
mysqli_query($conn,"DELETE FROM video_acara WHERE id_acara='$id'");
echo "<script>window.location.href='index.php?page=halaman_acara';</script>'";
exit;
?>