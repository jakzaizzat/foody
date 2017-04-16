@extends('layouts.master')

@section('content')

<header class="hero">
    <div class="container">

    @include('layouts.navbar')

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
          <!-- <a href="#" class="menu"><img src="assets/menu.png"></a> -->
          <div class="hero-text">
            <h1>Kickstart your F&B Business</h1>
            <h3>Foody - Food Business Assisstant</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eget leo ultrices nisl luctus congue. Integer molestie, ex 
            </p>
            <a href="/recipes/add" class="btn btn-lg btn-primary cta">Calculate Now</a>
          </div>
        </div>
      </div>
    </div>
</header>

@endsection