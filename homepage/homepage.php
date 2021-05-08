<?php
require_once "../data/config.php";
include "../util/link.php";
session_start();
if (!isset($_SESSION["login"])) {
    header("location: ../index.php");
    exit;
}

$idUser =  $_SESSION["idUser"];
$result = mysqli_query($conn, "SELECT * FROM kelas");

$fotoProfil = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$idUser'");
$row =  mysqli_fetch_assoc($fotoProfil);
if (isset($_POST["beli"])) {
    $idUser =  $_SESSION["idUser"];
    $idKelas = $_SESSION["idKelas"] = $_POST["beli"];
    $results = mysqli_query($conn, "SELECT * FROM user_kelas WHERE user_id = '$idUser' AND kelas_id ='$idKelas'");
    $rows = mysqli_fetch_assoc($results);
    if ($rows == NULL) {
        header("location:checkout.php");
    } else {
        echo "<script>Swal.fire({
            text:'Kelas telah dibeli',
            confirmButtonColor:'#ee2a7b'
        })</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style/homepage.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>


<body>
    <div class="container">
        <div class="logo-1">
            <img class="img-1" src="../asset/logo.png"">
            <h3>Sekolah Visual</h3>
        </div>
        <div class="burgericon">
            <a href="" class="burger "><i class="large material-icons">dehaze</i></a>
        </div>
    </div>
    <div class="con1">
        <div class="frame">
            <img src="../img/<?= $row["foto_profil"] ?>" alt="">
        </div>
        <h3><?= $row["username"] ?></h3>
        <a href="profil.php">
            <i class="large material-icons">account_circle</i>
            <h3>Profil</h3>
        </a>
        <a href="kelasku.php">
            <i class="large material-icons">import_contacts</i>
            <h3>Kelasku</h3>
        </a>
        <a href="karyaku.php">
            <i class="large material-icons">wallpaper</i>
            <h3>Karyaku</h3>
        </a>
        <a href="" class="logout">
            <i class="large material-icons">vertical_align_bottom</i>
            <h3>Logout</h3>
        </a>
    </div>

    <div class="container1 ">
        <div class="cont"><span></span></div>
        <div class="headerkonten">
            <h1>Daftar Kelas</h1>
        </div>
    </div>
    <div class="container1 view">
        <div class="cont view"><span></span></div>
        <div class="con2">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="con3">
                    <img src="../dashboard/img/<?= $row['thumbnail']; ?>" alt="">
                    <h3><?= $row["nama_kelas"]; ?></h3>
                    <h4><?= $row["kategori"]; ?></h4>
                    <h4 style="color: red;">Rp. <?= $row["harga_kelas"];?></h4>
                    <form action="" method="POST" name="form">
                        <button value="<?= $row["id_kelas"]; ?>" type="submit" class="beli" name="beli">Beli</button>
                    </form>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <div class="container1 ">
        <div class="cont"><span></span></div>
        <footer class="footer">
            <p>Copyright Sekolah Visual</p>
            <p>Dwi Randi Ramadhani</p>
        </footer>
    </div>
    <script>
        const burger = document.querySelector('.burger');
        const con1 = document.querySelector('.con1');
        burger.addEventListener('click', (e) => {
            e.preventDefault();
            con1.classList.toggle('toogle');
        });
        
    </script>
   
    <script src="../util/logout.js"></script>
</body>

