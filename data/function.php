<?php
require_once "config.php";

function register($data)
{
    global $conn;

    $username = htmlspecialchars(strtolower(stripslashes($data["username"])));
    $namaLengkap = htmlspecialchars(stripslashes($data["namaLengkap"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
    if (mysqli_fetch_assoc($result)) {
        echo "<script>  Swal.fire({
            text:'Username sudah dipakai',
            confirmButtonColor: '#ee2a7b'
        })</script>";
        return false;
        exit;
    }

    if ($password !== $password2) {
        echo "<script>  Swal.fire({
            text:'Password harus sama',
            confirmButtonColor: '#ee2a7b'
        })</script>";
        return false;
        exit;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $gambar = uploadUser();

    if ($gambar === 2) {
        echo "<script>  Swal.fire({
            text:'Ukuran gambar terlalu besar(max 1,5mb)',
            confirmButtonColor: '#ee2a7b'
        })</script>";
        return false;
        exit;
    }
    if ($gambar === 1) {
        echo "<script>  Swal.fire({
            text:'Format gambar salah',
            confirmButtonColor: '#ee2a7b'
        })</script>";
        return false;
        exit;
    }

    mysqli_query($conn, "INSERT INTO user
    VALUES (
        '',
        '$username',
        '$password',
        '$namaLengkap',
        '$gambar'
        
    )");
    return mysqli_affected_rows($conn);
}

function uploadUser()
{
    $files = $_FILES["gambar"];
    $namaGambar = $files["name"];
    $namaTmp = $files["tmp_name"];
    $ukuranGambar = $files["size"];
    $err = $files["error"];

    $extendGambarValid = ["jpeg", "jpg", "png"];
    $extendGambar = explode(".", $namaGambar);
    $extendGambar = strtolower(end($extendGambar));
    if (empty($namaGambar)) {
        $namaGambarDefault = "default.jpg";
        return $namaGambarDefault;
        exit;
    }
    if (!in_array($extendGambar, $extendGambarValid)) {
        $verify = 1;
        return $verify;
        exit;
    }
    if ($ukuranGambar > 1058248) {
        $verify = 2;
        return $verify;
        exit;
    }

    $newNamaGambar = uniqid();
    $newNamaGambar .= ".";
    $newNamaGambar .= $extendGambar;

    move_uploaded_file($namaTmp, "../img/" . $newNamaGambar);
    return $newNamaGambar;
}

function tambahKelas($data)
{
    global $conn;

    $namaKelas = htmlspecialchars(stripslashes($data["namakelas"]));
    $deskripsi = htmlspecialchars(stripslashes($data["deskripsi"]));
    $kategori = htmlspecialchars(stripslashes($data["kategori"]));
    $harga = htmlspecialchars(stripslashes($data["harga"]));
    $idtutor = htmlspecialchars(stripslashes($data["namatutor"]));


    $result = mysqli_query($conn, "SELECT * FROM kelas WHERE nama_kelas = '$namaKelas'");
    echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
    if (mysqli_fetch_assoc($result)) {
        echo "<script>  Swal.fire({
            text:'Kelas sudah tersedia',
            confirmButtonColor: '#ee2a7b'
        })</script>";
        return false;
        exit;
    }

    $thumbnail = uploadAdmin();

    if ($thumbnail === 2) {
        echo "<script>  Swal.fire({
            text:'Ukuran gambar terlalu besar(max 1,5mb)',
            confirmButtonColor: '#ee2a7b'
        })</script>";
        return false;
        exit;
    }
    if ($thumbnail === 1) {
        echo "<script>  Swal.fire({
            text:'Format gambar salah',
            confirmButtonColor: '#ee2a7b'
        })</script>";
        return false;
        exit;
    }

    mysqli_query($conn, "INSERT INTO kelas
    VALUES (
        '',
        '$idtutor',
        '$namaKelas',
        '$deskripsi',
        '$kategori',
        '$harga',
        '$thumbnail'
        
    )");

    return mysqli_affected_rows($conn);
}

