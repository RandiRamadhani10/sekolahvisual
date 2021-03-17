<?php
if (isset($_POST["click"])) {
    echo $_POST["des"];
    echo $_POST["kategori"];
    die;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <label for="kategori">Kategori</label>
        <select name="kategori" id="kategori">
            <option value="vidiografis">VIDIOGRAFI</option>
            <option value="desaingrafis">DESAIN GRAFIS</option>
        </select>
        <textarea name="des" id="des" cols="30" rows="10"></textarea>
        <button name="click">click</button>
    </form>

</body>

</html>