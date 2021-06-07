<?php
session_start();
// require_once "config/func.php";
// $idPesanan = $_SESSION["idPesanan"];
$totalHarga = 0;
$result2 = mysqli_query($conn, "SELECT menu.nama_menu, menu.harga, detail_pesanan.jumlah
                                FROM detail_pesanan
                                INNER JOIN menu ON detail_pesanan.id_menu = menu.id_menu WHERE detail_pesanan.id_pesanan = '$idPesanan'");
?>
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
