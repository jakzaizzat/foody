@extends('layouts.master')

@section('content') 
      
      @include('layouts.navbar')

      <!-- Page Content -->
      <!-- ============================================================== -->
      <div id="page-wrapper">
          <div class="container-fluid">
              <div class="row bg-title">
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                      <h4 class="page-title">Dashboard </h4> </div>
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                      <a href="/recipes/add" class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Add New Recipe</a>
                      <ol class="breadcrumb">
                          <li class="active"><a href="#">Dashboard</a></li>
                      </ol>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->

              <!-- Show status if available -->
              @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif


              <div class="row">
                  <div class="col-lg-3 col-sm-6 col-xs-12">
                      <div class="white-box">
                          <h3 class="box-title">total recipes</h3>
                          <ul class="list-inline m-t-30 p-t-10 two-part">
                              <li><i class="icon-notebook text-info"></i></li>
                              <li class="text-right"><span class="counter">{{ $totalRecipe  }}</span></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 col-xs-12">
                      <div class="white-box">
                          <h3 class="box-title">total ingredient</h3>
                          <ul class="list-inline m-t-30 p-t-10 two-part">
                              <li><i class="icon-bag text-purple"></i></li>
                              <li class="text-right"><span class="counter">{{ $totalIng }}</span></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 col-xs-12">
                      <div class="white-box">
                          <h3 class="box-title">AVG Profit Margin</h3>
                          <ul class="list-inline m-t-30 p-t-10 two-part">
                              <li><i class="icon-graph text-danger"></i></li>
                              <li class="text-right"><span class="">311</span></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 col-xs-12">
                      <div class="white-box">
                          <h3 class="box-title">AVG Cost Price</h3>
                          <ul class="list-inline m-t-30 p-t-10 two-part">
                              <li><i class="fa fa-money text-success"></i></li>
                              <li class="text-right"><span class="">117</span></li>
                          </ul>
                      </div>
                  </div>
              </div>

              <!-- ============================================================== -->
              <!-- calendar widgets -->
              <!-- ============================================================== -->
              <div class="row">
                  <div class="col-md-12 col-lg-12 col-sm-12">
                      <div class="panel">
                          <div class="panel-heading">MANAGE RECIPES</div>

                          <div class="table-responsive">
                              <table class="table table-hover manage-u-table">
                                  <thead>
                                      <tr>
                                          <th style="width: 70px;" class="text-center">#</th>
                                          <th>NAME</th>
                                          <th>Recipe COST</th>
                                          <th>Unit Cost</th>
                                          <th>MANAGE</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($recipes as $key=>$recipe)
                                      <tr>
                                          <td class="text-center">{{ ++$key  }}</td>
                                          <td><span class="font-medium">{{ $recipe->name }}</span></td>
                                          <td>RM

                                              <?php $total = 0; ?>
                                              @foreach ($recipe->ingredients as $ingredient)
                                                <?php
                                                  $total += $ingredient->pivot->portion/$ingredient->volume * $ingredient->price ;
                                                ?>
                                              @endforeach

                                              {{ number_format($total, 2, '.', ',') }}
                                          </td>

                                          <td>RM
                                              {{ number_format($total/$recipe->quantity, 2, '.', ',') }}
                                          </td>

                                          <td>
                                              <a class="btn btn-primary btn-xs" href="/recipe/{{ $recipe->id }}">View</a>
                                              <a class="btn btn-normal btn-xs" href="/recipe/{{ $recipe->id }}/edit">Edit</a>

                                              <form method="post" action="{!! action('RecipesController@destroy', $recipe->id ) !!}" style="display: inline-block;">
                                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                                 <div>
                                                    <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                                </div>
                                              </form>

                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- ============================================================== -->
              <!-- end right sidebar -->
              <!-- ============================================================== -->
          </div>
          <!-- /.container-fluid -->
          @include('layouts.footer')
      </div>

      <!-- End of ID Wrapper in Navbar.blade -->
      </div>

  @endsection

