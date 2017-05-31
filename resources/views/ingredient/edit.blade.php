@extends('layouts.master')

@section('content') 

<div id="myModal" class="modal" style="display: block;">

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
              <h4 class="sub-heading">Add Material Cost #{{ $ingredient->id }}</h4>
            </div>
          </div>
          <form method="POST">
          <div class="row add_item">
            {{ csrf_field() }}
            <div class="col-md-8 col-md-offset-2 form-group">
              <label>Material Name?</label>
              <input class="u-full-width" type="text" placeholder="Egg" name="name" id="name" value="{{ $ingredient->name }}">
            </div>
            <div class="col-md-8 col-md-offset-2 form-group">
              <label>How much the price? <strong>(RM)</strong></label>
              <input class="u-full-width" type="text" placeholder="20" id="cost" name="price" value="{{ $ingredient->price }}">
            </div>
            <div class="col-md-8 col-md-offset-2 form-group">
               <label>How many product may you produce with this item?</label>
               <input class="u-full-width" type="text" placeholder="10" id="usage" name="usage" value="{{ $ingredient->usage }}">
               <input type="hidden" name="recipe_id" value="{{ $ingredient->recipe_id }}">
             {{-- <input type="hidden" name="type" value="material"> --}}
               <input type="hidden" name="route" value="recipeMaterial">
            </div>

            <div class="col-md-8 col-md-offset-2 form-group">
               <label>How many days renew this item?</label>
               <input type="number" name="renew" value="1">
            </div>

            <div class="col-md-8 col-md-offset-2 form-group">
               <label>Which type of this item?</label>
               <select name="type">

                 @if($ingredient->type == "material")
                  <option value="material" selected>material</option>
                 @else
                  <option value="material">material</option>
                 @endif
                 
                 @if($ingredient->type == "labor")
                  <option value="labor" selected>labor</option>
                 @else
                   <option value="labor">labor</option>
                 @endif

                 @if($ingredient->type == "production")
                  <option value="production" selected>production</option>
                 @else
                  <option value="production">production</option>
                 @endif
                
                 
               </select>
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

@endsection