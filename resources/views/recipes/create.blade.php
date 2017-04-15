@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row">
    <div class="one-half offset-by-three column" style="margin-top: 10%">
      
      <form method="POST" action="/recipes/add">
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
            <input class="u-full-width" type="text" placeholder="Nasi Lemak" id="name" name="name" required>
          </div>
        </div>
        <div class="row">
          <div class="columns">
            <label for="exampleEmailInput">Quantity produced</label>
            <input class="u-full-width" type="number" placeholder="100" id="quantity" name="quantity" required>
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

