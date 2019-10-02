<?php
include '../plugins/session_superadmin.php';
?>
<html>
    <head>
        <title>Import File Excel</title>
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
            <!-- Header -->
            <?php include 'header.php' ?>
            <div class="row">
                <div class="col-md-12">
                    <ul class="w3-navbar w3-pink w3-round">
                        <li><a class="w3-hover-blue-grey" href="./">Direktori Inovasi</a></li>
                        <li><a class="w3-hover-blue-grey" href="dinokabkota.php">Inovasi dari Kab / Kota</a></li>
                        <li><a class="w3-hover-blue-grey" href="lihatuser.php">Kelola user</a></li>
                        <li><a class="w3-blue-grey" href="lihatuser1.php">User Kabkota</a></li>
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
            <div style="max-width: 800px; margin: auto">
                <h3>Tambah User Peserta Kabkota</h3>
                <form method="post" enctype="multipart/form-data" action="jalan1.php">
                    <div class="form-group">
                        <label>Jenis diklat</label>
                        <select class="form-control" name="jenisdiklat" required>
                            <option value="Diklatpim Tingkat II">Diklatpim Tingkat II</option>
                            <option value="Diklatpim Tingkat III">DIklatpim Tingkat III</option>
                            <option value="Diklatpim Tingkat IV">Diklatpim Tingkat IV</option>
                        </select>                    
                    </div>                   
                    <div class="form-group">
                        <label>Nama diklat</label>
                        <!--<input type="text" class="form-control" id="namadiklat" name="namadiklat" required>-->
                        <select class="form-control" id="namadiklat" name="namadiklat" required></select>
                    </div>
                    <div class="form-group">
                        <label>Pilih file Excel (format .xls / Excel 2003)</label>
                        <a class="tautan" href="javascript:;" data-id="" data-toggle="modal" data-target="#modal-contoh">Lihat contoh</a>
                        <input name="fileexcel" type="file" accept=".xls" required="">                    
                    </div>

                    <br>
                    <input class="w3-btn w3-blue-grey w3-round" name="upload" type="submit" value="Import">
                </form>
            </div>
        </div>
        
        <!-- modal untuk view contoh Excel-->
        <div id="modal-contoh" class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Contoh isi file Excel</h4><br>
                        <center><img src="../assets/img/import.JPG" alt=""/></center>                        
                    </div>
                </div>
            </div>
        </div>

        <script src="../assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script>
        $(document).ready(function() {
            $.ajax({
                url: 'listnmdiklat-all.php',
                type: 'POST',
                data: 'jenisdiklat=dikpim',
                async: false,
                cache:true,
                success: function(nmdiklat){
                    $('#namadiklat').html( nmdiklat);
                }
            });
        });
        </script>
        <script src="../assets/js/menuNav.js" type="text/javascript"></script>
    </body>

</html>