function tambahTutor($data)
{
    global $conn;
    $namaTutor = htmlspecialchars(stripslashes($data["namaTutor"]));
    $result = mysqli_query($conn, "SELECT * FROM tutor WHERE nama_lengkap_tutor = '$namaTutor'");
    echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
    if (mysqli_fetch_assoc($result)) {
        echo "<script>  Swal.fire({
            text:'Tutor sudah ada',
            confirmButtonColor: '#ee2a7b'
        })</script>";
        return false;
        exit;
    }

    $thumbnail = uploadAdmin();
    if ($thumbnail === 2) {
        echo "<script>  Swal.fire({
            text:'Ukuran gambar terlalu besar(max 1,5mb)',
            confirmButtonColor: '#ee2a7b'
        })</script>";
        return false;
        exit;
    }
    if ($thumbnail === 1) {
        echo "<script>  Swal.fire({
            text:'Format gambar salah',
            confirmButtonColor: '#ee2a7b'
        })</script>";
        return false;
        exit;
    }

    mysqli_query($conn, "INSERT INTO tutor
    VALUES (
        '',
        '$namaTutor',
        '$thumbnail'
        
    )");

    return mysqli_affected_rows($conn);
}
function tambahKarya($data)
{
    global $conn;
    $judul = htmlspecialchars(stripslashes($data["judul"]));
    $idUser = $_SESSION["idUser"];
    $gambar = uploadUser();
    echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
    if ($gambar === 2) {
        echo "<script>  Swal.fire({
            text:'Ukuran gambar terlalu besar(max 1,5mb)',
            confirmButtonColor: '#ee2a7b'
        })</script>";
        return false;
        exit;
    }
    if ($gambar === 1) {
        echo "<script>  Swal.fire({
            text:'Format gambar salah',
            confirmButtonColor: '#ee2a7b'
        })</script>";
        return false;
        exit;
    }

    mysqli_query($conn, "INSERT INTO karya
    VALUES (
        '',
        '$idUser',
        '$judul',
        '$gambar'
        
    )");

    return mysqli_affected_rows($conn);
}
function uploadAdmin()
{
    $files = $_FILES["thumbnail"];
    $namaGambar = $files["name"];
    $namaTmp = $files["tmp_name"];
    $ukuranGambar = $files["size"];
    $err = $files["error"];

    $extendGambarValid = ["jpeg", "jpg", "png"];
    $extendGambar = explode(".", $namaGambar);
    $extendGambar = strtolower(end($extendGambar));
    if (!in_array($extendGambar, $extendGambarValid)) {
        $verify = 1;
        return $verify;
        exit;
    }
    if ($ukuranGambar > 1058248) {
        $verify = 2;
        return $verify;
        exit;
    }

    $newNamaGambar = uniqid();
    $newNamaGambar .= ".";
    $newNamaGambar .= $extendGambar;

    move_uploaded_file($namaTmp, "img/" . $newNamaGambar);
    return $newNamaGambar;
}

