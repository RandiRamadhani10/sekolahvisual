<?php
include "../util/link.php";
require_once "../data/function.php";
session_start();
if (!isset($_SESSION["login"])) {
    header("location: ../index.php");
    exit;
}
$idKelas = $_SESSION["kelasMateri"];
$result = mysqli_query($conn, "SELECT * FROM materi WHERE kelas_id = '$idKelas'");
$tutor = mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas = '$idKelas'");
$detailTutor = mysqli_fetch_assoc($tutor);
$tutor = mysqli_query($conn, "SELECT * FROM tutor WHERE id_tutor = '{$detailTutor['tutor_id']}'");
$detailTutor = mysqli_fetch_assoc($tutor);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style/materi.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi</title>
</head>

<body>
    <div class="nav">
        <a href="kelasku.php"><i class="gg-chevron-left"></i></a>
        <h3>Materi</h3>
    </div>
    <div class="container">
        <div class="con1">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <form action="" method="post">
                    <a href="?konten=<?= $row["id_materi"]; ?>">
                        <?= $row["nama_materi"]; ?>
                    </a>
                </form>
            <?php endwhile; ?>
        </div>
        <div class="con2">
            <?php
            if (isset($_GET["konten"])) {
                include("dataMateri.php");
            }
            ?>
            <div class="detailTutor">
                <div class="frame">
                    <img src="../dashboard/img/<?= $detailTutor['pic_tutor'] ?>" alt="">
                </div>
                <h4>Tutor : <?= $detailTutor['nama_lengkap_tutor'] ?> </h4>
            </div>
        </div>

    </div>
</body>

</html>