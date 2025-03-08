<?php

include "koneksi.php";

session_start();

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}

$sqlCategory = "SELECT * FROM category";
$queryCategory = mysqli_query($koneksi, $sqlCategory);

$selectedCategory = $_GET['category'] ?? '';
// $search = mysqli_real_escape_string($koneksi, $_GET['search'] ?? '');

$sql = "SELECT todo.*, category.category 
        FROM todo
        LEFT JOIN category ON todo.id_category = category.id_category 
        WHERE id_user = '{$_SESSION['id_user']}'";

if ($selectedCategory) $sql .= " AND category.id_category = '$selectedCategory'";
// if ($search) $sql .= " AND (todo.title LIKE '%$search%' OR todo.created_at LIKE '%$search%' OR todo.status LIKE '%$search%' OR category.category LIKE '%$search%')";

$sql .= " ORDER BY FIELD(todo.status, 'pending', 'done'), todo.created_at DESC"; // Tambahkan ORDER BY di sini

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
            <p><a href="index.php" class="active">Board view</a></p>
            <p><a href="tambah.php">Add view</a></p>
        </div>

        <!-- Form Pencarian -->
        <!-- <form method="GET" action="">
            <input type="text" name="search" placeholder="Cari Nama, Telepon, atau Email" value="<?= htmlspecialchars($search); ?>">
            <button type="submit">Cari</button>
        </form> -->

        <div class="right-subnav">
            <form action="" method="GET">
                <select name="category" id="category" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    <?php while ($row = mysqli_fetch_assoc($queryCategory)) { ?>
                        <option value="<?= $row['id_category']; ?>" <?= ($selectedCategory == $row['id_category']) ? 'selected' : '' ?>>
                            <?= $row['category']; ?>
                        </option>
                    <?php } ?>
                </select>
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
                    <div class="aksi">
                        <a href="edit.php?id=<?= $todo['id_todo']; ?>" class="edit">Edit</a>
                        <a href="hapus.php?id=<?= $todo['id_todo']; ?>" class="hapus">Delete</a>
                    </div>
                </div>
            <?php } ?>
        <?php else: ?>
            <p>No Data Available.</p>
        <?php endif; ?>
    </div>
</body>
</html>