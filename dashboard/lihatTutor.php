<?php
require_once "../data/function.php";
include "../util/link.php";
session_start();
if (!isset($_SESSION["SuperLogin"])) {
    header("location: ../index.php");
    exit;
}
$result = mysqli_query($conn, "SELECT * FROM tutor");
$no = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style/lihatdata.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor</title>
</head>

<body>
    <div class="con1">
        <a href="dashboard.php"><i class="gg-chevron-left"></i></a>
        <h3>Tutor</h3>
    </div>
    <form action="" method="POSt" name="form">
        <a class="button1 btn" href="tambahTutor.php">Tambah Tutor</a>
        <table>
            <tr>
                <th>No</th>
                <th>Nama Tutor</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row["nama_lengkap_tutor"]; ?></td>
                    <td><img src="img/<?= $row["pic_tutor"]; ?>" alt="" width="30px"></td>
                    <td>
                        <a class="button1 btn" href="editTutor.php?id=<?= $row["id_tutor"]; ?>">Edit</a>
                        |
                        <button type="submit" user-id="<?= $row["id_tutor"]; ?>" img-tutor="<?= $row["pic_tutor"]; ?>" class="button2" name="hapus">Hapus</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>

    </form>
    <script src="../util/hapustutor.js"></script>
</body>
</html>