<?php
require_once "config.php";

function tambahMenu($data)
{
    global $conn;

    $nama = htmlspecialchars(stripslashes($data["nama"]));
    $harga = htmlspecialchars(stripslashes($data["harga"]));

    $result = mysqli_query($conn, "SELECT * FROM menu WHERE nama_menu = '$nama'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Menu sudah tersedia')</script>";
        return false;
        exit;
    }

    $gambar = uploadGambar();

    if ($gambar === 2) {
        echo "<script>alert('Size Gambar Terlalu Besar')</script>";
        return false;
        exit;
    }
    if ($gambar === 1) {
        echo "<script>alert('Format Gambar Salah')</script>";
        return false;
        exit;
    }

    mysqli_query($conn, "INSERT INTO menu
    VALUES (
        '',
        '$nama',
        '$harga',
        '$gambar'
    )");
    return mysqli_affected_rows($conn);
}

function uploadGambar()
{
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

function hapusMenu($data)
{

    global $conn;

    $idHapus = $data["hapus"];
    unlink("img/" . $data["gambar"]);
    mysqli_query($conn, "DELETE FROM menu WHERE id_menu = '$idHapus'");
    return mysqli_affected_rows($conn);
}

function editMenu($data)
{
    global $conn;
    $nama = htmlspecialchars(strtolower(stripslashes($data["nama"])));
    $harga = htmlspecialchars(stripslashes($data["harga"]));
    $gambarLama = htmlspecialchars(stripslashes($data["gambarLama"]));
    $idMenu = htmlspecialchars(stripslashes($data["idMenu"]));
    if ($_FILES["gambar"]["error"] == 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadGambar();
        if ($gambar === 2) {
            echo "<script>alert('Size Gambar Terlalu Besar')</script>";
            return false;
            exit;
        }
        if ($gambar === 1) {
            echo "<script>alert('Format Gambar Salah')</script>";
            return false;
            exit;
        }
        unlink("img/" . $gambarLama);
    }
    mysqli_query($conn, "UPDATE menu
        SET
        nama_menu = '$nama',
        harga = '$harga',
        gambar = '$gambar'
        WHERE id_menu = $idMenu
        ");

    return mysqli_affected_rows($conn);
}

function tambahDetailPesanan($data)
{
    global $conn;
    $idMenu = $data["idMenu"];
    $idPesanan = $data["idPesanan"];
    $jumlah = $data["jumlah"];
    mysqli_query($conn, "INSERT INTO detail_pesanan
        VALUES (
            '',
            '$idPesanan',
            '$idMenu',
            '$jumlah'
        )");
    return;
}
function batalPesanan($data)
{
    global $conn;
    global $idPesanan;

    mysqli_query($conn, "DELETE FROM detail_pesanan WHERE id_pesanan = '$idPesanan'");
    mysqli_query($conn, "DELETE FROM pesanan WHERE id_pesanan = '$idPesanan'");
    return;
}

function tambahPesanan($data)
{
    global $conn;
    global $idPesanan;

    $namaPelanggan = $data["namaPelanggan"];
    $totalHarga = $data["totalHarga"];
    mysqli_query($conn, "UPDATE pesanan
        SET
        nama_pelanggan = '$namaPelanggan',
        total_harga = '$totalHarga'
        WHERE id_pesanan = $idPesanan
        ");
}

function setInterval($func, $seconds)
{
    $seconds = (int)$seconds;
    $_func = $func;
    while (true) {
        $_func;
        sleep($seconds);
    }
}
