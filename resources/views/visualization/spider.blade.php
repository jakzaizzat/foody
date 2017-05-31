<h1 class="heading pink">Cost   <span class="pink">Consumption</span></h1>
<canvas id="spider" width="400" height="200"></canvas>
	<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

	<script type="text/javascript">

	$(function(){
	  $.getJSON("/spiderjson/{{ $recipe->id }}", function (result) {

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
	          data : data,
	          backgroundColor: [
		            "#FF6384",
		            "#4BC0C0",
		            "#FFCE56"
		        ]
	        }
	      ]
	    };
	    var buyers = document.getElementById('spider').getContext('2d');
	    

	    var myLineChart = new Chart(buyers, {
		    type: 'polarArea',
		    data: buyerData
		});
	  });


	});
	</script>