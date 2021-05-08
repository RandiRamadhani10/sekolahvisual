<?php
include "../util/link.php";
require_once "../data/function.php";
session_start();
if (!isset($_SESSION["SuperLogin"])) {
    header("location: ../index.php");
    exit;
}
$id = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM tutor WHERE id_tutor = '$id'");
$rows = mysqli_fetch_assoc($result);

if (isset($_POST["submit"])) {
    if (editTutor($_POST)) {
        echo "<script>  Swal.fire({
            text:'Tutor berhasil di ubah',
            confirmButtonColor: '#ee2a7b'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = './lihatTutor.php';
            }
        })</script>";
    } else mysqli_error($conn);
    echo "<script>  Swal.fire({
        text:'Tutor berhasil di ubah',
        confirmButtonColor: '#ee2a7b'
    }).then((result) => {
        if (result.isConfirmed) {
            location.href = './lihatTutor.php';
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
    <title>Edit Tutor</title>
</head>

<body>
    <div class="con1">
        <a href="lihatTutor.php"><i class="gg-chevron-left"></i></a>
        <h3>Edit Tutor</h3>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
            <input type="hidden" name="idTutor" value="<?= $rows["id_tutor"]; ?>">
            <input type="hidden" name="thumbnailLama" value="<?= $rows["pic_tutor"]; ?>">
            <li>
                <label for="namaTutor">Nama Lengkap Tutor:</label>
                <input type="text" name="namaTutor" id="namaTutor" value="<?= $rows["nama_lengkap_tutor"]; ?>">
            </li>
            <br>
            <li>
                <label for="thumbnail">Upload Gambar</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </li>
            <li>
                <button name="submit" id="submit">SUBMIT</button>
            </li>
    </form>
</body>

</html>