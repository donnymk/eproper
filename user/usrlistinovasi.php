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
            $selectinovasi = mysqli_query($con,"SELECT inovasi.id, inovasi.jenis_inovasi, inovasi.judul, inovasi.status, DATE_FORMAT(inovasi.tglsubmit,'%d/%m/%Y %T') AS tglsubmit, DATE_FORMAT(inovasi.tglveri,'%d/%m/%Y %T') AS tglveri, peserta.nama FROM inovasi INNER JOIN peserta ON inovasi.nip = peserta.nip ORDER BY inovasi.tglsubmit DESC");     
        }
        //jika nama diklatnya dipilih dari dropdown
        else{
            $selectinovasi = mysqli_query($con,"SELECT inovasi.id, inovasi.jenis_inovasi, inovasi.judul, inovasi.status, DATE_FORMAT(inovasi.tglsubmit,'%d/%m/%Y %T') AS tglsubmit, DATE_FORMAT(inovasi.tglveri,'%d/%m/%Y %T') AS tglveri, peserta.nama FROM inovasi INNER JOIN peserta ON inovasi.nip = peserta.nip WHERE namadiklat='".$namadiklat__."' ORDER BY inovasi.tglsubmit DESC");      
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
            echo '<tr><td><center>'.$no.'</center></td><td><a class="tautan" href="inovasi.php?id='.$baris['id'].'">'.strtoupper($baris['judul']).'</a></td><td>'.$baris['nama'].'</td><td>'.$baris['jenis_inovasi'].'</td><td><small>'.$baris['tglsubmit'].'</small><br>'.$status.'</td></tr>';
        }        
    }

?>