<?php
// session_start();
?>


<link rel="stylesheet" href="css/navbar.css">

<div class="navbar">
    <h2>To-Do List</h2>
    <div class="container">
        <?php if (isset($_SESSION['username'])) { ?>
            <h4>Welcome back, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h4>
            <p><a href="profil.php">Profil</a> | <a href="logout.php">Logout</a></p>
        <?php } else { ?>
            <p><a href="profil.php">Profil</a> | <a href="login.php">Login</a></p>
        <?php } ?>
    </div>
</div>