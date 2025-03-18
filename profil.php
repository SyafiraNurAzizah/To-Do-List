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
            <h4>Profil</h4>
            <h2><?= $user['username']; ?></h2>
            <p class="email"><?= $user['email']; ?></p>

            <div class="namee">
                <label>Name</label>
                <p class="name"><?= $user['name']; ?></p>
            </div>

            <div class="date">
                <label>Birth Date</label>
                <p class="birth"><?= date("d F Y", strtotime($user['birth_date'])); ?></p>
            </div>

            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="back">
        <a href="index.php">Back...</a>
    </div>
</body>
</html>


<?php } ?>