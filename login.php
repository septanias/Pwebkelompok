<?php
    include("config.php");
    $user        = $_POST['user'];
    $password    = $_POST['password'];
    $sql = "SELECT * FROM admin where user='$user'";
    $result = $conn->query($sql);
    $result = $result->fetch_assoc();

    if ($result == NULL) {
        $_SESSION['notif'] = 'Login gagal, karena username tidak terdaftar!';
        header("Location: tugas.php");
        die();
    }
    if ($password != $result['password']) {
        $_SESSION['notif'] = 'Login gagal, karena password salah!';
        header("Location: tugas.php");
        die();
    } else {
        $_SESSION['user'] = $result;
        $_SESSION['notif'] = 'Login berhasil!';
        header("Location: home.php");
    }
?>