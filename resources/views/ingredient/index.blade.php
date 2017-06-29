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
                  <a href="/recipe/{{ $recipe->id  }}/labor" class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Next to Labor</a>
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
                                          <h3>{{ $ingredient->name }}</h3>
                                          <span class="text-muted">{{ $ingredient->pivot->portion }} {{ $ingredient->unit }} </span>
                                      </div>
                                      <div class="er-count ">RM
                                          <span class="counter"> {{ number_format($ingredient->pivot->portion / $ingredient->volume * $ingredient->price, 2, '.', ',') }}</span>

                                          {{--<a href="/ingredient/{{ $ingredient->id }}/deleteThis"><i class="fa fa-times delete_icon"></i></a>--}}

                                          <form method="post" action="{!! action('IngredientsController@deleteList', $ingredient->id ) !!}" style="display: inline-block;">
                                              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                              <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                                              <div>
                                                  <button type="submit" class="btn btn-xs"><i class="fa fa-times delete_icon"></i></button>
                                              </div>
                                          </form>

                                      </div>
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
                      <h3 class="box-title">What is Material Cost?</h3>
                      <hr>
                      <h4><i class="ti-shopping-cart"></i> The amount of money invested in the production of a product</h4>
                      <small>Example: chicken, egg, butter, and any ingredient titem</small>
                  </div>
                  <div class="white-box">
                    <div class="form-group">
                        <h3 class="box-title">KG - TBSP Conversion</h3>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label>KG</label>
                        <input type="number" id="kg" name="kg" placeholder="kg" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>TBSP</label>
                        <input type="number" id="tbsp" name="tbsp" placeholder="tbsp" class="form-control" />
                    </div>
                  </div>
                  <div class="white-box">
                    <div class="form-group">
                        <h3 class="box-title">Cup - Gram Conversion</h3>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label>Cup</label>
                        <input type="number" id="cup" name="cup" placeholder="cup" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Gram</label>
                        <input type="number" id="gram" name="gram" placeholder="gram" class="form-control" />
                    </div>
                  </div>
                  <div class="white-box">
                    <div class="form-group">
                        <h3 class="box-title">Litre - Cup Conversion</h3>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label>Litre</label>
                        <input type="number" id="litre" name="litre" placeholder="litre" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Tbsp</label>
                        <input type="number" id="cupL" name="cupL" placeholder="Cup" class="form-control" />
                    </div>
                  </div>
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
                                    <div id="the-basics">
                                      <input class="typeahead form-control" type="text" name="name" placeholder="Search ingredient"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p class="text-muted m-b-30 font-13" id="unit_text">Unit</p>
                                    <input class="typeahead form-control" id="unit" type="text" name="volume" placeholder="How much do you used?">
                                    <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                                    <input type="hidden" name="ingredient_name" id="ingredient_name">
                                </div>
                                <div class="form-group">
                                    <small>Not found the ingredient? Add one now.</small>
                                    <a href="/ingredient/new" target="_blank" class="btn btn-sm btn-primary btn-rounded">Add new ingredient</a>
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
        
        //Add New Ingredient
        $('#unit').click(function(){
          //var raw = $('#the-basics').text();
          //var replace = raw.replace(/ /g,"");
          //var unit = replace.substring(2);
          
          var string = $('input.typeahead.tt-input').val();

          var unit = string.split('(').pop().split(')').shift();
          unit = "Unit in: " + unit;

          var indexSymb = string.indexOf("(");
          console.log("Index : " + indexSymb);
          var ing_name = string.substring(0, indexSymb - 1);

          $('#unit_text').text(unit);
          $('#ingredient_name').val(ing_name);

            console.log("Select: " + unit);
            console.log("Ingredient name " + ing_name );
        });

        //KG to TBSP
        $('#kg').keyup(function(event){
            var kg = this.value;
            var resultKG = kg * 67.628;
            $('#tbsp').val(resultKG);
        });

        //TBSP to KG
        $('#tbsp').keyup(function(event){
            var tbsp = this.value;
            var resultTBSP = tbsp * 0.0148;
            $('#kg').val(resultTBSP);
        });

        //Cup to Gram 
        $('#cup').keyup(function(event){
            var cup = this.value;
            var resultCup = cup * 340;
            $('#gram').val(resultCup);
        });

        //Gram to Cup 
        $('#gram').keyup(function(event){
            var gram = this.value;
            var resultGram = gram * 0.00422675281986;
            $('#cup').val(resultGram);
        });

        //Litre to Cup 
        $('#litre').keyup(function(event){
            var litre = this.value;
            var resultLitre = litre * 67.628;
            $('#cupL').val(resultLitre);
        });

        //Cup to Litre 
        $('#cupL').keyup(function(event){
            var cupL = this.value;
            var resultCup = cupL * 0.0147868;
            $('#litre').val(resultCup);
        });



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

