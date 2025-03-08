<?php

include "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $birth_date = $_POST['birth_date'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (username, password, name, email, birth_date) VALUES (?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssss", $username, $hashed_password, $name, $email, $birth_date);

        if ($stmt->execute()) {
            $_SESSION['username'] = $username;
            $_SESSION['login'] = true;

            echo "<script>alert('Registrasi berhasil!'); window.location.href='../index.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing query: " . $koneksi->error;
    }

    $koneksi->close();
}

?>