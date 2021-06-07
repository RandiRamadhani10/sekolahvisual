<?php
    require_once "config/func.php";
    if(isset($_POST["submit"])){
        if (tambahMenu($_POST) > 0) {
            header("location: lihatMenu.php");
        } else mysqli_error($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
    <ul>
        <li>
            <label for="namaMenu">Nama Menu</label>
            <input type="text" name="nama" id="namaMenu" require>
        </li>
        <li>
            <label for="harga">Harga Menu</label>
            <input type="text" name="harga" id="harga" require>
        </li>
        <li>
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" id="gambar" require>
        </li>
        <li>
            <button type="submit" name="submit"> TAMBAH</button>
        </li>
    </ul>
    </form>
</body>
</html>