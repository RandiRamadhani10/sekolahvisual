<?php
    require_once"config/func.php";

    if(isset($_POST["hapus"])){
        hapusMenu($_POST);
    }else mysqli_error($conn);

    $result = mysqli_query($conn, "SELECT * FROM menu");
    $no = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Menu</title>
</head>
<body>
<form action="" method="POSt" name="form">
        <a class="button1 btn" href="tambahMenu.php">Tambah Menu</a>
        <table>
            <tr>
                <th>No</th>
                <th>Nama Menu</th>
                <th>Harga Menu</th>
                <th>Gambar</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <input type="hidden" name="gambar" value="<?= $row["gambar"]; ?>">
                    <td><?= $no++ ?></td>
                    <td><?= $row["nama_menu"]; ?></td>
                    <td><?= $row["harga"]; ?></td>
                    <td><img src="img/<?= $row["gambar"]; ?>" alt="" width="30px"></td>
                    <td>
                        <a class="button1 btn" href="editMenu.php?id=<?= $row["id_menu"]; ?>">Edit</a>
                        |
                        <button type="submit"name="hapus" value="<?= $row["id_menu"]; ?>">Hapus</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
</body>
</html>