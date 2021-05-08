<?php
include "../util/link.php";
require_once "../data/function.php";
session_start();
if (!isset($_SESSION["login"])) {
    header("location: ../index.php");
    exit;
}
$idUser = $_SESSION["idUser"];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$idUser'");
$row = mysqli_fetch_assoc($result);

if (isset($_POST["save"])) {
    editUser($_POST);
    echo "<script> location.href='./homepage.php'; </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style/profil.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>

<body>
    <div class="con1">
            <a href="homepage.php"><i class="gg-chevron-left"></i></a>
            <h3>Profil</h3>
    </div>
    <form action="" method="POST" name="form" enctype="multipart/form-data">
        <ul>
            <input type="hidden" name="idUser" value="<?= $row["id_user"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $row["foto_profil"]; ?>">
            <div class="viewfoto">
                <div class="frame">
                    <img src="../img/<?= $row["foto_profil"] ?>" alt="">
                </div>
                </li>
                <input type="file" id="gambar" name="gambar">
            </div>
            </li>
            <li>
                <label for="username">USERNAME : </label>
                <input type="text" id="username" name="username" value="<?= $row["username"]; ?>">
            </li>
            <li>
                <label for="nama-lengkap">NAMA LENGKAP : </label>
                <input type="text" id="nama-lengkap" name="namaLengkap" value="<?= $row["nama_lengkap_user"]; ?>">

                <br>
            <li>
                <button name="save">Save</button>
            </li>
        </ul>
    </form>
</body>

</html>