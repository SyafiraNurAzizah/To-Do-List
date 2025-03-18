<?php

include "koneksi.php";

$id = $_GET['id'];

$sql = "SELECT * FROM todo WHERE id_todo = '$id'";
$query = mysqli_query($koneksi, $sql);
$rowEdit = mysqli_fetch_assoc($query);  

$selectedCategory = $rowEdit['id_category'];
$selectedStatus = $rowEdit['status'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List | Edit</title>

    <link rel="stylesheet" href="css/edit.css">
</head>
<body>
    <!-- <div class="back">
        <a href="index.php">Back</a>
    </div> -->

    <div class="content">
        <div class="input-form">
            <form action="proses/proses_edit.php" method="POST">
                <input type="hidden" name="id_todo" value="<?= $rowEdit['id_todo']; ?>">
                <input type="text" name="title" id="title" placeholder="Enter your task for today..." value="<?= $rowEdit['title']; ?>" required> <br>
                <textarea type="text" name="description" id="description" placeholder="Enter additional details or description..." required><?= $rowEdit['description']; ?></textarea> <br>
                <div class="form-bottom">
                    <div class="sc">
                        <div class="category">
                            <?php 
                                $sqlCategory = "SELECT id_category, category FROM category";
                                $queryCategory = mysqli_query($koneksi, $sqlCategory);
                                
                                while ($category = mysqli_fetch_Assoc($queryCategory)) { 
                                    $checked = ($category['id_category'] == $selectedCategory) ? "checked" : "";
                                    echo "<label class='radio-label'><input type='radio' name='id_category' value='" . $category['id_category'] . "' $checked required>" . $category['category'] . "</label><br>";   
                                }
                            ?>
                        </div>

                        <!-- <select name="id_catageory" id="">
                            <?php
                                // while ($category = mysqli_fetch_assoc($queryCategory)) {
                                //     $selected = ($category['id_category'] == $rowEdit['id_category']) ? "selected" : "";
                                //     echo "<option name='id_category' value='" . $category['id_category'] . "' $selected>" . $category['category'] . "</option>";
                                // }
                            ?>
                        </select> -->

                        <div class="line"></div>

                        <div class="status">
                            <label class="radio-label">
                                <input type="radio" name="status" value="pending" <?= ($selectedStatus == 'pending') ? 'checked' : '' ?> required>pending
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="status" value="done" <?= ($selectedStatus == 'done') ? 'checked' : '' ?> required>done
                            </label>
                        </div>

                        <div class="line"></div>

                        <div class="bookmark">
                            <?php if ($rowEdit['bookmark'] == 1) {
                                echo "<label><input type='checkbox' name='bookmark' value='0' checked>Bookmark</label>";
                            } else {
                                echo "<label><input type='checkbox' name='bookmark' value='1'>Bookmark</label>";
                            } ?>
                        </div>

                        <!-- <button type="submit">Edit To-Do</button> -->
                    </div>
                    <button type="submit">Edit To-Do</button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="back">
        <a href="index.php">Back...</a>
    </div>
    <!-- <div class="back">
        <a href="index.php">_</a>
    </div> -->
</body>
</html>