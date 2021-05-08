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
$result = mysqli_query($conn, "SELECT * FROM user_kelas WHERE user_id = '$idUser'");
if (isset($_POST["materi"])) {
    $_SESSION["kelasMateri"] = $_POST["materi"];
    header("location: materi.php?page=start");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style/kelasku.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="con1">
        <a href="homepage.php"><i class="gg-chevron-left"></i></a>
        <h3>Kelasku</h3>
    </div>
    <div class="con2">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <?php $results = mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas = '{$row['kelas_id']}'");
            $rows = mysqli_fetch_assoc($results);
            ?>
            <div class="con3">
                <form action="" method="post">
                    <img src="../dashboard/img/<?= $rows['thumbnail']; ?>" alt="">
                    <h3><?= $rows["nama_kelas"]; ?></h3>
                    <h4><?= $rows["kategori"]; ?></h4>
                    <button name="materi" value="<?= $rows["id_kelas"]; ?>">Pelajari Sekarang</button>
                </form>
            </div>
        <?php endwhile; ?>
    </div>

</body>

</html>