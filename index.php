<!DOCTYPE html>
<!--
Created by:
DONNY MALIK KURNIAWAN (bossdony@gmail.com)
-->
<html>
    <head>
        <title>E-Laporan Hasil Pelatihan | Badan Pengembangan Sumber Daya Manusia Daerah Provinsi Jawa Tengah</title>
        <link href='assets/img/logo_jawa_tengah_icon.ico' rel='icon' type='image/x-icon'>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/w3.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/AdminLTE.css" rel="stylesheet" type="text/css"/>
        <!-- TABLE STYLES-->
       <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
<link href='https://fonts.googleapis.com/css?family=Assistant' rel='stylesheet'>
<style>
body {
    font-family: 'Assistant';font-size: 15px;
    background-color: 'whitesmoak';
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
                        <li><a style="color: white;" class="w3-blue-grey" href="./">Direktori Inovasi & RTL</a></li>
                        <li><a style="color: white;" class="w3-hover-blue-grey" href="statistik.php">Statistik</a></li>
                        <li class="w3-dropdown-click">
                            <a style="color: white;" onclick="menuNav()" class="w3-hover-blue-grey" href="javascript:;">Ebook <span class="caret"></span></a>
                            <div id="menu0" class="w3-dropdown-content w3-white w3-card-4 w3-padding" style="z-index: 1">
                                <a href="ebookpimII.php" class="w3-hover-blue-grey">Direktori Inovasi Diklatpim Tingkat II</a>
                                <a href="ebookpimIII.php" class="w3-hover-blue-grey">Direktori Inovasi Diklatpim Tingkat III</a>
                                <a href="ebookpimIV.php" class="w3-hover-blue-grey">Direktori Inovasi Diklatpim Tingkat IV</a>                    
                            </div>                            
                            <!--<a class="w3-hover-blue-grey" href="ebook.html">Ebook</a>-->
                        </li>
                        <li class="w3-dropdown-click">
                            <a style="color: white;" onclick="menuLogin()" class="w3-hover-blue-grey" href="javascript:;">Login <span class="caret"></span></a>
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
            <div class="w3-row">                
                <div class="w3-twothird w3-padding-ver-8">

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Custom Tabs (Pulled to the right) -->
                            <div class="nav-tabs-custom" style="box-shadow: 0px 5px 10px lightgray; border: solid 1px lightgray;">
                                <ul class="nav nav-tabs pull-right">
                                    <li><a href="#tab_2-2" data-toggle="tab"><b>Kabupaten/Kota</b></a></li>
                                    <li class="active"><a href="#tab_1-1" data-toggle="tab"><b>BPSDMD</b></a></li>
                                    <li class="pull-left header"><i class="fa fa-th"></i> Inovasi Diklat Kepemimpinan yang diselenggarakan</li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1-1">
                                        <div class="form-group">
                                            <select class="form-control" id="namadiklat" name="namadiklat" required></select>
                                        </div>                       
                                        <table class="table table-striped table-bordered" id="tableinov">
                                            <thead>
                                                <tr class="w3-blue-grey">
                                                    <th>No.</th><th><center>Judul inovasi</center></th><th><center>Inovator</center></th>
                                                </tr>
                                            </thead>
                                            <tbody id="isiinovasi">
                                            </tbody>
                                        </table> 
                                    </div><!-- /.tab-pane -->

                                    <div class="tab-pane" id="tab_2-2">
                                        <div class="form-group">
                                            <select class="form-control" id="listkabkota" name="listkabkota" required></select>
                                        </div>                        
                                        <table class="table table-striped table-bordered" id="tableinov1">
                                            <thead>
                                                <tr class="w3-blue-grey">
                                                    <th>No.</th><th><center>Judul inovasi</center></th><th><center>Inovator</center></th>
                                                </tr>
                                            </thead>
                                            <tbody id="isiinovasi1">
                                            </tbody>
                                        </table>  
                                    </div><!-- /.tab-pane -->
                                </div><!-- /.tab-content -->
                            </div><!-- nav-tabs-custom -->
                        </div>
                    </div><!-- /.col -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel" style="box-shadow: 0px 5px 10px lightgray; border: solid 1px lightgray;">
                                <div class="panel-body">                                                        
                                   <label style="padding-bottom: 20px;"><i class="fa fa-book"></i> Laporan Rencana Tindak Lanjut Diklat Fungsional</label><br>
                                   
                                    <div class="form-group">                    
                                       <select class="form-control" id="namadiklat_f" name="namadiklat_f" required></select>
                                    </div>
                                    <table class="table table-striped table-bordered" id="tablertl">
                                        <thead>
                                            <tr class="w3-blue-grey">
                                                <th>No.</th><th><center>Judul RTL</center></th><th><center>Penulis</center></th>
                                            </tr>
                                        </thead>
                                        <tbody id="isirtl">
                                        </tbody>
                                    </table>                    
                                </div>      
                            </div>  
                        </div>
                    </div>
                           
                </div>

                <div class="w3-third w3-padding-ver-8">
                    <div class="panel panel-default" style="box-shadow: 0px 5px 10px lightgray; border: solid 1px lightgray;">
                        <div class="panel-body">
                            <h5 style="text-align: center">Jumlah inovasi berdasarkan jenis diklat</h5>
                            <div id="grafik-jenisinov" style="text-align: center">
                                <span class="fa fa-spinner fa-spin"></span>
                            </div>
                        </div>      
                    </div>

                    <div class="panel panel-default" style="box-shadow: 0px 5px 10px lightgray; border: solid 1px lightgray;">
                        <div class="panel-body">
                            <h4 style="text-align: center">Jumlah inovasi berdasarkan ruang lingkup</h4>  
                            <div id="grafik-lingkupinov" style="text-align: center">
                                <span class="fa fa-spinner fa-spin"></span>
                            </div>
                        </div>      
                    </div>


                    <div class="panel panel-default" style="box-shadow: 0px 5px 10px lightgray; border: solid 1px lightgray;">
                        <div class="panel-body">
                            <h4>Jumlah inovasi berdasarkan penyelenggaraan di Kab / Kota</h4>
                            <div id="grafik-kabkota" style="text-align: center">
                                <span class="fa fa-spinner fa-spin"></span>
                            </div>                                                    
                        </div>      
                    </div>                     
                </div>
            </div>      

        </div>
        
        <script src="assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        
        <script src="assets/js/highcharts.js" type="text/javascript"></script>

        <!-- DATA TABLE SCRIPTS -->
       <script src="assets/js/dataTables/jquery.dataTables.js"></script>
       <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    
       <script>        
        $(document).ready(function() {
            $.ajax({
                url: 'listnmdiklat.php',
                type: 'POST',
                //async: false,
                cache:true,
                success: function(nmdiklat){
                    $('#namadiklat').html( nmdiklat);
                }
            });            
            $.ajax({
                url: 'listinovasi.php',
                type: 'POST',
                data: 'namadiklat=semua',
                //async: false,
                cache:true,
                success: function(inovasi){
                    $('#isiinovasi').html(inovasi);
                    $('#tableinov').dataTable({
                        "lengthMenu": [ 5, 10, 25, 50, 100 ],
                        "pageLength": 5
                    });
                }
            });
            
             $.ajax({
                url: 'auth/listkabkota.php',
                type: 'POST',
                //data: 'jenisdiklat=dikpim',
                //async: false,
                cache:true,
                success: function(kabkota){
                    $('#listkabkota').html(kabkota);
                }
            });
            
            $.ajax({
                url: 'listinovkabkota.php',
                type: 'POST',
                data: 'nmkabkota=semua',
                //async: false,
                cache:true,
                success: function(inovkabkota){
                    $('#isiinovasi1').html(inovkabkota);
                    $('#tableinov1').dataTable({
                        "lengthMenu": [ 5, 10, 25, 50, 100 ],
                        "pageLength": 5
                    });                    
                }
            });

            $.ajax({
                url: 'listnmdiklat_fungsional.php',
                type: 'POST',
                //async: false,
                cache:true,
                success: function(nmdiklat){
                    $('#namadiklat_f').html( nmdiklat);
                }
            });

            $.ajax({
                url: 'listrtl.php',
                type: 'POST',
                data: 'namadiklat=semua',
                //async: false,
                cache:true,
                success: function(inovasi)
                {
                    $('#isirtl').html(inovasi);
                    $('#tablertl').dataTable({
                        "lengthMenu": [ 5, 10, 25, 50, 100 ],
                        "pageLength": 5
                    });
                }
            });      
            
            $.ajax({
                url: 'viewgrafik.php',
                type: 'POST', // Send post data
                data: 'type=fetch',
                //async: false,
                success: function(s){
                    eval(s);
                }
            });              
            
            $('#namadiklat').on('change',function(){
               var namadiklat = $(this).val();
               $('#isiinovasi').html('<tr><td colspan="100%"><img src="assets/img/bgLoad1.gif"></td></tr>');;
                $.ajax({
                    url: 'listinovasi.php',
                    type: 'POST',
                    data: 'namadiklat='+namadiklat,
                    //async: false,
                    cache:true,
                    success: function(updinov){                      
                        $("#tableinov").DataTable().destroy();
                        $('#isiinovasi').html(updinov);
                        $('#tableinov').dataTable({
                            "lengthMenu": [ 5, 10, 25, 50, 100 ],
                            "pageLength": 5
                        });                            
                    }
                });
            });
            
            $('#listkabkota').on('change',function(){
               var nmkabkota = $(this).val();
               $('#isiinovasi1').html('<tr><td colspan="100%"><img src="assets/img/bgLoad1.gif"></td></tr>');
                $.ajax({
                    url: 'listinovkabkota.php',
                    type: 'POST',
                    data: 'nmkabkota='+nmkabkota,
                    //async: false,
                    cache:true,
                    success: function(updinov1){                      
                        $("#tableinov1").DataTable().destroy();
                        $('#isiinovasi1').html(updinov1);
                        $('#tableinov1').dataTable({
                            "lengthMenu": [ 5, 10, 25, 50, 100 ],
                            "pageLength": 5
                        });                            
                    }
                });
            });
            
            $('#namadiklat_f').on('change',function(){
               var namadiklat_f = $(this).val();
               $('#isirtl').html('<tr><td colspan="100%"><img src="assets/img/bgLoad1.gif"></td></tr>');
                $.ajax({
                    url: 'listrtl.php',
                    type: 'POST',
                    data: 'namadiklat='+namadiklat_f,
                    //async: false,
                    cache:true,
                    success: function(updinov1){                      
                        $("#tablertl").DataTable().destroy();
                        $('#isirtl').html(updinov1);
                        $('#tablertl').dataTable({
                            "lengthMenu": [ 5, 10, 25, 50, 100 ],
                            "pageLength": 5
                        });                            
                    }
                });
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
                        //async: false,
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
        });
        
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
          showDivs(slideIndex += n);
        }

        function showDivs(n) {
          var i;
          var x = document.getElementsByClassName("mySlides");
          if (n > x.length) {slideIndex = 1}    
          if (n < 1) {slideIndex = x.length} ;
          for (i = 0; i < x.length; i++) {
             x[i].style.display = "none";  
          }
          x[slideIndex-1].style.display = "block";  
        }
        
        
        //automatic slideshow
        var slideIndex1 = 0;
        carousel();
        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
              x[i].style.display = "none";
            }
            slideIndex1++;
            if (slideIndex1 > x.length) {slideIndex1 = 1}
            x[slideIndex1-1].style.display = "block";
            setTimeout(carousel, 8000); // Change image every 6 seconds
        }        
        </script>
        <script src="assets/js/menuNav.js" type="text/javascript"></script>
    </body>
</html>