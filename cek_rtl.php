<?php
    include "plugins/config.php";  
    //    include '../plugins/session_admin.php';
    
    $nip = $_POST['nip'];
    // Mencegah MySQL injection
    $nip_ = stripslashes($nip);
    $nip__ = mysqli_real_escape_string($con,$nip_); 

    $namadiklat = $_POST['namadiklat'];
    // Mencegah MySQL injection
    $namadiklat_ = stripslashes($namadiklat);
    $namadiklat__ = mysqli_real_escape_string($con,$namadiklat_); 

    $selectinovasi = mysqli_query($con,"SELECT id_rtl FROM rtl WHERE nip='".$nip__."' AND namadiklat='".$namadiklat__."'");
    $datainovasi=array();
    if(mysqli_num_rows($selectinovasi)==0){
        array_push($datainovasi,array("pesan"=>"noready")); 
    }
    else{
        while($baris=mysqli_fetch_array($selectinovasi)){
            array_push($datainovasi,array("pesan"=>"already","id"=>$baris["id_rtl"]));
        }
    }

    echo json_encode($datainovasi);
    