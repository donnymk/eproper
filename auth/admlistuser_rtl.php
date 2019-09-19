<?php
    include "../plugins/config.php";
    include "../plugins/enkrip-dekrip.php";

    $no=0;
    if(isset($_POST['namadiklat']))
    {
        $namadiklat = mysqli_real_escape_string($con, $_POST['namadiklat']);
        if($namadiklat=='semua')
        {
            //where tipe internal karena yang ditampilkan adalah user dari peserta yang melakukan diklat di BPSDMD
            $selectuser = mysqli_query($con,"SELECT * FROM user WHERE namadiklat!='-' AND tipe='fungsional'");     
        }
        else
        {
            //where tipe internal karena yang ditampilkan adalah user dari peserta yang melakukan diklat di BPSDMD
            $selectuser = mysqli_query($con,"SELECT * FROM user WHERE namadiklat='".$namadiklat."' AND namadiklat!='-' AND tipe='fungsional'");   
        }         
    }  

    if(mysqli_num_rows($selectuser)==0)
    {
        echo '<tr><td></td><td>Tidak ada data</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
    }

    else{
        while($baris=mysqli_fetch_array($selectuser)){
            $no++;       
            echo '<tr>'
            . '<td>'.$no.'</td>'
            . '<td>'.htmlspecialchars($baris['user']).'</td>'
            . '<td>'.dekrip($baris['password']).'</td>'
            . '<td>'.htmlspecialchars($baris['nama']).'</td>'
            . '<td>'.htmlspecialchars($baris['nip']).'</td>'
            . '<td>'.htmlspecialchars($baris['jabatan']).'</td>'
            . '<td>'.htmlspecialchars($baris['skpd']).'</td>'
            . '<td>'.htmlspecialchars($baris['namadiklat']).'</td>'
            . '<td>'
                . '<input type="checkbox" name="id[]" value="'.htmlspecialchars($baris['id']).'">&nbsp<a onclick="return confirmdel()" href="admdeluser_rtl.php?id='.htmlspecialchars($baris['id']).'"><span class="glyphicon glyphicon-remove"></span></a>'
            . '</td>'
            . '</tr>';
        }        
    }
?>