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
                                <h4 class="title">Registrations for different age groups</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <!-- chart here -->
                                <div class="col-md-12" align="center"> <img id="wait" class="" src="assets/img/waiting.gif"/></div>
                               
                            <canvas id="ageChart" width="400"></canvas>
                            <script> 
                            var agegroup =[];
                            var idcount =[];
                            $(function () {
                                $('#wait').hide();
                                    $.ajax({
                                    url: '../jsons/agewise.json',
                                    beforeSend: function(){
                                        $('#wait').show();
                                    }
                                })
                                .done(function(data){
                                   
                                    $('#wait').hide();
                                    
                                     for (var key in data.data) {
                                             console.log(data.data[key].AgeRange);
                                             console.log(data.data[key].Count);
                                             if(data.data[key].AgeRange==='NULL'){
                                                data.data[key].AgeRange = 'Others';
                                             }
                                             agegroup.push(data.data[key].AgeRange);
                                             idcount.push(data.data[key].Count);
                                        }

                                var ctx = document.getElementById("ageChart").getContext('2d');

                                data = {
                                        datasets: [{
                                            data: idcount,
                                        
                                             backgroundColor: [
                                                            'rgba(46, 204, 113,0.8)',
                                                            'rgba(52, 152, 219,0.8)',
                                                            'rgba(155, 89, 182,0.8)',
                                                            'rgba(231, 76, 60,0.8)',
                                                            'rgba(230, 126, 34,0.8)',
                                                            'rgba(243, 156, 18,0.8)',
                                                            'rgba(52, 73, 94,0.8)',
                                                            'rgba(41, 128, 185,0.8)',
                                                            'rgba(189, 195, 199,0.8)',
                                                            'rgba(255, 206, 86, 0.8)'
                                                        ]
                                        }],

                                        // These labels appear in the legend and in the tooltips when hovering different arcs
                                        labels: agegroup
                                    };
                           var myDoughnutChart = new Chart(ctx, {
                                type: 'doughnut',
                                data: data
                            });

                                    
                                    })
                                .fail(function() {
                                   
                                    $('#status').html("<strong>An Error Occured.</strong>");
                                })});



                            
                            </script>

                                <!-- chart ends here -->
                        </div>
                                    <div class="footer">
                                    <div class="stats">Processing time
                                    </div>
                                    <hr>
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Hadoop took <strong>899048</strong> ms to process<br>
                                        <i class="fa fa-circle text-warning"></i> Hive took <strong>899048</strong> ms to process<br>
                                        <i class="fa fa-circle text-success"></i> Spark took <strong>89904</strong> ms to process
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
                    <!-- <ul>
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
                    </ul> -->
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