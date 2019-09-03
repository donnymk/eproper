<?php

include 'plugins/config.php';
    
    $select1 = "SELECT COUNT(*) AS jumlah FROM inovasi WHERE status = '1'";
    $select4 = "SELECT jenis_inovasi FROM inovasi WHERE status = '1' GROUP BY jenis_inovasi";
    $select5 = "SELECT COUNT(*) as jumlah FROM inovasi WHERE status = '1' GROUP BY jenis_inovasi";
    
    $select_total = mysqli_query($con, $select1);
    $select_cluster = mysqli_query($con, $select4);
    $select_jmlinov_cluster = mysqli_query($con, $select5);
    
    if($select_cluster->num_rows>0){
        //--untuk merender grafik menggunakan library highcharts.js--
        echo"
        $('#grafik-clusterinov').highcharts({
            chart: {
                backgroundColor: null,
                type: 'column',
                height: 580
            },
            title: {
                text: 'Jumlah Inovasi Berdasarkan Cluster'
            },
            legend: {
                enabled: false
            },            
            xAxis: {
                categories: [
        ";
            while($row4=$select_cluster->fetch_assoc()){
                echo "'".$row4['jenis_inovasi']."',";
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
            while($row5=$select_jmlinov_cluster->fetch_assoc()){
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

    while($row6=$select_total->fetch_assoc()){
        $totalinovasi = $row6['jumlah'];
    }    
    echo "$('#totalinovasi').html('Total Inovasi: ".$totalinovasi."')";