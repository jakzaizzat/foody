<canvas id="spider" width="400" height="200"></canvas>

	<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

	<script type="text/javascript">

	$(function(){

		var quantity = 100;
		

		var cost = 4.07;
		var sell = 5.698;
		var totalCost = 0;
		var totalSell = 0;


	    var labelCost = [];
	    var dataCost=[];
	    var labelSell = [];
	    var dataSell=[];

	    for (var i = 0; i < quantity; i++) {
	    	
	    	//Calculate Cost
	        //totalCost += cost;
	        
	        totalCost = quantity * cost;
	        labelCost.push(i);
	        dataCost.push(totalCost);
	        // console.log("----------------" + i + "-----------------------");
	        // console.log("value " + totalCost);

	        //Calculate Sell
	        totalSell += sell;
	        totalSell = totalSell + 0.1;
	        labelSell.push(i);
	        dataSell.push(totalSell);
	        // console.log("value2 " + totalSell);


	    }

	    console.log(dataCost);
	    console.log(dataSell);

	    var buyerData = {
	      labels : labelCost,
	      datasets : [
	        {
	          label: "Cost",

	          fillColor: "rgba(100,220,220,0.7)",
		      strokeColor: "rgba(220,220,220,1)",
		      pointColor: "rgba(220,220,220,1)",
		      pointStrokeColor: "#fff",
		      pointHighlightFill: "#fff",
		      pointHighlightStroke: "rgba(220,220,220,1)",	
	          data : dataCost
	        },
	        {
	          label: "Sale",
	          borderWidth: 2,
	          backgroundColor: "rgba(75,192,192,0.4)",
	          borderColor: "rgba(75,192,192,0.4)",
		      pointStrokeColor: "#fff",
	          data : dataSell
	        }
	      ]
	    };
	    var buyers = document.getElementById('spider').getContext('2d');
	    
	    // new Chart(buyers).Line(buyerData, {
	    //   bezierCurve : true
	    // });


	    var myLineChart = new Chart(buyers, {
		    type: 'line',
		    data: buyerData
		});


		//Intersection
		Chart.plugins.register({
		    afterDatasetsDraw: function(chartInstance, easing) {

		        var Y = chartInstance.scales['y-axis-0'];
		        var X = chartInstance.scales['x-axis-0'];

		        zeroPointY = Y.top + ((Y.bottom - Y.top) / (Y.ticks.length -1) * Y.zeroLineIndex);
		        zeroPointX = Y.right;
		        yScale = (Y.bottom - Y.top) / (Y.end - Y.start);
		        xScale = (X.right - X.left) / (X.ticks.length - 1);

		        var intersects = findIntersects(dataCost,dataSell );
		        var context = chartInstance.chart.ctx;
		            
		        intersects.forEach(function (result, idx) {
		            context.fillStyle = 'red';
		            context.beginPath();
		            context.arc((result.x * xScale) + zeroPointX, (Y.end - Y.start) - (result.y * yScale) - ((Y.end - Y.start) - zeroPointY), 3, 0, 2 * Math.PI, true);
		            context.fill();
		        });
		    }
		});

		function findIntersects(line1, line2)
		{
		    var intersects = [];
		            
		    line1.forEach(function(val,idx) {
		        var line1StartX = idx;
		        var line1StartY = line1[idx];
		        var line1EndX = idx + 1;
		        var line1EndY = line1[idx + 1];
		        var line2StartX = idx;
		        var line2StartY = line2[idx];
		        var line2EndX = idx + 1;
		        var line2EndY = line2[idx+1];
		        
		        result = checkLineIntersection(line1StartX, line1StartY, line1EndX, line1EndY, line2StartX, line2StartY, line2EndX, line2EndY);
		        
		        if (result.onLine1 && result.onLine2) {
		            intersects.push(result);
		        }
		    });
		    
		    return intersects;
		}

		function checkLineIntersection(line1StartX, line1StartY, line1EndX, line1EndY, line2StartX, line2StartY, line2EndX, line2EndY) {
		    // if the lines intersect, the result contains the x and y of the intersection (treating the lines as infinite) and booleans for whether line segment 1 or line segment 2 contain the point
		    var denominator, a, b, numerator1, numerator2, result = {
		        x: null,
		        y: null,
		        onLine1: false,
		        onLine2: false
		    };
		    denominator = ((line2EndY - line2StartY) * (line1EndX - line1StartX)) - ((line2EndX - line2StartX) * (line1EndY - line1StartY));
		    if (denominator == 0) {
		        return result;
		    }
		    a = line1StartY - line2StartY;
		    b = line1StartX - line2StartX;
		    numerator1 = ((line2EndX - line2StartX) * a) - ((line2EndY - line2StartY) * b);
		    numerator2 = ((line1EndX - line1StartX) * a) - ((line1EndY - line1StartY) * b);
		    a = numerator1 / denominator;
		    b = numerator2 / denominator;

		    // if we cast these lines infinitely in both directions, they intersect here:
		    result.x = line1StartX + (a * (line1EndX - line1StartX));
		    result.y = line1StartY + (a * (line1EndY - line1StartY));
		/*
		        // it is worth noting that this should be the same as:
		        x = line2StartX + (b * (line2EndX - line2StartX));
		        y = line2StartX + (b * (line2EndY - line2StartY));
		        */
		    // if line1 is a segment and line2 is infinite, they intersect if:
		    if (a > 0 && a < 1) {
		        result.onLine1 = true;
		    }
		    // if line2 is a segment and line1 is infinite, they intersect if:
		    if (b > 0 && b < 1) {
		        result.onLine2 = true;
		    }
		    // if line1 and line2 are segments, they intersect if both of the above are true
		    return result;
		};

	});
	</script>