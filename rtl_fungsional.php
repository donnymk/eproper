<!DOCTYPE html>
<!--
Created by:
DONNY MALIK KURNIAWAN (bossdony@gmail.com)
-->
<html>
    <head>
        <title id="windowjudul"></title>
        <link href='assets/img/logo_jawa_tengah_icon.ico' rel='icon' type='image/x-icon'>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/w3.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
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
                        <li><a class="w3-blue-grey" href="./">Direktori Inovasi</a></li>
                        <li><a class="w3-hover-blue-grey" href="statistik.php">Statistik</a></li>
                        <li class="w3-dropdown-click">
                            <a onclick="menuNav()" class="w3-hover-blue-grey" href="javascript:;">Ebook <span class="caret"></span></a>
                            <div id="menu0" class="w3-dropdown-content w3-white w3-card-4 w3-padding" style="z-index: 1">
                                <a href="ebookpimII.php" class="w3-hover-blue-grey">Direktori Inovasi Diklatpim Tingkat II</a>
                                <a href="ebookpimIII.php" class="w3-hover-blue-grey">Direktori Inovasi Diklatpim Tingkat III</a>
                                <a href="ebookpimIV.php" class="w3-hover-blue-grey">Direktori Inovasi Diklatpim Tingkat IV</a>                    
                            </div>                            
                            <!--<a class="w3-hover-blue-grey" href="ebook.php">Ebook</a>-->
                        </li>
                        <li class="w3-dropdown-click">
                            <a onclick="menuLogin()" class="w3-hover-blue-grey" href="javascript:;">Login <span class="caret"></span></a>
                            <div id="demo" class="w3-dropdown-content w3-white w3-card-4 w3-padding" style="z-index: 1">
                                    <form method="post">
                                       <div class="form-group">
                                           <span class="glyphicon glyphicon-user"></span> Username
                                           <input type="text" name="username" class="form-control" id="username" required="">                    
                                       </div>
                                       <div class="form-group">
                                           <span class="glyphicon glyphicon-lock"></span> Password
                                           <input name="password" type="password" id="password" class="form-control" required="">                    
                                       </div>
                                       <div id="notiflogin"></div>
                                       <button class="w3-btn w3-dark-grey w3-round" name="btnlogin" id="btnlogin">Login</button>
                                   </form>
                            </div>               
                        </li>
                    </ul>
                </div>
            </div>
           <br>
           <small><a class="tautan" href="./">Direktori inovasi</a></small> » <small id="navjudul"></small>
            <br><br>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="panel panel-default" style="box-shadow: 0px 5px 10px lightgray; border: solid 1px lightgray;">
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
                                    <td><b>Ruang lingkup inovasi</b></td>
                                    <td>:</td>
                                    <td id="viewruanglingkup"><span class="fa fa-spinner fa-spin"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Cluster inovasi</b></td>
                                    <td>:</td>
                                    <td id="viewcluster"><span class="fa fa-spinner fa-spin"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Inovator</b></td>
                                    <td>:</td>
                                    <td id="viewnama"><span class="fa fa-spinner fa-spin"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Jabatan</b></td>
                                    <td>:</td>
                                    <td id="viewjabatan"><span class="fa fa-spinner fa-spin"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Instansi pengirim</b></td>
                                    <td>:</td>
                                    <td id="viewskpd"><span class="fa fa-spinner fa-spin"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Pemda</b></td>
                                    <td>:</td>
                                    <td id="viewpemda"><span class="fa fa-spinner fa-spin"></span></td>
                                </tr>
                            </table>
                            <hr>
                            <label>Latar Belakang</label>:
                            <p id="viewlatarblkg" style="text-align: justify">
                                <span class="fa fa-spinner fa-spin"></span>
                            </p>
                            <hr>
                            <label>Maksud & Tujuan</label>:
                            <p id="viewmanfaat" style="text-align: justify">
                                <span class="fa fa-spinner fa-spin"></span>
                            </p>
                            <hr>
                            <label>Kesimpulan</label>:
                            <p id="viewmilestone" class="table-responsive">
                                <span class="fa fa-spinner fa-spin"></span>
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>

        <script src="assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Double scrollbar -->
        <script src="assets/js/jquery.doubleScroll.js" type="text/javascript"></script>
        
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
            
            //tampilkan button print
            $('#btn-print').html(' <a href="cetakrtl/?nourut='+id+'" class="w3-btn w3-dark-grey w3-round" target="_blank"><span class="fa fa-print"></span> Cetak</a>');
                       
            $.ajax({
                url: 'detail_rtl.php',
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
                    $('#viewruanglingkup').html(a[0].ruanglingkup);
                    $('#viewcluster').html(a[0].cluster);
                    $('#viewnama').html(a[0].nama);
                    $('#viewjabatan').html(a[0].jabatan);
                    $('#viewskpd').html(a[0].skpd);
                    $('#viewpemda').html(a[0].pemda);
                    $('#viewlatarblkg').html(a[0].latarbelakang);
                    $('#viewmanfaat').html(a[0].manfaat);
                    $('#viewmilestone').html(a[0].milestone);
                }
            });
            
            $('#btnlogin').click(function(e){
               e.preventDefault();
               var username = $('#username').val();
               var password = $('#password').val();
               if(username==''){
                   $('#username').focus();
               }
               else if(password==''){
                   $('#password').focus();
               }
               else{
                   $('#notiflogin').html('<img src="assets/img/bgLoad1.gif">');
                    $.ajax({
                        url: 'ceklogin.php',
                        type: 'POST',
                        data: 'username='+username+'&password='+password,
                        async: false,
                        cache:true,
                        success: function(b){
                            if(b=='superadmin'){
                                location.replace('auth');
                            }                            
                            else if(b=='admin'){
                                location.replace('admin');
                            }
                            else if(b=='kabkota'){
                                location.replace('kabkota');
                            }                            
                            else if(b=='internal'){
                                location.replace('user');
                            }
                            else if(b=='fungsional'){
                                location.replace('user/index_fungsional.php');
                            }
                            else{
                                $('#notiflogin').html(b);
                            }
                        }
                    });                   
               }
            });
            
            $('.table-responsive').doubleScroll();            
        });
        </script>
        
        <script src="assets/js/menuNav.js" type="text/javascript"></script>
    </body>
</html>
