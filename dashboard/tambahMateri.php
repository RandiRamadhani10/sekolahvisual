<?php
include "../util/link.php";
require_once "../data/function.php";
session_start();
if (!isset($_SESSION["SuperLogin"])) {
    header("location: ../index.php");
    exit;
}
$idKelas = $_GET["idKelas"];
if (isset($_POST["submit"])) {
    if (tambahMateri($_POST) > 0) {
        echo "<script>  Swal.fire({
                text:'Materi Berhasil Ditambahkan',
                confirmButtonColor: '#ee2a7b'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = './lihatMateri.php';
                }
            })</script>";
    } else mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style/form.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Materi</title>
</head>

<body>
    <div class="con1">
            <a href="lihatMateri.php"><i class="gg-chevron-left"></i></a>
            <h3>Tambah Materi</h3>
    </div>
    <form action="" method="POST" name="form">
        <ul>
            <input type="hidden" name="idKelas" id="idKelas" value="<?= $idKelas; ?>">
            <li>
                <label for="namaMateri">Nama Materi:</label>
                <input type="text" name="namaMateri" id="namaMateri">
            </li>
            <li>
                <label for="kontenVideo">LINK VIDEO</label>
                <input type="text" name="kontenVideo" id="kontenVideo">
            </li>
            <br>
            <li>
                <button name="submit" id="submit">SUBMIT</button>
            </li>
        </ul>
    </form>
</body>

</html>