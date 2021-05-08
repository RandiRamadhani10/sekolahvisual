<?php
include "../util/link.php";
session_start();
if (!isset($_SESSION["SuperLogin"])) {
    header("location: ../index.php");
    exit;
}

if (isset($_POST["logout"])) {
    session_destroy();
    header("location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style/dashboard.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <div class="header">
        <h2>Dashboard Admin</h2>
        <button class="logout">Logout</button>
    </div>
    <div class="container">
        <img src="../asset/admin.png" alt="">
        <div class="menu">
            <a href="lihatKelas.php">
                <i class="large material-icons">import_contacts</i>
                <h3>Kelas</h3>
            </a>
            <a href="lihatTutor.php">
                <i class="large material-icons">account_box</i>
                <h3>Tutor</h3>
            </a>
            <a href="lihatUser.php">
                <i class="large material-icons">account_circle</i>
                <h3>User</h3>
            </a>
        </div>
    </div>
    <script src="../util/logout.js"></script>
</body>
</html>