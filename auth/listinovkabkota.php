<?php
    include "../plugins/config.php";
    
    $no=0;
    if(isset($_POST['nmkabkota'])){
        $nmkabkota = $_POST['nmkabkota'];
        // Mencegah MySQL injection
        $nmkabkota_ = stripslashes($nmkabkota);
        $nmkabkota__ = mysqli_real_escape_string($con, $nmkabkota_);
        
        //jika dipilih SEMUA Kab/Kota
        if($nmkabkota__=='semua'){
            $selectinovasi = mysqli_query($con,"SELECT inovasi.id, inovasi.jenis_inovasi, inovasi.judul, inovasi.namadiklat, inovasi.status, inovasi.asal_peserta, DATE_FORMAT(inovasi.tglsubmit,'%d/%m/%Y %T') AS tglsubmit, DATE_FORMAT(inovasi.tglveri,'%d/%m/%Y %T') AS tglveri, peserta.nama FROM inovasi INNER JOIN peserta ON inovasi.nip = peserta.nip WHERE inovasi.asal_peserta<>'internal' ORDER BY inovasi.tglsubmit DESC");     
        }
        //jika nama diklatnya dipilih dari dropdown
        else{
            $selectinovasi = mysqli_query($con,"SELECT inovasi.id, inovasi.jenis_inovasi, inovasi.judul, inovasi.namadiklat, inovasi.status, inovasi.asal_peserta, DATE_FORMAT(inovasi.tglsubmit,'%d/%m/%Y %T') AS tglsubmit, DATE_FORMAT(inovasi.tglveri,'%d/%m/%Y %T') AS tglveri, peserta.nama FROM inovasi INNER JOIN peserta ON inovasi.nip = peserta.nip WHERE inovasi.asal_peserta='".$nmkabkota__."' ORDER BY inovasi.tglsubmit DESC");      
        }              
    }
    
    //jika tidak ada data ditemukan
    if(mysqli_num_rows($selectinovasi)==0){
        echo '<tr>
        <td colspan=100%>Tidak ada data</td>
        </tr>';
    }
    //jika data ditemukan
    else{
        while($baris=mysqli_fetch_array($selectinovasi)){
            $no++;
            //jika belum diverifikasi
            if($baris['status']==0){
                $status='<small><span class="label label-warning" title="belum diverifikasi">•</span></small>';
                $btnveri='<a onclick="return confirmver()" href="verinovkabkota.php?id='.$baris['id'].'" title="verifikasi"><span class="glyphicon glyphicon-check"></span></a>';
            }
            //jika sudah diverifikasi
            else{
                $status='<small><span class="label label-success" title="telah diverifikasi pada '.$baris['tglveri'].'">•</span></small>';
                $btnveri='';
            }
            echo '<tr>
            <td>
                <center>'.$no.'</center></td><td><a class="tautan" href="inovasi.php?id='.$baris['id'].'">'.strtoupper($baris['judul']).'</a>
            </td>
            <td>'.$baris['namadiklat'].'</td>
            <td>'.$baris['nama'].'</td>
                <td>'.$baris['asal_peserta'].'</td>
            <td><small>'.$baris['tglsubmit'].'</small><br>'.$status.'</td>
            <td>'.$btnveri.'<a href="editinovasi.php?id='.$baris['id'].'" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
            </td>
            </tr>';
        }        
    }

?>