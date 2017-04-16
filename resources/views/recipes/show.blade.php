@extends('layouts.master')

@section('content') 

  <header class="non_hero">
    <div class="container">
       @include('layouts.navbar')
    </div>
  </header>

  <section class="case-study list_recipe">
    <div class="container">
      
      <div class="row">
        <div class="col-md-12">
          <h1 class="heading purple">#{{ $recipe->id }} <span class="purple">{{ $recipe->name }}</span></h1>

          <div class="row">
            <div class="col-md-4 text-center stat-box">
              <h4>RM</h4>
              <h1 class="purple"><span class="counter">{{ number_format($recipe->cost, 2, '.', ',') }}</span></h1>
              <h3>Each Cost</h3>
            </div>
            <div class="col-md-4 text-center stat-box">
              <h4>RM</h4>
              <h1 class="blue counter">{{ $recipe->cost * ( $recipe->margin/100 + 1) }}</h1>
              <h3>Selling Price</h3>
            </div>
            <div class="col-md-4 text-center stat-box">
              <h4>RM</h4>
              <h1 class="pink"><span class="counter">{{$recipe->cost * $recipe->quantity }}</span></h1>
              <h3>Fund Needed</h3>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 ingredient_list" >
            <h1 class="heading pink">List of <span class="pink">Ingredient</span></h1>
              <dl class="dl-horizontal">
                @foreach($recipe->ingredients as $ingredient)
                  <dt>{{ $ingredient->name }}</dt>
                  <dd>RM{{ $ingredient->price }} for {{ $ingredient->usage }} usage</dd>
                @endforeach
              </dl>
            <a href="#" class="btn btn-primary">Edit Items</a>
            </div>
          </div>
        </div>
      </div>

      
    </div>
  </section>

  <script src="/js/jquery-2.1.1.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
  <script src="/js/jquery.counterup.min.js"></script>
  <script>
  // Counterup
  $('.counter').counterUp({
    time: 1000
  });

  </script>

@endsection




 <div class="container">
    <div class="row">
      <div class="one-half offset-by-three column card" style="margin-top: 10%">
        <h2>{{ $recipe->name }}</h2>
        <p>
          Cost Price : <strong>RM {{ number_format($recipe->cost, 2, '.', ',') }}</strong>
        </p>
        <p>
          Selling Price : <strong>RM {{ $recipe->cost * ( $recipe->margin/100 + 1) }}</strong>
        </p>
      </div>
    </div>

    <div class="row">
      <div class="one-half offset-by-three column" style="margin-top: 10%">

        @if($recipe->ingredients)
        
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        
        <ul>
          @foreach($recipe->ingredients as $ingredient)
          <li>
            {{ $ingredient->name }} - <u>RM{{ $ingredient->price }}</u> for {{ $ingredient->usage }} usage
            <a href="#" class="button button-sm"> Update</a>
            <a href="#" class="button button-sm button-delete">Remove</a>
          </li>
          @endforeach
        </ul>

        @else
          <p>No ingredients :( </p>
        @endif

        <a class="button button-primary" id="addIngredient">Add Items</a>
        <a class="button" href="#">Edit</a>
      </div>
    </div>
  </div>

   <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content container">
              <div class="row modal-header">
                <div class="column">
                  <span class="close">&times;</span>
                </div>
              </div>
              <div class="row">
                <div class="modal-body">
                  <div class="row">
                    <label>List Ingredient</label>
                  </div>
                  <div class="row">
                    <form method="POST" action="/ingredient/add">
                    {{ csrf_field() }}
                    <div class="column one-third">
                       <input class="u-full-width" type="text" placeholder="Ingredient Name" name="name" id="name">
                    </div>
                    <div class="column one-third">
                      <input class="u-full-width" type="text" placeholder="Ingredient Price" id="cost" name="price">
                    </div>
                    <div class="column one-third">
                       <input class="u-full-width" type="text" placeholder="Usage" id="usage" name="usage">
                    </div>

                    <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                    <input class="button button-primary button-ingredient" type="submit" value="Add">
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>



    <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("addIngredient");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>