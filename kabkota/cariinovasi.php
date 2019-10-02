<?php
    include "../plugins/config.php";
    
    $nip = $_POST['nip'];
    $namadiklat = $_POST['namadiklat'];
    
    // Mencegah MySQL injection
    $nip_ = stripslashes($nip);
    $nip__ = mysqli_real_escape_string($con,$nip_);
    $namadiklat_ = stripslashes($namadiklat);
    $namadiklat__ = mysqli_real_escape_string($con,$namadiklat_);   

    $selectinovasi = mysqli_query($con,"SELECT id FROM inovasi WHERE nip='".$nip__."' AND namadiklat='".$namadiklat__."'");
    while($baris=mysqli_fetch_array($selectinovasi)){
        echo '<p>Terima kasih, pendaftaran inovasi Anda untuk diklat '.$namadiklat.' telah berhasil. <a class="tautan" href="inovasi.php?id='.$baris['id'].'" target="_blank"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Lihat Inovasi Anda</a></p>'
                . '<p>Mohon Klik tombol di bawah ini untuk mencetak bukti pendaftaran inovasi.<p><br>
<center><form method="get" action="cetak_bukti.php" target="_blank">
    <input type="hidden" name="id" value="'.$baris['id'].'">
    <button type="submit" class="btn btn-success btn-lg" name="cetak"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Cetak bukti pendaftaran inovasi</button>
</form></center>';
        
    }
?>