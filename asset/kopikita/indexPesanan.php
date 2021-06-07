<?php
session_start();
require_once"config/func.php";
if (isset($_POST["tambah"])) {
    // $query    =mysqli_query();

    mysqli_query($conn, "INSERT INTO pesanan
    VALUES ()");
    $result = mysqli_query($conn, "SELECT * FROM pesanan ORDER BY id_pesanan DESC LIMIT 1");
    $row = mysqli_fetch_assoc($result);
    $_SESSION["idPesanan"] = $row["id_pesanan"];
    header("location: tambahPesanan.php");
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

<body>
    <form action="" method="POST">
        <button name="tambah"> Buat Pesanan </button>
    </form>
</body>

</html>