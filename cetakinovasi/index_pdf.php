<?php
// halaman ini ada error yang belum diketahui penyebabnya
    require '../plugins/vendor/autoload.php';

    use Spipu\Html2Pdf\Html2Pdf;
    
if (isset($_GET['nourut'])){
    include "../plugins/config.php";
    
    $id__ = $_GET['nourut'];
    // Mencegah MySQL injection
    $id_ = stripslashes($id__);
    $id = mysqli_real_escape_string($con, $id_);
    
    date_default_timezone_set('Asia/Jakarta');
    
    $query="SELECT *, (SELECT nama FROM peserta WHERE nip=(SELECT nip FROM inovasi WHERE id='".$id."')) AS nama, (SELECT jabatan FROM peserta WHERE nip=(SELECT nip FROM inovasi WHERE id='".$id."')) AS jabatan, (SELECT skpd FROM peserta WHERE nip=(SELECT nip FROM inovasi WHERE id='".$id."')) AS skpd FROM inovasi WHERE id='".$id."'";
    $result = mysqli_query($con,$query);
    
//contoh penggunaan
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $judul =$row['judul'];
        $namadiklat =$row['namadiklat'];
        $tahun =$row['tahun'];
        $kelompok =$row['kelompok'];
        $jenis_inovasi =$row['jenis_inovasi'];
        $latarbelakang =$row['latarbelakang'];
        $manfaat =$row['manfaat'];
        $milestone =$row['milestone'];
        $nama =$row['nama'];
        $jabatan =$row['jabatan'];
        $skpd =$row['skpd'];
    }
    
    $html2pdf = new Html2Pdf('L', 'F4', 'en', true, 'UTF-8', ARRAY(40,25.4,25.4,25.4));
    $html2pdf->writeHTML(
            '<page>
              <page_header>
                [[page_cu]]/[[page_nb]]
              </page_header>
            </page>'
            . '<h2>'.$judul.'</h2><hr>'
            . '<table>'
            . '<tr><td>Nama Diklat</td><td>:</td><td>'.$namadiklat.'</td></tr>'
            . '<tr><td>Tahun</td><td>:</td><td>'.$tahun.'</td></tr>'
            . '<tr><td>Ruang lingkup inovasi</td><td>:</td><td>'.$kelompok.'</td></tr>'
            . '<tr><td>Cluster inovasi</td><td>:</td><td>'.$jenis_inovasi.'</td></tr>'
            . '<tr><td>Inovator</td><td>:</td><td>'.$nama.'</td></tr>'
            . '<tr><td>Jabatan</td><td>:</td><td>'.$jabatan.'</td></tr>'
            . '<tr><td>Instansi</td><td>:</td><td>'.$skpd.'</td></tr>'
            . '</table>'
            . '<hr>'
            . '<h3>Latar Belakang</h3>'
            . $latarbelakang
            . '<hr>'
            . '<h3>Manfaat</h3>'
            . $manfaat
            . '<hr>'
            . '<h3>Milestone</h3>'
            . $milestone.
            '<br><hr>'
            . '<p style="font-size: small; font-style: italic">Dicetak melalui website E-Proper BPSDMD Provinsi Jawa Tengah (https://bpsdmd.jatengprov.go.id/eproper) pada '.date("d M Y H:i:s").'</p>'
            );
    $html2pdf->output();
    
}
?>