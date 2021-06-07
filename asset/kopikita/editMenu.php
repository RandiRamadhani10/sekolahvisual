<?php
require_once "config/func.php";
$idMenu = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu = '$idMenu'");
$row = mysqli_fetch_assoc($result);

if (isset($_POST["save"])) {
    editMenu($_POST);
    echo "<script> location.href='./lihatMenu.php'; </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
</head>

<body>
    <div class="container-flex">
        <form action="" method="POST" name="form" enctype="multipart/form-data">
            <ul>
                <input type="hidden" name="idMenu" value="<?= $row["id_menu"]; ?>">
                <input type="hidden" name="gambarLama" value="<?= $row["gambar"]; ?>">
                <img src="img/<?= $row["gambar"] ?>" alt="">
                </li>
                <input type="file" id="gambar" name="gambar">
                </li>
                <li>
                    <label for="nama">Nama Menu : </label>
                    <input type="text" id="nama" name="nama" value="<?= $row["nama_menu"]; ?>">
                </li>
                <li>
                    <label for="harga">Harga Menu : </label>
                    <input type="text" id="harga" name="harga" value="<?= $row["harga"]; ?>">
                    <br>
                <li>
                    <button name="save">Save</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>