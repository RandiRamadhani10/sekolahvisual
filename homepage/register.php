<?php
session_start();
require_once"../data/function.php";
if( isset($_POST["register"])){
    if( register($_POST) > 0){
        
        if($_POST["username"]==="admin"){
            echo "<script> alert('Regristasi berhasil')</script>";
            
            $_SESSION["SuperLogin"] = true;
            header("location: ../dashboard/dashboard.php");
            exit;
        }
        $_SESSION["login"]=true;
        header("location: homepage.php");
        exit;
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
    <title>DAFTAR</title>
</head>
<style>
    label{
        display: block;
    }
</style>
<body>
<a href="../index.php"><button>back</button></a>

    <h2>DAFTAR</h2>
    <form action="" method="POST" name="form" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="username">USERNAME : </label>
                <input type="text" id="username" name="username" required>
            </li>
            <li>
                <label for="nama-lengkap">NAMA LENGKAP : </label>
                <input type="text" id="nama-lengkap" name="namaLengkap" required>
            </li>
            <li>
                <label for="password">PASSWORD : </label>
                <input type="password" id="password" name="password" required>
            </li>
            <li>
                <label for="password2">KONFIRMASI PASSWORD : </label>
                <input type="password" id="password2" name="password2" required>
            </li>
            <li>
                <label for="gambar">FOTO PROFIL : </label>
                <input type="file" id="gambar" name="gambar">
            </li>
            <br>
            <li>
                <button name="register">DAFTAR</button>
            </li>
        </ul>
    </form>
    
</body>

</html>