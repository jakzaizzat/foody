@extends('layouts.master')

@section('title', 'List Recipes')

@section('content')
  
  @include('layouts.navbar')

  <!-- Page Content -->
  <!-- ============================================================== -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row bg-title">
              <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                  <h4 class="page-title">{{ $recipe->name }}</h4> </div>
              <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                  <a href="/recipe/{{ $recipe->id }}/items" class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Add New Ingredient</a>
                  <a href="/recipe/{{ $recipe->id }}/calculator" class="btn btn-primary pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Calculator</a>
                  <ol class="breadcrumb">
                      <li ><a href="#">Dashboard</a></li>
                      <li class="active">{{ $recipe->name }}</li>
                  </ol>
              </div>
              <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->

           @if($recipe->ingredients->isEmpty())

              <div class="row">
                  <div class="col-lg-6 col-sm-12 col-md-6 col-md-offset-3">
                      <div class="panel">
                          <div class="p-20">
                              <div class="row">
                                  <div class="col-xs-12">
                                      <h2 class="m-b-0 font-medium text-center">There is no item yet</h2>
                                  </div>
                              </div>
                          </div>
                          <div class="panel-footer bg-extralight">
                              <ul class="earning-box">
                                  <li class="center">
                                      <a href="/recipe/{{ $recipe->id }}/items" class="btn btn-rounded btn-danger btn-block p-10">Add One Now</a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          
           @else

          <div class="row">
              <div class="col-lg-4 col-sm-6 col-xs-12">
                  <div class="white-box">
                      <h3 class="box-title">Recipe Cost</h3>
                      <ul class="list-inline m-t-30 p-t-10 two-part">
                          <li><i class="icon-notebook text-info"></i></li>
                          <li class="text-right">RM<span class="counter">{{ number_format($total, 2, '.', ',') }}</span></li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-4 col-sm-6 col-xs-12">
                  <div class="white-box">
                      <h3 class="box-title">Cost Each</h3>
                      <ul class="list-inline m-t-30 p-t-10 two-part">
                          <li><i class="fa fa-money text-purple"></i></li>
                          <li class="text-right">RM<span class="counter">{{ number_format($total/$recipe->quantity,2, '.', ',')  }}</span></li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-4 col-sm-6 col-xs-12">
                  <div class="white-box">
                      <h3 class="box-title">Quantity</h3>
                      <ul class="list-inline m-t-30 p-t-10 two-part">
                          <li><i class="icon-bag text-success"></i></li>
                          <li class="text-right"><span class="counter">{{$recipe->quantity}} </span>{{$recipe->yield_type}}</li>
                      </ul>
                  </div>
              </div>
          </div>

          
          <div class="row">
              <div class="col-lg-12">
                  <div class="white-box">
                      <h3 class="box-title">Cost Consumption</h3>
                      <div>
                          <canvas id="cost" height="150"></canvas>
                      </div>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12">
                  <div class="white-box">
                      <h3 class="box-title">List of Items</h3>
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Name</th>
                                      <th>Volume</th>
                                      <th>Item Cost</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($recipe->ingredients as $key => $ingredient)
                                  <tr>
                                      <td>{{ ++$key  }}</td>
                                      <td class="txt-oflo">{{ $ingredient->name }}</td>
                                      <td class="txt-oflo">{{ $ingredient->pivot->portion }} {{ $ingredient->unit }}</td>
                                      <td class="txt-oflo">RM 
                                         {{ number_format($ingredient->pivot->portion / $ingredient->volume * $ingredient->price, 2, '.', ',') }}
                                         </td>
                                  </tr>
                                  @endforeach
                                    <?php $key = 0; ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12">
                  <div class="white-box">
                      <h3 class="box-title">List of Labor Cost</h3>
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Salary</th>
                                  <th>Time consumed to make this Recipe</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($labors as $labor)
                                  <tr>
                                      <td>{{ ++$key  }}</td>
                                      <td class="txt-oflo">{{ $labor->name }}</td>
                                      <td class="txt-oflo">RM{{ $labor->salary }}/ {{ $labor->time_based }}</td>
                                      <td class="txt-oflo">
                                          {{ $labor->time_consume }} minutes
                                      </td>
                                  </tr>
                              @endforeach
                              <?php $key = 0; ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12">
                  <div class="white-box">
                      <h3 class="box-title">List of Utilities Cost</h3>
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Payment</th>
                                  <th>Unit able to produce in one day</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($utilities as $utility)
                                  <tr>
                                      <td>{{ ++$key  }}</td>
                                      <td class="txt-oflo">{{ $utility->name }}</td>
                                      <td class="txt-oflo">RM{{ $utility->payment }}/ Month</td>
                                      <td class="txt-oflo">{{ $utility->unit_per_day }} </td>
                                  </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>

          @endif


          <!-- ============================================================== -->
          <!-- end right sidebar -->
          <!-- ============================================================== -->
      </div>
      <!-- /.container-fluid -->
      
      @include('layouts.footer')

  </div>
  
  <!-- Custom Theme JavaScript -->
  <script src="/js/custom.min.js"></script>
  <!-- Chart JS -->
  {{--<script src="/plugins/bower_components/Chart.js/chartjs.init.js"></script>--}}



  @include('visualization.cost_consumption')


@endsection


