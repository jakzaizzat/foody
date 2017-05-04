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

		    var cost = 4.07;
		    var quantityDay = 20;
		    
		    var ingredientsDay = cost * quantityDay; 
		    var laborDay = 33; 

		    console.log("Cost ingredient per day : " + ingredientsDay);
		    console.log("Cost labor per day : " + laborDay);

		    //Production

		    console.table()



		});

	</script>

@endsection