<?php
include "../util/link.php";
require_once "../data/function.php";
session_start();
if (!isset($_SESSION["login"])) {

    $row = mysqli_fetch_assoc($result);
    header("location: ../index.php");
    exit;
}
if (isset($_POST["tambah"])) {
    if (tambahKarya($_POST) > 0) {
        echo "<script> alert('Karya berhasil ditambahkan')</script>";
    } else mysqli_error($conn);
    echo "<script> location.href='./karyaku.php'; </script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style/form.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="con1">
            <a href="karyaku.php"><i class="gg-chevron-left"></i></a>
            <h3>Tambah Karya</h3>
    </div>
    <form action="" method="POST" name="form" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="Judul">Judul : </label>
                <input type="text" name="judul" required>
            </li>
            <li>
                <label for="gambar">Karya : </label>
                <input type="file" id="gambar" name="gambar" require>
            </li>
            <li>
                <button name="tambah">Tambah</button>
            </li>
        </ul>
    </form>
</body>

</html>