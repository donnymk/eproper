<?php
    include "../plugins/config.php";
    
    $no=0;
    if(isset($_POST['namadiklat'])){
        $namadiklat = $_POST['namadiklat'];
        // Mencegah MySQL injection
        $namadiklat_ = stripslashes($namadiklat);
        $namadiklat__ = mysqli_real_escape_string($con,$namadiklat_);
        
        //jika dipilih SEMUA diklat
        if($namadiklat__=='semua'){
            $selectinovasi = mysqli_query($con,"SELECT rtl.id_rtl, rtl.cluster, rtl.judul, rtl.status, DATE_FORMAT(rtl.tglsubmit,'%d/%m/%Y %T') AS tglsubmit, DATE_FORMAT(rtl.tglveri,'%d/%m/%Y %T') AS tglveri, peserta.nama FROM rtl INNER JOIN peserta ON rtl.nip = peserta.nip ORDER BY rtl.tglsubmit DESC");     
        }
        //jika nama diklatnya dipilih dari dropdown
        else{
            $selectinovasi = mysqli_query($con,"SELECT rtl.id_rtl, rtl.cluster, rtl.judul, rtl.status, DATE_FORMAT(rtl.tglsubmit,'%d/%m/%Y %T') AS tglsubmit, DATE_FORMAT(rtl.tglveri,'%d/%m/%Y %T') AS tglveri, peserta.nama FROM rtl INNER JOIN peserta ON rtl.nip = peserta.nip WHERE namadiklat='".$namadiklat__."' ORDER BY rtl.tglsubmit DESC");      
        }              
    }
    
    //jika tidak ada data ditemukan
    if(mysqli_num_rows($selectinovasi)==0){
        echo '<tr><td></td><td>Tidak ada data</td><td></td><td></td><td></td></tr>';
    }
    //jika data ditemukan
    else{
        while($baris=mysqli_fetch_array($selectinovasi)){
            $no++;
            //jika belum diverifikasi
            if($baris['status']==0){
                $status='<small><span class="label label-warning" title="belum diverifikasi">•</span></small>';
            }
            //jika sudah diverifikasi
            else{
                $status='<small><span class="label label-success" title="telah diverifikasi pada '.$baris['tglveri'].'">•</span></small>';
            }
            echo '<tr><td><center>'.$no.'</center></td><td><a class="tautan" href="rtl.php?id='.htmlspecialchars($baris['id_rtl']).'">'.strtoupper(htmlspecialchars($baris['judul'])).'</a></td><td>'.htmlspecialchars($baris['nama']).'</td><td>'.htmlspecialchars($baris['cluster']).'</td><td><small>'.htmlspecialchars($baris['tglsubmit']).'</small><br>'.$status.'</td></tr>';
        }        
    }

?>