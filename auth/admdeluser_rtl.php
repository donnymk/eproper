<?php
    include "../plugins/config.php";
    
    $id = mysqli_real_escape_string($con, $_GET['id']);

    $deluser = mysqli_query($con,"DELETE FROM user WHERE id=".$id);
    if($deluser){
        //echo"<script>alert('Hapus berhasil')</script>";
        echo"<script>window.location='lihatuser_rtl.php';</script>";
    }
    else{
        echo"<script>alert('Hapus gagal')</script>";
        echo"<script>window.location='lihatuser_rtl.php';</script>";
    }
?>