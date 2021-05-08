<?php
include "../util/link.php";
require_once "../data/function.php";
session_start();
if (!isset($_SESSION["SuperLogin"])) {
    header("location: ../index.php");
    exit;
}
$result = mysqli_query($conn, "SELECT * FROM user");
$no = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../style/lihatdata.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head> 
<body>
<div class="con1">
        <a href="dashboard.php"><i class="gg-chevron-left"></i></a>
        <h3>User</h3>
    </div>
    <form action="" method="POSt" name="form" >
        <table>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama Lengkap User</th>
                <th>Gambar</th>
            </tr>
            
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row["username"]; ?></td>
                    <td><?= $row["nama_lengkap_user"]; ?></td>
                    <td><img src="../img/<?= $row["foto_profil"]; ?>" alt="" width="30px"></td>
                </tr>
            <?php endwhile; ?>
        </table>

    </form>
</body>
</html>