<?php
include "../util/link.php";
require_once "../data/function.php";
session_start();
if (!isset($_SESSION["SuperLogin"])) {
    header("location: ../index.php");
    exit;
}
$id = $_SESSION["idKelas"];
// $id = $_SESSION["idKelas"];

$results = mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas = '$id'");
$rows = mysqli_fetch_assoc($results);

$result = mysqli_query($conn, "SELECT * FROM materi WHERE kelas_id = '$id'");
$no = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style/lihatdata.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi</title>
</head>


<body>
    <div class="con1">
        <a href="lihatKelas.php"><i class="gg-chevron-left"></i></a>
        <h3>Materi</h3>
    </div>
    
    <form action="" method="POSt" name="form">
        <a class="button1 btn" href="tambahMateri.php?idKelas=<?= $id; ?>">Tambah Materi</a>
        <table>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Link Konten</th>
                <th>Action</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <td><?= $no++ ?></td>
                <td><?= $row["nama_materi"]; ?></td>
                <td><a href="<?= $row["konten_video"]; ?>" target="_blank"><?= $row["konten_video"]; ?></a></td>
                <td>
                    <a class="button1 btn" href="editMateri.php?id=<?= $row["id_materi"]; ?>">Edit</a>
                    |
                    <button class="button2" materi-id="<?= $row["id_materi"]; ?>"" name=" hapus">Hapus</button>

                </td>

                </tr>
                </a>
            <?php endwhile; ?>
        </table>

    </form>
    <script src="../util/hapusmateri.js"></script>
</body>

</html>