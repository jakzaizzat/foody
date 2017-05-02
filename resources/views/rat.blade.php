@extends('layouts.master')

@section('content')

	
	<canvas id="spider" width="400" height="200"></canvas>

	<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

	<script type="text/javascript">

	$(function(){
	  $.getJSON("/recipe/34", function (result) {

	    var labels = [],data=[];
	    for (var i = 0; i < result.length; i++) {
	        labels.push(result[i].label);
	        data.push(result[i].value);
	        console.log(i);
	        console.log("label " + result[i].label);
	        console.log("value " + result[i].value)
	    }

	    var buyerData = {
	      labels : labels,
	      datasets : [
	        {
	          data : data
	        }
	      ]
	    };
	    var buyers = document.getElementById('spider').getContext('2d');
	    
	    // new Chart(buyers).Line(buyerData, {
	    //   bezierCurve : true
	    // });


	    var myLineChart = new Chart(buyers, {
		    type: 'radar',
		    data: buyerData
		});
	  });

	});
	</script>

@endsection