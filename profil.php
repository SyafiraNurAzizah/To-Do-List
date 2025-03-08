<?php

include "koneksi.php";

session_start();

$sql = "SELECT * FROM user WHERE id_user = '{$_SESSION['id_user']}'";
$query = mysqli_query($koneksi, $sql);


while ($user = mysqli_fetch_assoc($query)) {

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="css/profil.css">
</head>
<body>
    <div class="content">
        <div class="card">
            <h2>Profil</h2>
            <h3><?= $user['name']; ?></h3>
            <p class="email"><?= $user['email']; ?></p>
            <p class="birth"><?= date("d F Y", strtotime($user['birth_date'])); ?></p>

            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="back">
        <a href="index.php">Back...</a>
    </div>
</body>
</html>


<?php } ?>