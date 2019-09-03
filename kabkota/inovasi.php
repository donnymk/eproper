<?php 
include '../plugins/session_kabkota.php';
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
        <link href="../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
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
                        <li><a class="w3-hover-blue-grey" href="./">Daftarkan Inovasi</a></li>
                        <li><a class="w3-blue-grey" href="dinovasi.php">Direktori Inovasi</a></li>
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
           <small><a class="tautan" href="dinovasi.php">Direktori inovasi</a></small> » <small id="navjudul"></small>
            <br><br>
            <div style="max-width: 215mm; margin: auto">
                <div class="panel panel-default">
                    <div class="panel-heading w3-blue-grey w3-padding-ver-64">
                        <h3 id="inovasi"><span class="fa fa-spinner fa-spin"></span></h3>
                    </div>
                    <div class="panel-body w3-padding-ver-64 w3-padding-48">
                        <table>
                            <tr>
                                <td><b>Nama Diklat</b></td>
                                <td>:</td>
                                <td id="viewnmdiklat"><span class="fa fa-spinner fa-spin"></span></td>
                            </tr>
                            <tr>
                                <td><b>Tahun</b></td>
                                <td>:</td>
                                <td id="viewtahun"><span class="fa fa-spinner fa-spin"></span></td>
                            </tr>
                            <tr>
                                <td><b>Ruang Lingkup</b></td>
                                <td>:</td>
                                <td id="viewkelompok"><span class="fa fa-spinner fa-spin"></span></td>
                            </tr>
                            <tr>
                                <td><b>Cluster</b></td>
                                <td>:</td>
                                <td id="viewjenisinov"><span class="fa fa-spinner fa-spin"></span></td>
                            </tr>
                            <tr>
                                <td><b>Penulis</b></td>
                                <td>:</td>
                                <td>
                                    <p id="viewnama"><span class="fa fa-spinner fa-spin"></span></p>
                                    <p id="viewnip"></p>                                    
                                </td>
                            </tr>
                            <tr>
                                <td><b>Jabatan</b></td>
                                <td>:</td>
                                <td id="viewjabatan"><span class="fa fa-spinner fa-spin"></span></td>
                            </tr>
                            <tr>
                                <td><b>SKPD</b></td>
                                <td>:</td>
                                <td id="viewskpd"><span class="fa fa-spinner fa-spin"></span></td>
                            </tr>
                        </table>
                        <hr>
                        <label>Latar Belakang</label>:
                        <p id="viewlatarblkg" style="text-align: justify">
                            <span class="fa fa-spinner fa-spin"></span>
                        </p>
                        <hr>
                        <label>Manfaat</label>:
                        <p id="viewmanfaat" style="text-align: justify">
                            <span class="fa fa-spinner fa-spin"></span>
                        </p>
                        <hr>
                        <label>Milestone</label>:
                        <p id="viewmilestone" class="table-responsive">
                            <span class="fa fa-spinner fa-spin"></span>
                        </p>

                    </div>
                </div>
            </div>
        </div>

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
        <script src="../assets/js/menuNav.js" type="text/javascript"></script>
    </body>
</html>
