<?php
    include "../plugins/config.php";
    include '../plugins/session_superadmin.php';

    $id = $_POST['idinovasi'];
    $nip = $_POST['viewnip'];
    $nama = $_POST['viewnama'];
    $niplama = $_POST['viewniplama'];
    $jabatan = $_POST['viewjabatan'];
    $skpd = $_POST['viewskpd'];
    $pemda = $_POST['viewpemda'];
    $judul = $_POST['inovasi'];
    $kelompok = $_POST['viewkelompok'];
    $jenisinovasi = $_POST['viewjenisinov'];
    $latarbelakang = $_POST['viewlatarblkg'];
    $manfaat = $_POST['viewmanfaat'];
    $milestone = $_POST['viewmilestone'];
    
   // Mencegah MySQL injection
    $id_ = stripslashes($id);
    $id__ = mysqli_real_escape_string($con,$id_);
    
    $nip_ = stripslashes($nip);
    $nip__ = mysqli_real_escape_string($con,$nip_);
    
    $nama_ = stripslashes($nama);
    $nama__ = mysqli_real_escape_string($con,$nama_);
    
    $niplama_ = stripslashes($niplama);
    $niplama__ = mysqli_real_escape_string($con,$niplama_);
    
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
    

    //update inovasi, pesertanya dan usernya sekalian
    $update_peserta = "UPDATE peserta SET nip = '".$nip__."', nama = '".$nama__."', jabatan = '".$jabatan__."', skpd = '".$skpd__."', pemda = '".$pemda__."' WHERE nip = '".$niplama__."';";
    $update_inovasi = "UPDATE inovasi SET kelompok = '".$kelompok__."', jenis_inovasi = '".$jenisinovasi__."', judul = '".$judul__."', latarbelakang = '".$latarbelakang__."', manfaat = '".$manfaat__."', milestone = '".$milestone__."' WHERE id = '".$id__."';";
    $update_user = "UPDATE user SET nip = '".$nip__."', nama = '".$nama__."', jabatan = '".$jabatan__."', skpd = '".$skpd__."' WHERE nip = '".$niplama__."';";
    
    $query = $update_peserta.$update_inovasi.$update_user;

    $eksekusi = mysqli_multi_query($con, $query);       

    if($eksekusi){
        echo '<script>alert("Update Berhasil");window.location="inovasi.php?id='.$id.'"</script>';
    }
    else{
        echo '<script>alert("Update Gagal. '. mysqli_error($con).'");window.location="inovasi.php?id='.$id.'"</script>';
    }
