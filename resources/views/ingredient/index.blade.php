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
                  <a href="javascript:void(0)" target="_blank" class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Next</a>
                  <ol class="breadcrumb">
                      <li class="active"><a href="#">Dashboard</a></li>
                  </ol>
              </div>
              <!-- /.col-lg-12 -->

          </div>
          <!-- /.row -->

          <div class="progress progress-lg">
              <div class="progress-bar progress-bar-success" role="progressbar" style="width: 33%; role="progressbar""> 33% </div>
          </div>

           @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif

          <div class="row">
              <div class="col-lg-6 col-md-offset-2 col-sm-12 col-md-6">
                  <div class="panel">
                      <div class="p-20">
                          <div class="row">
                              <div class="col-xs-8">
                                  <h4 class="m-b-0">List items</h4>
                                  <h2 class="m-t-0 font-medium">Material Cost</h2>
                              </div>
                              <div class="col-xs-4 p-20">
                              </div>
                          </div>
                      </div>
                      <div class="panel-footer bg-extralight">
                          <ul class="earning-box">

                              @foreach($recipe->ingredients as $ingredient)
                              <li>
                                  <div class="er-row">
                                      <div class="er-text">
                                          <h3>{{ $ingredient->name }}</h3><span class="text-muted">{{ $ingredient->pivot->portion }} {{ $ingredient->unit }} </span></div>
                                      <div class="er-count ">RM<span class="counter"> {{ number_format($ingredient->pivot->portion / $ingredient->volume * $ingredient->price, 2, '.', ',') }}</span></div>
                                  </div>
                              </li>
                              @endforeach

                              <li class="center">
                                  <a class="btn btn-rounded btn-danger btn-block p-10" data-toggle="modal" data-target="#responsive-modal">Add New Item</a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>

              <div class="col-md-3 col-lg-3 col-sm-5">
                  <div class="white-box">
                      <h3 class="box-title">Bonus Tips</h3>
                      <hr>
                      <h4><i class="ti-mobile"></i> 9998979695 (Toll Free)</h4> <small>Please contact with us if you have any questions. We are avalible 24h.</small> </div>
              </div>
          </div>

          <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <h4 class="modal-title">Add your ingredients</h4>
                      </div>

                      <form method="POST"  action="/ingredient/add">
                         {{ csrf_field() }}
                        <div class="modal-body">
                                <div class="form-group">
                                    <h3 class="box-title m-b-0">Search</h3>
                                    <p class="text-muted m-b-30 font-13"> When initializing a typeahead, you pass the plugin method one or more datasets. The source of a dataset is responsible for computing a set of suggestions for a given query.</p>
                                    <div id="the-basics">
                                      <input class="typeahead form-control" type="text" name="name" placeholder="Search ingredient"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p class="text-muted m-b-30 font-13" id="unit_text">Unit</p>
                                    <input class="typeahead form-control" id="unit" type="number" name="volume" placeholder="How much do you used?"> 
                                    <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                                    <input type="hidden" name="ingredient_name" id="ingredient_name">
                                </div>
                                <div class="form-group">
                                    <small>Not found the ingredient? Add one now.</small>
                                    <a href="/ingredient/new" class="btn btn-sm btn-primary btn-rounded">Add new ingredient</a>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger waves-effect waves-light">Add Now</button>
                        </div>
                      </form>
                  </div>
              </div>
          </div>

          <!-- ============================================================== -->
          <!-- end right sidebar -->
          <!-- ============================================================== -->
      </div>
      <!-- /.container-fluid -->
      @include('layouts.footer')



      <script type="text/javascript">
        

        $('#unit').click(function(){
          //var raw = $('#the-basics').text();
          //var replace = raw.replace(/ /g,"");
          //var unit = replace.substring(2);
          
          var unit = $('.tt-selectable').text();

          $('#unit_text').text(unit);
          $('#ingredient_name').val(unit);
        })

      </script>

  </div>
  <!-- ============================================================== -->
  <!-- End Page Content -->
  <!-- ============================================================== -->

  <!-- End of ID Wrapper in Navbar.blade -->
  </div>

  <!-- Typehead Plugin JavaScript -->
  <script src="{{url ('/plugins/bower_components/typeahead.js-master/dist/typeahead.bundle.min.js') }}"></script>
  <script src="{{url ('/plugins/bower_components/typeahead.js-master/dist/typeahead-init.js') }}"></script>

@endsection

