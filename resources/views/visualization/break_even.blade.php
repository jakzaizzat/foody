<div class="row">
    <div class="col-md-8 col-md-offset-2" >
        <div class="white-box">
            <h3 class="box-title">Break-Even Chart</h3>
            <div id="chart_container">
                <canvas id="chart1" height="150"></canvas>
            </div>
        </div>
    </div>
</div>

<script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script type="text/javascript">


    $('#calcBtn').click(function(){

        //reset
        var resetCanvas = function(){
            $('#chart1').remove();
            $('#chart_container').append('<canvas id="chart1" height="150"></canvas>');
            console.log("In resetcanvas function");
        }

        resetCanvas();


        var sell = $('#sell_price').val();
        sell = parseFloat(sell);
        console.log(sell);

        //Single Data
        var cost = {{ number_format($total, 2, '.', ',') }};
        var quantity = {{$recipe->quantity}};



        //Sum
        var totalCost = 0;
        var totalSell = 0;

        //Temp Array
        var labelCost = [];
        var dataCost=[];
        var labelSell = [];
        var dataSell=[];

        //break-even
        var breakeven = 0;

        for (var i = 0; i < quantity; i++) {

            //Calculate Cost
            totalCost = cost * quantity;
            labelCost.push(i + 1);
            dataCost.push(totalCost);

            console.log("-----------"+i+"-----------");
            console.log("Total Cost "+totalCost);

            //Calculate Sell
            totalSell += sell;
            labelSell.push(i);
            dataSell.push(totalSell);


            console.log("total Sell "+totalSell);

            if(totalSell > totalCost && breakeven == 0){
                breakeven = i + 1;
                console.log("Current breakeven: "+breakeven);
            }

        }

        console.log(dataCost);
        console.log(dataSell);

        console.log("You need to sell " + breakeven + " units to cover your fund");

        $('#breakeven_msg').text("You need to sell " + breakeven + " units to cover your fund");

        var ctx1 = document.getElementById("chart1").getContext("2d");
        var data1 = {
            labels: labelCost,
            datasets: [
                {
                    label: "Cost",
                    fillColor: "rgba(100,220,220,0.7)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(243,245,246,0.9)",
                    data: dataCost
                },
                {
                    label: "Sale",
                    backgroundColor: "rgba(75,192,192,0.7)",
                    fillColor: "rgba(44,171,227,0.8)",
                    strokeColor: "rgba(44,171,227,0.8)",
                    pointColor: "rgba(44,171,227,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(44,171,227,1)",
                    data: dataSell
                }

            ]
        };

        var myLineChart = new Chart(ctx1, {
            type: 'line',
            data: data1,
            scaleShowGridLines : true,
            scaleGridLineColor : "rgba(0,0,0,.005)",
            scaleGridLineWidth : 0,
            scaleShowHorizontalLines: true,
            scaleShowVerticalLines: true,
            bezierCurve : true,
            bezierCurveTension : 0.4,
            pointDot : true,
            pointDotRadius : 4,
            pointDotStrokeWidth : 1,
            pointHitDetectionRadius : 2,
            datasetStroke : true,
            tooltipCornerRadius: 2,
            datasetStrokeWidth : 2,
            datasetFill : true,
            responsive: true
        });


        dataCost = [];
        dataSell = [];
    });



</script>