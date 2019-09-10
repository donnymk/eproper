<?php
    include "../plugins/config.php";
    
    $no=0;
    if(isset($_POST['namadiklat'])){
        $namadiklat = $_POST['namadiklat'];

        // Mencegah MySQL injection
        $namadiklat_ = stripslashes($namadiklat);
        $namadiklat__ = mysqli_real_escape_string($con, $namadiklat_);         
        
        if($namadiklat__=='semua'){
            $selectinovasi = mysqli_query($con,"SELECT rtl.id_rtl, rtl.judul, rtl.namadiklat, rtl.status, peserta.nama, peserta.pemda, DATE_FORMAT(rtl.tglsubmit,'%d/%m/%Y %T') AS tglsubmit, DATE_FORMAT(rtl.tglveri,'%d/%m/%Y %T') AS tglveri FROM rtl INNER JOIN peserta ON rtl.NIP = peserta.NIP WHERE rtl.asalpeserta='internal' ORDER BY tglsubmit DESC");     
        }
        else{
            $selectinovasi = mysqli_query($con,"SELECT rtl.id_rtl, rtl.judul, rtl.namadiklat, rtl.status, peserta.nama, peserta.pemda, DATE_FORMAT(rtl.tglsubmit,'%d/%m/%Y %T') AS tglsubmit, DATE_FORMAT(rtl.tglveri,'%d/%m/%Y %T') AS tglveri FROM rtl INNER JOIN peserta ON rtl.NIP = peserta.NIP WHERE rtl.namadiklat='".$namadiklat__."' AND rtl.asalpeserta='internal' ORDER BY tglsubmit DESC");      
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
                $btnveri='<a onclick="return confirmver()" href="verirtl.php?id='.$baris['id_rtl'].'" title="verifikasi"><span class="glyphicon glyphicon-check"></span>&nbsp</a>';
            }
            else{
                $status='<small><span class="label label-success" title="telah diverifikasi pada '.$baris['tglveri'].'">•</span></small>';
                $btnveri='';
            }        
            echo '<tr>
            <td>'.$no.'</td>
            <td><a class="tautan" href="rtl.php?id='.$baris['id_rtl'].'">'.strtoupper($baris['judul']).'</a></td>
            <td>'.$baris['namadiklat'].'</td>
            <td>'.$baris['nama'].'</td>
            <td>'.$baris['pemda'].'</td>
            <td><small>'.$baris['tglsubmit'].'</small><br>'.$status.'</td>
            <td>'.$btnveri.'<a href="editrtl.php?id='.$baris['id_rtl'].'" title="edit"><span class="glyphicon glyphicon-edit"></span></a></td>
           </tr>';
        }        
    }
