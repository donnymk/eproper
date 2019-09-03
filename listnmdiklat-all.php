<?php
    include "plugins/config2.php";

    date_default_timezone_set('Asia/Jakarta');
    //$tanggalskr=date('Y-m-d H:i:s');
    //$bulanskr=date('m');
    $tahunskr=date('Y');    
    
    $jenisdiklat = $_POST['jenisdiklat'];
    
    // Mencegah MySQL injection
    $jenisdiklat = stripslashes($jenisdiklat);
    $jenisdiklat = mysqli_real_escape_string($con,$jenisdiklat);     

    $selectnmdiklat = mysqli_query($con,"SELECT title FROM calendar WHERE jenisdiklat='".$jenisdiklat."' AND DATE_FORMAT(startdate, '%Y')>='2017' GROUP BY title ORDER BY startdate");
    echo '<option value="semua">Semua Diklat Kepemimpinan</option>';
    while($baris=mysqli_fetch_array($selectnmdiklat)){
        echo '<option value="'.$baris['title'].'">'.$baris['title'].'</option>';
    }
?>