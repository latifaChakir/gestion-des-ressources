<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/css/adminlte.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>

<body>
    <?php
    include("../nav.php");
    ?>
    <?php
    include("connect.php");

    // Query to get the count of users
    $userCountQuery = "SELECT COUNT(*) as total_users FROM utilisateur";
    $userCountResult = $conn->query($userCountQuery);

    if ($userCountResult) {
        $userData = $userCountResult->fetch_assoc();
        $totalUsers = $userData['total_users'];
    } else {
        $totalUsers = 0;
    }


    // Query to get the count of categories
    $categorieCountQuery = "SELECT COUNT(*) as total_categories FROM categorie";
    $categorieCountResult = $conn->query($categorieCountQuery);

    if ($categorieCountResult) {
        $CatData = $categorieCountResult->fetch_assoc();
        $total_categories = $CatData['total_categories'];
    } else {
        $total_categories = 0;
    }

    // Query to get the count of subcategories
    $suBcategorieCountQuery = "SELECT COUNT(*) as total_SUBcategories FROM subcategory";
    $subcategorieCountResult = $conn->query($suBcategorieCountQuery);

    if ($subcategorieCountResult) {
        $userData = $subcategorieCountResult->fetch_assoc();
        $total_SUBcategories = $userData['total_SUBcategories'];
    } else {
        $total_SUBcategories = 0;
    }


    // Query to get the count of ressources
    $ressourceCountQuery = "SELECT COUNT(*) as total_ressources FROM ressources";
    $ressourceCountResult = $conn->query($ressourceCountQuery);

    if ($ressourceCountResult) {
        $userData = $ressourceCountResult->fetch_assoc();
        $total_ressources = $userData['total_ressources'];
    } else {
        $total_ressources = 0;
    }


    $conn->close();

    ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Statistiques</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">

        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                <?php echo $total_ressources; ?>
                            </h3>

                            <p>ressources</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                <?php echo $total_categories; ?><sup style="font-size: 20px"></sup>
                            </h3>

                            <p>Categories</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>
                                <?php echo $totalUsers; ?>
                            </h3>

                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>
                                <?php echo $total_SUBcategories; ?>
                            </h3>

                            <p>SubCategories</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
    </section>

    <style>
        .line-chart {
            height: 300px; 
            width: 800px;
        }
    </style>

    <!-- ... div pour afficher le graphique en ligne ... -->
    <div class="line-chart">
        <canvas id="line-chart"></canvas>
    </div>

    <!-- ... votre code JavaScript ... -->
    <script>
        /* global Chart:false */

        $(function () {
            'use strict'

            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
            }

            var mode = 'index'
            var intersect = true

            // Nouveau graphique en ligne
            var $lineChart = $('#line-chart')
            var lineChart = new Chart($lineChart, {
                type: 'line',
                data: {
                    labels: ['users', 'categories', 'subCategories', 'ressources'],
                    datasets: [{
                        data: [<?php echo $totalUsers; ?>, <?php echo $total_categories; ?>,<?php echo $total_SUBcategories; ?>,  <?php echo $total_ressources; ?>],
                        backgroundColor: 'transparent',
                        borderColor: '#007bff',
                        pointBorderColor: '#007bff',
                        pointBackgroundColor: '#007bff',
                        fill: false
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: 200
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })
        })
    </script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
</body>

</html>