<!-- <!DOCTYPE html> -->
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List - Log In</title>

    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <h2>Log In</h2>
        <form action="proses/proses_login.php" method="POST">
            <label>Username</label> <br>
            <input type="text" name="username" id="username" placeholder="Enter your username" required> <br>

            <label>Password</label> <br>
            <input type="password" name="password" id="password" placeholder="Enter your password" required> <br>

            <button type="submit">Log In</button>
        </form>
        <p>Don't have an account? <b><a href="registrasi.php">Sign Up here</a></b>.</p>
    </div>
</body>
</html>