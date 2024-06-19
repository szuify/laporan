<?php 
include "../conn/conn.php";
$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM jenis_acara WHERE id_jenis_acara='$id'");
echo "<script>window.location.href='index.php?page=add_jenisacara';</script>'";
exit;
?>