<?php
session_start();
if (!isset($_SESSION["SuperLogin"])) {
    header("location: ../index.php");
    exit;
}

if(isset($_POST["logout"])){
    session_destroy();
    header("location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    a{
        display:block;
    }
</style>
<body>
    <h1>dashboard</h1>
            <a href="kelas.php">Manage Kelas</a>
            <br>
            <a href="tutor.php">Manage Tutor</a>
            <br>
            <a href="user.php">Show User</a>
            <br>
            <button name="logout">Logout</button>
</body>

</html>