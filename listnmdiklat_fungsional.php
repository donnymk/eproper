<?php
    include "plugins/config.php";

    date_default_timezone_set('Asia/Jakarta');  

    // tampilkan list nama diklat dari daftar proper yang disubmit
    $selectnmdiklat = mysqli_query($con,"SELECT namadiklat, tahun FROM rtl WHERE jenisdiklat = 'Diklat Fungsional' GROUP BY namadiklat ORDER BY tglsubmit ASC");
    echo '<option value="semua">Semua Diklat Fungsional</option>';
    while($baris = mysqli_fetch_array($selectnmdiklat))
    {
        echo '<option value="'.$baris['namadiklat'].'|'.$baris['tahun'].'">'.$baris['namadiklat'].' ('.$baris['tahun'].')</option>';
    }