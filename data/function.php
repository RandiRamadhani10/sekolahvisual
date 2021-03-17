<?php
require_once "config.php";

function register($data){
    global $conn;

    $username = htmlspecialchars(strtolower(stripslashes($data["username"])));
    $namaLengkap = htmlspecialchars(stripslashes($data["namaLengkap"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>alert('Username sudah dipakai');</script>";
        return false;
        exit;
    }

    if($password !== $password2){
        echo "<script>alert('Password tidak sama')</script>";
        return false;
        exit;
    }
    
    $password = password_hash($password, PASSWORD_DEFAULT);
    $gambar = uploadUser();
    
    if($gambar === 2){
        echo "<script>alert('ukuran file terlalu besar')</script>";
        return false;
        exit;
    }
    if($gambar === 1){
        echo "<script>alert('format gambar salah')</script>";
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

function uploadUser(){
    $files = $_FILES["gambar"];
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
    if($ukuranGambar > 1058248){
        $verify = 2;
        return $verify;
        exit;
    }

    $newNamaGambar = uniqid();
    $newNamaGambar .= ".";
    $newNamaGambar .= $extendGambar;

    move_uploaded_file($namaTmp, "../img/" . $newNamaGambar);
    return $newNamaGambar;
};

function tambahKelas($data){
    global $conn;

    $namaKelas = htmlspecialchars(strtolower(stripslashes($data["namakelas"])));
    $deskripsi = htmlspecialchars(stripslashes($data["deskripsi"]));
    $kategori = htmlspecialchars(stripslashes($data["kategori"]));
    $harga = htmlspecialchars(stripslashes($data["harga"]));
    $idtutor = htmlspecialchars(stripslashes($data["namatutor"]));
    
    
    $result = mysqli_query($conn, "SELECT * FROM kelas WHERE nama_kelas = '$namaKelas'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>alert('Kelas sudah ada');</script>";
        return false;
        exit;
    }

    $thumbnail = uploadAdmin();
    
    if($thumbnail === 2){
        echo "<script>alert('ukuran file terlalu besar')</script>";
        return false;
        exit;
    }
    if($thumbnail === 1){
        echo "<script>alert('format gambar salah')</script>";
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

};

function uploadAdmin(){
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
    if($ukuranGambar > 1058248){
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
?>