<?php
    include "../plugins/config.php";

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $checked = count($id);
        
        for($x=0;$x<$checked;$x++){
            // Mencegah MySQL injection
            $id_[$x] = stripslashes($id[$x]);
            $id__[$x] = mysqli_real_escape_string($con,$id_[$x]);
            
            mysqli_query($con,"DELETE FROM user WHERE id=".$id__[$x]);
        }
        echo"<script>window.location='lihatuser1.php';</script>";        
    }
    
    else{
        echo"<script>alert('Tidak ada data yang dipilih.');"
        ."window.location='lihatuser1.php';</script>";         
    }
?>