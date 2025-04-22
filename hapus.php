<?php

include "koneksi.php";

$id = $_GET['id'];

$sql = "DELETE FROM todo WHERE id_todo = '$id'";
$query = mysqli_query($koneksi, $sql);

if ($query) {
    echo "<script>alert('Item successfully deleted!'); window.location.href='../index.php';</script>";
} else {
    header ("Location: index.php");
}

?>