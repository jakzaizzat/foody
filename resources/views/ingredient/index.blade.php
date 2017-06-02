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

                              @foreach($ingredients as $ingredient)
                              <li>
                                  <div class="er-row">
                                      <div class="er-text">
                                          <h3>{{ $ingredient->name }}</h3><span class="text-muted">{{ $ingredient->usage }} plate</span></div>
                                      <div class="er-count ">RM<span class="counter">{{ $ingredient->price }}</span></div>
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
                      <div class="modal-body">
                          <form method="POST"  action="/ingredient/add">
                              <div class="form-group">
                                  <h3 class="box-title m-b-0">Search</h3>
                                  <p class="text-muted m-b-30 font-13"> When initializing a typeahead, you pass the plugin method one or more datasets. The source of a dataset is responsible for computing a set of suggestions for a given query.</p>
                                  <div id="the-basics">
                                    <input class="typeahead form-control" type="text" placeholder="Countries"> 
                                  </div>
                              </div>
                              <div class="form-group">
                                  <small>Not found the ingredient? Add one now.</small>
                                  <a href="" class="btn btn-sm btn-primary btn-rounded">Add new ingredient</a>
                              </div>
                          </form>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-danger waves-effect waves-light">Add Now</button>
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
  <!-- ============================================================== -->
  <!-- End Page Content -->
  <!-- ============================================================== -->

  <!-- End of ID Wrapper in Navbar.blade -->
  </div>

  <!-- Typehead Plugin JavaScript -->
  <script src="{{url ('/plugins/bower_components/typeahead.js-master/dist/typeahead.bundle.min.js') }}"></script>
  <script src="{{url ('/plugins/bower_components/typeahead.js-master/dist/typeahead-init.js') }}"></script>

@endsection



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
              <h4 class="sub-heading"># {{ $recipe->id }} {{ $recipe->name }}</h4>
              <h1 class="heading purple">List of <span class="purple">Material Cost</span> <a class="btn btn-primary" id="addIngredient"><i class="em em-heavy_plus_sign"></i> Add Items</a></h1>
              
              @include('ingredient.table')

              
              <a href="/recipe/{{ $recipe->id }}/labor" class="btn btn-submit float-r"><i class="em em-construction_worker"></i> Next Labor Cost </a>

            </div>
          </div>
        </div>
      </section>

      <div id="myModal" class="modal">

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
                  <h4 class="sub-heading">Add Material Cost</h4>
                </div>
              </div>
              <form method="POST" action="/ingredient/add">
              <div class="row add_item">
                {{ csrf_field() }}
                <div class="col-md-8 col-md-offset-2 form-group">
                  <label>Material Name?</label>
                  <input class="u-full-width" type="text" placeholder="Egg" name="name" id="name">
                </div>
                <div class="col-md-8 col-md-offset-2 form-group">
                  <label>How much the price? <strong>(RM)</strong></label>
                  <input class="u-full-width" type="text" placeholder="20" id="cost" name="price">
                </div>
                <div class="col-md-8 col-md-offset-2 form-group">
                   <label>How many {{ $recipe->name }} may you produce with this item?</label>
                   <input class="u-full-width" type="text" placeholder="10" id="usage" name="usage">
                   <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                   <input type="hidden" name="type" value="material">

                   <input type="hidden" name="renew" value="1">

                   <input type="hidden" name="route" value="recipeMaterial">
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

      </div>

      @include('ingredient.modal')

  @endsection

