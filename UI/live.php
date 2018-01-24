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
                                <h4 class="title">Streaming Live Data</h4>
                                
                            </div>
                            <div class="content">

                                <h3 id="livedata"></h3>
                                <canvas id="myChart" width="250" height="100"></canvas>


                                <script> 
                            $(document).ready(function() {
                                //setInterval(updateLiveData, 2000);
                                setInterval(adddata, 2000);
                                function updateLiveData(){
                                    var result;
                                        $.ajax({
                                    url: 'functions.php',
                                    type: 'POST',
                                    data: {'func' : 'streaming'},
                                    async: false
                                })
                                .done(function(data){
                                    //data= JSON.parse(data);
                                    //console.log(data);
                                    
                                    $("#livedata").html('New registration in '+data.State+'. Total registrations in '+data.State+' : '+data.Count+'');
                                    result = data;
                                    
                                });
                                return(result);
                                }
var canvas = document.getElementById('myChart');
var data = {
  //labels: ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
  labels: ["", "", "","", "", "",""],
  datasets: [{
    label: "State",
    fill: true,
    lineTension: 0.2,
    backgroundColor: "rgba(75,192,192,0.4)",
    borderColor: "rgba(75,192,192,1)",
    borderCapStyle: 'butt',
    borderDash: [],
    borderDashOffset: 0.0,
    borderWidth: 1,
    borderJoinStyle: 'miter',
    pointBorderColor: "rgba(75,192,192,1)",
    pointBackgroundColor: "#fff",
    pointBorderWidth: 1,
    pointHoverRadius: 5,
    pointHoverBackgroundColor: "rgba(75,192,192,1)",
    pointHoverBorderColor: "rgba(220,220,220,1)",
    pointHoverBorderWidth: 2,
    pointRadius: 0,
    pointHitRadius: 10,
    //data: [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null],
    data: [null, null, null, null, null, null, null],
  }]
};

function adddata() {
  myLineChart.data.datasets[0].data.shift();
  myLineChart.data.labels.shift();
  data2 = updateLiveData();
 //myLineChart.data.labels[0].data.push(data2.State);
 myLineChart.data.datasets[0].data.push(data2.Count);
 myLineChart.data.labels.push(data2.State);
 //myLineChart.data.labels.push('');
  
  
  myLineChart.update();

}

var option = {
  showLines: true,
  animation: false,
  legend: {
    display: false
  },
  scales: {
    yAxes: [{
      ticks: {
        max: 100000,
        min: 0,
        stepSize: 20000
      },
      gridLines: {
        drawTicks: false
      }
    }],
    xAxes: [{
      gridLines: {
        display: true,
        drawTicks: true
      },
      ticks: {
        fontSize: 11,
        maxRotation: 45,
        autoSkip: false,
        callback: function(value) {
          if (value.toString().length > 0) {
            return value;
          } else {return null};
        }
      }
    }]
  }
};
var myLineChart = Chart.Line(canvas, {
  data: data,
  options: option
});

                                
                                  
                            });
                                
                                  



                            
                                
                            </script>
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