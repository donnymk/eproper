<?php
    include "plugins/config.php";
    
    $no=0;
    if(isset($_POST['nmkabkota'])){
        $nmkabkota = $_POST['nmkabkota'];
        
        // Mencegah MySQL injection
        $nmkabkota = stripslashes($nmkabkota);
        $nmkabkota = mysqli_real_escape_string($con,$nmkabkota);         
        
        //jika dipilih SEMUA Kab/Kota
        if($nmkabkota=='semua'){
            $selectinovasi = mysqli_query($con,"SELECT inovasi.id, inovasi.jenis_inovasi, inovasi.judul, inovasi.status, inovasi.asal_peserta, DATE_FORMAT(inovasi.tglsubmit,'%d/%m/%Y %T') AS tglsubmit, DATE_FORMAT(inovasi.tglveri,'%d/%m/%Y %T') AS tglveri, peserta.nama FROM inovasi INNER JOIN peserta ON inovasi.nip = peserta.nip WHERE status=1 AND inovasi.asal_peserta<>'internal' ORDER BY inovasi.tglsubmit DESC");     
        }
        //jika nama diklatnya dipilih dari dropdown
        else{
            $selectinovasi = mysqli_query($con,"SELECT inovasi.id, inovasi.jenis_inovasi, inovasi.judul, inovasi.status, inovasi.asal_peserta, DATE_FORMAT(inovasi.tglsubmit,'%d/%m/%Y %T') AS tglsubmit, DATE_FORMAT(inovasi.tglveri,'%d/%m/%Y %T') AS tglveri, peserta.nama FROM inovasi INNER JOIN peserta ON inovasi.nip = peserta.nip WHERE status=1 AND inovasi.asal_peserta='".$nmkabkota."' ORDER BY inovasi.tglsubmit DESC");      
        }              
    }
    
    //jika tidak ada data ditemukan
    if(mysqli_num_rows($selectinovasi)==0){
        echo '<tr><td></td><td>Tidak ada data</td><td></td></tr>';
    }
    //jika data ditemukan
    else{
        while($baris=mysqli_fetch_array($selectinovasi)){
            $no++;
            //jika belum diverifikasi
            if($baris['status']==0){
                $status='<small><span class="label label-warning" title="belum diverifikasi">•</span></small>';
                $btnveri='<a onclick="return confirmver()" href="verinovasi.php?id='.$baris['id'].'" title="verifikasi"><span class="glyphicon glyphicon-check"></span>&nbsp</a>';
            }
            //jika sudah diverifikasi
            else{
                $status='<small><span class="label label-success" title="telah diverifikasi pada '.$baris['tglveri'].'">•</span></small>';
                $btnveri='';
            }
            echo '<tr><td><center>'.$no.'</center></td><td><a class="tautan" href="inovasi.html?id='.htmlspecialchars($baris['id']).'">'.strtoupper(htmlspecialchars($baris['judul'])).'</a></td><td>'.htmlspecialchars($baris['nama']).'</td></tr>';
        }        
    }

?>