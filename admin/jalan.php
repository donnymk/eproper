<?php
include "../plugins/excel_reader2.php";
include "../plugins/config.php";
include "../plugins/enkrip-dekrip.php";


$jenisdiklat = $_POST['jenisdiklat'];
$namadiklat = $_POST['namadiklat'];
// file yang tadinya di upload, di simpan di temporary file PHP, file tersebut yang kita ambil
// dan baca dengan PHP Excel Class
$data = new Spreadsheet_Excel_Reader($_FILES['fileexcel']['tmp_name']);
$hasildata = $data->rowcount($sheet_index=0);
// default nilai
$sukses = 0;
$gagal = 0;

for ($i=2; $i<=$hasildata; $i++){
    $data1 = $data->val($i,1);
    $data2 = $data->val($i,2);
    $data3 = $data->val($i,3);
    $data4 = $data->val($i,4);
    $data5 = $data->val($i,5);
    $data6 = $data->val($i,6);
    //$created_by = 'Admin';
    //$date = date('Y-m-d H:i:s');
    //$rand = rand();

    $query = "INSERT INTO user(`user`,`password`,`nama`,`nip`,`jabatan`,`skpd`,`namadiklat`,`jenisdiklat`,`tipe`) VALUES ('".$data1."','".enkrip($data2)."','".mysqli_real_escape_string($con,$data3)."','".$data4."','".mysqli_real_escape_string($con,$data5)."','".$data6."','".$namadiklat."','".$jenisdiklat."','internal')";
    $hasil = mysqli_query($con,$query);

    if ($hasildata) $sukses++;
    else $gagal++;

    echo "<pre>";
    print_r($query);
    echo "</pre>";

}
echo "<b>import data selesai.</b> <br>";
echo "Data yang berhasil di import : " . $sukses .  "<br>";
echo "Data yang gagal diimport : ".$gagal .  "<br>";
echo "<a href='lihatuser.php'>Lihat user</a>";
?>
