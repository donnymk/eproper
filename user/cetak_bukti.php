<?php
include '../plugins/session_user.php';
include "../plugins/config.php";
include '../plugins/fpdf/fpdf.php';

date_default_timezone_set('Asia/Jakarta');
$tanggalskr=date('d/m/Y H:i:s');

if (isset($_GET['id'])){
    $id=$_GET['id'];
    // Mencegah MySQL injection
    $id_ = stripslashes($id);
    $id__ = mysqli_real_escape_string($con,$id_);   
}
$query="SELECT nip, namadiklat, judul, DATE_FORMAT(tglsubmit,'%d/%m/%Y %T') AS tglsubmit, (SELECT nama FROM peserta WHERE nip=(SELECT nip FROM inovasi WHERE id='".$id__."')) AS nama, (SELECT jabatan FROM peserta WHERE nip=(SELECT nip FROM inovasi WHERE id='".$id__."')) AS jabatan, (SELECT skpd FROM peserta WHERE nip=(SELECT nip FROM inovasi WHERE id='".$id__."')) AS skpd FROM inovasi WHERE id='".$id__."'";
//$query1="SELECT * FROM gedung";
$result = mysqli_query($con,$query);
//$result1 = mysqli_query($koneksi,$query1);
//$tarif_ar[]=0;
while($row = mysqli_fetch_assoc($result)){
       //$no = $row['no'];
       $nama = $row['nama'];
       $nip = $row['nip'];
       $jabatan = $row['jabatan'];
       $skpd = $row['skpd'];
        $namadiklat = $row['namadiklat'];
       $judul = $row['judul'];
	   $tglsubmit = $row['tglsubmit'];
}
$pdf = new FPDF("P","cm","A4");
$pdf->AddPage();
//$pdf->Image('Logo-Jawa+Tengah_bw.jpg',1,1);
$pdf->Image('../assets/img/Logo-Jawa+Tengah_bw.jpg', 1, 1, 1.4, 1.6);
$pdf->SetFont('Arial','B',12);
//$pdf->Cell(3,0.7,'',0,0);
$pdf->ln();
$pdf->Cell(2.2,0.7,'',0,0);
$pdf->Cell(11,0.7,'PEMERINTAH PROVINSI JAWA TENGAH',0,0);
$pdf->ln();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(2.2,0.7,'',0,0);
$pdf->Cell(10,0.7,'BADAN PENGEMBANGAN SUMBER DAYA MANUSIA DAERAH',0,0);
$pdf->ln();
$pdf->line(1,2.8,20,2.8);
$pdf->ln(1.4);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,0.7,'TANDA BUKTI PENDAFTARAN INOVASI',0,0,'C');
$pdf->ln();
$pdf->Cell(0,0.7,'DIKLAT KEPEMIMPINAN',0,0,'C');
$pdf->SetFont('Times','',12);
$pdf->ln(1.5);
$pdf->Cell(1,0.7,'Yang bertanda tangan di bawah ini:',0,0);
$pdf->ln();
$pdf->Cell(1,0.7,'',0,0);
$pdf->Cell(3.5,0.7,'Nama',0,0);
$pdf->Cell(0,0.7,': '.$nama,0,0);
$pdf->ln();
$pdf->Cell(1,0.7,'',0,0);
$pdf->Cell(3.5,0.7,'NIP',0,0);
$pdf->Cell(0,0.7,': '.$nip,0,0);
$pdf->ln();
$pdf->Cell(1,0.7,'',0,0);
$pdf->Cell(3.5,0.7,'Jabatan',0,0);
$pdf->Cell(0,0.7,': '.$jabatan,0,0);
$pdf->ln();
$pdf->Cell(1,0.7,'',0,0);
$pdf->Cell(3.5,0.7,'SKPD',0,0);
$pdf->Cell(0,0.7,': '.$skpd,0,0);
$pdf->ln();
$pdf->Cell(1,0.7,'',0,0);
$pdf->Cell(3.5,0.7,'Diklat yang diikuti',0,0);
$pdf->Cell(0,0.7,': '.$namadiklat,0,0);
$pdf->ln(1);
$pdf->Cell(3.5,0.7,'Telah mendaftarkan inovasi untuk diklat tersebut dengan judul:',0,0);
$pdf->ln();
$pdf->SetFont('Times','B',12);
//$pdf->Cell(3.5,0.7,$judul,0,0);
$pdf->MultiCell(0,0.7,$judul);
//$pdf->ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(3.5,0.7,'pada tanggal '.$tglsubmit.'.',0,0);
$pdf->ln(2);
$pdf->Cell(12,0.7,'',0,0);
$pdf->Cell(1,0.7,'Yang bertanda tangan',0,0);
$pdf->ln(2);
$pdf->Cell(12,0.7,'',0,0);
$pdf->Cell(1,0.7,$nama,0,0);
$pdf->ln(2);
$pdf->line(1,18,20,18);
$pdf->SetFont('Times','',7);
$pdf->Cell(0,0.7,'Dicetak pada '.$tanggalskr,0,0);
//$pdf->SetFont('Times','',10);
//$pdf->Cell(0,0.7,'Bukti pemesanan online ini HARAP DIBAWA ke Ruang Layanan Informasi Badan Diklat Provinsi Jawa Tengah pada jam kerja',0,0);
//$pdf->ln(0.5);
//$pdf->Cell(0,0.7,'untuk verifikasi paling lambat 3 hari setelah pemesanan.',0,0);
$pdf->Output("bukti_pendaftaran_inovasi.pdf","I");
?>