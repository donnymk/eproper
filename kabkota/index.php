<?php
    include '../plugins/session_kabkota.php';
    date_default_timezone_set('Asia/Jakarta');
    $tahunskr=date('Y'); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Daftarkan Inovasi - Badan Pengembangan Sumber Daya Manusia Daerah Provinsi Jawa Tengah</title>
        <link href='../assets/img/logo_jawa_tengah_icon.ico' rel='icon' type='image/x-icon'>
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
        <div class="container">
            <!-- Header -->
            <?php include 'header.php' ?>
            <div class="row">
                <div class="col-md-12">            
                    <ul class="w3-navbar w3-teal w3-round">
                        <li><a class="w3-blue-grey" href="./">Daftarkan Inovasi</a></li>
                        <li><a class="w3-hover-blue-grey" href="dinovasi.php">Direktori Inovasi</a></li>
                        <li class="w3-right w3-dropdown-click">
                            <a onclick="menuLogin()" class="w3-hover-blue-grey" href="javascript:;">
                                <span class="glyphicon glyphicon-user"></span> <?= $_SESSION['kabkota'].' '.$_SESSION['nama'] ?> <span class="caret"></span>
                            </a>
                            <div id="demo" class="w3-dropdown-content w3-white w3-card-4">
                                <a class="w3-hover-blue-grey" href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> Logout</a>
                            </div>               
                        </li>                
                    </ul>
                </div>
            </div>
            <br>         
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="POST" action="save_inovasi.php">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">                    
                                            <label>Diklat & Angkatan</label>
                                            <input class="form-control input-lg" type="text" id="namadiklat" name="namadiklat" disabled="" value="<?= $_SESSION['namadiklat'] ?>">
                                            <input type="hidden" name="namadiklat1" value="<?= $_SESSION['namadiklat'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">                    
                                            <label>Tahun</label>
                                           <input class="form-control input-lg" id="tahun" type="text" name="tahun" value="<?= $tahunskr ?>" disabled='disabled'>
                                           <input type="hidden" name="tahun1" value="<?= $tahunskr ?>">
                                           <!--Input ini digunakan untuk dikirim ke file save_inovasi.php-->
                                           <input type="hidden" name="asalkabkota" value="<?= $_SESSION['nama'] ?>">
                                           <input type="hidden" name="jenisdiklat" value="<?= $_SESSION['jenisdiklat'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                </div>
                                <br/>
                            <!--</form>-->
                            <div id="pesancek"></div>

                            <!--<div id="panelinovasi">-->
                            <span class="w3-tag w3-dark-grey w3-small">Identitas</span>
                            <br><br>
                            <!--<form method="post" action="save_inovasi.php">-->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                           <label>NIP</label>

                                           <input class="form-control" id="nip" type="text" name="nip">
                                        </div>
                                    </div>                                    
                                    <div class="col-md-5">
                                        <div class="form-group">
                                           <label>Nama</label>
                                           <input class="form-control" id="nama" type="text" name="nama" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">                    
                                            <label>Jabatan</label>
                                            <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                                        </div>                         
                                    </div>
                                </div>                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">                    
                                            <label>SKPD</label>
                                            <input class="form-control" id="skpd" type="text" name="skpd" required>
                                            <input type="hidden" name="pemda" value="<?= $_SESSION['nama'] ?>">
                                        </div>
                                    </div>
<!--                            <div class="col-md-5">
                                <div class="form-group">                    
                                    <label>Pemda</label>
                                </div>
                            </div>-->                                     
                                </div>                            
                                <br>
                                <span class="w3-tag w3-dark-grey w3-small">Inovasi</span>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                           <label>Judul</label>
                                           <textarea class="form-control" id="judul" name="judul" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">                    
                                            <label>Ruang Lingkup</label>
                                            <select class="form-control" id="kelompok" name="kelompok" required>
                                                <option value="" disabled selected>-Pilih-</option>
                                                <option value="BUMN/BUMD">BUMN/BUMD</option>
                                                <option value="Kabupaten/Kota">Kabupaten/Kota</option>
                                                <option value="Kecamatan">Kecamatan</option>
                                                <option value="Kelurahan">Kelurahan</option>
                                                <option value="Kementerian/Lembaga">Kementerian/Lembaga</option>
                                                <option value="Provinsi">Provinsi</option>
                                            </select>                            
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">                    
                                            <label>Cluster</label>
                                            <select class="form-control" id="jenisinovasi" name="jenisinovasi" required>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                           <label>Latar Belakang / Abstrak</label>
                                           <textarea class="form-control" id="latarbelakang" name="latarbelakang" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">                    
                                            <label>Manfaat</label>
                                            <textarea class="form-control" id="manfaat" name="manfaat" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">                    
                                            <label>Milestone</label>
                                            <textarea class="form-control" id="milestone" name="milestone" required="required"></textarea>
                                        </div>
                                    </div>
                                </div>             
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <br>
                                            <button type="submit" id="submit" class="w3-btn w3-right w3-dark-grey w3-large w3-round" name="submit">
                                                <span class='glyphicon glyphicon-share-alt' aria-hidden='true'></span> Daftarkan
                                            </button>
                                       </div>                       
                                    </div>
                                </div>
                                <br/>                  
                        <!--</div>-->
                            </form> 
                        </div>
                    </div>
        </div>

        <script src="../assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <!--<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>-->
        <script>
        $(document).ready(function() {

            //$('#tahun').val('<?= $tahunskr ?>');
            //disable ketikan spasi untuk NIP
            $("#nip").on({
              keydown: function(e) {
                if (e.which === 32)
                  return false;
              },
              change: function() {
                this.value = this.value.replace(/\s/g, "");
              }
            });            
        });
        </script>        
        <script type="text/javascript">
            if ( typeof CKEDITOR == 'undefined' ){
                document.write(
                        'CKEditor not found');
            }
            else{
                var latarbelakang = CKEDITOR.replace( 'latarbelakang',{
                    height: 300
                } );
                var manfaat = CKEDITOR.replace( 'manfaat',{
                    height: 300
                } );
                var milestone = CKEDITOR.replace( 'milestone',{
                    height: 300
                } );

//                CKFinder.setupCKEditor( latarbelakang, '' ) ;
//                CKFinder.setupCKEditor( manfaat, '' ) ;
//                CKFinder.setupCKEditor( milestone, '' ) ;
            }
        </script>
        <script src="../assets/js/menuNav.js" type="text/javascript"></script>
    </body>
</html>
