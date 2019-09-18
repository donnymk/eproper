<?php 
include '../plugins/session_superadmin.php';
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
        <div class="container" style="background-color: white; border-radius: 7px;">
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
                        <li><a class="w3-hover-blue-grey" href="dir_rtl.php">Direktori RTL</a></li>
                        <li><a class="w3-blue-grey" href="dinokabkota.php">Inovasi dari Kab / Kota</a></li>
                        <li><a class="w3-hover-blue-grey" href="lihatuser.php">Kelola user e-proper</a></li>
                        <li><a class="w3-hover-blue-grey" href="lihatuser_rtl.php">Kelola user RTL</a></li>
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
            <div class="form-group">                    
                <label>Kabupaten / Kota</label>
               <select class="form-control" id="listkabkota" name="listkabkota" required>
               </select>
            </div>
            <div id="loading"></div>
            <div class="panel panel-default" style="box-shadow: 0px 5px 10px lightgray; border: solid 1px lightgray;">
                <div class="panel-body">
                    <table class="table table-striped table-bordered" id="tableinov">
                        <thead>
                            <tr class="w3-blue-grey">
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Nama Diklat</th>
                                <th>Penulis</th>
                                <th>Kab / Kota Penyelenggara (Pemda)</th>
                                <th>Tanggal Daftar</th>
                                <th></th>
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
        function confirmdel(){
            var con = confirm('Yakin hapus?');
            if(con == true) {
                return true;
            }
            else{
                return false;
            }
        }            
        $(document).ready(function() {
            $.ajax({
                url: 'listkabkota.php',
                type: 'POST',
                //data: 'jenisdiklat=dikpim',
                //async: false,
                cache:true,
                success: function(kabkota){
                    $('#listkabkota').html(kabkota);
                }
            });            
            $.ajax({
                url: 'listinovkabkota-adm.php',
                type: 'POST',
                data: 'nmkabkota=semua',
                //async: false,
                cache:true,
                success: function(a){
                    $('#isiinovasi').html(a);
                    $('#tableinov').dataTable();
                }
            });
            
            $('#listkabkota').on('change',function(){
               var nmkabkota = $(this).val();
               $('#loading').html('<img src="../assets/img/bgLoad1.gif">');
                $.ajax({
                    url: 'listinovkabkota-adm.php',
                    type: 'POST',
                    data: 'nmkabkota='+nmkabkota,
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