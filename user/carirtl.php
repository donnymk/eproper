<?php
    include "../plugins/config.php";
    
    $nip = $_POST['nip'];
    $namadiklat = $_POST['namadiklat'];
    
    // Mencegah MySQL injection
    $nip_ = stripslashes($nip);
    $nip__ = mysqli_real_escape_string($con,$nip_);
    $namadiklat_ = stripslashes($namadiklat);
    $namadiklat__ = mysqli_real_escape_string($con,$namadiklat_);    

    $selectinovasi = mysqli_query($con,"SELECT id_rtl FROM rtl WHERE nip='".$nip__."' AND namadiklat='".$namadiklat__."'");
    
    while($baris=mysqli_fetch_array($selectinovasi))
    {
        echo '<p style="text-align: center;">Terima kasih, pendaftaran RTL Anda untuk diklat '.$namadiklat__.' telah berhasil. <br>Anda bisa mengecek RTL Anda dengan mengklik menu <b>Direktori RTL</b>.</p>';
                //.'<p>Klik tombol di bawah ini untuk mencetak bukti pendaftaran RTL.<p><br>
//<center><form method="get" action="cetak_bukti.php" target="_blank">
    //<input type="hidden" name="id" value="'.$baris['id_rtl'].'">
    //<button type="submit" class="btn btn-primary btn-lg" name="cetak"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Cetak bukti pendaftaran RTL</button>
//</form></center>';
        
    }
