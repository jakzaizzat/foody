@extends('layouts.master')



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
                  <a href="javascript:void(0)" target="_blank" class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Add New Recipe</a>
                  <ol class="breadcrumb">
                      <li ><a href="#">Dashboard</a></li>
                      <li class="active">{{ $recipe->name }}</li>
                  </ol>
              </div>
              <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->

          {{-- @if($recipe->ingredients->isEmpty()) --}}

              <h1 class="heading pink">There is no item yet <i class="em em-cry"></i></h1>
              <a href="/recipe/{{ $recipe->id }}/items" class="btn btn-primary">Add One now</a>
          
          {{-- @else --}}

          <div class="row">
              <div class="col-lg-4 col-sm-6 col-xs-12">
                  <div class="white-box">
                      <h3 class="box-title">Cost</h3>
                      <ul class="list-inline m-t-30 p-t-10 two-part">
                          <li><i class="icon-notebook text-info"></i></li>
                          <li class="text-right">RM<span class="counter">{{ number_format($recipe->cost, 2, '.', ',') }}</span></li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-4 col-sm-6 col-xs-12">
                  <div class="white-box">
                      <h3 class="box-title">Sell</h3>
                      <ul class="list-inline m-t-30 p-t-10 two-part">
                          <li><i class="icon-bag text-purple"></i></li>
                          <li class="text-right">RM<span class="counter">{{ number_format($recipe->cost * ( $recipe->margin/100 + 1),2, '.', ',')  }}</span></li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-4 col-sm-6 col-xs-12">
                  <div class="white-box">
                      <h3 class="box-title">Funds</h3>
                      <ul class="list-inline m-t-30 p-t-10 two-part">
                          <li><i class="fa fa-money text-success"></i></li>
                          <li class="text-right">RM<span class="counter">324.80</span></li>
                      </ul>
                  </div>
              </div>
          </div>

          
          <div class="row">
              <div class="col-lg-12">
                  <div class="white-box">
                      <h3 class="box-title">Cost Consumption</h3>
                      <div>
                          <canvas id="chart3" height="150"></canvas>
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
                                  @foreach($recipe->ingredients as $ingredient)
                                  <tr>
                                      <td>1</td>
                                      <td class="txt-oflo">{{ $ingredient->name }}</td>
                                      <td class="txt-oflo">{{ $ingredient->pivot->portion }} {{ $ingredient->unit }}</td>
                                      <td class="txt-oflo">RM 
                                         {{ number_format($ingredient->pivot->portion / $ingredient->volume * $ingredient->price, 2, '.', ',') }}
                                         </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
{{-- 
          @endif --}}


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
  <script src="/plugins/bower_components/Chart.js/chartjs.init.js"></script>
  <script src="/plugins/bower_components/Chart.js/Chart.min.js"></script>


@endsection


