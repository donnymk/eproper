<?php
    include "../plugins/session_kabkota.php";
    include "../plugins/config.php";
    
    $no=0;
    if(isset($_POST['nmkabkota'])){
        $nmkabkota = $_POST['nmkabkota'];
        //jika dipilih SEMUA Kab/Kota
        if($nmkabkota=='semua'){
            $selectinovasi = mysqli_query($con,"SELECT inovasi.id, inovasi.jenis_inovasi, inovasi.judul, inovasi.status, inovasi.asal_peserta, DATE_FORMAT(inovasi.tglsubmit,'%d/%m/%Y %T') AS tglsubmit, DATE_FORMAT(inovasi.tglveri,'%d/%m/%Y %T') AS tglveri, peserta.nama FROM inovasi INNER JOIN peserta ON inovasi.nip = peserta.nip WHERE inovasi.asal_peserta<>'internal' ORDER BY inovasi.tglsubmit DESC");     
        }
        //jika nama diklatnya dipilih dari dropdown
        else{
            $selectinovasi = mysqli_query($con,"SELECT inovasi.id, inovasi.jenis_inovasi, inovasi.judul, inovasi.status, inovasi.asal_peserta, DATE_FORMAT(inovasi.tglsubmit,'%d/%m/%Y %T') AS tglsubmit, DATE_FORMAT(inovasi.tglveri,'%d/%m/%Y %T') AS tglveri, peserta.nama FROM inovasi INNER JOIN peserta ON inovasi.nip = peserta.nip WHERE inovasi.asal_peserta='".$nmkabkota."' ORDER BY inovasi.tglsubmit DESC");      
        }              
    }
    
    //jika tidak ada data ditemukan
    if(mysqli_num_rows($selectinovasi) == 0){
        echo '<tr><td></td><td>Tidak ada data</td><td></td><td></td><td></td></tr>';
    }
    //jika data ditemukan
    else{
        while($baris = mysqli_fetch_array($selectinovasi)){
            $no++;
            $tombol_edit = '';
            $tombol_cetak = '';            
            
            //jika belum diverifikasi
            if($baris['status'] == 0){
                $status='<small><span class="label label-warning" title="belum diverifikasi">•</span></small>';
            }
            //jika sudah diverifikasi
            else{
                $status='<small><span class="label label-success" title="telah diverifikasi pada '.$baris['tglveri'].'">•</span></small>';
            }
            
            if($baris['asal_peserta'] == $_SESSION['nama']){
                $tombol_edit = '<a class="w3-btn w3-tiny w3-deep-orange" href="editinovasi.php?id='.$baris['id'].'"><span class="glyphicon glyphicon-edit"></span> Edit</a>';
                $tombol_cetak = '<a class="w3-btn w3-tiny w3-deep-orange" href="cetak_bukti.php?id='.$baris['id'].'" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak bukti</a>';
            }
            
            echo '<tr>'
            . '<td><center>'.$no.'</center></td>'
                    . '<td><a class="tautan" href="inovasi.php?id='.$baris['id'].'">'.strtoupper($baris['judul']).'</a></td>'
                    . '<td>'.$baris['nama'].'</td>'
                    . '<td>'.$baris['jenis_inovasi'].'</td>'
                    . '<td><small>'.$baris['tglsubmit'].'</small><br>'.$status.'</td>'
                    . '<td>'
                    . ' <div class="w3-padding-small">'
                    . $tombol_edit
                    . '</div> '
                    . ' <div class="w3-padding-small">'
                    . $tombol_cetak
                    . '</div> '                    
                    . '</td>'
                    . '</tr>';
        }        
    }
?>