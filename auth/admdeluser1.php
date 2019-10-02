<?php
    include "../plugins/config.php";
    
    $id = $_GET['id'];
    // Mencegah MySQL injection
    $id_ = stripslashes($id);
    $id__ = mysqli_real_escape_string($con,$id_); 

    $deluser = mysqli_query($con,"DELETE FROM user WHERE id=".$id__);
    if($deluser){
        //echo"<script>alert('Hapus berhasil')</script>";
        echo"<script>window.location='lihatuser1.php';</script>";
    }
    else{
        echo"<script>alert('Hapus gagal')</script>";
        echo"<script>window.location='lihatuser1.php';</script>";
    }
?>