<?php
    include '../plugins/session_user.php';
    date_default_timezone_set('Asia/Jakarta');
    $tahunskr=date('Y'); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Daftarkan RTL - Badan Pengembangan Sumber Daya Manusia Daerah Provinsi Jawa Tengah</title>
        <link href='../assets/img/logo_jawa_tengah_icon.ico' rel='icon' type='image/x-icon'>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/w3.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css"/>
        <!-- TABLE STYLES-->
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                        <li><a class="w3-blue-grey" href="index_fungsional.php">Daftarkan RTL</a></li>
                        <li><a class="w3-hover-blue-grey" href="drtl.php">Direktori RTL</a></li>
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
            <div class="panel panel-default" style="box-shadow: 0px 5px 10px lightgray; border: solid 1px lightgray;">
                <div class="panel-body">
                    <form method="POST" action="save_rtl.php">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">                    
                                    <label>Diklat & Angkatan</label>
                                    <input class="form-control input-lg" type="text" id="namadiklat" name="namadiklat" disabled="" value="<?= $_SESSION['namadiklat'] ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">                    
                                    <label>Tahun</label>
                                   <input class="form-control input-lg" id="tahun" type="text" name="tahun" disabled='disabled'>
                                   <input type="hidden" name="nomorinduk" value="<?= $_SESSION['nip'] ?>">
                                   <input type="hidden" name="namadiklat1" value="<?= $_SESSION['namadiklat'] ?>">
                                   <input type="hidden" name="tahun1" value="<?= $tahunskr ?>">  
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
                                   
                                   <input class="form-control" id="nip" type="text" name="nip" disabled="" value="<?= $_SESSION['nip'] ?>">
                                </div>
                            </div>                            
                            <div class="col-md-5">
                                <div class="form-group">
                                   <label>Nama</label>
                                   <input class="form-control" id="nama" type="text" name="nama" value="<?= $_SESSION['nama'] ?>" required>
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-11">
                            <div class="form-group">                    
                                <label>Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $_SESSION['jabatan'] ?>" required>
                            </div>                            
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">                    
                                    <label>SKPD</label>
                                    <input class="form-control" id="skpd" type="text" name="skpd"value="<?= $_SESSION['skpd'] ?>" required>                                   
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">                    
                                    <label>Pemda</label>
                                    <select type="text" class="form-control" name="pemda" required>
                                        <option value="" disabled selected>-Pilih-</option>
                                        <option value="Kabupaten Banjarnegara">Kabupaten Banjarnegara</option>
                                        <option value="Kabupaten Banyumas">Kabupaten Banyumas</option>
                                        <option value="Kabupaten Batang">Kabupaten Batang</option>
                                        <option value="Kabupaten Blora">Kabupaten Blora</option>
                                        <option value="Kabupaten Boyolali">Kabupaten Boyolali</option>
                                        <option value="Kabupaten Brebes">Kabupaten Brebes</option>
                                        <option value="Kabupaten Cilacap">Kabupaten Cilacap</option>
                                        <option value="Kabupaten Demak">Kabupaten Demak</option>
                                        <option value="Kabupaten Grobogan">Kabupaten Grobogan</option>
                                        <option value="Kabupaten Jepara">Kabupaten Jepara</option>
                                        <option value="Kabupaten Karanganyar">Kabupaten Karanganyar</option>
                                        <option value="Kabupaten Kebumen">Kabupaten Kebumen</option>
                                        <option value="Kabupaten Kendal">Kabupaten Kendal</option>
                                        <option value="Kabupaten Klaten">Kabupaten Klaten</option>
                                        <option value="Kabupaten Kudus">Kabupaten Kudus</option>
                                        <option value="Kabupaten Magelang">Kabupaten Magelang</option>
                                        <option value="Kabupaten Pati">Kabupaten Pati</option>
                                        <option value="Kabupaten Pekalongan">Kabupaten Pekalongan</option>
                                        <option value="Kabupaten Pemalang">Kabupaten Pemalang</option>
                                        <option value="Kabupaten Purbalingga">Kabupaten Purbalingga</option>
                                        <option value="Kabupaten Purworejo">Kabupaten Purworejo</option>
                                        <option value="Kabupaten Rembang">Kabupaten Rembang</option>
                                        <option value="Kabupaten Semarang">Kabupaten Semarang</option>
                                        <option value="Kabupaten Sragen">Kabupaten Sragen</option>
                                        <option value="Kabupaten Sukoharjo">Kabupaten Sukoharjo</option>
                                        <option value="Kabupaten Tegal">Kabupaten Tegal</option>
                                        <option value="Kabupaten Temanggung">Kabupaten Temanggung</option>
                                        <option value="Kabupaten Wonogiri">Kabupaten Wonogiri</option>
                                        <option value="Kabupaten Wonosobo">Kabupaten Wonosobo</option>
                                        <option value="Kota Magelang">Kota Magelang</option>
                                        <option value="Kota Pekalongan">Kota Pekalongan</option>
                                        <option value="Kota Salatiga">Kota Salatiga</option>
                                        <option value="Kota Semarang">Kota Semarang</option>
                                        <option value="Kota Surakarta">Kota Surakarta</option>
                                        <option value="Kota Tegal">Kota Tegal</option>
                                        <option value="Provinsi Jawa Tengah">Provinsi Jawa Tengah</option>
                                        <option value="Pemda di luar Jawa Tengah">Pemda di luar Jawa Tengah</option>
                                        <option value="Kementerian / Lembaga Pusat">Kementerian / Lembaga Pusat</option>
                                    </select>
                                </div>
                            </div>                            
                        </div>                    
                        <br>
                        <span class="w3-tag w3-dark-grey w3-small">Rencana Tindak Lanjut</span>
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
                                    <select class="form-control" id="ruanglingkup" name="ruanglingkup" required>
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
                                    <select class="form-control" id="cluster" name="cluster" required>
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
                                    <label>Maksud & Tujuan</label>
                                    <textarea class="form-control" id="manfaat" name="manfaat" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">                    
                                    <label>Kesimpulan</label>
                                    <textarea class="form-control" id="milestone" name="milestone" required="required"></textarea>
                                </div>
                            </div>
                        </div>             
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <br>
                                    <button type="submit" id="submit" class="w3-btn w3-right w3-blue-grey w3-large" name="submit"><span class='glyphicon glyphicon-share-alt' aria-hidden='true'></span> Daftarkan</button>
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
            $('#tahun').val('<?= $tahunskr ?>');
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
        function cekrtl(){
            var nip='<?= $_SESSION['nip'] ?>';
            var namadiklat='<?= $_SESSION['namadiklat'] ?>';
            //var tahun=$('#tahun').val();

                $.ajax({
                    url: '../cek_rtl.php',
                    type: 'POST',
                    data: 'nip='+nip+'&namadiklat='+namadiklat,
                    dataType: 'json',
                    //async: false,
                    cache:true,
                    success: function(a){
                        if(a[0].pesan=='already'){
                            window.location='success_rtl.php?nip='+nip+'&namadiklat='+namadiklat;
                            
                        }
                    }
                });
                return false;
        }
        
        cekrtl();
        </script>        
        <script type="text/javascript">
            if ( typeof CKEDITOR == 'undefined' ){
                document.write('CKEditor not found');
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
