<?php
    include "../plugins/config.php";

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $checked = count($id);
        
        for($x=0;$x<$checked;$x++){
            mysqli_query($con,"DELETE FROM user WHERE id=".$id[$x]);
        }
        echo"<script>window.location='lihatuser.php';</script>";        
    }
    
    else{
        echo"<script>alert('Tidak ada data yang dipilih.');"
        ."window.location='lihatuser.php';</script>";         
    }
?>