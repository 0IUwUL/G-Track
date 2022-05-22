<div class="repbox my-5">
    

    <div class="row col-8">
        <div class="row">
            <div class="title h4"> Report</div>
                <div class="report col shadow mb-5 rounded">
                    <div class="title">Total Expenses:</div>
                        <div id="piechart">
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                                // Load google charts
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                // Draw the chart and set the chart values
                                function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                ['Expenses', 'Hours per Day'],
                                ['Cat 1', 9],
                                ['Cat 2', 8],
                                ['Cat 3', 2],
                                ['Cat 4', 2],
                                ['Cat 5', 2]
                                ]);

                                // Optional; add a title and set the width and height of the chart
                                var options = {'backgroundColor':'transparent',width:'100%', height: 270, 
                                    'slices':{
                                        0:{
                                            color:'#F4AA11'
                                        },
                                        1:{
                                            color:'#A4C2F4'
                                        },
                                        2:{
                                            color:'#A68057'
                                        },
                                        3:{
                                            color:'#E44819'
                                        },
                                        4:{
                                            color:'#F5A69B'
                                        },
                                    },
                                    pieSliceBorderColor:"transparent",
                                    legend:{
                                        maxLines: 5,
                                        position: 'left',
                                        alignment:'center',
                                        textstyle:{
                                            color:'white',
                                        }
                                    },
                                    chartArea:{
                                        top:40
                                    },
                                    pieSliceText:['none'],
                                };

                                // Display the chart inside the <div> element with id="piechart"
                                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                chart.draw(data, options);
                                }
                            </script>

                        </div>
                </div>

                <div class="row mx-1">
                    <div class="row row-cols-3">
                        <div class="choices col shadow mb-5 rounded">
                            <div class="row justify-content-center mt-3 h5" style="color:#628EFF">
                                Personal Uses
                            </div>
                        </div>

                        <div class="choices col shadow mb-5 rounded">
                            <div class="row justify-content-center mt-3 h5" style="color:#628EFF">
                                Business Transactions
                            </div>
                        </div>

                        <div class="choices col shadow mb-5 rounded">
                            <div class="row justify-content-center mt-3 h5" style="color:#628EFF">
                                Budget
                            </div>
                        </div>

                    </div>
                </div>
        </div>
    </div>
</div>