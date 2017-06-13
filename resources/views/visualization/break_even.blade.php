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



    //Breakeven
    $('#calcBtn').click(function(){

        //Remove class
        $('#breakeven_section').removeClass('dn');
        $('#profit_section').removeClass('dn');
        $('#gross_margin i').removeClass("ti-arrow-down ti-arrow-up text-info text-danger");
        $('#revenue_stat i').removeClass("ti-arrow-down ti-arrow-up text-info text-danger");
        $('#gross_margin span').removeClass("text-info text-danger");
        $('#revenue_stat span').removeClass("text-info text-danger");
        $('#break_even span').removeClass("text-info text-danger");

        //reset
        var resetCanvas = function(){
            $('#chart1').remove();
            $('#chart_container').append('<canvas id="chart1" height="150"></canvas>');
            console.log("In resetcanvas function");
        }

        resetCanvas();


        //Get Sell price from users

        var sell = $('#sell_price').val();
        sell = parseFloat(sell);
        console.log(sell);

        //Single Data
        var cost = {{ number_format($total/$recipe->quantity,2, '.', ',')  }};
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
        $('#break_even span').text("You need to sell " + breakeven + " units to cover your fund");

        if(breakeven < 1){
            $('#break_even i').addClass("ti-arrow-down text-danger");
            $('#break_even span').addClass("text-danger");
        }else{
            $('#break_even i').addClass("ti-arrow-up text-info");
            $('#break_even span').addClass("text-info");
        }


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


        //Calculate Gross Profit Margin %
        var gross = (totalSell - totalCost).toFixed(2);

        var margin = gross/totalSell * 100;
        margin = margin.toFixed(2);

        console.log("Gross Profit Margin: " + margin + "%");


        //Condition Profit or Loss
        var result_margin = "";
        var result_revenue = "";

        if(margin < 0){
            result_margin = margin + "%";
            result_revenue = "RM" + gross;


            $('#gross_margin i').addClass("ti-arrow-down text-danger");
            $('#gross_margin span').addClass("text-danger");


            $('#revenue_stat i').addClass("ti-arrow-down text-danger");
            $('#revenue_stat span').addClass("text-danger");


        }else{
            //result_margin = '<i class="ti-arrow-up text-info"></i> <span class="text-info">'+ margin +'% </span>';
            result_margin = margin + "%";

            result_revenue = "RM" + gross;

            $('#gross_margin i').addClass("ti-arrow-up text-info");
            $('#gross_margin span').addClass("text-info");

            $('#revenue_stat i').addClass("ti-arrow-up text-info");
            $('#revenue_stat span').addClass("text-info");
        }

        //Write into HTML
        $('#gross_margin span').text(result_margin);
        $('#revenue_stat span').text(result_revenue);


    });



</script>