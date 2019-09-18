<?php
    include "../plugins/config.php";

    $id = $_GET['id'];
    // Mencegah MySQL injection
    $id = stripslashes($id);
    $id = mysqli_real_escape_string($con,$id);    
    
    //jika yang dihapus adalah inovasi dari Kabupaten / Kota
    if(isset($_GET['tipe'])){
        $tipe = $_GET['tipe'];
        if($tipe == 'kabkota'){
             $skrip = "<script>window.location='dinokabkota.php';</script>";
        }
    }
    else{
        $skrip = "<script>window.location='./';</script>";
    }    

    $delinovasi = mysqli_query($con,"DELETE FROM rtl WHERE id_rtl=".$id);
    if($delinovasi){       
        echo $skrip;
    }
    else{
        echo $skrip;
    }