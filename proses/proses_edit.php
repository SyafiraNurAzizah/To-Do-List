<?php

include "../koneksi.php";

$id = $_POST['id_todo'];
$title = $_POST['title'];
$description = $_POST['description'];
$status = $_POST['status'];
$id_category = $_POST['id_category'];
$bookmark = $_POST['bookmark'];
$updated_at = date('Y-m-d H:i:s');

$sql = "UPDATE todo SET title = '$title', description = '$description', status = '$status', id_category = '$id_category', bookmark = '$bookmark', updated_at = '$updated_at' WHERE id_todo = '$id'";
$query = mysqli_query($koneksi, $sql);

if ($query) {
    header ("Location: ../index.php");
} else {
    header ("Location: ../edit.php");
}

?>