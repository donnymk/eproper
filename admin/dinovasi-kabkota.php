<?php 
include '../plugins/session_kabkota.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Direktori Inovasi - Badan Pengembangan Sumber Daya Manusia Daerah Provinsi Jawa Tengah</title>
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
            $.ajax({
                url: '../kabkota/listkabkota.php',
                type: 'POST',
                //data: 'jenisdiklat=dikpim',
                async: false,
                cache:true,
                success: function(kabkota){
                    $('#listkabkota').html(kabkota);
                }
            });            
            $.ajax({
                url: '../kabkota/usrlistinovasi.php',
                type: 'POST',
                data: 'nmkabkota=semua',
                async: false,
                cache:true,
                success: function(a){
                    $('#isiinovasi').html(a);
                }
            });
            
            $('#listkabkota').on('change',function(){
               var nmkabkota = $(this).val();
               $('#loading').html('<img src="../assets/img/bgLoad1.gif">');
                $.ajax({
                    url: '../kabkota/usrlistinovasi.php',
                    type: 'POST',
                    data: 'nmkabkota='+nmkabkota,
                    async: false,
                    cache:true,
                    success: function(b){
                        $('#loading').html('');
                        $('#isiinovasi').html(b);
                    }
                });
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
                <li><a class="w3-hover-blue-grey" href="dinortl.php">Direktori RTL</a></li>
                <li class="w3-right w3-dropdown-click">
                    <a onclick="menuLogin()" class="w3-hover-blue-grey" href="javascript:;">
                        <span class="glyphicon glyphicon-user"></span> <?= $_SESSION['kabkota'].' '.$_SESSION['nama'] ?> <span class="caret"></span>
                    </a>
                    <div id="demo" class="w3-dropdown-content w3-white w3-card-4">
                        <a class="w3-hover-blue-grey" href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </div>               
                </li>
            </ul>
            <br>
            <div class="form-group">                    
                <label>Kabupaten / Kota</label>
               <select class="form-control" id="listkabkota" name="listkabkota" required>
               </select>
            </div>
            <div id="loading"></div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>No.</th><th><center>Judul Inovasi</center></th><th><center>Oleh</center></th><th><center>Jenis Inovasi</center></th><th>Tanggal daftar</th>
                        </thead>
                        <tbody id="isiinovasi">
                        </tbody>
                    </table>                    
                </div>      
            </div>            

        </div>
        <script src="../assets/js/menuNav.js" type="text/javascript"></script>
    </body>
</html>