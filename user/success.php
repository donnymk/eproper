<?php 
include '../plugins/session_user.php';
/* 
 * Created by:
 * DONNY MALIK KURNIAWAN (bossdony@gmail.com)
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pendaftaran Inovasi Berhasil - Badan Pengembangan Sumber Daya Manusia Daerah Provinsi Jawa Tengah</title>
        <link href='../assets/img/logo_jawa_tengah_icon.ico' rel='icon' type='image/x-icon'>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <li><a class="w3-blue-grey" href="./">Daftarkan Inovasi</a></li>
                        <li><a class="w3-hover-blue-grey" href="dinovasi.php">Direktori Inovasi</a></li>
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
            
            <br><br>
            <div style="max-width: 800px; margin: auto">
                <div class="alert alert-info" id="msgsuccess">
                </div>
            </div>
        </div>
        
        <script src="../assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script>
        $(document).ready(function() {
            //fungsi untuk mengambil variabel GET pada address bar
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
            var nip = $_GET('nip');
            var namadiklat = $_GET('namadiklat');
                       
            $.ajax({
                url: 'cariinovasi.php',
                type: 'POST',
                data: 'nip='+nip+'&namadiklat='+namadiklat,
                async: true,
                cache:true,
                success: function(a){
                    $('#msgsuccess').html(a);
                }
            });
        });
        </script>        
        <script src="../assets/js/menuNav.js" type="text/javascript"></script>
    </body>
</html>