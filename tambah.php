<?php

session_start();

include "koneksi.php";

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>

    <link rel="stylesheet" href="css/tambah.css"></head>
<body>
    <?php include "navbar.php" ?>

    <div class="subnav">
        <div class="sub-subnav">
            <p><a href="index.php">Board view</a></p>
            <p class="active"><a href="tambah.php">Add view</a></p>
        </div>

        <div class="right-subnav">
            /
        </div>
    </div>

    <div class="content">
        <div class="card-top">
            <h2>Your To-Do List</h2>
            <p>Don't forget to add your activities for today and stay organized!</p>
        </div>

        <div class="input-form">
            <form action="proses/proses_tambah.php" method="POST">
                <input type="text" name="title" id="title" placeholder="Enter your task for today..." required> <br>
                <textarea type="text" name="description" id="description" placeholder="Enter additional details or description..."></textarea> <br>
                <div class="form-bottom">
                    <div class="sc">
                        <div class="category">
                            <?php 
                                $sqlCategory = "SELECT id_category, category FROM category";
                                $query = mysqli_query($koneksi, $sqlCategory);

                                while ($category = mysqli_fetch_assoc($query)) { 
                                    echo "<label class='radio-label'><input type='radio' name='id_category' value='" . $category['id_category'] . "' required>" . $category['category'] . "</label><br>";
                                }
                            ?>

                            <div class="line"></div>

                            <label class='radio-label'><input type="checkbox" name="bookmark" value="1">Bookmark</label>

                        </div>

                        <input type="hidden" name="status" id="status" value="pending">

                        <button type="submit">Add To-Do</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>