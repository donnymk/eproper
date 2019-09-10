<?php
    include "../plugins/config.php";
    include '../plugins/session_user.php';

    $id = $_POST['idinovasi'];
    $nip = $_POST['viewnip'];
    $nama = $_POST['viewnama'];
    $niplama = $_POST['viewniplama'];
    $jabatan =$_POST['viewjabatan'];
    $skpd = $_POST['viewskpd'];
    $judul = $_POST['inovasi'];
    $ruanglingkup = $_POST['viewruanglingkup'];
    $cluster = $_POST['viewcluster'];
    $latarbelakang = $_POST['viewlatarblkg'];
    $manfaat = $_POST['viewmanfaat'];
    $milestone = $_POST['viewmilestone'];
    
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

    $judul = stripslashes($judul);
    $judul = mysqli_real_escape_string($con,$judul);
    
    $ruanglingkup = stripslashes($ruanglingkup);
    $ruanglingkup = mysqli_real_escape_string($con,$ruanglingkup);     

    $cluster = stripslashes($cluster);
    $cluster = mysqli_real_escape_string($con,$cluster); 
    
    //Perbarui session NIP
    $_SESSION['nip'] = $nip;

    //update inovasi, pesertanya dan usernya sekalian
    $update_peserta = "UPDATE peserta SET nip = '".$nip."', nama = '".$nama."', jabatan = '".$jabatan."', skpd = '".$skpd."' WHERE nip = '".$niplama."';";   
    $update_inovasi = "UPDATE rtl SET ruanglingkup = '".$ruanglingkup."', cluster = '".$cluster."', judul = '".$judul."', latarbelakang = '".$latarbelakang."', manfaat = '".$manfaat."', milestone = '".$milestone."' WHERE id_rtl = '".$id."';";
    $update_user = "UPDATE user SET nip = '".$nip."', nama = '".$nama."', jabatan = '".$jabatan."', skpd = '".$skpd."' WHERE nip = '".$niplama."';";

    $query = $update_peserta.$update_inovasi.$update_user;

    $eksekusi = mysqli_multi_query($con, $query);

    if($eksekusi){
        echo '<script>alert("Update Berhasil");window.location="rtl.php?id='.$id.'"</script>';
    }
    else{
        echo '<script>alert("Update Gagal. '. mysqli_error($con).'");window.location="rtl.php?id='.$id.'"</script>';
    }
