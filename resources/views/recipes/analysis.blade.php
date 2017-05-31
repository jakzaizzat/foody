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


          @endif

          @include('visualization.breakeven');

          <div class="row">
            <div class="col-md-12 ingredient_list single_recipe" >
            @if($recipe->ingredients->isEmpty())
              <h1 class="heading pink">There is no item yet <i class="em em-cry"></i></h1>
              <a href="/recipe/{{ $recipe->id }}/items" class="btn btn-primary">Add One now</a>
            @else
            <h1 class="heading pink">Timeline for <span class="pink">3</span> Years</h1>

            @include('visualization.longterm');
            
            
              
            {{-- <a href="/recipe/{{ $recipe->id }}/items" class="btn btn-primary">Edit Items</a> --}}
            <a href="/recipe/{{ $recipe->id }}" class="btn btn-lg btn-primary cta">Back to Detail </a>
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

