<?php
include "../util/link.php";
require_once "../data/function.php";
session_start();
if (!isset($_SESSION["SuperLogin"])) {
    header("location: ../index.php");
    exit;
}
$id = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM materi WHERE id_materi = '$id'");
$rows = mysqli_fetch_assoc($result);

if (isset($_POST["submit"])) {
    if (editMateri($_POST)) {
        echo "<script>  Swal.fire({
            text:'Materi berhasil di ubah',
            confirmButtonColor: '#ee2a7b'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = './lihatMateri.php';
            }
        })</script>";
    } else mysqli_error($conn);
    echo "<script>  Swal.fire({
        text:'Materi berhasil di ubah',
        confirmButtonColor: '#ee2a7b'
    }).then((result) => {
        if (result.isConfirmed) {
            location.href = './lihatMateri.php';
        }
    })</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style/form.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Materi</title>
</head>

<body>
    <div class="con1">
        <a href="lihatMateri.php"><i class="gg-chevron-left"></i></a>
        <h3>Edit Materi</h3>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
            <input type="hidden" name="idMateri" value="<?= $rows["id_materi"]; ?>">
            <input type="hidden" name="idKelas" value="<?= $rows["kelas_id"]; ?>">
            <li>
                <label for="namaMateri">Nama Materi:</label>
                <input type="text" name="namaMateri" id="namaMateri" value="<?= $rows["nama_materi"]; ?>">
            </li>
            <br>
            <li>
                <label for="kontenVideo">Link Video</label>
                <input type="text" name="kontenVideo" id="kontenVideo" value="<?= $rows["konten_video"]; ?>">
            </li>
            <li>
                <button name="submit" id="submit">SUBMIT</button>
            </li>
    </form>
</body>

</html>