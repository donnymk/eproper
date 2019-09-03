<?php    
    date_default_timezone_set('Asia/Jakarta');
    //$tanggalskr=date('Y-m-d H:i:s');
    //$bulanskr=date('m');
    $tahunskr=date('Y'); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Daftarkan Inovasi - Badan Pengembangan Sumber Daya Manusia Daerah Provinsi Jawa Tengah</title>
        <link href='assets/img/logo_jawa_tengah_icon.ico' rel='icon' type='image/x-icon'>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/w3.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <script src="assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <!--<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>-->
        <script>
        $(document).ready(function() {
            $('#panelinovasi').hide();
            $.ajax({
                url: 'listnmdiklat.php',
                type: 'POST',
                data: 'jenisdiklat=dikpim',
                async: false,
                cache:true,
                success: function(nmdiklat){
                    $('#namadiklat').html( nmdiklat);
                    $('#tahun').val('<?= $tahunskr ?>');
                }
            });
            //disable ketikan spasi untuk NIP
            $("#nip").on({
              keydown: function(e) {
                if (e.which === 32)
                  return false;
              },
              change: function() {
                this.value = this.value.replace(/\s/g, "");
              }
            });            
        });
        function cekinovasi(){
            var nip=$('#nip').val();
            var namadiklat=$('#namadiklat').val();
            var tahun=$('#tahun').val();
            if(nip==''){
                $('#nip').focus();
            }
            else{
                //document.getElementById('nip2').value=nip;
                $('#nomorinduk').val(nip);
                $('#namadiklat1').val(namadiklat);
                $('#tahun1').val(tahun);
                $.ajax({
                    url: 'cek_inovasi.php',
                    type: 'POST',
                    data: 'nip='+nip+'&namadiklat='+namadiklat,
                    dataType: 'json',
                    async: false,
                    cache:true,
                    success: function(a){
                        if(a[0].pesan!='already'){
                            $('#nip').attr('disabled','disabled');
                            $('#namadiklat').attr('disabled','disabled');
                            $('#cekdulu').attr('disabled','disabled');
                            $('#pesancek').html('');
                            $('#panelinovasi').show();
                            
                        }
                        else{
                            $('#pesancek').html('<div class="alert alert-success">Anda sudah mendaftarkan inovasi diklat '+namadiklat+'. <a class="tautan" href="inovasi.html?id='+a[0].id+'">Lihat</a></div>');
                        }
                    }
                });                    
                return false;
            }
        }
        </script>
    </head>
    <body>
        <div class="container">
            <div id="logojateng" style="float: left; margin-right: 10px">
               <img src="assets/img/logo_jawa_tengah_icon.ico" width="64" height="64" alt="">
            </div>
            <div>
                <h4><b>Direktori Inovasi Diklat Kepemimpinan</b></h4>
                <p>Badan Pengembangan Sumber Daya Manusia Daerah Provinsi Jawa Tengah</p>
            </div>
            <ul class="w3-navbar w3-teal w3-round">
                <li><a class="w3-blue-grey" href="./">Daftarkan Inovasi</a></li>
                <li><a class="w3-hover-blue-grey" href="dinovasi.html">Direktori Inovasi</a></li>
            </ul>
            <br>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                   <label>NIP</label>
                                   <input class="form-control input-lg" id="nip" type="text" name="nip" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">                    
                                    <label>Diklat & Angkatan</label>
                                   <select class="form-control input-lg" id="namadiklat" name="namadiklat" required>
                                   </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">                    
                                    <label>Tahun</label>
                                   <input class="form-control input-lg" id="tahun" type="text" name="tahun" disabled='disabled'>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <br>
                                    <button type="submit" id="cekdulu" class="w3-btn w3-blue-grey w3-large w3-round" onclick="return cekinovasi()" name="cekdulu"><span class='glyphicon glyphicon-share-alt' aria-hidden='true'></span> Daftarkan</button>
                               </div>                       
                            </div>
                        </div>
                        <br/>
                    </form>
                    <div id="pesancek"></div>

                    <div id="panelinovasi">
                    <span class="w3-tag w3-dark-grey w3-small">Identitas</span>
                    <br><br>
                    <form method="post" action="save_inovasi.php">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                   <label>Nama</label>
                                   <input class="form-control" id="nama" type="text" name="nama" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">                    
                                    <label>Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">                    
                                    <label>SKPD</label>
                                    <input class="form-control" id="skpd" type="text" name="skpd" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <span class="w3-tag w3-dark-grey w3-small">Inovasi</span>
                        <br><br>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                   <label>Judul Inovasi</label>
                                   <input id="nomorinduk" type="hidden" name="nomorinduk">
                                   <input id="namadiklat1" type="hidden" name="namadiklat1">
                                   <input id="tahun1" type="hidden" name="tahun1">
                                   <input class="form-control" id="judul" type="text" name="judul" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">                    
                                    <label>Ruang Lingkup Inovasi</label>
                                    <select class="form-control" id="kelompok" name="kelompok" required>
                                        <option value="" disabled selected>-Pilih-</option>
                                        <option value="BUMN/BUMD">BUMN/BUMD</option>
                                        <option value="Kabupaten/Kota">Kabupaten/Kota</option>
                                        <option value="Kecamatan">Kecamatan</option>
                                        <option value="Kelurahan">Kelurahan</option>
                                        <option value="Kementerian/Lembaga">Kementerian/Lembaga</option>
                                        <option value="Provinsi">Provinsi</option>
                                    </select>                            
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">                    
                                    <label>Jenis Inovasi</label>
                                    <select class="form-control" id="jenisinovasi" name="jenisinovasi" required>
                                        <option value="" disabled selected>-Pilih-</option>
                                        <option value="Hubungan">Hubungan</option>
                                        <option value="Konseptual">Konseptual</option>
                                        <option value="Metode">Metode</option>
                                        <option value="Produk">Produk</option>
                                        <option value="Proses">Proses</option>
                                        <option value="SDM">SDM</option>
                                        <option value="Struktur Organisasi">Struktur Organisasi</option>
                                        <option value="Teknologi">Teknologi</option>
                                    </select>                             
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                   <label>Latar Belakang</label>
                                   <textarea class="form-control" id="latarbelakang" name="latarbelakang" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">                    
                                    <label>Manfaat</label>
                                    <textarea class="form-control" id="manfaat" name="manfaat" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">                    
                                    <label>Milestone</label>
                                    <textarea class="form-control" id="milestone" name="milestone" required="required"></textarea>
                                </div>
                            </div>
                        </div>             
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <br>
                                    <button type="submit" id="submit" class="w3-btn w3-blue-grey w3-large w3-round" name="submit"><span class='glyphicon glyphicon-share-alt' aria-hidden='true'></span> Daftarkan</button>
                               </div>                       
                            </div>
                        </div>
                        <br/>
                    </form>                    
                </div>
            </div>

            </div>
        </div>
        
		<script type="text/javascript">


if ( typeof CKEDITOR == 'undefined' )
{
	document.write(
		'CKEditor not found');
}
else
{
	var latarbelakang = CKEDITOR.replace( 'latarbelakang' );
        var manfaat = CKEDITOR.replace( 'manfaat' );
        var milestone = CKEDITOR.replace( 'milestone' );

	
	CKFinder.setupCKEditor( latarbelakang, '' ) ;
        CKFinder.setupCKEditor( manfaat, '' ) ;
	CKFinder.setupCKEditor( milestone, '' ) ;
}
</script>
    </body>
</html>
