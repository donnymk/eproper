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
            <!-- Header -->
            <?php include 'header.php' ?>
            <div class="row">
                <div class="col-md-12">
                    <ul class="w3-navbar w3-pink w3-round">
                        <li><a class="w3-hover-blue-grey" href="./">Direktori Inovasi</a></li>
                        <li><a class="w3-hover-blue-grey" href="dir_rtl.php">Direktori RTL</a></li>
                        <li><a class="w3-hover-blue-grey" href="dinokabkota.php">Inovasi dari Kab / Kota</a></li>
                        <li><a class="w3-blue-grey" href="lihatuser.php">Kelola user e-proper</a></li>
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

            <h3>User Peserta Internal</h3>
            <br>
            <a class="tautan" href="tambahuser.php"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> <b>Tambah user baru</b></button></a>
            <br><br>
            <div class="form-group">                    
                <label>Diklat, angkatan & tahun</label>
               <select class="form-control" id="namadiklat" name="namadiklat" required>
               </select>
            </div>
            <div class="panel panel-default" style="box-shadow: 0px 5px 10px lightgray; border: solid 1px lightgray;">
                <div class="panel-body">
                    <form action="admdeluserall.php" method="post">
                        <table class="table table-striped table-bordered" id="tableinov">
                            <thead>
                            <th>No.</th><th>User</th><th>Password</th><th>Nama</th><th>NIP</th><th>Jabatan</th><th>SKPD</th><th>Nama Diklat</th><th></th>
                            </thead>
                            <tbody id="isiuser">
                            </tbody>
                        </table>
                        <div style="text-align: right">
                            <input type="checkbox" onClick="toggle(this)" /> Pilih semua
                            <input onclick="return confirmdel1()" class="w3-btn w3-small w3-blue-grey w3-round" type="submit" id="hapus" name="hapus" value="Hapus">
                        </div>
                    </form>
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
                url: 'listnmdiklat-all.php',
                type: 'POST',
                data: 'jenisdiklat=dikpim',
                //async: false,
                cache:true,
                success: function(nmdiklat){
                    $('#namadiklat').html( nmdiklat);
                }
            });             
            $.ajax({
                url: 'admlistuser.php',
                type: 'POST',
                data: 'namadiklat=semua',
                //async: false,
                cache:true,
                success: function(a){
                    if(a=='nodata'){
                        $('#hapus').hide();
                        $('#isiuser').html('<tr><td colspan="9"><center>Tidak ada data</center></td></tr>'); 
                    }
                    else{
                        $('#isiuser').html(a);
                        $('#hapus').show();
                        $('#tableinov').dataTable();
                    }                                        
                }
            });
            $('#namadiklat').on('change',function(){
               var namadiklat = $(this).val();
               $('#loading').html('<img src="../assets/img/bgLoad1.gif">');
                $.ajax({
                    url: 'admlistuser.php',
                    type: 'POST',
                    data: 'namadiklat='+namadiklat,
                    async: false,
                    cache:true,
                    success: function(b){
                        $('#loading').html('');
//                        $('#isiuser').html(b);
//                        if(b=='nodata'){
//                            $('#hapus').hide();
//                            $('#isiuser').html('<tr><td></td><td>Tidak ada data</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>'); 
//                        }
//                        else{
                            $("#tableinov").DataTable().destroy();
                            $('#isiuser').html(b);
                            $('#hapus').show();                       
                            $('#tableinov').dataTable();                            
//                        } 
                    }
                });
            });             
        });     
        function confirmdel(){
            var con = confirm('Yakin hapus?');
            if(con == true) {
                return true;
            }
            else{
                return false;
            }
        } 
        function confirmdel1(){
            var con = confirm('Hapus data terpilih?');
            if(con == true) {
                return true;
            }
            else{
                return false;
            }
        }
        function toggle(pilih) {
            checkboxes = document.getElementsByName('id[]');
            for(var i=0, n=checkboxes.length;i<n;i++) {
              checkboxes[i].checked = pilih.checked;
            }
        }         
        </script>        
        <script src="../assets/js/menuNav.js" type="text/javascript"></script>
    </body>
</html>

