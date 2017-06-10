
<center>
	<h3 class="box-title m-b-0">How much is your capital cost?</h3>
	<p class="text-muted m-b-30 font-13" ></p>
</center>
<form class="no-bg-addon">
	<div class="form-group">
		<div class="input-group">
			<input type="number" class="form-control" id="sell_price" placeholder="MYR" required>
			<div class="input-group-addon"><i class="ti-money"></i></div>
		</div>
	</div>
	<a class="btn btn-block btn-danger btn-lg btn-rounded" id="calcBtn">Calculate</a>
</form>

<div class="row">
	<div class="col-md-12">
		<div class="white-box">
			<canvas id="longterm" width="400" height="200"></canvas>
		</div>
	</div>
</div>

<script
		src="https://code.jquery.com/jquery-2.2.4.min.js"
		integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
		crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script type="text/javascript">


    $(function(){

        //Initial Data
		var cost = 2.82;
		var sell = 4;
		var profit = sell - cost;

		var capital = 1000;
		var sell_per_day = 10;

		//Calculate how much product able to produce
		var produce = Math.floor(capital / cost);
		console.log("Able to produce " + produce + " units");

		var cost_need = produce * cost;
        console.log("Total cost used from capital RM" + cost_need);

        var capital_left = capital - cost_need;
        console.log("Capital left RM " + capital_left);


        var sell_unit_month = sell_per_day * 20;
        var total_sell_month = sell_unit_month * sell;
        console.log("Total revenue per month RM" + total_sell_month);






        //Chart.JS
        var buyerData = {
            labels: labelGraph,
            datasets : [
                {
                    label: "Cost",
                    backgroundColor: "rgba(59, 89, 152, .5)",
                    data: dataGraph
                },
                {
                    label: "Profit",
                    backgroundColor: "rgba(255, 78, 166, 0.8)",
                    data : profitCurrentMonth
                }
            ]
        };

        var buyers = document.getElementById('longterm').getContext('2d');


        var myLineChart = new Chart(buyers, {
            type: 'line',
            data: buyerData,
            options: {
                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Total (RM)'
                        }
                    }]
                }
            }

        });

    });

</script>
