
	<canvas id="longterm" width="400" height="200"></canvas>

	<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

	<script type="text/javascript">

	  
	    $(function(){
	    	$.getJSON("/timelinejson/{{ $recipe->id }}", function (result) {


			    var labelGraph = [];
			    var dataGraph = [];

			    var cost = {{ $recipe->cost }};
			    console.log("Cost Per Item : " + cost);
			   
			    var quantityDay = {{ $recipe->itemPerDay }};
			    console.log("Item Per Day : " + quantityDay);

			    var margin = {{ $recipe->margin }};
			    console.log("Margin Price : " + margin + "%");	

			    var sell = cost * (1 + (margin/100));
				console.log("Selling Price each : " + sell);	

				var profit = sell - cost;
				console.log("Profit Price each : " + profit);			    

			    //Month
			    var laborDay = 10; 
			    var ingredientsDay = (cost * quantityDay * 30 ) + (laborDay * 30); 
			     

			    //Pump data from JSON into array
			    var productionData = [];
			    var productionRenew = [];

			    for (var i = 0; i < result.length; i++) {
			        productionData.push(result[i].price);
			        productionRenew.push(result[i].renew);
			    }



			    console.log('-------------ProductionData-----------');
			    console.log(productionData);

			    console.log('-------------productionRenew-----------');
			    console.log(productionRenew);


			    console.log("Cost ingredient per day : " + ingredientsDay);
			    console.log("Cost labor per day : " + laborDay);

			    var timeline = 37;

			    //Processing Data

			    var productionEachMonth = [];
			    var costCurrentMonth;
		   		 
		   		 for (var i = 1; i < timeline; i++) {

			    	labelGraph.push(i);
			    	console.log('-------------' + i + '-----------');

			    	costCurrentMonth = 0;
			    	costCurrentMonth += ingredientsDay;
			    		
		    		for( var k = 0; k < productionData.length; k++){

		    			if(i == 1 || ( productionRenew[k] + 1 )/i == 1  ||  ( productionRenew[k] + 1 )/(i - 12) == 1 ){
		    				productionCurrentMonth = costCurrentMonth + productionData[k];
		    			}else{
		    				productionCurrentMonth = 0;
		    			}

		    		}
		    		

			    	console.log('cost current month is ' + costCurrentMonth);

			    	dataGraph.push(costCurrentMonth);
			    	productionEachMonth.push(productionCurrentMonth);
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
			        },
			        {
			          label: "Production",
			          backgroundColor: "rgba(242, 255, 91, 0.8)",
			          data : productionEachMonth
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



		});

	</script>
