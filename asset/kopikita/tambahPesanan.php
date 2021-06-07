<?php
session_start();
$idPesanan = $_SESSION["idPesanan"];
require_once "config/func.php";
$result = mysqli_query($conn, "SELECT * FROM menu");
$result2 = mysqli_query($conn, "SELECT menu.nama_menu, menu.harga, detail_pesanan.jumlah
                        FROM detail_pesanan
                        INNER JOIN menu ON detail_pesanan.id_menu = menu.id_menu WHERE detail_pesanan.id_pesanan = '$idPesanan';");
$totalHarga = 0;
if(isset($_POST["batal"])){
    batalPesanan($_POST);
    header("location:indexPesanan.php");
}
if(isset($_POST["bayar"])){
    tambahPesanan($_POST);
    header("location:indexPesanan.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan</title>
</head>

<body>
    <div class="menu" id 1>
        <ul>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <li>
                    <div class="list" id="<?= $row["id_menu"] ?>">
                        <h4><?= $row["nama_menu"] ?></h4>
                        <p>Rp. <?= $row["harga"] ?></p>
                        <a href="jumlahPesanan.php?idMenu=<?= $row["id_menu"] ?>" type="submit" name="tambah">Tambah </a>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
    <div class="menudDetail">
        <form action="" method="POST">
            <h2>Item</h2>
            <label for="namaPelanggan">Nama Pelanggan :</label>
            <input type="text" name="namaPelanggan" id="namaPelanggan">
            <ul>
            <?php while ($row2 = mysqli_fetch_assoc($result2)) : ?>
                <p style="display: none;"><?= $totalHarga += $row2["harga"] * $row2["jumlah"] ; ?></p>
                <li>
                    <div class="licted">
                        <h3><?= $row2["nama_menu"] ?>  &#10141; <?= $row2["jumlah"] ?></h3>
                        <h4>Rp. <?= $row2["harga"] ?></h4>
                    </div>
                </li>
            <?php endwhile; ?>
            </ul>
            
            
            <input type="hidden" value="<?= $totalHarga ?>" name="totalHarga">
            <h1>Rp. <?= $totalHarga ?></h1>
            <button type="submit" name="batal">Batal</button>
            <button type="submit" name="bayar">Bayar</button>
        </form>
    </div>

</body>

</html>