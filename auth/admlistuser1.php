<?php

//tells php to show all but DEPRECATED errors
error_reporting(E_ALL ^ E_DEPRECATED);

include "../plugins/config.php";
include "../plugins/enkrip-dekrip.php";

$no = 0;
if (isset($_POST['namadiklat'])) {
    $namadiklat = $_POST['namadiklat'];

    // Mencegah MySQL injection
    $namadiklat_ = stripslashes($namadiklat);
    $namadiklat__ = mysqli_real_escape_string($con, $namadiklat_);

    if ($namadiklat == 'semua') {
        $selectuser = mysqli_query($con, "SELECT * FROM user WHERE namadiklat!='-' AND tipe='kabkota'");
    } else {
        $selectuser = mysqli_query($con, "SELECT * FROM user WHERE namadiklat='" . $namadiklat__ . "' AND namadiklat!='-' AND tipe='kabkota'");
    }
}

if (mysqli_num_rows($selectuser) == 0) {
    echo '<tr><td></td><td>Tidak ada data</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
} else {
    while ($baris = mysqli_fetch_array($selectuser)) {
        $no++;
        echo '<tr>' . '<td>' . $no . '</td>' . '<td>' . $baris['user'] . '</td>' . '<td>' . dekrip($baris['password']) . '</td>' . '<td>' . $baris['nama'] . '</td>' . '<td>' . $baris['namadiklat'] . '</td>' . '<td>' . '<input type="checkbox" name="id[]" value="' . $baris['id'] . '">&nbsp<a onclick="return confirmdel()" href="admdeluser1.php?id=' . $baris['id'] . '"><span class="glyphicon glyphicon-remove"></span></a>' . '</td>' . '</tr>';
    }
}
