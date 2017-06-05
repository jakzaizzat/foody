{{--<h1 class="heading pink">Cost   <span class="pink">Consumption</span></h1>--}}
{{--<canvas id="spider" width="400" height="200"></canvas>--}}
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
                labels.push(result[i].name);

                var cost = ( (result[i].portion/result[i].volume) * result[i].price).toFixed(2);
                data.push(cost);
                console.log(i);
                console.log("name " + result[i].name);
                console.log("cost " + cost);
            }

            var buyerData = {
                labels : labels,
                datasets : [
                    {
                        data : data,
                        backgroundColor: [
                            "#2cabe3",
                            "#edf1f5",
                            "#b4c1d7",
                            "#53e69d",
                            "#ff7676"
                        ]
                    }
                ]
            };
            var buyers = document.getElementById('cost').getContext('2d');


            var myLineChart = new Chart(buyers, {
                type: 'pie',
                data: buyerData,
                segmentShowStroke : true,
                segmentStrokeColor : "#fff",
                segmentStrokeWidth : 0,
                animationSteps : 100,
                tooltipCornerRadius: 0,
                animationEasing : "easeOutBounce",
                animateRotate : true,
                animateScale : false,
                legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
                responsive: true
            });
        });


    });
</script>