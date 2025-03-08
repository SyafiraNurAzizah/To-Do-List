<?php

include "../koneksi.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $koneksi->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $username);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['username'] = $user['username'];

                header ("Location: ../index.php");
                exit();
            } else {
                echo "<script>alert('password salah'); window.location.href='../login.php';</script>";
                exit();
            }
        } else {
            echo "<script>alert('username salah'); window.location.href='../login.php';</script>";
            exit();
        }
    }
}

?>