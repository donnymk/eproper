<?php
    include "../plugins/config.php";
    include '../plugins/session_superadmin.php';
    
    $id = $_GET['id'];
   // Mencegah MySQL injection
    $id_ = stripslashes($id);
    $id__ = mysqli_real_escape_string($con,$id_);

    $verinovasi = mysqli_query($con,"UPDATE rtl SET status=1, tglveri=now() WHERE id_rtl=".$id__);
    if($verinovasi){
        //echo"<script>alert('Hapus berhasil')</script>";
        echo"<script>window.location='dir_rtl.php';</script>";
    }
    else{
        echo"<script>alert('Update gagal')</script>";
        echo"<script>window.location='dir_rtl.php';</script>";
    }
