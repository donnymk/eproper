<?php
    include "../plugins/config.php";

    //date_default_timezone_set('Asia/Jakarta');
    //$tanggalskr=date('Y-m-d H:i:s');
    //$bulanskr=date('m');
    //$tahunskr=date('Y');    
    
    $id = $_GET['id'];
    // Mencegah MySQL injection
    $id_ = stripslashes($id);
    $id__ = mysqli_real_escape_string($con,$id_);    

    $delinovasi = mysqli_query($con,"DELETE FROM inovasi WHERE id=".$id__);
    if($delinovasi){
        //echo"<script>alert('Hapus berhasil')</script>";
        echo"<script>window.location='./';</script>";
    }
    else{
        echo"<script>alert('Hapus gagal')</script>";
        echo"<script>window.location='./';</script>";
    }
?>