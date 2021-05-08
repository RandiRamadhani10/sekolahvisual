<?php
include "../util/link.php";
require_once "../data/config.php";
session_start();
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row["username"] === "admin") {
            if (password_verify($password, $row["password"])) {
                $_SESSION["SuperLogin"] = true;
                header("location: ../dashboard/dashboard.php");
                exit;
            } else $error = true;
        }
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["idUser"] = $row["id_user"];
            header("location: homepage.php");
            exit;
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style/form.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<style>
    label {
        display: block;
    }
</style>

<body>
    <div class="con1">
        <a href="../index.php"><i class="gg-chevron-left"></i></a>
        <h3>Login</h3>
    </div>
    <form action="" method="POST" name="form">
        <ul>
            <li>
                <label for="username">USERNAME</label>
                <input type="text" name="username" id="username" required>
            </li>
            <br>
            <li>
                <label for="password">PASSWORD</label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <button type="submit" name="login">LOGIN</button>
            </li>
        </ul>
    </form>
    <?php if (isset($error)) 
         echo "<script>Swal.fire({
            text:'Username/Password Salah!',
            confirmButtonColor:'#ee2a7b'
        })</script>";
    ?>
</body>

</html>