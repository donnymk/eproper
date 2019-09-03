<?php
    include "../plugins/config.php";
    
    //$jenisdiklat = $_POST['jenisdiklat'];

    $selectkabkota = mysqli_query($con,"SELECT nama FROM user WHERE tipe='kabkota'");
    echo '<option value="semua">Semua Kabupaten / Kota</option>';
    while($baris=mysqli_fetch_array($selectkabkota)){
        echo '<option value="'.$baris['nama'].'">'.$baris['nama'].'</option>';
    }
?>