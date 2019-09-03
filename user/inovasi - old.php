<?php 
include '../plugins/session_user.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title id="windowjudul"></title>
        <link href='../assets/img/logo_jawa_tengah_icon.ico' rel='icon' type='image/x-icon'>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/w3.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css"/>
        <script src="../assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script>
        $(document).ready(function() {
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
            //alert(id);
                       
            $.ajax({
                url: '../detailinovasi.php',
                type: 'POST',
                data: 'id='+id,
                dataType: 'json',
                async: false,
                cache:true,
                success: function(a){
                    $('#windowjudul').html(a[0].judul);
                    $('#inovasi').html(a[0].judul);
                    $('#navjudul').html(a[0].judul);
                    $('#viewnmdiklat').html(a[0].namadiklat);
                    $('#viewtahun').html(a[0].tahun);
                    $('#viewkelompok').html(a[0].kelompok);
                    $('#viewjenisinov').html(a[0].jenisinovasi);
                    $('#viewnama').html(a[0].nama);
                    $('#viewnip').html(a[0].nip);
                    $('#viewjabatan').html(a[0].jabatan);
                    $('#viewskpd').html(a[0].skpd);
                    $('#viewlatarblkg').html(a[0].latarbelakang);
                    $('#viewmanfaat').html(a[0].manfaat);
                    $('#viewmilestone').html(a[0].milestone);
                }
            });
        });
        </script>
    </head>
    <body>
        <div class="container">
            <div id="logojateng" style="float: left; margin-right: 10px">
               <img src="../assets/img/logo_jawa_tengah_icon.ico" width="64" height="64" alt="">
            </div>
            <div>
                <h4><b>Direktori Inovasi Diklat Kepemimpinan</b></h4>
                <p>Badan Pengembangan Sumber Daya Manusia Daerah Provinsi Jawa Tengah</p>
            </div>
            <ul class="w3-navbar w3-teal w3-round">               
                <li><a class="w3-hover-blue-grey" href="./">Daftarkan Inovasi</a></li>
                <li><a class="w3-blue-grey" href="dinovasi.php">Direktori Inovasi</a></li>
                <li class="w3-right w3-dropdown-click">
                    <a onclick="menuLogin()" class="w3-hover-blue-grey" href="javascript:;">
                        <span class="glyphicon glyphicon-user"></span> <?= $_SESSION['user'].' '.$_SESSION['nama'] ?> <span class="caret"></span>
                    </a>
                    <div id="demo" class="w3-dropdown-content w3-white w3-card-4">
                        <a class="w3-hover-blue-grey" href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </div>               
                </li>
            </ul>           
           <br>
           <small><a class="tautan" href="dinovasi.php">Direktori inovasi</a></small> » <small id="navjudul"></small>
            <br><br>
            <div style="max-width: 800px; margin: auto">
                <div class="panel panel-default">
                    <div class="panel-heading w3-teal w3-padding-ver-64"><h3 id="inovasi"></h3></div>
                    <div class="panel-body w3-padding-ver-64 w3-padding-48">
                        <table>
                            <tr><th>Nama Diklat</th><td>:</td><td id="viewnmdiklat"></td></tr>
                            <tr><th>Tahun</th><td>:</td><td id="viewtahun"></td></tr>
                            <tr><th>Ruang lingkup inovasi</th><td>:</td><td id="viewkelompok"></td></tr>
                            <tr><th>Cluster inovasi</th><td>:</td><td id="viewjenisinov"></td></tr>
                            <tr>
                                <th>Inovator</th><td>:</td><td><p id="viewnama"></p><p id="viewnip"></p></td>
                            </tr>
                            <tr><th>Jabatan</th><td>:</td><td id="viewjabatan"></td></tr>
                            <tr><th>Instansi pengirim</th><td>:</td><td id="viewskpd"></td></tr>
                        </table>
                        <br>
                        <label>Latar Belakang</label>:
                        <p id="viewlatarblkg" style="text-align: justify"></p>
                        <hr>
                        <label>Manfaat</label>:
                        <p id="viewmanfaat" style="text-align: justify"></p>
                        <hr>
                        <label>Milestone</label>:
                        <p id="viewmilestone"></p>

                    </div>
                </div>
            </div>
        </div>
        
        <script src="../assets/js/menuNav.js" type="text/javascript"></script>
    </body>
</html>
