@extends('layouts.master')

@section('content') 
 <div class="container">
    <div class="row">
      <div class="u-full-width" style="margin-top: 10%">
        <h2>List of recipe</h2>
        <table class="u-full-width">
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
                <a class="button button-primary" href="/recipe/{{ $recipe->id }}">View</a>
              </td>
            </tr>
            @endforeach
            </tr>
          </tbody>
        </table>

      </div>
    </div>
  </div>
  @endsection

