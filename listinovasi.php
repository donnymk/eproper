<?php
    include "plugins/config.php";
    
    $no=0;
    if(isset($_POST['namadiklat'])){
        $namadiklat = $_POST['namadiklat'];
        
        // Mencegah MySQL injection
        $namadiklat_ = stripslashes($namadiklat);
        $namadiklat__ = mysqli_real_escape_string($con,$namadiklat_); 
        
        if($namadiklat__=='semua'){
            //jika dipilih SEMUA diklat
            $selectinovasi = mysqli_query($con,"SELECT inovasi.id, inovasi.kelompok, inovasi.judul, inovasi.status, peserta.nama FROM inovasi INNER JOIN peserta ON inovasi.nip = peserta.nip WHERE status=1 AND inovasi.asal_peserta='internal' ORDER BY inovasi.tglsubmit DESC");
        }
        else{
            //jika nama diklatnya dipilih dari dropdown
            $selectinovasi = mysqli_query($con,"SELECT inovasi.id, inovasi.kelompok, inovasi.judul, inovasi.status, peserta.nama FROM inovasi INNER JOIN peserta ON inovasi.nip = peserta.nip WHERE namadiklat='".$namadiklat__."' AND status=1 AND inovasi.asal_peserta='internal' ORDER BY inovasi.tglsubmit DESC");
        }              
    }

   
    if(mysqli_num_rows($selectinovasi)==0){
        //echo '<tr><td colspan="4"><center>Tidak ada data</center></td></tr>';
        echo '<tr><td></td><td>Tidak ada data</td><td></td></tr>';
    }
    else{
        while($baris=mysqli_fetch_array($selectinovasi)){
            $no++;
            echo '<tr><td><center>'.$no.'</center></td><td><a class="tautan" href="inovasi.html?id='.htmlspecialchars($baris['id']).'">'.strtoupper(htmlspecialchars($baris['judul'])).'</a></td><td>'.htmlspecialchars($baris['nama']).'</td></tr>';
        }        
    }

?>