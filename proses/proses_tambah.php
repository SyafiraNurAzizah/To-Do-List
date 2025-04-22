<?php

include "../koneksi.php";

session_start();

$title = $_POST['title'];
$description = $_POST['description'];
$status = $_POST['status'];
$id_category = $_POST['id_category'];
$id_user = $_SESSION['id_user'];
$bookmark = $_POST['bookmark'];

$sql = "INSERT INTO todo(title, description, status, id_category, id_user, bookmark) VALUES ('$title', '$description', '$status', '$id_category', '$id_user', '$bookmark')";
$query = mysqli_query($koneksi, $sql);

if ($query) {
    header ("Location: ../index.php");
} else {
    header ("Location: ../tambah.php");
}

?>