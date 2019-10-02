<?php
    include "../plugins/config.php";
    include '../plugins/session_admin.php';

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
    
    // Mencegah MySQL injection
    $nip = stripslashes($nip);
    $nip = mysqli_real_escape_string($con,$nip);
    
    $nama = stripslashes($nama);
    $nama = mysqli_real_escape_string($con,$nama);
    
    $niplama = stripslashes($niplama);
    $niplama = mysqli_real_escape_string($con,$niplama);
    
    $jabatan = stripslashes($jabatan);
    $jabatan = mysqli_real_escape_string($con,$jabatan);
    
    $skpd = stripslashes($skpd);
    $skpd = mysqli_real_escape_string($con,$skpd);
    
    $pemda = stripslashes($pemda);
    $pemda = mysqli_real_escape_string($con,$pemda);

    $judul = stripslashes($judul);
    $judul = mysqli_real_escape_string($con,$judul);
    
    $kelompok = stripslashes($kelompok);
    $kelompok = mysqli_real_escape_string($con,$kelompok);     

    $jenisinovasi = stripslashes($jenisinovasi);
    $jenisinovasi = mysqli_real_escape_string($con,$jenisinovasi);
    
    $latarbelakang_ = stripslashes($latarbelakang);
    $latarbelakang__ = mysqli_real_escape_string($con,$latarbelakang_);
    
    $manfaat_ = stripslashes($manfaat);
    $manfaat__ = mysqli_real_escape_string($con,$manfaat_);
    
    $milestone_ = stripslashes($milestone);
    $milestone__ = mysqli_real_escape_string($con,$milestone_);      
    
    //Perbarui session NIP
    //$_SESSION['nip'] = $nip;    

    //update inovasi, pesertanya dan usernya sekalian
    $update_peserta = "UPDATE peserta SET nip = '".$nip."', nama = '".$nama."', jabatan = '".$jabatan."', skpd = '".$skpd."', pemda = '".$pemda."' WHERE nip = '".$niplama."';";
    $update_inovasi = "UPDATE inovasi SET kelompok = '".$kelompok."', jenis_inovasi = '".$jenisinovasi."', judul = '".$judul."', latarbelakang = '".$latarbelakang__."', manfaat = '".$manfaat__."', milestone = '".$milestone__."' WHERE id = '".$id__."';";
    $update_user = "UPDATE user SET nip = '".$nip."', nama = '".$nama."', jabatan = '".$jabatan."', skpd = '".$skpd."' WHERE nip = '".$niplama."';";
    
    $query = $update_peserta.$update_inovasi.$update_user;

    $eksekusi = mysqli_multi_query($con, $query);    

    if($eksekusi){
        echo '<script>alert("Update Berhasil");window.location="inovasi.php?id='.$id.'"</script>';
    }
    else{
        echo '<script>alert("Update Gagal. '. mysqli_error($con).'");window.location="inovasi.php?id='.$id.'"</script>';
    }
