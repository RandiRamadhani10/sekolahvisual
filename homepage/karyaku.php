<?php
include "../util/link.php";
require_once "../data/function.php";
session_start();
if (!isset($_SESSION["login"])) {

    $row = mysqli_fetch_assoc($result);
    header("location: ../index.php");
    exit;
}
$idUser = $_SESSION["idUser"];
$result = mysqli_query($conn, "SELECT * FROM karya WHERE user_id = '$idUser'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style/karyaku.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karyaku</title>
</head>
<body>
    <a class="add" href="tambahKarya.php">+</a>
    <div class="containerImg">
        <div class="con1">
            <a href="homepage.php"><i class="gg-chevron-left"></i></a>
            <h3>Karyaku</h3>
        </div>
        <div class="con2">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <img src="../img/<?= $row["karya"];?>" alt="">
            <?php endwhile; ?>
        </div>
    </div>
</body>

</html>