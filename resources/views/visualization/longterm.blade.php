
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


			var labelGraph = [];
			var dataGraph = [];

			var cost = {{ number_format($total, 2, '.', ',') }};
			console.log("Cost Per Item : " + cost);

			var quantityDay = 20;
			console.log("Item Per Day : " + quantityDay);

			var margin = 29.5;
			console.log("Margin Price : " + margin + "%");

			var sell = cost * (1 + (margin/100));
			console.log("Selling Price each : " + sell);

			var profit = sell - cost;
			console.log("Profit Price each : " + profit);

			//Month
			var laborDay = 10;
			var ingredientsDay = (cost * quantityDay * 30 ) + (laborDay * 30);


			console.log("Cost ingredient per day : " + ingredientsDay);
			console.log("Cost labor per day : " + laborDay);

			var timeline = 13;

			//Processing Data

			var productionEachMonth = [];
			var costCurrentMonth;

			 for (var i = 1; i < timeline; i++) {

				labelGraph.push(i);
				console.log('-------------' + i + '-----------');

				costCurrentMonth = 0;
				costCurrentMonth += ingredientsDay;

				console.log('cost current month is ' + costCurrentMonth);

				dataGraph.push(costCurrentMonth);
			}


			//Processing Profit
			var profitCurrentMonth = [];
			for (var i = 1; i < timeline + 1; i++) {
				profitCurrentMonth.push( (profit * quantityDay * 30) * i );
			}

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
