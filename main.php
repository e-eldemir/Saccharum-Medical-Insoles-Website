<!DOCTYPE html>

<html lang="tr">



<head>

    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">



    <title>Saccharum.co</title>

    <meta content="" name="description">

    <meta content="" name="keywords">



    <!-- Favicons -->

    <!-- <link href="assets/img/favicon.png" rel="icon">

    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->



    <!-- Google Fonts -->

    <link href="https://fonts.gstatic.com" rel="preconnect">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">



    <!-- Vendor CSS Files -->

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">

    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">

    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">



    <!-- Template Main CSS File -->

    <link href="assets/css/style.css" rel="stylesheet">



</head>



<body>



    <!-- ======= Header ======= -->

    <header id="header" class="header fixed-top d-flex align-items-center">



        <div class="d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">



                <span class="d-none d-lg-block">Saccharum.co</span>

            </a>

            <i class="bi bi-list toggle-sidebar-btn"></i>

        </div><!-- End Logo -->



        <!-- <div class="search-bar">

            <form class="search-form d-flex align-items-center" method="POST" action="#">

                <input type="text" name="query" placeholder="Ara" title="Enter search keyword">

                <button type="submit" title="Search"><i class="bi bi-search"></i></button>

            </form>

        </div> -->





    </header><!-- End Header -->



    <!-- ======= Sidebar ======= -->

    <aside id="sidebar" class="sidebar">



        <?php



        include('layouts/nav.php');

        ?>



    </aside><!-- End Sidebar-->



    <main id="main" class="main">



        <div class="pagetitle">

            <h1>Dashboard</h1>



        </div><!-- End Page Title -->



        <section class="section">

            <div class="row">

                <div class="col-lg-12">







                    <div class="card">

                        <div class="card-body">



<p id="msg"></p>



                            <canvas id="myChart" width="400" height="200"></canvas>







                        </div>

                    </div>





                </div>





            </div>

        </section>



    </main><!-- End #main -->



    <!-- ======= Footer ======= -->

    <footer id="footer" class="footer">

        <div class="copyright">

            &copy; Copyright <strong><span>Saccharum.co</span></strong>

        </div>

        <div class="credits">

            Emre Alp Eldemir

        </div>

    </footer><!-- End Footer -->



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



    <!-- Vendor JS Files -->

    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendor/chart.js/chart.umd.js"></script>

    <script src="assets/vendor/echarts/echarts.min.js"></script>

    <script src="assets/vendor/quill/quill.js"></script>

    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>

    <script src="assets/vendor/tinymce/tinymce.min.js"></script>

    <script src="assets/vendor/php-email-form/validate.js"></script>



    <!-- Template Main JS File -->

    <script src="assets/js/main.js"></script>



    <script src="//cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="//cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>

    <script src="//cdn.jsdelivr.net/npm/date-fns"></script>

    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>

        $(document).ready(function() {



$("#msg").html("");

setTimeout(function(){

   window.location.reload(1);

}, 15000);

            function isOutlier(temperatures, index) {

                let sum = 0.0;

                let mean;

                let stdDev = 0.0;

                const n = 7; // Number of channels (7 thermistors)



                // Calculate the sum of the temperatures

                for (let i = 0; i < n; i++) {

                    sum += temperatures[i];

                }



                // Calculate the mean

                mean = sum / n;



                // Calculate the standard deviation

                for (let i = 0; i < n; i++) {

                    stdDev += Math.pow(temperatures[i] - mean, 2);

                }

                stdDev = Math.sqrt(stdDev / n);



                // Calculate the Z-score for the given index

                const zScore = (temperatures[index] - mean) / stdDev;



                // Consider values with a Z-score greater than 2 as outliers (95% confidence)

                return Math.abs(zScore) > 1.6844;

            }



            function checkSurrounding(index, temperatures) {

                const clusters = [

                    [0, 1],

                    [1, 2],

                    [2, 3],

                    [3, 4],

                    [4, 5],

                    [5, 6] // Example cluster pairs, adjust according to your needs

                ];



                for (let i = 0; i < clusters.length; i++) {

                    if (index === clusters[i][0] || index === clusters[i][1]) {

                        const otherIndex = (index === clusters[i][0]) ? clusters[i][1] : clusters[i][0];

                        if (isOutlier(temperatures, otherIndex)) {

                            return false; // If another thermistor in the same cluster is also an outlier, consider it a false outlier

                        }

                    }

                }

                return true;

            }



            // Example temperatures array





            // var temperatures;



            function checkvar(temperatures) {



                // temperatures = [0, 17, 18, 0, 50, 60, 20]; // 7 thermistors



                // Loop through each thermistor to detect outliers

                for (var i = 0; i < temperatures.length; i++) {

                 

                    if (isOutlier(temperatures, i)) {

                        if (checkSurrounding(i, temperatures)) {

                            console.log("Outlier detected at channel " + i);

                            $("#msg").html("Outlier detected at channel " + i);

                        } else {

                            console.log("False outlier at channel " + i);

                            $("#msg").html("False outlier at channel " + i);

                        }

                    }

                }



            }









            $.ajax({

                url: 'read_data.php',

                method: 'GET',

                success: function(data) {

                    if (data.error) {

                        console.error(data.error);

                        return;

                    }



                    var temperatures=[];

                    const labels = data.map(entry => entry.datetime);

                    const values1 = data.map(entry => entry.value1);

                    const values2 = data.map(entry => entry.value2);

                    const values3 = data.map(entry => entry.value3);

                    const values4 = data.map(entry => entry.value4);

                    const values5 = data.map(entry => entry.value5);

                    const values6 = data.map(entry => entry.value6);



                    temperatures.push(values1);

                    temperatures.push(values2);

                    temperatures.push(values3);

                    temperatures.push(values4);

                    temperatures.push(values5);

                    temperatures.push(values6);





                    checkvar(temperatures);



                    //console.log(values1);

                    const ctx = document.getElementById('myChart').getContext('2d');

                    const myChart = new Chart(ctx, {

                        type: 'line',

                        data: {

                            labels: labels,

                            datasets: [



                                <?php

                                

                                 $var='';

                                for ($x = 1; $x < 7; $x++) {

                                    $color = 150 - (10 * $x);

                                    $colorRed = 255 - (20 * $x);

                                    $colorBlue = 255 - (15 * $x);

                                    echo "  {";

                                    

                                    if($x==1){

                                        $var = "bas parmak";

                                    }else if($x==2){

                                        $var = "ust sag";

                                    }else if($x==3){

                                        $var = "ust orta";

                                    }else if($x==4){

                                        $var = "orta";

                                    }else if($x==5){

                                        $var = "topuk";

                                    }else if($x==6){

                                        $var = "ust sol";

                                    }

                                    echo "    label: '$var',";

                                    echo "    data: values$x,";

                                    echo "    lineTension: .3,";

                                    echo "    borderColor: 'rgba($colorRed, $color, $colorBlue, 1)',";

                                    echo "    borderWidth: 1,";

                                    echo "    fill: false";

                                    echo "},";

                                }



                                ?>



                            ]

                        },

                        options: {

                            scales: {

                                x: {

                                    type: 'time',

                                    time: {

                                        unit: 'minute'

                                    },

                                    title: {

                                        display: true,

                                        text: 'Time'

                                    }

                                },

                                y: {

                                    beginAtZero: true,

                                    title: {

                                        display: true,

                                        text: 'Temp'

                                    }

                                }

                            }

                        }

                    });

                },

                error: function(error) {

                    console.error('Error fetching data', error);

                }

            });

        });

    </script>

</body>



</html>