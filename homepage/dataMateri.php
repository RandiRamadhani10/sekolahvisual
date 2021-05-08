<?php
    require_once "../data/function.php";
    $kelasId = $_SESSION["kelasMateri"];
    $idMateri = $_GET["konten"];
    $result = mysqli_query($conn, "SELECT * FROM materi WHERE kelas_id = '$kelasId' AND id_materi = '$idMateri'");
    $row = mysqli_fetch_assoc($result);

            
?>  
    <h3 style="margin: 5px;"><?=$row['nama_materi'];?></h3>
    <iframe width="90%" height="65%"
        src="https://www.youtube.com/embed/<?=$row['konten_video']?>?rel=0"allowfullscreen frameborder="0">
    </iframe>