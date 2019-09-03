<?php

include 'plugins/config.php';

    $select = "SELECT jenisdiklat, COUNT(*) as jumlah FROM inovasi WHERE status = '1' GROUP BY jenisdiklat";
    $select1 = "SELECT kelompok, COUNT(*) as jumlah FROM inovasi WHERE status = '1' GROUP BY kelompok";
    $select2 = "SELECT asal_peserta FROM inovasi WHERE asal_peserta<>'internal' AND status = '1' GROUP BY asal_peserta";
    $select3 = "SELECT COUNT(*) as jumlah FROM inovasi WHERE asal_peserta<>'internal' AND status = '1' GROUP BY asal_peserta";
    
    
    $select_act = mysqli_query($con, $select);
    $select_act1 = mysqli_query($con, $select1);
    $select_nmkabkota = mysqli_query($con, $select2);
    $select_jmlinov_kabkota = mysqli_query($con, $select3);
    
    if($select_act->num_rows>0){
        //--untuk merender grafik menggunakan library highcharts.js--
        echo"
        $('#grafik-jenisinov').highcharts({
                chart: {
            backgroundColor: null
        },
            title: {
                text: false
            },
            series: [{
                type: 'pie',
                name: 'Jumlah inovasi',
                data: [
        ";
        while($row=$select_act->fetch_assoc()){
            echo "
                {y: ".$row['jumlah'].", name: '".$row['jenisdiklat']."'},
            ";
        }
        echo"
                ],
                //size: 150,
                showInLegend: true,
                dataLabels: {
                    color: '#761c19',
                    enabled: true,
                    format: '{point.y:.0f}' // no decimal
                }
            }]
        });
        ";
        //--untuk merender grafik menggunakan library highcharts.js--
    }
    
    if($select_act1->num_rows>0){
        //--untuk merender grafik menggunakan library highcharts.js--
        echo"
        $('#grafik-lingkupinov').highcharts({
                chart: {
            backgroundColor: null
        },
            title: {
                text: false
            },
            series: [{
                type: 'pie',
                name: 'Jumlah inovasi',
                data: [
        ";
        while($row1=$select_act1->fetch_assoc()){
            echo "
                {y: ".$row1['jumlah'].", name: '".$row1['kelompok']."'},
            ";
        }
        echo"
                ],
                //size: 150,
                showInLegend: true,
                dataLabels: {
                    color: '#761c19',
                    enabled: true,
                    format: '{point.y:.0f}' // no decimal
                }
            }]
        });
        ";
        //--untuk merender grafik menggunakan library highcharts.js--
    }
    
    if($select_nmkabkota->num_rows>0){
        //--untuk merender grafik menggunakan library highcharts.js--
        echo"
        $('#grafik-kabkota').highcharts({
            chart: {
                backgroundColor: null,
                type: 'bar',
                height: 500
            },
            title: {
                text: false
            },
            xAxis: {
                categories: [
        ";
            while($row2=$select_nmkabkota->fetch_assoc()){
                echo "'".$row2['asal_peserta']."',";
            }        
            echo"    
                ],
                title: {
                    text: null
                },
                labels: {
                    align: 'right',
                    rotation: -30,
                    style: {
                        fontSize: '10px'
                    }
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
                name: 'Kab/Kota',
                data: [
        ";
        while($row3=$select_jmlinov_kabkota->fetch_assoc()){
            echo $row3['jumlah'].",";
        }
        echo"
                ]
            }],
            plotOptions: {  
                bar: {
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