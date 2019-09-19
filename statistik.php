<!DOCTYPE html>
<!--
Created by:
DONNY MALIK KURNIAWAN (bossdony@gmail.com)
-->
<html>
    <head>
        <title>Direktori Inovasi - Badan Pengembangan Sumber Daya Manusia Daerah Provinsi Jawa Tengah</title>
        <link href='assets/img/logo_jawa_tengah_icon.ico' rel='icon' type='image/x-icon'>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/w3.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
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
            <!-- Header -->
            <?php include 'header.php' ?>
            <div class="row">
                <div class="col-md-12">
                    <ul class="w3-navbar w3-teal w3-round">
                        <li><a class="w3-hover-blue-grey" href="./">Direktori Inovasi</a></li>
                        <li><a class="w3-blue-grey" href="statistik.php">Statistik</a></li>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">                        
                        <div class="panel-body">
                            <h3 id="totalinovasi" style="text-align: center"></h3>
                        </div>                        
                    </div>                    
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div id="grafik-clusterinov"></div>
                        </div>                        
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div id="grafik-pemda"></div>
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
                url: 'viewgrafik1.php',
                type: 'POST', // Send post data
                data: 'type=fetch',
                async: false,
                success: function(s){
                    eval(s);
                }
            });
            
            $.ajax({
                url: 'viewgrafikpemda.php',
                type: 'POST', // Send post data
                data: 'type=fetch',
                async: false,
                success: function(s){
                    eval(s);
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
                            else{
                                $('#notiflogin').html(b);
                            }
                        }
                    });                   
               }
            });  
        });
        </script>
        <script src="assets/js/menuNav.js" type="text/javascript"></script>
    </body>
</html>