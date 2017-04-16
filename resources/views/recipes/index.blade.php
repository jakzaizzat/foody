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
              <h4 class="sub-heading">Exclusively</h4>
              <h1 class="heading purple">List of <span class="purple">Recipe</span></h1>
              
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Cost</th>
                    <th>Selling Price</th>
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($recipes as $recipe)
                  <tr>
                    <td>{{ $recipe->name }}</td>
                    <td>RM {{ $recipe->cost }}</td>
                    <td>RM {{ $recipe->cost * ( $recipe->margin/100 + 1) }}</td>
                    <td>
                      <a class="btn btn-primary btn-xs" href="/recipe/{{ $recipe->id }}">View</a>
                      <a class="btn btn-danger btn-xs" href="/recipe/{{ $recipe->id }}">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                  </tr>
                </tbody>
              </table>


            </div>
          </div>
        </div>
      </section>

  @endsection

