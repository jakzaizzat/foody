
  <script type="text/javascript" src="http://mbostock.github.com/d3/d3.js?2.1.3"></script>
  <script type="text/javascript" src="http://mbostock.github.com/d3/d3.geom.js?2.1.3"></script>
  <script type="text/javascript" src="http://mbostock.github.com/d3/d3.layout.js?2.1.3"></script>

  <style type="text/css">
    .slice text {
        font-size: 16pt;
        font-family: Arial;
    }   
    #tooltip {
      opacity: 0;
      background-color: #4e4c58;
      border: 1px solid #555;
      padding: 10px 0;
      margin: 10px 0;
      border-radius: 20px;
      max-width: 50%;
      height: auto;
      margin: 0 auto 20px;
      color: #fff;
      font-family: "Montserrat", sans-serif;
      text-transform: uppercase;
      text-align: center;
    }
 </style>

 <script type="text/javascript">

    var w = 300,                        //width
    h = 300,                            //height
    r = 150,                            //radius
    color = d3.scale.category10();     //builtin range of colors


    data = {!! $json !!};
    // data = [{"label":"material", "value":20}, 
    //         {"label":"labor", "value":50}, 
    //         {"label":"production", "value":30},
    //         {"label":"non-production", "value":10}];
    
    var vis = d3.select(".visualization")
        .append("svg:svg")              //create the SVG element inside the <body>
        .data([data])                   //associate our data with the document
            .attr("width", w)           //set the width and height of our visualization (these will be attributes of the <svg> tag
            .attr("height", h)
        .append("svg:g")                //make a group to hold our pie chart
            .attr("transform", "translate(" + r + "," + r + ")")    //move the center of the pie chart from 0, 0 to radius, radius
    var arc = d3.svg.arc()              //this will create <path> elements for us using arc data
        .outerRadius(r);
    var pie = d3.layout.pie()           //this will create arc data for us given a list of values
        .value(function(d) { return d.value; });    //we must tell it out to access the value of each element in our data array
    var arcs = vis.selectAll("g.slice")     //this selects all <g> elements with class slice (there aren't any yet)
        .data(pie)                          //associate the generated pie data (an array of arcs, each having startAngle, endAngle and value properties) 
        .enter()                            //this will create <g> elements for every "extra" data element that should be associated with a selection. The result is creating a <g> for every object in the data array
            .append("svg:g")                //create a group to hold each slice (we will have a <path> and a <text> element associated with each slice)
                .attr("class", "slice")    //allow us to style things in the slices (like text)
                .on('mouseover', function(d) {
                    $("#tooltip")
                      .html(d.data.label + " consumption : RM " + d.data.value);
                })
                .on('mousemove', function(d) {
                    d3.select("#tooltip")
                      .style("opacity", "1");
                })
                .on('mouseout', function(d) {
                    //$("#tooltip").html('').hide();
                    d3.select("#tooltip")
                        .style("opacity", "0");
                });
        arcs.append("svg:path")
                .attr("fill", function(d, i) { return color(i); } ) //set the color for each slice to be chosen from the color function defined above
                .attr("d", arc);                                    //this creates the actual SVG path using the associated data (pie) with the arc drawing function
        arcs.append("svg:text")                                     //add a label to each slice
                .attr("transform", function(d) {                    //set the label's origin to the center of the arc
                //we have to make sure to set these before calling arc.centroid
                d.innerRadius = 0;
                d.outerRadius = r;
                return "translate(" + arc.centroid(d) + ")";        //this gives us a pair of coordinates like [50, 50]
            })
            .attr("text-anchor", "middle")                          //center the text on it's origin
            .text(function(d, i) { return data[i].label; });        //get the label from our original data array
        
    </script>