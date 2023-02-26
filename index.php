<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<title>Fetch FROM DATABASE and AJAX</title>

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <link href="../css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet" />
        <style>
            .statstext {
                font-family: "Fjalla One";
            }
        </style>

        <script type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js" ></script>
        <script type="text/javascript" src="js/jquery-1.6.3.min.js" ></script>
        <script type="text/javascript" src="js/jquery-ui.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

        <script>
            getCurrentStats();
            $(document).ready(function(){
                setInterval(getCurrentStats, 1000);
            });
            var str="";
    
            function getCurrentStats(){
                $.ajax({
	                type:'POST',
         	        url: 'getData_ajax.php',
                    success: function(data) {
	                $('#current_stats').html(data);
                    }
                });
            }
        </script>

    </head>

    <body>
        <nav class='navbar navbar-dark bg-success'>
            <div class='container-fluid'>
            <span class='navbar-brand mb-0 h1'>Navbar</span>
            </div>
        </nav>

        <div class='py-4'></div>

        <div class='container text-center mw-100 border'>
            <div class='row'>
                <div class='col border'>
                    <div id='current_stats'></div>
                </div>
                <div class='col-7 border'>
                    <div class='row h-50'>
                        <div class='col border'>
                            <div id='chart'></div>
                            <script>
                                var options = {
                                    chart: {
                                        height: '100%',
                                        type: 'line',
                                    },
                                    dataLabels: {
                                        enabled: false
                                    },
                                    series: [],
                                    title: {
                                        text: 'Temperature',
                                    },
                                    noData: {
                                    text: 'Loading...'
                                    },
                                    xaxis: {
                                        type: "datetime"
                                    }
                                }

                                var chart = new ApexCharts(
                                document.querySelector("#chart"),
                                options
                                );

                                chart.render();
                                updateChart();
                                function updateChart() {
                                    $.getJSON('getChartData_ajax.php', function(response) {
                                        chart.updateSeries([{
                                            name: 'Temperature',
                                            data: response
                                        }])
                                    });
                                }
                            </script>
                        </div>
                    </div>
                    <div class='row h-50'>
                        <div class='col border'>
                            <div id='hi'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>