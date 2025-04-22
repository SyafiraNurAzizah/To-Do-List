<?php

include "koneksi.php";

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$sqlCategory = "SELECT * FROM category";
$queryCategory = mysqli_query($koneksi, $sqlCategory);

$selectedCategory = $_GET['category'] ?? '';
$selectedStatus = $_GET['status'] ?? '';
$selectedBookmark = $_GET['bookmark'] ?? '';
// $search = mysqli_real_escape_string($koneksi, $_GET['search'] ?? '');

$id_user = $_SESSION['id_user'];

$sql = "SELECT todo.*, category.category 
        FROM todo
        LEFT JOIN category ON todo.id_category = category.id_category 
        WHERE id_user = $id_user
        ";

if (!empty($selectedCategory)) {
    $sql .= " AND category.id_category = '$selectedCategory'";
}

if (!empty($selectedStatus)) {
    $sql .= " AND todo.status = '$selectedStatus'";
}

if (!empty($selectedBookmark)) {
    $sql .= " AND todo.bookmark = '$selectedBookmark'";
}

// if ($search) $sql .= " AND (todo.title LIKE '%$search%' OR todo.created_at LIKE '%$search%' OR todo.status LIKE '%$search%' OR category.category LIKE '%$search%')";

$sql .= " ORDER BY FIELD(todo.status, 'pending', 'done'), FIELD(todo.bookmark, '1', '0'), todo.created_at DESC"; // Tambahkan ORDER BY di sini

$query = mysqli_query($koneksi, $sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>

    <link rel="stylesheet" href="css/index.css"></head>
<body>
    <?php include "navbar.php" ?>

    <div class="subnav">
        <div class="left-subnav">
            <p class="active"><a href="index.php">Board view</a></p>
            <p><a href="tambah.php">Add view</a></p>
        </div>

        <!-- Form Pencarian -->
        <!-- <form method="GET" action="">
            <input type="text" name="search" placeholder="Cari Nama, Telepon, atau Email" value="<?= htmlspecialchars($search); ?>">
            <button type="submit">Cari</button>
        </form> -->

        <div class="right-subnav">
            <form action="" method="GET">
                <select name="category" id="category">
                    <option value="">All Categories</option>
                    <?php while ($row = mysqli_fetch_assoc($queryCategory)) { ?>
                        <option value="<?= $row['id_category']; ?>" <?= ($selectedCategory == $row['id_category']) ? 'selected' : '' ?>>
                            <?= $row['category']; ?>
                        </option>
                    <?php } ?>
                </select>

                <p>|</p>

                <select name="status" id="status">
                    <option value="">All Status</option>
                    <option value="pending" <?= ($selectedStatus == 'pending')? 'selected' : '' ; ?>>Pending</option>
                    <option value="done" <?= ($selectedStatus == 'done')? 'selected' : '' ; ?>>Done</option>
                </select>

                <p>|</p>

                <select name="bookmark" id="bookmark">
                    <option value="">All To-Do</option>
                    <option value="1" <?= ($selectedBookmark == 1)? 'selected' : '' ; ?>>Bookmark</option>
                </select>

                <button type="submit">Filter</button>
            </form>
        </div>
    </div>

    <div class="content">
        <?php if (mysqli_num_rows($query) > 0): ?>
            <?php while ($todo = mysqli_fetch_Assoc($query)) { ?>
                <div class="card <?php echo ($todo['status'] == 'done') ? 'done' : ''; ?>">
                    <div class="card-top">
                        <p><?= date("d F Y", strtotime($todo['created_at'])); ?></p>

                        <div class="status">
                            <?php 
                                if ($todo['status'] == "pending") {
                                    echo "<div class='pending'><span>Pending</span></div>";
                                } elseif ($todo['status'] == "done") {
                                    echo "<div class='done'><span>Done</span></div>";
                                }
                            ?>
                        </div>
                    </div>
                    <h4><?= $todo['title']; ?></h4>
                    <p class="desc"><?= $todo['description']; ?></p>

                    <div class="card-b">
                        <div class="category">
                            <?php 
                                if ($todo['id_category'] == "1") {
                                    echo "<div class='work'><span>Work</span></div>";
                                } elseif ($todo['id_category'] == "2") {
                                    echo "<div class='personal'><span>Personal</span></div>";
                                } elseif ($todo['id_category'] == "3") {
                                    echo "<div class='other'><span>Other</span></div>";
                                }
                            ?>
                        </div>

                        <div class="bm">
                            <?php
                                if ($todo['bookmark'] == "1") {
                                    echo "<p class='bookmark'><a href='edit.php?id=" . $todo['id_todo'] . "'>★</a></p>";
                                } else {
                                    echo "<p class='no-bookmark'><a href='edit.php?id=" . $todo['id_todo'] . "'>☆</a></p>";
                                }
                            ?>
                        </div>
                    </div>

                    <div class="aksi">
                        <a href="edit.php?id=<?= $todo['id_todo']; ?>" class="edit">Edit</a>
                        <a href="hapus.php?id=<?= $todo['id_todo']; ?>" class="edit" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                    </div>
                </div>
            <?php } ?>
        <?php else: ?>
            <p>No Data Available.</p>
        <?php endif; ?>
    </div>
</body>
</html>