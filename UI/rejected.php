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
                                <h4 class="title">Rejected Registrations for all states</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <!-- chart here -->
                                <div class="col-md-12" align="center"> <img id="wait" class="" src="assets/img/waiting.gif"/></div>
                               
                             <canvas id="myChart" width="400"></canvas>
                            <script> 
                            var states =[];
                            var rejectedcount =[];
                            $(function () {
                                $('#wait').hide();
                                    $.ajax({
                                    url: '../jsons/RejCount.json',
                                    beforeSend: function(){
                                        $('#wait').show();
                                    }
                                })
                                .done(function(data){
                                   
                                    $('#wait').hide();
                                    
                                     for (var key in data.data) {
                                            
                                             states.push(data.data[key].State);
                                             rejectedcount.push(data.data[key].RejCount);
                                        }

                              
                            var ctx = document.getElementById("myChart").getContext('2d');
                            var myChart = new Chart(ctx, {
                                //type: 'horizontalBar',
                                type: 'bar',
                                
                                data: {
                                    labels: states,
                                    datasets: [{
                                        label: '# of Rejected IDs',
                                        data: rejectedcount,
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 99, 132, 0.2)'
                                            
                                        ],
                                        borderColor: [
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(255,99,132,1)'
                                            
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

                             $("#time").html('<i class="fa fa-circle text-info"></i> Hadoop took <strong>'+data.time.mr+'</strong> ms to process<br><i class="fa fa-circle text-warning"></i> Hive took <strong>'+data.time.hive+'</strong> ms to process<br> <i class="fa fa-circle text-success"></i> Spark took <strong>'+data.time.spark+'</strong> ms to process');

                                    
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
                                    <div class="legend" id="time">
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