<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<title>Fetch FROM DATABASE and AJAX</title>

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <link href="../css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet" />
        <link href="autopotstyles.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,200&display=swap" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css2?family=Anton&family=Cormorant+Garamond:ital,wght@1,700&family=Oswald&family=Pacifico&family=Redressed&family=Roboto+Serif&family=Ultra&display=swap" rel="stylesheet">
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
                $( ".water" ).click(function() {
                    $.ajax({
                        url: "https://api.thingspeak.com/update?api_key=5T6XMZ0MZB3K8TVA&field1=1",
                        type: "GET",
                    });
                    $('.water').prop('disabled', true);
                    setTimeout(function() {
                        $('.water').prop('disabled', false);
                    }, 5000);
                });
                $( ".no-water" ).click(function() {
                    $.ajax({
                        url: "https://api.thingspeak.com/update?api_key=5T6XMZ0MZB3K8TVA&field1=0",
                        type: "GET",
                    });
                    $('.no-water').prop('disabled', true);
                    setTimeout(function() {
                        $('.no-water').prop('disabled', false);
                    }, 5000);
                });
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
        <div class="NavDiv">
            <nav class="nav"> <!--class='navbar navbar-dark bg-success'-->
                <h1 class=NavTitle>Auto Pot <i class="fa-solid fa-seedling"></i> </h1>
            </nav>
        </div>

        <div class='container text-center mw-100 border'>
            <div class='row'>
                <div class='col '>
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
                            <button class='water' name='water'>Water</button>
                            <button class='no-water' name='no-water'>No Water</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>