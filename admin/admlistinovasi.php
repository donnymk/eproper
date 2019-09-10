<?php
    include "../plugins/config.php";
    
    $no=0;
    if(isset($_POST['namadiklat'])){
        $namadiklat = $_POST['namadiklat'];
        // Mencegah MySQL injection
        $namadiklat_ = stripslashes($namadiklat);
        $namadiklat__ = mysqli_real_escape_string($con, $namadiklat_);         
        
        if($namadiklat__=='semua'){
            $selectinovasi = mysqli_query($con,"SELECT inovasi.id, inovasi.judul, inovasi.namadiklat, inovasi.status, peserta.nama, peserta.pemda, DATE_FORMAT(inovasi.tglsubmit,'%d/%m/%Y %T') AS tglsubmit, DATE_FORMAT(inovasi.tglveri,'%d/%m/%Y %T') AS tglveri FROM inovasi INNER JOIN peserta ON inovasi.NIP = peserta.NIP WHERE inovasi.asal_peserta='internal' ORDER BY tglsubmit DESC");     
        }
        else{
            $selectinovasi = mysqli_query($con,"SELECT inovasi.id, inovasi.judul, inovasi.namadiklat, inovasi.status, peserta.nama, peserta.pemda, DATE_FORMAT(inovasi.tglsubmit,'%d/%m/%Y %T') AS tglsubmit, DATE_FORMAT(inovasi.tglveri,'%d/%m/%Y %T') AS tglveri FROM inovasi INNER JOIN peserta ON inovasi.NIP = peserta.NIP WHERE inovasi.namadiklat='".$namadiklat__."' AND inovasi.asal_peserta='internal' ORDER BY tglsubmit DESC");      
        }         
    }
    
    if(mysqli_num_rows($selectinovasi)==0){
        echo '<tr>

        <td colspan=100%>Tidak ada data</td>

        </tr>';
    }
    else{
        while($baris=mysqli_fetch_array($selectinovasi)){
            $no++;
            if($baris['status']==0){
                $status='<small><span class="label label-warning" title="belum diverifikasi">•</span></small>';
                $btnveri='<a onclick="return confirmver()" href="verinovasi.php?id='.$baris['id'].'" title="verifikasi"><span class="glyphicon glyphicon-check"></span>&nbsp</a>';
            }
            else{
                $status='<small><span class="label label-success" title="telah diverifikasi pada '.$baris['tglveri'].'">•</span></small>';
                $btnveri='';
            }        
            echo '<tr>
            <td>'.$no.'</td>
            <td><a class="tautan" href="inovasi.php?id='.htmlspecialchars($baris['id']).'">'.strtoupper(htmlspecialchars($baris['judul'])).'</a></td>
            <td>'.htmlspecialchars($baris['namadiklat']).'</td>
            <td>'.htmlspecialchars($baris['nama']).'</td>
            <td>'.htmlspecialchars($baris['pemda']).'</td>
            <td><small>'.$baris['tglsubmit'].'</small><br>'.$status.'</td>
            <td>'.$btnveri.'<a href="editinovasi.php?id='.htmlspecialchars($baris['id']).'" title="edit"><span class="glyphicon glyphicon-edit"></span></a></td>
           </tr>';
        }        
    }
