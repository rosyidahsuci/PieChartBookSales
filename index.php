<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Grafik Pie Transaksi Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Menambahkan library Highcharts -->
    <script src="highcharts/highcharts.js"></script>
    <script src="highcharts/modules/exporting.js"></script>
    <script src="highcharts/modules/export-data.js"></script>
</head>
<body>
    <center>
    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">ROSYIDAH AMINI SUCI - 2103181045</p>
    </figure>
    <div class="container" style="mt-5">
        <h3>PIE CHART : Transaksi Penjualan Buku</h3>
    </div>
    <div id="grafik" style="width: 700px; height:400px;"></div>

    <script type="text/javascript">
        Highcharts.setOptions({
            colors: ['#006d77', '#83c5be', '#edf6f9', '#ffddd2', '#e29578', '#64E572', '#FF9655','#FFF263', '#6AF9C4']
        });
        Highcharts.chart('grafik', { 
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
        },
        // tittle: {
        //     text: 'Grafik Transaksi Penjualan Buku'
        // },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y} ({point.percentage:.1f}%)</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} ({point.percentage:.1f}%)',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'y_db',
            colorByPoint: true,
            data: [
                <?php
                    include 'config.php';
                    $sql='SELECT * FROM transaksi_buku';
                    $query=mysqli_query($conn,$sql);
                    $i=0;
                    while ($row = mysqli_fetch_array($query)){
                        if($i==0){
                            ?>
                            // Jika diawal ditambahi slice
                            {
                                name: '<?php echo $row['buku']; ?>',
                                y: <?php echo $row['terjual']; ?>,
                                sliced: true,
                                selected: true
                            },
                            <?php
                        }else{?>
                        {
                                name: '<?php echo $row['buku']; ?>',
                                y: <?php echo $row['terjual']; ?>
                            },
                        <?php
                        }
                        $i++;
                    }
                    ?>
        ]
        }]
    });

    </script>
    <figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
 Hasil transaksi penjualan buku dalam 1 bulan menunjukkan bahwa penjualan paling meningkat terdapat pada buku Mantappu Jiwa
 </p>
</figure>
</center>
</body>
</html>