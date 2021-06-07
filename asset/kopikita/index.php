<?php
session_start();
require_once "config/func.php";
$idPesanan = $_SESSION["idPesanan"];
$totalHarga = 0;
$result = mysqli_query($conn, "SELECT * FROM menu");
$result2 = mysqli_query($conn, "SELECT menu.nama_menu, menu.harga, detail_pesanan.jumlah
                                FROM detail_pesanan
                                INNER JOIN menu ON detail_pesanan.id_menu = menu.id_menu WHERE detail_pesanan.id_pesanan = '$idPesanan'");

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
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div class="listMenu">
            <h1><?= $row["nama_menu"]; ?></h1>
            <h2> Rp <?= $row["harga"]; ?></h2>
            <img src="img/<?= $row["gambar"]; ?>" alt="" width="300px">
        </div>
    <?php endwhile; ?>
    <h1>Item</h1>
    <ul>
    <?php while ($row2 = mysqli_fetch_assoc($result2)) : ?>
        <p style="display: none;"><?= $totalHarga += $row2["harga"] * $row2["jumlah"]; ?></p>
        <li>
            <div class="licted">
                <h3><?= $row2["nama_menu"] ?> &#10141; <?= $row2["jumlah"] ?></h3>
                <h4>Rp. <?= $row2["harga"] ?></h4>
            </div>
        </li>
    <?php endwhile; ?>
    </ul>
    <input type="hidden" value="<?= $totalHarga ?>" name="totalHarga">
    <h1>Rp <?= $totalHarga ?></h1>
   
<script>
    setInterval(function(){
      location.reload();
    },2000);    
</script>
 
</body>

</html>