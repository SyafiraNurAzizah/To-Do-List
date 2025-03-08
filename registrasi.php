<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List - Sign Up</title>

    <link rel="stylesheet" href="css/registrasi.css">
</head>
<body>
    <div class="container">
        <h1>Sign Up</h1>
        <p>Register to your account</p>
        <form action="proses/proses_register.php" method="POST">
            <label>Username</label> <br>
            <input type="text" name="username" id="username" required> <br>

            <label>Password</label> <br>
            <input type="password" name="password" id="password" required> <br>

            <label>Nama Lengkap</label> <br>
            <input type="text" name="name" id="name" required> <br>

            <label>E-Mail</label> <br>
            <input type="text" name="email" id="email" required> <br>

            <label>Tanggal Lahir</label> <br>
            <input type="date" name="birth_date" id="birth_date" required> <br>
            <button type="submit">Sign Up</button>
        </form>
        <p class="sign-in">Already have an account? <b><a href="login.php">Log In here</a></b>.</p>
    </div>
</body>
</html>