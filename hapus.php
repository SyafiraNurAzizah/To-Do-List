<?php

include "koneksi.php";

$id = $_GET['id'];

$sql = "DELETE FROM todo WHERE id_todo = '$id'";
$query = mysqli_query($koneksi, $sql);

if ($query) {
    header ("Location: index.php");
} else {
    header ("Location: index.php");
}

?>