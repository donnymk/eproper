<?php
include '../plugins/session_user.php';
include "../plugins/config.php";

$id = $_GET['id'];
// Mencegah MySQL injection
$id = stripslashes($id);
$id = mysqli_real_escape_string($con, $id);


//cek agar peserta tidak dapat mengedit inovasi dari peserta lain.
$selectnip = mysqli_query($con, "SELECT rtl.nip FROM rtl INNER JOIN peserta ON rtl.nip = peserta.nip WHERE rtl.id_rtl = '".$id."'");
$baris = mysqli_fetch_array($selectnip);

if($_SESSION['nip'] != $baris['nip']){
    echo "<script>location.replace('dinovasi.php')</script>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title id="windowjudul"></title>
        <link href='../assets/img/logo_jawa_tengah_icon.ico' rel='icon' type='image/x-icon'>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/w3.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Assistant' rel='stylesheet'>
        <style>
        body {
            font-family: 'Assistant';font-size: 15px;
        }
        </style>         
    </head>
    <body>
        <div class="container" style="background-color: white; border-radius: 7px;">
            <!-- Header -->
            <?php include 'header.php' ?>
            <div class="row">
                <div class="col-md-12">            
                    <ul class="w3-navbar w3-teal w3-round">               
                        <li><a class="w3-hover-blue-grey" href="index_fungsional.php">Daftarkan RTL</a></li>
                        <li><a class="w3-blue-grey" href="drtl.php">Direktori RTL</a></li>
                        <li class="w3-right w3-dropdown-click">
                            <a onclick="menuLogin()" class="w3-hover-blue-grey" href="javascript:;">
                                <span class="glyphicon glyphicon-user"></span> <?= $_SESSION['user'].' '.$_SESSION['nama'] ?> <span class="caret"></span>
                            </a>
                            <div id="demo" class="w3-dropdown-content w3-white w3-card-4">
                                <a class="w3-hover-blue-grey" href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> Logout</a>
                            </div>               
                        </li>
                    </ul>
                </div>
            </div>
            <br>
            <small><a class="tautan" href="drtl.php">Direktori RTL</a></small> » <small id="navjudul"></small> » <small>Edit RTL</small>
            <br>
            <h3 style="text-align: center;"><b>Edit RTL</b></h3>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="panel panel-default" style="box-shadow: 0px 5px 10px lightgray; border: solid 1px lightgray;">
                        <form method="POST" action="upd_rtl.php">
                            <div class="panel-heading w3-blue-grey w3-padding-ver-64">
                                <h3><textarea class="form-control" name="inovasi" id="inovasi"></textarea></h3>
                            </div>
                            <div class="panel-body w3-padding-ver-64 w3-padding-48">
                                <input type="hidden" name="idinovasi" id="idinovasi">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: left;">Nama Diklat</th><td>:</td><td id="viewnmdiklat"></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;">Tahun</th><td>:</td><td id="viewtahun"></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;">Ruang lingkup inovasi</th>
                                        <td>:</td>
                                        <td>
                                            <select class="w3-select" name="viewruanglingkup" id="viewruanglingkup" required>
                                                <option value="" disabled selected>-Pilih-</option>
                                                <option value="BUMN/BUMD">BUMN/BUMD</option>
                                                <option value="Kabupaten/Kota">Kabupaten/Kota</option>
                                                <option value="Kecamatan">Kecamatan</option>
                                                <option value="Kelurahan">Kelurahan</option>
                                                <option value="Kementerian/Lembaga">Kementerian/Lembaga</option>
                                                <option value="Provinsi">Provinsi</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;">Cluster inovasi</th>
                                        <td>:</td>
                                        <td>
                                            <select class="w3-select" name="viewcluster" id="viewcluster" required>
                                                <option value="" disabled selected>-Pilih-</option>
                                                <option value="Agama">Agama</option>
                                                <option value="Keuangan, Anggaran & Pendapatan">Keuangan, Anggaran dan Pendapatan</option>
                                                <option value="Energi & Sumber Daya Mineral">Energi dan Sumber Daya Mineral</option>
                                                <option value="Hukum & Pengawasan">Hukum dan Pengawasan</option>
                                                <option value="Kearsipan & Perpustakaan">Kearsipan dan Perpustakaan</option>
                                                <option value="Pemuda, Olahraga & Pariwisata">Pemuda, Olahraga dan Pariwisata</option>
                                                <option value="Kependudukan Capil & Nakertrans">Kependudukan Catatan Sipil, Tenaga Kerja dan Transmigrasi</option>
                                                <option value="Kesehatan">Kesehatan</option>
                                                <option value="Hankam, Trantib & Bencana">Pertahanan, Keamanan, Ketentraman, Ketertiban dan Penanggulangan Bencana</option>
                                                <option value="Komunikasi & Informatika">Komunikasi dan Informatika</option>
                                                <option value="Kehutanan & Lingkungan Hidup">Kehutanan dan Lingkungan Hidup</option>
                                                <option value="PU SDA TARU & Bina Marga">Pekerjaan Umum, Sumber Daya Air, Tata Ruang dan Bina Marga</option>
                                                <option value="Pelayanan Publik">Pelayanan Publik</option>
                                                <option value="Pemberdayaan Masyarakat Desa">Pemberdayaan Masyarakat Desa</option>
                                                <option value="P2A & KB">Pemberdayaan Perempuan, Anak dan Keluarga Berencana</option>
                                                <option value="Pemerintahan, Kepegawaian & Diklat">Pemerintahan, Kepegawaian dan Diklat</option>
                                                <option value="Penanaman Modal">Penanaman Modal</option>
                                                <option value="Pendidikan & Kebudayaan">Pendidikan dan Kebudayaan</option>
                                                <option value="Perencanaan Pembangunan, Penelitian & Statistik">Perencanaan Pembangunan, Penelitian dan Statistik</option>
                                                <option value="Perhubungan">Perhubungan</option>
                                                <option value="Perikanan & Kelautan">Perikanan dan Kelautan</option>
                                                <option value="Perindustrian & Perdagangan">Perindustrian dan Perdagangan</option>
                                                <option value="Persandian">Persandian</option>
                                                <option value="Pertanahan">Pertanahan</option>
                                                <option value="Peternakan & Kesehatan Hewan">Peternakan dan Kesehatan Hewan</option>
                                                <option value="Pertanian, Perkebunan & Pangan">Pertanian, Perkebunan dan Pangan</option>
                                                <option value="Perumahan Rakyat & Permukiman">Perumahan Rakyat dan Permukiman</option>
                                                <option value="Politik Luar Negeri">Politik Luar Negeri</option>
                                                <option value="Sosial">Sosial</option>
                                                <option value="Koperasi & UMKM">Koperasi dan UMKM</option>
                                            </select>                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;">Penulis</th>
                                        <td>:</td>
                                        <td>
                                            <input class="w3-input" type="text" name="viewnama" id="viewnama">
                                            <input type="hidden" name="viewniplama" id="viewniplama">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;">NIP</th>
                                        <td>:</td>
                                        <td><input class="w3-input" type="text" name="viewnip" id="viewnip"></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;">Jabatan</th><td>:</td><td><input class="w3-input" type="text" name="viewjabatan" id="viewjabatan"></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;">Instansi pengirim</th><td>:</td><td><input class="w3-input" type="text" name="viewskpd" id="viewskpd"></td>
                                    </tr>
                                </table>
                                <br>
                                <label>Latar Belakang</label>:
                                <textarea name="viewlatarblkg" id="viewlatarblkg"></textarea>
                                <br>
                                <label>Maksud & Tujuan</label>:
                                <textarea name="viewmanfaat" id="viewmanfaat"></textarea>
                                <br>
                                <label>Kesimpulan</label>:
                                <textarea name="viewmilestone" id="viewmilestone"></textarea>
                                <br>
                                <button class="w3-btn w3-right w3-deep-orange" type="submit"><b>Perbarui</b></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>

        <script src="../assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script>
        $(document).ready(function() {
            if ( typeof CKEDITOR == 'undefined' ){
                document.write('CKEditor not found');
            }
            else{
                var latarbelakang = CKEDITOR.replace( 'viewlatarblkg',{
                    height: 300
                } );
                var manfaat = CKEDITOR.replace( 'viewmanfaat',{
                    height: 300
                } );
                var milestone = CKEDITOR.replace( 'viewmilestone',{
                    height: 300
                } );

                //CKFinder.setupCKEditor( latarbelakang, '' ) ;
                //CKFinder.setupCKEditor( manfaat, '' ) ;
                //CKFinder.setupCKEditor( milestone, '' ) ;
            }
            function $_GET(param) {
                    var vars = {};
                    window.location.href.replace( location.hash, '' ).replace( 
                            /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
                            function( m, key, value ) { // callback
                                    vars[key] = value !== undefined ? value : '';
                            }
                    );

                    if ( param ) {
                            return vars[param] ? vars[param] : null;	
                    }
                    return vars;
            }
            var id = $_GET('id');
            $('#idinovasi').val(id);
                       
            $.ajax({
                url: '../detail_rtl.php',
                type: 'POST',
                data: 'id='+id,
                dataType: 'json',
                //async: false,
                cache:true,
                success: function(a){
                    $('#windowjudul').html(a[0].judul);
                    $('#inovasi').val(a[0].judul);
                    $('#navjudul').html(a[0].judul);
                    $('#viewnmdiklat').html(a[0].namadiklat);
                    $('#viewtahun').html(a[0].tahun);
                    $('#viewruanglingkup').val(a[0].ruanglingkup);
                    $('#viewcluster').val(a[0].cluster);
                    $('#viewnip').val(a[0].nip);
                    $('#viewniplama').val(a[0].nip);
                    $('#viewnama').val(a[0].nama);
                    $('#viewjabatan').val(a[0].jabatan);
                    $('#viewskpd').val(a[0].skpd);
                    $('#viewlatarblkg').val(a[0].latarbelakang);
                    $('#viewmanfaat').val(a[0].manfaat);
                    $('#viewmilestone').val(a[0].milestone);
                }
            });
        });
        </script>
        <script src="../assets/js/menuNav.js" type="text/javascript"></script>
    </body>
</html>