function hapusKelas($data)
{
    global $conn;
    $idHapus = $data["hapus"];
    mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas = '$idHapus'");
    if (mysqli_error($conn)) {
        throw new Exception("Kelas masih memiliki siswa!");
        exit;
    }

    if ($data["gambar"]  != "default.jpg") {
        unlink("../dashboard/img/" . $data["gambar"]);
    }
    return mysqli_affected_rows($conn);
}
function hapusTutor($data)
{
    global $conn;

    $idHapus = $data["hapus"];

    mysqli_query($conn, "DELETE FROM tutor WHERE id_tutor = '$idHapus'");
    if (mysqli_error($conn)) {
        throw new Exception("tutor masih memiliki kelas!");
        exit;
    }
    if (!$data["gambar"]  != "default.jpg") {
        unlink("../dashboard/img/" . $data["gambar"]);
    }
    return mysqli_affected_rows($conn);
}
function editKelas($data)
{
    global $conn;

    $namaKelas = htmlspecialchars(stripslashes($data["namakelas"]));
    $deskripsi = htmlspecialchars(stripslashes($data["deskripsi"]));
    $kategori = htmlspecialchars(stripslashes($data["kategori"]));
    $harga = htmlspecialchars(stripslashes($data["harga"]));
    $idtutor = htmlspecialchars(stripslashes($data["namatutor"]));
    $thumbnailLama = htmlspecialchars(stripslashes($data["thumbnailLama"]));
    $idKelas = htmlspecialchars(stripslashes($data["idKelas"]));
    echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
    if ($_FILES["thumbnail"]["error"] == 4) {
        $thumbnail = $thumbnailLama;
    } else {
        unlink("img/" . $thumbnailLama);
        $thumbnail = uploadAdmin();
    }
    if ($thumbnail === 2) {
        echo "<script>  Swal.fire({
            text:'Ukuran gambar terlalu besar(max 1,5mb)',
            confirmButtonColor: '#ee2a7b'
        })</script>";
        return false;
        exit;
    }
    if ($thumbnail === 1) {
        echo "<script>  Swal.fire({
            text:'Format gambar salah',
            confirmButtonColor: '#ee2a7b'
        })</script>";
        return false;
        exit;
    }

    mysqli_query($conn, "UPDATE kelas
    SET
       tutor_id = '$idtutor',
       nama_kelas = '$namaKelas',
       deskripsi = '$deskripsi',
       kategori = '$kategori',
       harga_kelas = '$harga',
       thumbnail = '$thumbnail'
       WHERE id_kelas = $idKelas
    ");

    return mysqli_affected_rows($conn);
}
function editUser($data)
{
    global $conn;
    $username = htmlspecialchars(strtolower(stripslashes($data["username"])));
    $gambarLama = htmlspecialchars(stripslashes($data["gambarLama"]));
    $namaLengkap = htmlspecialchars(stripslashes($data["namaLengkap"]));
    $idUser = htmlspecialchars(stripslashes($data["idUser"]));
    echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
    if ($_FILES["gambar"]["error"] == 4) {
        $gambar = $gambarLama;
    } else if ($gambarLama !== "default.jpg") {
        $gambar = uploadUser();
        if ($gambar === 2) {
            echo "<script>  Swal.fire({
                text:'Ukuran gambar terlalu besar(max 1,5mb)',
                confirmButtonColor: '#ee2a7b'
            })</script>";
            return false;
            exit;
        }
        if ($gambar === 1) {
            echo "<script>  Swal.fire({
                text:'Format gambar salah',
                confirmButtonColor: '#ee2a7b'
            })</script>";
            return false;
            exit;
        }
        unlink("../img/" . $gambarLama);
    }
    mysqli_query($conn, "UPDATE user
    SET
       username = '$username',
       nama_lengkap_user = '$namaLengkap',
       foto_profil = '$gambar'
       WHERE id_user = $idUser
    ");

    return mysqli_affected_rows($conn);
}
function editTutor($data)
{
    global $conn;
    $namaTutor = htmlspecialchars(stripslashes($data["namaTutor"]));
    $thumbnailLama = htmlspecialchars(stripslashes($data["thumbnailLama"]));
    $idTutor = htmlspecialchars(stripslashes($data["idTutor"]));
    echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
    if ($_FILES["thumbnail"]["error"] == 4) {
        $thumbnail = $thumbnailLama;
    } else {
        unlink("img/" . $thumbnailLama);
        $thumbnail = uploadAdmin();
    }
    if ($thumbnail === 2) {
        echo "<script>  Swal.fire({
            text:'Ukuran gambar terlalu besar(max 1,5mb)',
            confirmButtonColor: '#ee2a7b'
        })</script>";
        return false;
        exit;
    }
    if ($thumbnail === 1) {
        echo "<script>  Swal.fire({
            text:'Format gambar salah',
            confirmButtonColor: '#ee2a7b'
        })</script>";
        return false;
        exit;
    }

    mysqli_query($conn, "UPDATE tutor
    SET
       nama_lengkap_tutor = '$namaTutor',
       pic_tutor = '$thumbnail'
       WHERE id_tutor = $idTutor
    ");
    return mysqli_affected_rows($conn);
}
function tambahMateri($data)
{
    global $conn;
    $idKelas = htmlspecialchars(stripslashes($data["idKelas"]));
    $namaMateri = htmlspecialchars(stripslashes($data["namaMateri"]));
    $kontenVideo = $data["kontenVideo"];
    mysqli_query($conn, "INSERT INTO materi
    VALUES (
        '',
        '$idKelas',
        '$namaMateri',
        '$kontenVideo'
        
    )");

    return mysqli_affected_rows($conn);
}
function editMateri($data)
{
    global $conn;

    $namaMateri  = htmlspecialchars(stripslashes($data["namaMateri"]));
    $kontenVideo = htmlspecialchars(stripslashes($data["kontenVideo"]));
    $idMateri = htmlspecialchars(stripslashes($data["idMateri"]));
    $idKelas = htmlspecialchars(stripslashes($data["idKelas"]));

    mysqli_query($conn, "UPDATE materi
    SET
       kelas_id = '$idKelas',
       nama_materi = '$namaMateri',
       konten_video = '$kontenVideo'
       WHERE id_materi = $idMateri
    ");

    return mysqli_affected_rows($conn);
}
function hapusMateri($data)
{
    global $conn;

    $idMateri = $data["hapus"];

    mysqli_query($conn, "DELETE FROM materi WHERE id_materi = '$idMateri'");
    return mysqli_affected_rows($conn);
}

function beliKelas($data)
{
    global $conn;
    $idKelas = $data["beli"];
    $idUser = $_SESSION["idUser"];
    mysqli_query($conn, "INSERT INTO user_kelas
    VALUES (
        '',
        '$idUser',
        '$idKelas'
    )");
    return mysqli_affected_rows($conn);
}
