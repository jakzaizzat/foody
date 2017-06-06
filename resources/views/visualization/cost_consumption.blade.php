{{--<h1 class="heading pink">Cost   <span class="pink">Consumption</span></h1>--}}
{{--<canvas id="spider" width="400" height="200"></canvas>--}}
<script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script type="text/javascript">

    $(function(){

        var url_ing = "/spiderjson/{{ $recipe->id }}";
        var url_labor = "/laborcost/{{ $recipe->id }}";



        var labels = [],data=[];

        $.when(
            $.getJSON(url_ing),
            $.getJSON(url_labor)
        ).done(function(result1,result2){


            console.log(result1);
            console.log(result2);

            for (var i = 0; i < result1[0].length; i++) {

                var name = result1[0][i].name;

                var cost = ( (result1[0][i].portion/result1[0][i].volume) * result1[0][i].price).toFixed(2);
                labels.push(name);
                data.push(cost);
                console.log(i);
                console.log("name " + result1[0][i].name);
                console.log("cost " + cost);
            }

            console.log("-----------LABOR------------");
            for (var j = 0; j < result2[0].length; j++) {
                labels.push(result2[0][j].name);
                console.log(result2[0][j].name);
                data.push(result2[0][j].cost);
                console.log(result2[0][j].cost);
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