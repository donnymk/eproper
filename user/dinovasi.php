<?php 
include '../plugins/session_user.php';
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
        <!-- TABLE STYLES-->
       <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />  
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
                </div>                   
            </div>            

            <br>
            <div class="form-group">                    
                <label>Diklat & Angkatan</label>
               <select class="form-control" id="namadiklat" name="namadiklat" required>
               </select>
            </div>
            <div id="loading"></div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-striped table-bordered" id="tableinov">
                        <thead>
                            <tr class="w3-blue-grey">
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Cluster</th>
                                <th>Tanggal daftar</th>
                            </tr>
                        </thead>
                        <tbody id="isiinovasi">
                        </tbody>
                    </table>                    
                </div>      
            </div>            

        </div>
        <script src="../assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>       
        <!-- DATA TABLE SCRIPTS -->
       <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
       <script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>          
        <script>
        $(document).ready(function() {
            $.ajax({
                url: '../listnmdiklat.php',
                type: 'POST',
                async: false,
                cache:true,
                success: function(nmdiklat){
                    $('#namadiklat').html( nmdiklat);
                }
            });            
            $.ajax({
                url: 'usrlistinovasi.php',
                type: 'POST',
                data: 'namadiklat=semua',
                async: false,
                cache:true,
                success: function(a){
                    $('#isiinovasi').html(a);
                    $('#tableinov').dataTable(); 
                }
            });
            
            $('#namadiklat').on('change',function(){
               var namadiklat = $(this).val();
               $('#loading').html('<img src="../assets/img/bgLoad1.gif">');
                $.ajax({
                    url: 'usrlistinovasi.php',
                    type: 'POST',
                    data: 'namadiklat='+namadiklat,
                    async: false,
                    cache:true,
                    success: function(b){
                        $('#loading').html('');
                        $("#tableinov").DataTable().destroy();
                        $('#isiinovasi').html(b);
                        $('#tableinov').dataTable();  
                    }
                });
            });
        });
        </script>        
        <script src="../assets/js/menuNav.js" type="text/javascript"></script>
    </body>
</html>