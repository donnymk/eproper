<?php
    require '../plugins/vendor/autoload.php';
    include "../plugins/config.php";

    use Spipu\Html2Pdf\Html2Pdf;
    
if (isset($_GET['nourut'])){
    $id = $_GET['nourut'];
    // Mencegah MySQL injection
    $id = stripslashes($id);
    $id = mysqli_real_escape_string($con, $id);
    
    date_default_timezone_set('Asia/Jakarta');
    

    $query="SELECT *, (SELECT nama FROM peserta WHERE nip=(SELECT nip FROM rtl WHERE id_rtl='".$id."')) AS nama, (SELECT jabatan FROM peserta WHERE nip=(SELECT nip FROM rtl WHERE id_rtl='".$id."')) AS jabatan, (SELECT skpd FROM peserta WHERE nip=(SELECT nip FROM rtl WHERE id_rtl='".$id."')) AS skpd FROM rtl WHERE id_rtl='".$id."'";
    $result = mysqli_query($con,$query);
    
//contoh penggunaan
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $judul =$row['judul'];
        $namadiklat =$row['namadiklat'];
        $tahun =$row['tahun'];
        $ruanglingkup =$row['ruanglingkup'];
        $cluster =$row['cluster'];
        $judul =$row['judul'];
        $latarbelakang =$row['latarbelakang'];
        $manfaat =$row['manfaat'];
        $milestone =$row['milestone'];
        $nama =$row['nama'];
        $jabatan =$row['jabatan'];
        $skpd =$row['skpd'];
    }
    
    $html2pdf = new Html2Pdf('L', 'A4', 'en', true, 'UTF-8', ARRAY(40,25.4,25.4,25.4));
    $html2pdf->writeHTML(
            '<page>
              <page_header>
                [[page_cu]]/[[page_nb]]
              </page_header>
            </page>'
            . '<h3>'.$judul.'</h3><hr>'
            . '<table>'
            . '<tr><td>Nama Diklat</td><td>:</td><td>'.$namadiklat.'</td></tr>'
            . '<tr><td>Tahun</td><td>:</td><td>'.$tahun.'</td></tr>'
            . '<tr><td>Ruang lingkup inovasi</td><td>:</td><td>'.$ruanglingkup.'</td></tr>'
            . '<tr><td>Cluster inovasi</td><td>:</td><td>'.$cluster.'</td></tr>'
            . '<tr><td>Inovator</td><td>:</td><td>'.$nama.'</td></tr>'
            . '<tr><td>Jabatan</td><td>:</td><td>'.$jabatan.'</td></tr>'
            . '<tr><td>Instansi</td><td>:</td><td>'.$skpd.'</td></tr>'
            . '</table>'
            . '<br>'
            . '<b>Latar Belakang</b>'
            . $latarbelakang
            . '<b>Manfaat</b>'
            . $manfaat
            . '<b>Milestone</b>'
            . $milestone.
            '<br><hr><small>Dicetak pada: '.date("d/m/Y H:i:s").'</small>'
            );
    $html2pdf->output();
    
}
?>