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
              <h4 class="sub-heading"># {{ $recipe->id }} {{ $recipe->name }}</h4>
              <h1 class="heading purple">List of <span class="purple">Non-Production Cost</span> <a class="btn btn-primary" id="addIngredient"><i class="em em-heavy_plus_sign"></i> Add Items</a></h1>
              
              @include('ingredient.table')  

              <a href="/recipe/{{ $recipe->id }}/production" class="btn btn-submit float-l"><i class="em em-tractor"></i> Back to Production Cost </a>

              <a href="/calcCost/{{ $recipe->id }}" class="btn btn-submit btn-last float-r"><i class="em em-moneybag"></i> Finish </a>

            </div>
          </div>
        </div>
      </section>

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
                <div class="col-md-8 col-md-offset-2">
                  <h4 class="sub-heading">Add New Non-Production Item</h4>
                </div>
              </div>
              <form method="POST" action="/ingredient/add">
              <div class="row add_item">
                {{ csrf_field() }}
                <div class="col-md-8 col-md-offset-2 form-group">
                    <label>Item name?</label>
                   <input class="u-full-width" type="text" placeholder="Item Name?" name="name" id="name">
                </div>
                <div class="col-md-8 col-md-offset-2 form-group">
                  <label>How much does it cost?</label>
                  <input class="u-full-width" type="text" placeholder="How much the price?" id="cost" name="price">
                </div>
                <div class="col-md-8 col-md-offset-2">
                   <input class="u-full-width" value="{{ $recipe->quantity }}" type="hidden" placeholder="How long lasting this item?" id="usage" name="usage">
                   <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                   <input type="hidden" name="type" value="nonproduction">

                   <input type="hidden" name="route" value="recipeNonProduction">
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 col-md-offset-2">
                  <input class="btn btn-primary button-ingredient" type="submit" value="Add Now">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      @include('ingredient.modal')

  @endsection

