<?php
include 'pages/header.php';
include 'pages/nav.php';
?>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
               
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Testing Charts</h4>
                                <p class="category">Displaying Data for bleh</p>
                            </div>
                            <div class="content">
                                <!-- chart here -->
                            <canvas id="myChart" width="400"></canvas>
                            <script>
                            var ctx = document.getElementById("myChart").getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'horizontalBar',
                                //type: 'bar',
                                //type: 'doughnut',
                                data: {
                                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                                    datasets: [{
                                        label: '# of Votes',
                                        data: [12, 19, 3, 5, 4, 3],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255,99,132,1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    }
                                }
                            });
                            </script>

                                <!-- chart ends here -->





                                <div class="footer">
                                    <div class="stats">Processing time
                                    </div>
                                    <hr>
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Data took <strong>899048</strong> ms to process<br>
                                        <i class="fa fa-circle text-warning"></i> Data took <strong>899048</strong> ms to process<br>
                                        <i class="fa fa-circle text-success"></i> Data took <strong>899048</strong> ms to process
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>

                        <div class="card">

                            <div class="header">
                                <h4 class="title">Testing Doughnut Charts</h4>
                                <p class="category">Displaying Data for bleh</p>
                            </div>
                            <div class="content">
                                <div class="col-md-6"> 
                                <!-- chart here -->
                            <canvas id="myDoughnutChart" width="400"></canvas>
                            <script>
                                var ctx2 = document.getElementById("myDoughnutChart").getContext('2d');
                                data2 = {
                                        datasets: [{
                                            data: [10, 20, 30],
                                            backgroundColor: [
                                                           'rgba(255, 99, 132, 0.8)',
                                                            'rgba(54, 162, 235, 0.8)',
                                                            'rgba(255, 206, 86, 0.8)'
                                                        ]
                                        }],

                                        // These labels appear in the legend and in the tooltips when hovering different arcs
                                        labels: [
                                            'Red',
                                            'Blue',
                                            'Yellow'
                                            
                                        ]
                                    };
                           var myDoughnutChart = new Chart(ctx2, {
                                type: 'doughnut',
                                data: data2
                            });

                            
                            </script>

                                <!-- chart ends here -->
                        </div>
                        <div class="col-md-6"> 
                                    <!-- chart here -->
                            <canvas id="myDoughnutChart2" width="400"></canvas>
                            <script>
                                var ctx3 = document.getElementById("myDoughnutChart2").getContext('2d');
                                data3 = {
                                        datasets: [{
                                            data: [56, 45, 30],
                                            backgroundColor: [
                                                           'rgba(255, 99, 132, 0.8)',
                                                            'rgba(54, 162, 235, 0.8)',
                                                            'rgba(255, 206, 86, 0.8)'
                                                        ]
                                        }],

                                        // These labels appear in the legend and in the tooltips when hovering different arcs
                                        labels: [
                                            'Red',
                                            'Blue',
                                            'Yellow'
                                            
                                        ]
                                    };
                           var myDoughnutChart = new Chart(ctx3, {
                                type: 'doughnut',
                                data: data3
                            });

                            
                            </script>

                                <!-- chart ends here -->

                        </div>



                                <div class="footer">
                                    <div class="stats">Processing time
                                    </div>
                                    <hr>
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Data took <strong>899048</strong> ms to process<br>
                                        <i class="fa fa-circle text-warning"></i> Data took <strong>899048</strong> ms to process<br>
                                        <i class="fa fa-circle text-success"></i> Data took <strong>899048</strong> ms to process
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>



               
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">Hadoop Team</a>, made with love for Persistent Systems Ltd.
                </p>
            </div>
        </footer>

    </div>


<?php

include 'pages/footer.php';
?>