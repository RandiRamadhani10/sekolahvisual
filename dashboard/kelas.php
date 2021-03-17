<?php
    require_once "../data/function.php";
    session_start();
    if (!isset($_SESSION["SuperLogin"])) {
        header("location: ../index.php");
        exit;
    }

    $result = mysqli_query($conn, "SELECT * FROM tutor");
    if(isset($_POST["submit"])){
        if( tambahKelas($_POST) > 0){
            echo "<script> alert('Kelas berhasil ditambahkan')</script>";
         }
         else mysqli_error($conn);
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
    label{
        display:block;
    }
</style>
<body>
        <h1>KELAS</h1>
        <form action="" method="POST" name="form" enctype="multipart/form-data">
            <ul>
                <li>
                    <label for="namakelas">Nama kelas:</label>
                    <input type="text" name="namakelas" id="namakelas">                
                </li>
                <li>
                    <label for="deskripsi">Deskripsi</label>
                   <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                </li>
                <li>
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori">
                        <option value="vidiografis">VIDIOGRAFI</option>
                        <option value="desaingrafis">DESAIN GRAFIS</option>
                    </select>      
                </li>
                <li>
                <label for="namatutor"></label>
                    <select name="namatutor" id="namatutor">
                    <?php while($row = mysqli_fetch_assoc($result) ):?>
                    <option value="<?= $row["id_tutor"];?>"><?=$row["nama_lengkap_tutor"];?></option>
                    <?php endwhile;?>
                    </select>
                </li>
                <li>
                   <label for="harga">Harga</label>
                   <input type="text" name="harga" id="harga">
                </li>
                <br>
                <li>
                    <label for="thumbnail">Upload thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail">
                </li>
                <li>
                    <button name="submit" id="submit">SUBMIT</button>
                </li>
            </ul>
        </form>
</body>
</html>