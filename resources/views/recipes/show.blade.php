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

          @if(!$recipe->ingredients->isEmpty())
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

            <div class="row visualization">

              <div id="tooltip"></div>
            
            </div>

          @endif

          @include('visualization.breakeven');

          <div class="row">
            <div class="col-md-12 ingredient_list" >
            @if($recipe->ingredients->isEmpty())
              <h1 class="heading pink">There is no item yet <i class="em em-cry"></i></h1>
              <a href="/recipe/{{ $recipe->id }}/items" class="btn btn-primary">Add One now</a>
            @else
            <h1 class="heading pink">List of <span class="pink">Ingredient</span></h1>
              <dl class="dl-horizontal">
               {{--  @foreach($recipe->ingredients as $ingredient)
                  <dt>{{ $ingredient->name }}</dt>
                  <dd>RM{{ $ingredient->price }} for {{ $ingredient->usage }} usage</dd>
                @endforeach --}}

                <table class="table table-hover">
                <thead>
                  <tr>
                    <th>NAME</th>
                    <th>PRICE</th>
                    <th>USAGE</th>
                    <th>COST</th>
                    <th>TYPE</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($recipe->ingredients as $ingredient)
                  <tr>
                    <td>{{ $ingredient->name }}</td>
                    <td>RM {{ $ingredient->price }}</td>
                    <td> {{ $ingredient->usage }}</td>
                    <td>RM {{ $ingredient->cost }}</td>

                    <td>
                      <div class="stack pink">
                        @if($ingredient->type == "material")
                          <i class="em em-watermelon"></i> Ingredient
                        @elseif($ingredient->type == "labor")
                          <i class="em em-construction_worker"></i> Labor
                        @elseif($ingredient->type == "production")
                          <i class="em em-tractor"></i> Production
                        @elseif($ingredient->type == "nonproduction")
                          <i class="em em-office"></i> Non-Production
                        @else
                          <i class="em em-no_entry_sign"></i> Undefined
                        @endif 
                      </div>
                    </td>

                  </tr>
                  @endforeach
                   </tr>
                </tbody>
              </table>


              </dl>
            <a href="/recipe/{{ $recipe->id }}/items" class="btn btn-primary">Edit Items</a>
            @endif
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

