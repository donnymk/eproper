<?php

include 'plugins/config.php';
    
    $select4 = "SELECT peserta.pemda FROM inovasi INNER JOIN peserta ON inovasi.nip = peserta.nip GROUP BY peserta.pemda";
    $select5 = "SELECT COUNT(*) as jumlah FROM inovasi INNER JOIN peserta ON inovasi.nip = peserta.nip WHERE inovasi.status = '1' GROUP BY peserta.pemda";

    $select_pemda = mysqli_query($con, $select4);
    $select_jmlinov_pemda = mysqli_query($con, $select5);
    
    if($select_pemda->num_rows>0){
        //--untuk merender grafik menggunakan library highcharts.js--
        echo"
        $('#grafik-pemda').highcharts({
            chart: {
                backgroundColor: null,
                type: 'column',
                height: 580
            },
            title: {
                text: 'Jumlah Inovasi Berdasarkan Asal ASN'
            },
            legend: {
                enabled: false
            },            
            xAxis: {
                categories: [
        ";
            while($row4=$select_pemda->fetch_assoc()){
                echo "'".$row4['pemda']."',";
            }        
            echo"    
                ],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah'
                },
                labels: {
                    overflow: 'justify'
                }
            },            
            series: [{
                name: 'Jumlah',
                data: [
            ";
            while($row5=$select_jmlinov_pemda->fetch_assoc()){
                echo $row5['jumlah'].",";
            }
            echo"
                ]
            }],
            plotOptions: {  
                column: {
                    dataLabels: {
                        enabled: true,
                        style:{
                            //color:'contrast',
                            fontSize:'9px',
                            //fontWeight:'bold',
                            //textOutline:'1px contrast'
                        }                                
                    }
                }                        
            }           
        });
        ";
        //--untuk merender grafik menggunakan library highcharts.js--
    }
    