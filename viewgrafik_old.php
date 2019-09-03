<?php

include 'plugins/config.php';

    $select = "SELECT jenisdiklat, COUNT(*) as jumlah FROM inovasi GROUP BY jenisdiklat";
    $select1 = "SELECT kelompok, COUNT(*) as jumlah FROM inovasi GROUP BY kelompok";
    $select2 = "SELECT asal_peserta, COUNT(*) as jumlah FROM inovasi WHERE asal_peserta<>'internal' GROUP BY asal_peserta";
    $select_act = mysqli_query($con, $select);
    $select_act1 = mysqli_query($con, $select1);
    $select_act2 = mysqli_query($con, $select2);
    
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
    
    if($select_act2->num_rows>0){
        //--untuk merender grafik menggunakan library highcharts.js--
        echo"
        $('#grafik-kabkota').highcharts({
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
        while($row2=$select_act2->fetch_assoc()){
            echo "
                {y: ".$row2['jumlah'].", name: '".$row2['asal_peserta']."'},
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