<?php

/* 
 * Created by:
 * DONNY MALIK KURNIAWAN (bossdony@gmail.com)
 */
include '../plugins/session_superadmin.php';
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
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="logojateng" style="float: left; margin-right: 10px; margin-top: 4px">
                       <img src="../assets/img/logo_jawa_tengah_icon.ico" height="32" alt="">
                    </div>
                    <div>
                        <h3 style="float: left"><b>Pusat Inovasi Kepemimpinan</b></h3>
                        <h4 style="float: right">BPSDMD Provinsi Jawa Tengah</h4>
                    </div>                   
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">            
                    <ul class="w3-navbar w3-pink w3-round">
                        <li><a class="w3-hover-blue-grey" href="./">Direktori Inovasi</a></li>
                        <li><a class="w3-hover-blue-grey" href="dinokabkota.php">Inovasi dari Kab / Kota</a></li>
                        <li><a class="w3-hover-blue-grey" href="lihatuser.php">Kelola user</a></li>
                        <li><a class="w3-hover-blue-grey" href="lihatuser1.php">User Kabkota</a></li>
                        <li class="w3-right w3-dropdown-click">
                            <a onclick="menuLogin()" class="w3-hover-blue-grey" href="javascript:;">
                                <span class="glyphicon glyphicon-user"></span> Super Admin Eproper <span class="caret"></span>
                            </a>
                            <div id="demo" class="w3-dropdown-content w3-white w3-card-4">
                                <a class="w3-hover-blue-grey" href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> Logout</a>
                            </div>               
                        </li>                 
                    </ul>
                </div>
            </div>
            <br>
            <small><a class="tautan" href="./">Direktori inovasi</a></small> » <small id="navjudul"></small> » <small>Edit Inovasi</small>
            <br><br>
            <div style="max-width: 800px; margin: auto">
                <div class="panel panel-default">
                    <form method="POST" action="upd_inovasi.php">
                    <div class="panel-heading w3-blue-grey w3-padding-ver-64">
                        <h3><textarea class="form-control" name="inovasi" id="inovasi"></textarea></h3>
                    </div>
                    <div class="panel-body w3-padding-ver-64 w3-padding-48">
                        <input type="hidden" name="idinovasi" id="idinovasi">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama Diklat</th><td>:</td><td id="viewnmdiklat"></td>
                            </tr>
                            <tr>
                                <th>Tahun</th><td>:</td><td id="viewtahun"></td>
                            </tr>
                            <tr>
                                <th>Ruang lingkup inovasi</th>
                                <td>:</td>
                                <td>
                                    <select class="w3-select" name="viewkelompok" id="viewkelompok" required>
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
                                <th>Cluster inovasi</th>
                                <td>:</td>
                                <td>
                                    <select class="w3-select" name="viewjenisinov" id="viewjenisinov" required>
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
                                <th>Inovator</th>
                                <td>:</td>
                                <td>
                                    <input class="w3-input" type="text" name="viewnama" id="viewnama">
                                    <input class="w3-input" type="text" name="viewnip" id="viewnip">
                                    <input type="hidden" name="viewniplama" id="viewniplama">
                                </td>
                            </tr>
                            <tr>
                                <th>Jabatan</th><td>:</td><td><input class="w3-input" type="text" name="viewjabatan" id="viewjabatan"></td>
                            </tr>
                            <tr>
                                <th>Instansi pengirim</th><td>:</td><td><input class="w3-input" type="text" name="viewskpd" id="viewskpd"></td>
                            </tr>
                            <tr>
                                <th>Pemda</th>
                                <td>:</td>
                                <td>
                                    <select class="w3-select" name="viewpemda" id="viewpemda" required>
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
                                </td>
                            </tr>                            
                        </table>
                        <br>
                        <label>Latar Belakang</label>:
                        <textarea name="viewlatarblkg" id="viewlatarblkg"></textarea>
                        <br>
                        <label>Manfaat</label>:
                        <textarea name="viewmanfaat" id="viewmanfaat"></textarea>
                        <br>
                        <label>Milestone</label>:
                        <textarea name="viewmilestone" id="viewmilestone"></textarea>
                        <br>
                        <button class="w3-btn w3-right w3-deep-orange" type="submit">Perbarui</button>
                    </div>
                    </form>
                </div>
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
                url: '../detailinovasi.php',
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
                    $('#viewkelompok').val(a[0].kelompok);
                    $('#viewjenisinov').val(a[0].jenisinovasi);
                    $('#viewnip').val(a[0].nip);
                    $('#viewniplama').val(a[0].nip);
                    $('#viewnama').val(a[0].nama);
                    $('#viewjabatan').val(a[0].jabatan);
                    $('#viewskpd').val(a[0].skpd);
                    $('#viewpemda').val(a[0].pemda);
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
