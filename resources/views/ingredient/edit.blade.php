@extends('layouts.master')




@section('content') 


  @include('layouts.navbar')

  <!-- Page Content -->
      <!-- ============================================================== -->
      <div id="page-wrapper">
          <div class="container-fluid">
              <div class="row bg-title">
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                      <h4 class="page-title"></h4> </div>
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                      <ol class="breadcrumb">
                          <li class="active"><a href="/recipes">Dashboard</a></li>
                          <li class="active">Add New Recipe</li>
                      </ol>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->


             <div class="col-md-6 col-md-offset-3 col-sm-12">
                      <div class="white-box">
                          <center>
                              <h3 class="box-title m-b-0">Edit Ingredient #{{ $ingredient->id }}</h3>
                              <p class="text-muted m-b-30 font-13"> Update detail below</p>
                          </center>
                          <form class="no-bg-addon" method="POST">
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

                              <div class="form-group">
                                  <div class="input-group">
                                      <input class="form-control" type="text" placeholder="Ingredient Name?" id="name" name="name" value="{{ $ingredient->name }}" required>
                                      <div class="input-group-addon"><i class="ti-shopping-cart"></i></div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="input-group">
                                      <input class="form-control" type="number" placeholder="How much do you pay for it?" id="price" name="price" value="{{ $ingredient->price }}" required>
                                      <div class="input-group-addon"><i class="ti-bolt-alt"></i></div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="input-group">
                                      <input class="form-control" type="number" placeholder="How much amount you purchase?" id="volume" name="volume"  value="{{ $ingredient->volume }}" required>
                                      <div class="input-group-addon"><i class="ti-money"></i></div>
                                  </div>
                              </div>
                             <div class="form-group">
                                  <select class="form-control" name="unit">


                                      @if($ingredient->unit == "kg")
                                        <option selected>kg</option>
                                       @else
                                        <option>kg</option>
                                       @endif
                                       
                                       @if($ingredient->unit == "g")
                                          <option selected>g</option>
                                       @else
                                          <option>g</option>
                                       @endif

                                       @if($ingredient->unit == "tbsp")
                                          <option selected>tbsp</option>
                                       @else
                                          <option>tbsp</option>
                                       @endif

                                       @if($ingredient->unit == "litre")
                                          <option selected>litre</option>
                                       @else
                                          <option>litre</option>
                                       @endif

                                       @if($ingredient->unit == "militre")
                                          <option selected>militre</option>
                                       @else
                                          <option>militre</option>
                                       @endif



                                  </select>
                              </div>
                              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                              <button class="btn btn-block btn-danger btn-lg btn-rounded">Update</button>
                          </form>
                      </div>
                  </div>

              <div class="col-md-3 col-lg-3 col-sm-5">
                  <div class="white-box">
                      <h3 class="box-title">HELP</h3>
                      <hr>
                      <small>Example: I paid RM10 for 1 tray of eggs ( 30 unit)</small>
                  </div>
              </div>


              <!-- ============================================================== -->
              <!-- end right sidebar -->
              <!-- ============================================================== -->
          </div>
          <!-- /.container-fluid -->
          @include('layouts.footer')
      </div>

  
@endsection

