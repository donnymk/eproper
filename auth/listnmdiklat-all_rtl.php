<?php
    include "../plugins/config2.php";

    date_default_timezone_set('Asia/Jakarta');
    //$tanggalskr=date('Y-m-d H:i:s');
    //$bulanskr=date('m');
    $tahunskr = date('Y');    
    
    $jenisdiklat = $_POST['jenisdiklat'];
    
    // Mencegah MySQL injection
    $jenisdiklat_ = stripslashes($jenisdiklat);
    $jenisdiklat__ = mysqli_real_escape_string($con, $jenisdiklat_);     

    $selectnmdiklat = mysqli_query($con,"SELECT title, DATE_FORMAT(startdate, '%Y') AS tahun FROM calendar WHERE jenisdiklat='".$jenisdiklat__."' AND DATE_FORMAT(startdate, '%Y')>='2017' GROUP BY title ORDER BY startdate");
    
    echo '<option value="semua">Semua Diklat Fungsional</option>';
    while($baris=mysqli_fetch_array($selectnmdiklat))
    {
        echo '<option value="'.htmlspecialchars($baris['title']).'">'.htmlspecialchars($baris['title']).' ('.htmlspecialchars($baris['tahun']).')</option>';
    }
?>