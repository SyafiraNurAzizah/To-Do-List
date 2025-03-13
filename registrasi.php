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
        <h2>Sign Up</h2>
        <!-- <p>Register to your account</p> -->
        <form action="proses/proses_register.php" method="POST">
            <div class="left">
                <label>Full Name</label> <br>
                <input type="text" name="name" id="name" placeholder="Enter your full name" required> <br>

                <label>E-Mail</label> <br>
                <input type="text" name="email" id="email" placeholder="Enter your e-mail" required> <br>

                <label>Birth Date</label> <br>
                <input type="date" name="birth_date" id="birth_date" required> <br>
            </div>

            <div class="right">
                <label>Username</label> <br>
                <input type="text" name="username" id="username" placeholder="Enter your username" required> <br>

                <label>Password</label> <br>
                <input type="password" name="password" id="password" placeholder="Enter your password" required> <br>

                <button type="submit">Sign Up</button>
            </div>
        </form>
        <p class="sign-in">Already have an account? <b><a href="login.php">Log In here</a></b>.</p>
    </div>
</body>
</html>