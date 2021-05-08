<?php
include "../util/link.php";
require_once "../data/function.php";
session_start();
if (!isset($_SESSION["SuperLogin"])) {
    header("location: ../index.php");
    exit;
}

unset($_SESSION["idKelas"]);
$result = mysqli_query($conn, "SELECT * FROM kelas");
$no = 1;
if (isset($_POST["tambahKelas"])) {
    header("location: tambahKelas.php");
}
if (isset($_POST["materi"])) {
    $_SESSION["idKelas"] = $_POST["materi"];
    header("location: lihatMateri.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style/lihatdata.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas</title>
</head>
<style>

</style>

<body>
    <div class="con1">
        <a href="dashboard.php"><i class="gg-chevron-left"></i></a>
        <h3>Kelas</h3>
    </div>
    <form action="" method="POSt" name="form">
        <a class="button1 btn" href="tambahKelas.php">Tambah Kelas</a>
        <table>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Action</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) : ?>

                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row["nama_kelas"]; ?></td>
                    <td><?= $row["kategori"]; ?></td>
                    <td><?= $row["harga_kelas"]; ?></td>
                    <input type="hidden" name="thumbnail" value="<?= $row["thumbnail"] ?>">
                    <td>
                        <a class="button1 btn" href="editKelas.php?id=<?= $row["id_kelas"]; ?>">Edit</a>
                        |
                        <button type="submit" kelas-id="<?= $row["id_kelas"]; ?>" img-kelas="<?= $row["thumbnail"]; ?>" class="button2 button2-1" name="hapus">Hapus</button>
                        |
                        <button class="button2" name="materi" value="<?= $row["id_kelas"]; ?>">Materi</button>
                        |
                        <a class="button1 btn" href="lihatKelas.php?id=<?= $row["id_kelas"]; ?>">Lihat Siswa</a>
                    </td>

                </tr>

            <?php endwhile; ?>
        </table>

    </form>
    <script src="../util/hapuskelas.js"></script>

</body>

</html>