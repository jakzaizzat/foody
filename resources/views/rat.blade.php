@extends('layouts.master')

@section('content')

	
	<canvas id="graph" width="400" height="200"></canvas>

	<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

	<script type="text/javascript">

	  
	    $(function(){


	    var buyerData = {
	      labels: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
	      datasets : [
	        {
	          label: "Cost",
		      backgroundColor: "rgba(59, 89, 152, .8)",
		      strokeColor: "rgba(220,220,220,1)",
		      pointColor: "rgba(220,220,220,1)",
		      pointStrokeColor: "#fff",
		      pointHighlightFill: "#fff",
		      pointHighlightStroke: "rgba(220,220,220,1)",
		      data: [200, 200, 300, 200, 200, 200, 200, 300, 200, 200, 200, 200]
		    },
		    {
		      label: "Sell",
		      backgroundColor: "rgba(255, 221, 87, 0.6)",
		      strokeColor: "rgba(220,220,220,1)",
		      pointColor: "rgba(220,220,220,1)",
		      pointStrokeColor: "#fff",
		      pointHighlightFill: "#fff",
		      pointHighlightStroke: "rgba(220,220,220,1)",
		      data: [450, 450, 450, 450, 450, 450, 450, 450, 450, 450, 450, 450]
		    },
		    {
		      label: "Profit",
		      backgroundColor: "rgba(255, 42, 117, .7)",
		      strokeColor: "rgba(220,220,220,1)",
		      pointColor: "rgba(220,220,220,1)",
		      pointStrokeColor: "#fff",
		      pointHighlightFill: "#fff",
		      pointHighlightStroke: "rgba(220,220,220,1)",
		      data: [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1200, 1400]
		    }	
	      ]
	    };
	    var buyers = document.getElementById('graph').getContext('2d');
	    
	    // new Chart(buyers).Line(buyerData, {
	    //   bezierCurve : true
	    // });




	    var myLineChart = new Chart(buyers, {
		    type: 'line',
		    data: buyerData,
		    options: {
			    scales: {
			        yAxes: [{
			            ticks: {
			                beginAtZero: true
			            }
			        }]
			    }
			}

		});

	});

	</script>

@endsection