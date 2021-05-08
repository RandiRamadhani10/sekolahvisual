<?php
include "../util/link.php";
require_once "../data/function.php";
session_start();
if (!isset($_SESSION["login"])) {

    $row = mysqli_fetch_assoc($result);
    header("location: ../index.php");
    exit;
}
$idKelas = $_SESSION["idKelas"];
$result = mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas = '$idKelas' ");
$row = mysqli_fetch_assoc($result);

if (isset($_POST["beli"])) {
    if (beliKelas($_POST)) {
        echo "<script>alert('Transaksi Berhasil'); location.href='./kelasku.php'; </script>";
    } else mysqli_error($conn);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style/checkout.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>

<body>
    <h1>Checkout</h1>
    <div class="container">
        <div class="con2">
            <div class="con3">
                <img src="../dashboard/img/<?= $row['thumbnail']; ?>" alt="">
                <h3><?= $row["nama_kelas"]; ?></h3>
                <h4><?= $row["kategori"]; ?></h4>
                <h4>Rp. <?= $row["harga_kelas"]; ?></h4>
            </div>
        </div>
        <div class="con1">
            <h3><?= $row["nama_kelas"]; ?></h3>
            <h4><?= $row["kategori"]; ?></h4>
            <h4>Harga : Rp. <?= $row["harga_kelas"]; ?></h4>
            <h4>Total Harga : Rp. <?= $row["harga_kelas"]; ?></h4>
            <form action="" method="POST" name="form">
                <button value="<?= $row["id_kelas"]; ?>" type="submit" name="beli">Beli</button>
                <a href="homepage.php">batal</a>
            </form>
        </div>
    </div>
</body>

</html>