 <?php
 ob_start();
    include "../plugins/config.php";

    
    $nip = $_POST['nomorinduk'];
    $namadiklat = $_POST['namadiklat1'];
    $jenisdiklat = $_POST['jenisdiklat'];
    $tahun = $_POST['tahun1'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $skpd = $_POST['skpd'];
    $pemda = $_POST['pemda'];
    $judul = $_POST['judul'];
    $ruanglingkup = $_POST['ruanglingkup'];
    $cluster = $_POST['cluster'];
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
    
    $ruanglingkup_ = stripslashes($ruanglingkup);
    $ruanglingkup__ = mysqli_real_escape_string($con,$ruanglingkup_);     

    $cluster_ = stripslashes($cluster);
    $cluster__ = mysqli_real_escape_string($con,$cluster_);
    
    $latarbelakang_ = stripslashes($latarbelakang);
    $latarbelakang__ = mysqli_real_escape_string($con,$latarbelakang_);
    
    $manfaat_ = stripslashes($manfaat);
    $manfaat__ = mysqli_real_escape_string($con,$manfaat_);
    
    $milestone_ = stripslashes($milestone);
    $milestone__ = mysqli_real_escape_string($con,$milestone_);
    
    //cek peserta apakah sudah masuk ke database
    $cekpeserta = mysqli_query($con,"SELECT nip FROM peserta WHERE nip='".$nip__."'");
    

    $insertinovasi = "INSERT INTO rtl (`nip`, `namadiklat`, `jenisdiklat`, `tahun`, `ruanglingkup`, `cluster`, `judul`, `latarbelakang`, `manfaat`, `milestone`, `status`, `tglsubmit`, `asalpeserta`) VALUES('$nip__', '$namadiklat__', '$jenisdiklat__', '$tahun__', '$ruanglingkup__', '$cluster__', '$judul__', '$latarbelakang__', '$manfaat__', '$milestone__', '0', now(), 'internal')";
    
    if(mysqli_num_rows($cekpeserta)=='0')
    {
        $query = "INSERT INTO peserta (`nip`, `nama`, `jabatan`, `skpd`, `pemda`) VALUES('$nip__','$nama__','$jabatan__','$skpd__','$pemda__') ";           
    }
    else
    {
        $query = "UPDATE peserta SET nama='".$nama__."', jabatan='".$jabatan__."', skpd='".$skpd__."', pemda='".$pemda__."' WHERE nip='".$nip__."'";
                    
    }
 
    
    $eksekusi = mysqli_query($con, $insertinovasi);
    $eksekusi2 = mysqli_query($con, $query);

    if($eksekusi)
    { ?>
        <script>window.location = "success_rtl.php?nip=<?= $nip ?>&namadiklat=<?= $namadiklat ?>"</script>
        <?php
        //echo '<p>Terima kasih, pendaftaran inovasi Anda untuk diklat '.$namadiklat.' telah berhasil. Selanjutnya akan dilakukan verifikasi oleh Bidang Manajerial sebelum inovasi Anda ditampilkan di halaman publik. <a href="index.php"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Lihat Inovasi Anda</a></p>';        
    }
    else
    {
        print($eksekusi);
        echo mysqli_error($con);
        
    }
