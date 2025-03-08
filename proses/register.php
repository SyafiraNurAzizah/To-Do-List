<?php

include "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
    $stmt = $koneksi->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $username, $hashed_password);

        if ($stmt->execute()) {
            $_SESSION['username'] = $username;
            $_SESSION['login'] = true;

            header ("Location: ../index.php");
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