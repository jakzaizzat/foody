@extends('layouts.master')

@section('content') 

  <header class="non_hero">
    <div class="container">
       @include('layouts.navbar')
    </div>
  </header>

  <section class="case-study add_recipe">
    <div class="container">
      
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <h1 class="heading purple">Edit Recipe #{{ $recipe->id }}</h1>
            <form method="POST">
              {{ csrf_field() }}

              @if(count($errors))
              <div class="row">
                <div class="columns">
                  @foreach($errors->all() as $error)
                    <li>
                      <u>{{ $error }}</u>
                    </li>
                  @endforeach
                </div>
              </div>
              @endif

              <div class="row">
                <div class="columns form-group">
                  <label for="exampleEmailInput">Recipe name</label>
                  <input class="form-control" type="text" placeholder="Nasi Lemak" id="name" name="name" value="{{ $recipe->name }}"  required>
                </div>
              </div>
              <div class="row">
                <div class="columns form-group">
                  <label for="exampleEmailInput">Quantity produced</label>
                  <input class="form-control" type="number" placeholder="100" id="quantity" name="quantity" value="{{ $recipe->quantity }}"  required>
                </div>
              </div>

              <div class="row">
                <div class="columns form-group">
                  <label for="exampleEmailInput">Profit Margin %</label>
                  <input class="form-control" type="number" placeholder="10" id="margin" name="margin" value="{{ $recipe->margin }}"  required>
                </div>
              </div>

              <div class="row">
                <div class="columns form-group">
                  <label for="exampleEmailInput">How many product could be produce in one day?</label>
                  <input class="form-control" type="number" placeholder="10" id="itemPerDay" name="itemPerDay" value="{{ $recipe->itemPerDay }}">
                </div>
              </div>

              <input type="hidden" name="cost" value="{{ $recipe->cost }}">

              <div class="row">
                <input class="btn btn-submit" type="submit" value="Submit">
              </div>
            </form> 
        </div>
      </div>

      
    </div>
  </section>
@endsection



@section('content')
<div class="container">
  <div class="row">
    <div class="one-half offset-by-three column" style="margin-top: 10%">
      
      <form method="POST>
        {{ csrf_field() }}

        @if(count($errors))
        <div class="row">
          <div class="columns">
            @foreach($errors->all() as $error)
              <li>
                <u>{{ $error }}</u>
              </li>
            @endforeach
          </div>
        </div>
        @endif

        <div class="row">
          <div class="columns">
            <label for="exampleEmailInput">Recipe name</label>
            <input class="u-full-width" type="text" placeholder="Nasi Lemak" id="name" name="name" value="{{ $recipe->name }}" required>
          </div>
        </div>
        <div class="row">
          <div class="columns">
            <label for="exampleEmailInput">Quantity produced</label>
            <input class="u-full-width" type="number" placeholder="100" id="quantity" name="quantity" value="{{ $recipe->quantity }}" required>
          </div>
        </div>

        <div class="row">
          <div class="columns">
            <label for="exampleEmailInput">Profit Margin %</label>
            <input class="u-full-width" type="number" placeholder="Nasi Lemak" id="margin" name="margin" >
          </div>
        </div>

        <input class="button-primary" type="submit" value="Submit">
      </form>

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

@endsection