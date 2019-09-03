<?php
    include "../plugins/config.php";

    
    $nip = $_POST['nip'];
    $namadiklat = $_POST['namadiklat1']; 
    $jenisdiklat = $_POST['jenisdiklat'];
    $tahun = $_POST['tahun1'];
    $asalkabkota = $_POST['asalkabkota'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $skpd = $_POST['skpd'];
    $pemda = $_POST['pemda'];
    $judul = $_POST['judul'];
    $kelompok = $_POST['kelompok'];
    $jenisinovasi = $_POST['jenisinovasi'];
    $latarbelakang = $_POST['latarbelakang'];
    $manfaat = $_POST['manfaat'];
    $milestone = $_POST['milestone'];

    // Mencegah MySQL injection
    $nip_ = stripslashes($nip);
    $nip__ = mysqli_real_escape_string($con,$nip_);
    
    $namadiklat_ = stripslashes($namadiklat);
    $namadiklat__ = mysqli_real_escape_string($con,$namadiklat_);
    
    $jenisdiklat_ = stripslashes($jenisdiklat);
    $jenisdiklat__ = mysqli_real_escape_string($con,$jenisdiklat_);
    
    $tahun_ = stripslashes($tahun);
    $tahun__ = mysqli_real_escape_string($con,$tahun_);

    $asalkabkota_ = stripslashes($asalkabkota);
    $asalkabkota__ = mysqli_real_escape_string($con,$asalkabkota_);    
    
    $nama_ = stripslashes($nama);
    $nama__ = mysqli_real_escape_string($con,$nama_);
    
    $jabatan_ = stripslashes($jabatan);
    $jabatan__ = mysqli_real_escape_string($con,$jabatan_);
    
    $skpd_ = stripslashes($skpd);
    $skpd__ = mysqli_real_escape_string($con,$skpd_);  
    
    $pemda_ = stripslashes($pemda);
    $pemda__ = mysqli_real_escape_string($con,$pemda_);    
    
    $judul_ = stripslashes($judul);
    $judul__ = mysqli_real_escape_string($con,$judul_);
    
    $kelompok_ = stripslashes($kelompok);
    $kelompok__ = mysqli_real_escape_string($con,$kelompok_);

    $jenisinovasi_ = stripslashes($jenisinovasi);
    $jenisinovasi__ = mysqli_real_escape_string($con,$jenisinovasi_);
    
    $latarbelakang_ = stripslashes($latarbelakang);
    $latarbelakang__ = mysqli_real_escape_string($con,$latarbelakang_);
    
    $manfaat_ = stripslashes($manfaat);
    $manfaat__ = mysqli_real_escape_string($con,$manfaat_);
    
    $milestone_ = stripslashes($milestone);
    $milestone__ = mysqli_real_escape_string($con,$milestone_);
    
    //cek peserta apakah sudah ada dalam database, jika belum ada maka masukkan. Jika sadah ada, update infomasinya.
    $cekpeserta = mysqli_query($con,"SELECT nip FROM peserta WHERE nip='".$nip__."'");
    
    
    $insertinovasi = "INSERT INTO inovasi (`nip`, `namadiklat`, `jenisdiklat`, `tahun`, `kelompok`, `jenis_inovasi`, `judul`, `latarbelakang`, `manfaat`, `milestone`, `status`, `tglsubmit`, `asal_peserta`) VALUES('$nip__','$namadiklat__','$jenisdiklat__','$tahun__','$kelompok__','$jenisinovasi__','$judul__','$latarbelakang__','$manfaat__','$milestone__',0,now(),'$asalkabkota__')";
    
    if(mysqli_num_rows($cekpeserta)=='0'){
        $query = "INSERT INTO peserta (`nip`, `nama`, `jabatan`, `skpd`, `pemda`) VALUES('$nip__','$nama__','$jabatan__','$skpd__','$pemda__'); "
                . $insertinovasi;          
    }
    else{
        $query = "UPDATE peserta SET nama='".$nama__."', jabatan='".$jabatan__."', skpd='".$skpd__."', pemda='".$pemda__."' WHERE nip='".$nip__."'; "
                . $insertinovasi;         
    }
 
    
    $eksekusi = mysqli_multi_query($con, $query);
    if($eksekusi){
        echo "<script>alert('Data berhasil dimasukkan'); location.replace('./')</script>";
    }
    else{
        print($query);
        echo mysqli_error($con);
    }
    