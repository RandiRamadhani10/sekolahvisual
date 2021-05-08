<?php
include "../util/link.php";
require_once "../data/function.php";
session_start();
if (!isset($_SESSION["SuperLogin"])) {
    header("location: ../index.php");
    exit;
}
if (isset($_POST["submit"])) {
    if (tambahTutor($_POST) > 0) {
        echo "<script>  Swal.fire({
                text:'Tutor Berhasil Ditambahkan',
                confirmButtonColor: '#ee2a7b'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = './lihatTutor.php';
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
    <title>Tambah Tutor</title>
</head>

<body>
    <div class="con1">
            <a href="lihatTutor.php"><i class="gg-chevron-left"></i></a>
            <h3>Tambah Tutor</h3>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="namaTutor">Nama Lengkap Tutor:</label>
                <input type="text" name="namaTutor" id="namaTutor" required>
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