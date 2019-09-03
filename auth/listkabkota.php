<?php
    include "../plugins/config.php";

    //$selectkabkota = mysqli_query($con,"SELECT nama FROM user WHERE tipe='kabkota'");
    $selectkabkota = mysqli_query($con,"SELECT asal_peserta FROM inovasi WHERE asal_peserta <> 'internal' GROUP BY asal_peserta");
    echo '<option value="semua">Semua Kabupaten / Kota</option>';
    while($baris=mysqli_fetch_array($selectkabkota)){
        echo '<option value="'.$baris['asal_peserta'].'">'.$baris['asal_peserta'].'</option>';
    }
    