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
                        

                            <div class="header">
                                <h4 class="title">Registrations for different age groups</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <!-- chart here -->
                                <!-- <div class="col-md-12" align="center"> <img id="wait" class="" src="assets/img/waiting.gif"/></div> -->
                               
                                <table id="myTable" class="table table-hover table-striped table-bordered table-full-width">
                                    <thead>
                                        
                                        <th>Agency Name</th>
                                        <th>Total Registrations</th>
                                    </thead>
                                    </table>

                            <script> 
                            $(document).ready(function() {
                                
                                $('#myTable').DataTable( {
                                    
                                    "ajax" :"../jsons/EnrollmentAgencies.json",
                                    "columns" : [
                                            { "data": "Agency" },
                                            { "data": "Count" }
                                            ]
                                } );

                                  $.ajax({
                                    url: '../jsons/EnrollmentAgencies.json',
                                })
                                .done(function(data){
                                    console.log(data.time);
                                    $("#time").html('<i class="fa fa-circle text-info"></i> Hadoop took <strong>'+data.time.mr+'</strong> ms to process<br><i class="fa fa-circle text-warning"></i> Hive took <strong>'+data.time.hive+'</strong> ms to process<br> <i class="fa fa-circle text-success"></i> Spark took <strong>'+data.time.spark+'</strong> ms to process');

                                });
                            });
                                
                                  



                            
                                
                            </script>

                                <!-- chart ends here -->
                        </div>
                                    <div class="footer">
                                    <div class="stats">Processing time
                                    </div>
                                    <hr>
                                    <div class="legend" id="time">
                                        <i class="fa fa-circle text-info"></i> Hadoop took <strong>LOADING</strong> ms to process<br>
                                        <i class="fa fa-circle text-warning"></i> Hive took <strong>LOADING</strong> ms to process<br>
                                        <i class="fa fa-circle text-success"></i> Spark took <strong>LOADING</strong> ms to process
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