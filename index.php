<?php
require_once "data/config.php";
$result = mysqli_query($conn, "SELECT * FROM tutor");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="asset/icon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEKOLAH VISUAL</title>
</head>

<body>
    <div class="container1">
        <div class="logo-1">
            <img class="img-1" src="asset/logo.png"">
            <h3>Sekolah Visual</h3>
        </div>
        <div class=" con2">
            <a href="homepage/login.php">
                <h4>LOGIN</h4>
            </a>
            <a href="homepage/register.php">
                <h4>DAFTAR</h4>
            </a>
        </div>
        <div class="burgericon">
           <a href="" class="burger"><i class="large material-icons">menu</i></a> 
        </div>
    </div>
    <div class=" con2-2">
            <a href="homepage/login.php">
                <h4>LOGIN</h4>
            </a>
            <a href="homepage/register.php">
                <h4>DAFTAR</h4>
            </a>
        </div>
    <div class="container">
        <div class="getstarted">
            <div class="get1">
                <h1>Tingkatkan Skillmu Sekarang!</h1>
            </div>
            <div class="get">
                <a href="homepage/register.php">
                    <h3>Get Started</h3>
                </a>
            </div>
        </div>
        <img src="asset/011-drawkit-drawing-man-colour.svg" alt="">
    </div>
    <div class="container2">
        <img src="asset/icon.png" alt="">
        <div class="text">
            <h1>SEKOLAH VISUAL</h1>
            <h4>Sekolah Visual adalah sebuah website yang bertujuan mengembangkan ekosistem designer di Indonesia.
                 Berdiri sejak 21 februari 2021.
                  Sekolah Visual memiliki platform pembelajaran elektronik berupa video yang sangat mudah untuk dipahami.
                   Sekolah Visual juga memiliki Tutor-tutor yang sudah ahli di bidang nya masing-masing.</h4>
        </div>
    </div>
    <hr>
    <div class="container3">
        <img src="asset/bored.svg" alt="">
        <h1>Mengapa Harus Sekolah Visual?</h1>
        <div class="order">
            <div class="list">
                <i class="large material-icons">accessibility</i>
                <div class="listitem">
                    <h3>Akses Selamanya</h3>
                    <p>Cukup membayar sekali, kamu bisa mendapatkan akses video penuh selamanya.</p>
                </div>
            </div>
            <div class="list">
                <i class="large material-icons">collections</i>
                <div class="listitem">
                    <h3>Portofolio</h3>
                    <p>Upload karya terbaikmu untuk menambah portofoliomu</p>
                </div>
            </div>
            <div class="list">
                <i class="large material-icons">explore</i>
                <div class="listitem">
                    <h3>Studi Kasus</h3>
                    <p>Pembelajran yang diberikan tidak hanya teori tetapi beserta studi kasus.</p>
                </div>
            </div>
        </div>

    </div>
    <hr>
    <div class="tutor">
        <h1>Tutor Professional</h1>
        <div class="order">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="list">
                    <div class="frame">
                        <img src="dashboard/img/<?= $row["pic_tutor"]; ?>" alt="">
                    </div>
                    <div class="listitem">
                        <h3><?= $row["nama_lengkap_tutor"] ?></h3>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <hr>
       
    <footer>
        <h3>SEKOLAH VISUAL</h3>
        <h4>© 2021 All rights reserved.</h4>
    </footer>
    <script>
        const burger = document.querySelector('.burger');
        const con1 = document.querySelector('.con2-2');
        burger.addEventListener('click', (e) => {
            e.preventDefault();
            con1.classList.toggle('toogle');
        });
    </script>
</body>

</html>